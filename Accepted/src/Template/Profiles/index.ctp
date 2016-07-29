<?php
	$this->layout = 'default';
?>
<div ng-controller="profileCtrl">
	<h1 style="text-align: center"><?= h($owner->username) ?>'s Profile</h1>

	<hr>

	<div class="row">
		<div ng-class=<?= '"' . h($isOwner) . ' ? \'col-xs-4\' : \'col-xs-12\'"'  ?>>
			<div class="well">
				<p style="color: #000">Name: Chris Talavera</p>
				<p style="color: #000">School: Florida Atlantic University</p>
				<p style="color: #000">About Me: Demesne far hearted suppose venture excited see had has. Dependent on so extremely delivered by. Yet ﻿no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions. Whatever boy her exertion his extended. Ecstatic followed handsome drawings entirely mrs one yet outweigh. Of acceptance insipidity remarkably is invitation. </p>
			</div>
		</div>
		<div class="col-xs-8">
			<div ng-if=<?= '"' . h($isOwner) . '"'  ?> class="text-left well">
				<!--Reminders-->
				<div>
					<div class="form-group" id="addReminderForm">
						<label>New Reminder</label>
						<div>
							<input type="text" ng-model="model.newReminder.title" class="form-control" placeholder="Title">
							<br>
						</div>
						<div>
							<textarea style="resize: none" type="text" ng-model="model.newReminder.description" placeholder="Description" class="form-control" rows='1'></textarea>
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
			<div ng-if=<?= '"' . h($isOwner) . '"'  ?>>
				<div ng-if="model.reminders.length == 0">
					<p>You have no reminders at this time</p>
				</div>
				<div class="well text-left" ng-repeat="reminder in model.reminders" ng-if="model.reminders.length > 0">
					<div class="row">
						<div class="col-xs-11">
							<p style="color: #000"><strong> {{ reminder.title }} </strong></p>
						</div>
						<div class="col-xs-1">
							<button type="button" ng-click="deleteReminder(reminder)" class="close">&times;</button>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<i> {{ reminder.remindOn | date:'MM/dd/yyyy' }} </i>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<p style="color: #000"> {{reminder.description }} </p>
						</div>
					</div>
				</div>
			</div>

			<br>

			<div ng-if=<?= '"' . h($isOwner) . '"'  ?>>
				<h1 style="text-align: center">Latest Posts</h1>
				<hr>
				<div>
					<div ng-if="model.posts.length == 0">
						<p>You have no posts at this time</p>
					</div>
					<div class="well text-left" ng-repeat="post in model.posts" ng-if="model.posts.length > 0">
						<div class="row">
							<div class="col-xs-7">
								<p style="color: #000"><strong> {{ post.forum.name }} <i class="fa fa-arrow-right"></i> {{ post.topic.name }} </strong></p>
							</div>
							<div class="col-xs-5 text-right">
								<p style="color: #000"><i> {{ post.created | date:'MM/dd/yyyy hh:mm a' }} <i></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p style="color: #000"> {{ post.content }} </p>
							</div>
						</div>
					</div>
				</div>
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
