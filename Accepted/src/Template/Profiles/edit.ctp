<?php
	$this->layout = 'default';
?>
<div>
	<h1 style="text-align: center">Edit Profile</h1>

	<hr>

    <?php echo $this->Form->create('Profile',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false), 'enctype'=>'multipart/form-data'));?>
        <div class="form-group">
            <div class="col-xs-9">
                <label for="firstName"><h5>First Name: </h5></label>
                <?php echo $this->Form->input('first_name',array('id'=>'firstName','class'=>'form-control', 'value' => $profile[0]->first_name, 'Placeholder'=>'First Name', 'label'=>false));?>
                <br>
            </div>
            <div class="col-xs-9">
                <label for="lastName"><h5>Last Name: </h5></label>
                <?php echo $this->Form->input('last_name',array('id'=>'lastName','class'=>'form-control', 'value' => $profile[0]->last_name, 'Placeholder'=>'Last Name', 'label'=>false));?>
                <br>
            </div>
            <div class="col-xs-9">
                <label for="school"><h5>School:</h5> </label>
                <?php echo $this->Form->input('school',array('id'=>'school','class'=>'form-control', 'value' => $profile[0]->school, 'Placeholder'=>'School', 'label'=>false));?>
                <br>
            </div>
            <div class="col-xs-9">
                <label for="about"><h5>About Me: </h5></label>
                <?php echo $this->Form->input('about_me',array('id'=>'about','class'=>'form-control', 'value' => $profile[0]->about_me, 'type'=>'textarea', 'style'=>'resize: none', 'maxlength'=>'500', 'Placeholder'=>'About Me', 'label'=>false));?>
                <br>
            </div>
            <div class="col-xs-9">
                <?php echo $this->Html->image('users/' . h($profile[0]->image_name), ['alt' => 'placeholder', 'id'=>'image', 'width'=>'100%']);?>
                <input type="file" id="upload" name="upload" accept="image/*" onchange="srcChange()">
            </div>
            <div class="col-xs-9">
                <?php echo $this->Form->submit('Submit Edits', array('class'=>'btn btn-primary'))?>
            </div>
        </div>
    <?php echo $this->Form->end();?>
</div>

<?= $this->Html->script('profile/EditCtrl.js') . "\n" ?>
