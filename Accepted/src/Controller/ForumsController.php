<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\ORM\ResultSet;

/**
 * Forums Controller
 */
class ForumsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
		    $this->loadModel('Users');
    }

	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
		$this->paginate = [
        'contain' => ['Topics', 'Posts'=>['Users','Topics', 'sort' => ['Posts.created' => 'DESC']]]
		];

		$forums = $this->paginate($this->Forums);

		$this->set(compact('forums'));
		$this->set('_serialize', ['forums']);
    }
}
