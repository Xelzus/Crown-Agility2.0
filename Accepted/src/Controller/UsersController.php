<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * Users Controller
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Profiles');
    }

	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow('register', 'login');
    }

    public function login()
    {
        if($this->Auth->user('id'))
        {
          $this->redirect($this->Auth->redirectUrl(['controller' => 'Profiles', 'action' => 'index', 'id' => $this->Auth->user('id')]));
        }

        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();

      		if ($user)
            {
      				$this->Auth->setUser($user);
      				return $this->redirect($this->Auth->redirectUrl(['controller' => 'Profiles', 'action' => 'index', 'id' => $this->Auth->user('id')]));
      		}
            else
  			{
  				$this->Flash->error(__('Username or password is incorrect'));
  			}
        }
     }

    public function register()
    {
        $user = $this->Users->newEntity();
        $user['created'] = Time::now();
        $user['modified'] = Time::now();

        if ($this->request->is('post'))
        {
            $user['username'] = $this->request->data['username'];
            $user['password'] = $this->request->data['password1'];
            $user['email'] = $this->request->data['email'];

            if ($this->Users->save($user))
            {
                $user = $this->Users->find('all', [
                    'conditions' => [
                        'Users.username' => $this->request->data['username']],
                        ]);

                $user = $user->toArray();

                echo $user[0];

                $profile = $this->Profiles->NewEntity();

                $profile['user_id'] = $user[0]['id'];
                $profile['first_name'] = $this->request->data['first_name'];
                $profile['last_name'] = $this->request->data['last_name'];
                $profile['school'] = $this->request->data['school'];
                $profile['about_me'] = $this->request->data['about_me'];
                $profile['image_name'] = 'crownAgilityLogo.png';

                if($this->Profiles->save($profile))
                {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}
