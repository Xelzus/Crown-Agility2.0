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
        }

  			else
  			{
  				$this->Flash->error(__('Username or password is incorrect'), [
  					'key' => 'auth'
  				]);
  			}
     }

    public function register()
    {
        $user = $this->Users->newEntity();
        $user['created'] = Time::now();
        $user['modified'] = Time::now();

        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user))
            {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}
