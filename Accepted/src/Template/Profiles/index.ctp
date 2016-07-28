<?php
	$this->layout = 'default';
?>
<div class="text-center" ng-controller="profileCtrl">
	<div class="row content">
		<h1><?= h($owner->username) ?>'s Profile</h1>
		<hr>
		<div ng-if=<?= '"' . h($isOwner) . '"'  ?> class="col-sm-4 text-left well">
			<!--Reminders-->
			<div>
				<div class="form-group" id="addReminderForm">
					<label>New Reminder</label>
					<div>
						<input type="text" ng-model="model.newReminder.title" class="form-control" placeholder="Title">
						<br>
					</div>
					<div>
						<textarea style="resize: none" type="text" ng-model="model.newReminder.description" placeholder="Description" class="form-control" rows='3'></textarea>
						<br>
					</div>
					<div>
						<input type="text" ng-model="model.newReminder.remindOn" class="form-control" placeholder="Remind me on">
						<br>
					</div>
					<div>
						<button ng-click="addReminder()" class="btn btn-primary"> Create Reminder </button>
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-5 text-left">
			<div ng-if=<?= '"' . h($isOwner) . '"'  ?>>
				<div ng-if="model.reminders.length == 0">
					<p>You have no reminders at this time</p>
				</div>
				<div class="alert alert-info" ng-repeat="reminder in model.reminders" ng-if="model.reminders.length > 0">
					<ul>
					  <li> Title: {{ reminder.title }} </li>
					  <li> Description: {{ reminder.description }} </li>
					  <li> Date: {{ reminder.remindOn | date:'MM/dd/yyyy hh:mm a' }} </li>
					</ul>
					<button ng-click="deleteReminder(reminder)" class="btn btn-primary">Delete</button>
				</div>
			</div>
		</div>

		<div class="col-sm-2 sidenav">
			<h4>John's Blog</h4>
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#section1">Home</a></li>
				<li><a href="#section2">Friends</a></li>
				<li><a href="#section3">Family</a></li>
				<li><a href="#section3">Photos</a></li>
			</ul>
			<br>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search Blog.."> <span class="input-group-btn">
	  			<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> </button>
				</span>
			</div>
		</div>
	</div>

	<div class="row content">
		<h1>Latest Posts</h1>
		<hr>
		<div ng-if=<?= '"' . h($isOwner) . '"'  ?> class="col-sm-4 text-left well">
			<!--Reminders-->
			<div>
				<div class="form-group" id="addReminderForm">
					<label>New Reminder</label>
					<div>
						<input type="text" ng-model="model.newReminder.title" class="form-control" placeholder="Title">
						<br>
					</div>
					<div>
						<textarea style="resize: none" type="text" ng-model="model.newReminder.description" placeholder="Description" class="form-control" rows='3'></textarea>
						<br>
					</div>
					<div>
						<input type="text" ng-model="model.newReminder.remindOn" class="form-control" placeholder="Remind me on">
						<br>
					</div>
					<div>
						<button ng-click="addReminder()" class="btn btn-primary"> Create Reminder </button>
						<br>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-5 text-left">
			<div ng-if=<?= '"' . h($isOwner) . '"'  ?>>
				<div ng-if="model.posts.length == 0">
					<p>You have no posts at this time</p>
				</div>
				<div class="alert alert-info" ng-repeat="post in model.posts" ng-if="model.posts.length > 0">
					<ul>
					  <li> Content: {{ post.content }} </li>
					  <li> Forum: {{ post.forum.name }} </li>
					  <li> Topic: {{ post.topic.name }} </li>
					  <li> Created: {{ post.created | date:'MM/dd/yyyy hh:mm a' }} </li>
					</ul>
			</div>
		</div>

		<div class="col-sm-2 sidenav">
			<h4>John's Blog</h4>
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#section1">Home</a></li>
				<li><a href="#section2">Friends</a></li>
				<li><a href="#section3">Family</a></li>
				<li><a href="#section3">Photos</a></li>
			</ul>
			<br>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search Blog.."> <span class="input-group-btn">
	  			<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> </button>
				</span>
			</div>
		</div>
	</div>
	<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
			  <div>
	  			<div class="form-group" id="addReminderForm">
	  				<label>New Reminder</label>
	  				<div>
	  					<input type="text" ng-model="model.newReminder.title" class="form-control" placeholder="Title">
	  					<br>
	  				</div>
	  				<div>
	  					<textarea style="resize: none" type="text" ng-model="model.newReminder.description" placeholder="Description" class="form-control" rows='3'></textarea>
	  					<br>
	  				</div>
	  				<div>
	  					<input type="text" ng-model="model.newReminder.remindOn" class="form-control" placeholder="Remind me on">
	  					<br>
	  				</div>
	  			</div>
	  		</div>
	      </div>
	      <div class="modal-footer">
	        <button ng-click="addReminder()" type="button" class="btn btn-default" data-dismiss="modal">Create Reminder</button>
	      </div>
	    </div>

	  </div>
	</div>
</div>

<?= $this->Html->script('profile/ProfileSvc.js') . "\n" ?>
<?= $this->Html->script('profile/ProfileCtrl.js') . "\n" ?>
