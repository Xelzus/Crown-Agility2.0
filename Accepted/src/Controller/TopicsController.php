<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * Topics Controller
 */
class TopicsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    	$this->loadModel('Posts');
        $this->loadModel('Profiles');
    }

	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($forumId=null)
	{
        if (!$this->Topics->Forums->exists($forumId)) {
            throw new NotFoundException(__('Invalid forum'));
        }

        $forum = $this->Topics->Forums->get($forumId);
        $this->set('forum',$forum);

		$this->paginate = [
            'contain' => ['Users','Posts'=>['Users', 'sort' => ['Posts.created' => 'DESC']]],
    		'conditions' => ['forum_id'=> $forumId]
		];

		$topics = $this->paginate($this->Topics);

		$this->set(compact('topics'));
		$this->set('_serialize', ['topics']);
    }

	public function add()
	{
      $forums = $this->Topics->Forums->find('list');

      if ($this->request->is('post'))
      {
            $this->request->data['user_id'] = $this->Auth->user('id');

			$arr = $this->request->data;

			$topic = $this->Topics->newEntity($this->request->data);

            if ($this->Topics->save($topic))
			{
                $this->Flash->success(__('Topic has been created'));
                return $this->redirect(['controller' => 'forums', 'action' => 'index']);
            }
			else
			{
				$this->Flash->error(__('Topic has not been created'));
			}
        }

        $this->set('forums', $forums);
    }

    public function view($id)
	{
        if (!$this->Topics->exists($id))
		{
            throw new NotFoundException(__('Invalid topic'));
        }

        $topic = $this->Topics->get($id);
        $forum = $this->Topics->Forums->get($topic['forum_id']);

		 $this->paginate = [ 'Posts' =>
		 array(
		 'contain' => array('Users' => ['Profiles']),
		 'conditions' => array('Posts.topic_id'=>$topic['id']),
		 'order' => array('Posts.id'=>'DESC'))
		];

        $posts = $this->paginate($this->Posts);

        $this->set('topic', $topic);
        $this->set('forum', $forum);
        $this->set('posts', $posts);
    }
}
