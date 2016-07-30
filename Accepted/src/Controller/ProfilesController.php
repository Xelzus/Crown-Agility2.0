<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\ORM\Table;

/**
 * Profile Controller
 */
class ProfilesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
	    $this->loadModel('Users');
        $this->loadModel('Reminders');
        $this->loadModel('Posts');
        $this->loadModel('Topics');
        $this->loadModel('Forums');
    }

	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        //$this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id  = null)
    {
        if($id == null)
        {
            echo 'Error! Can\'t find profile without an id!';
        }

        $owner = $this->Users->get($id);

		$user = $this->Users->get($this->Auth->user('id'));

        $isOwner = ($owner->id == $user->id);

        $profile = $this->Profiles->find('all', [
            'conditions' => [
                'Profiles.user_id' => $id],
                ]);

        $profile = $profile->toArray();

        $this->set(compact('user'));
        $this->set(compact('owner'));
        $this->set(compact('isOwner'));
        $this->set(compact('profile'));
        $this->set('_serialize', ['user', 'owner', 'isOwner', 'profile']);
    }

    public function edit($id  = null)
    {
        if($id == null)
        {
            echo 'Error! Can\'t find profile without an id!';
        }

        $owner = $this->Users->get($id);

		$user = $this->Users->get($this->Auth->user('id'));

        $isOwner = ($owner->id == $user->id);

        $profile = $this->Profiles->find('all', [
            'conditions' => [
                'Profiles.user_id' => $id],
                ]);

        $profile = $profile->toArray();

        if($this->request->is('post'))
        {
            $editProfile = $profile;

            $editProfile[0]['first_name'] = $this->request->data['first_name'];
            $editProfile[0]['last_name'] = $this->request->data['last_name'];
            $editProfile[0]['school'] = $this->request->data['school'];
            $editProfile[0]['about_me'] = $this->request->data['about_me'];

            if ($_FILES && $this->request->data['upload']['tmp_name'] != '')
            {
                $time = $_SERVER['REQUEST_TIME'];
                $file_name = $time . '.jpg';

                $editProfile[0]['image_name'] = $file_name;

                move_uploaded_file($this->request->data['upload']['tmp_name'], WWW_ROOT . 'img' . DIRECTORY_SEPARATOR .'users' . DIRECTORY_SEPARATOR . $file_name);
            }

            $result = $this->Profiles->save($editProfile[0]);
            $this->redirect($this->Auth->redirectUrl(['controller' => 'Profiles', 'action' => 'index', 'id' => $this->Auth->user('id')]));
        }

		else
		{

		}

        $this->set(compact('user'));
        $this->set(compact('owner'));
        $this->set(compact('isOwner'));
        $this->set(compact('profile'));
        $this->set('_serialize', ['user', 'owner', 'isOwner', 'profile']);
    }

    public function getLatestPosts($id  = null)
    {
        $posts = $this->Posts->find('all', [
            'contain' => ['Users', 'Topics', 'Forums'],
            'conditions' => [
                'Posts.user_id' => $id],
            'order' => [
                'Posts.created' => 'DESC'],
            'limit' => 5
                ]);

        $posts = $posts->toArray();

        $this->set('posts', $posts);
        $this->set('_serialize', ['posts']);
    }

    public function getReminders()
    {

        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => [
                'Reminders' => [
                    'sort' => [
                        'Reminders.created' => 'DESC'],
                    'conditions' => [
                        'Reminders.isActive' => true
                        ]]]]);

        $reminders = $user['reminders'];

        /*for ($i = 0; $i < 2; $i++)
        {
            $reminders[] = (object) [
              'title' => 'title' . ($i + 1),
              'description' => 'description' . ($i + 1),
              'remindOn' => Time::now()
            ];
        }*/

        $this->set('reminders', $reminders);
        $this->set('_serialize', ['reminders']);
    }

    public function addReminder()
    {
        $result = false;

        if ($this->request->is('post'))
        {
            $reminder = $this->Reminders->newEntity();

            $this->request->data['user_id'] = $this->Auth->user('id');
            $this->request->data['remindOn'] = Time::now();

            $reminder = $this->Reminders->patchEntity($reminder, $this->request->data);
            $result = $this->Reminders->save($reminder);
        }

        $this->set('result', $result);
        $this->set('_serialize', ['result']);
    }

    public function deleteReminder()
    {
        $result = false;

        if ($this->request->is('post'))
        {
            $reminder = $this->Reminders->get($this->request->data['id']);
            $reminder['isActive'] = false;
            if($this->Reminders->save($reminder))
            {
                $result = true;
            }
        }

        $this->set('result', $result);
        $this->set('_serialize', ['result']);
    }
}
