<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Event\Event;
use Cake\ORM\ResultSet;

/**
 * Forums Controller
 */
class DeadlinesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Reminders');
    }

	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['index', 'getDeadlines']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //Nothing to be done here.
    }

    public function getDeadlines($state = null) {
        $html = new \DOMDocument();

	    $html->loadHTMLFile('http://www.collegesimply.com/guides/application-deadlines/' . $state . '/');

        $rows = $html->getElementsByTagName("tr");

        $filteredRows = [];

        foreach($rows as $row)
    	{
    		$text = $row->ownerDocument->saveHTML($row);

    		if(strpos($text, 'Applications Due') !== false || strpos($text, 'application deadlines') !== false || strpos($text, 'Application Deadline') !== false || strpos($text, 'Show Past Months\' Deadlines'))
    			continue;

    		$filteredRows[] = $row;
    	}

        $collegeData = [];

        foreach($filteredRows as $filteredRow)
    	{
    		$cols = $filteredRow->childNodes;

    		$name = trim($cols[0]->textContent);
    		$deadline = trim($cols[2]->textContent);

    		$collegeData[] = (object) [college => $name, deadline => $deadline];
    	}

        $this->set('collegeData', $collegeData);
        $this->set('_serialize', ['collegeData']);
    }

    public function createDeadlineReminder()
    {
        $result = false;

        if ($this->request->is('post'))
        {
            $reminder = $this->Reminders->newEntity();

            $this->request->data['user_id'] = $this->Auth->user('id');

            $reminder = $this->Reminders->patchEntity($reminder, $this->request->data);
            $reminder['remindOn'] = $this->request->data['remindOn'];
            $result = $this->Reminders->save($reminder);
        }

        $this->set('result', $result);
        $this->set('_serialize', ['result']);
    }
}
