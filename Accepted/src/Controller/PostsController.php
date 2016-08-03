<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;

/**
 * Topics Controller
 */
class PostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function add($topicId=null)
	{
    if ($this->request->is('post'))
	{
        $this->request->data['user_id'] = $this->Auth->user('id');

        $post = $this->Posts->newEntity($this->request->data);
        $post['created'] = Time::now();
        $post['modified'] = Time::now();
        if ($this->Posts->save($post))
        {
            $this->Flash->success(__('Post has been created'));
            $this->redirect(array('controller'=>'topics','action'=>'view',$this->request->data['topic_id']));
        }

    }

		else
		{
            if (!$this->Posts->Topics->exists($topicId)) {
                throw new NotFoundException(__('Invalid topic'));
            }

            $topic = $this->Posts->Topics->get($topicId);

            $forum = $this->Posts->Forums->get($topic['forum_id']);

            $this->set('topic',$topic);
            $this->set('forum',$forum);
        }
    }
}
