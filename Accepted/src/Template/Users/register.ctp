<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

$title = 'Forward';
?>

<!DOCTYPE html>
<html lang="en" ng-app="">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $title . "\n" ?>
    </title>

    <?= $this->Html->meta('icon') . "\n" ?>

	<?= $this->Html->css('colors.css') . "\n" ?>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    </head>
<body class="home">
    <div class="container-fluid text-center">
        <div class="row content">
            <h1 class ="titles" class="text-center">Register</h1>

            <div class="col-xs-4">
            </div>
           <div class="center1 col-xs-4">
               <div class="col-xs-12">
                    <h3> <b>Sign-up</b> </h3>
                <?php echo $this->Form->create('User',array('class'=>'form-horizontal','name'=>'regForm','role' => 'form', 'inputDefaults'=>array('label'=>false)));?>
                    <div>
                      <div class="form-group">
                          <?php echo $this->Form->input('email',array('required','ng-model'=>'email','name'=>'email','class'=>'form-control', 'Placeholder'=>'Email', 'label'=>false));?>
                          <span ng-show="regForm.email.$invalid" style="color:red; font-size:80%">Please enter a valid email address</span>
                        <br>
                        <br>
                      </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('username',array('ng-pattern'=>'/^[a-zA-Z0-9\s]*$/','class'=>'form-control', 'required','ng-model'=>'username','name'=>'username','Placeholder'=>'Username', 'label'=>false));?>
                            <span ng-show="regForm.username.$invalid" style="color:red; font-size:80%">Please enter a username with no special characters</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password',array('required','ng-model'=>'password1','name'=>'password1','class'=>'form-control', 'Placeholder'=>'Password', 'label'=>false));?>
                            <span ng-show="regForm.password1.$invalid" style="color:red; font-size:80%">Please enter a password you'd like to use</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password',array('required','ng-model'=>'password2','name'=>'password2','class'=>'form-control', 'Placeholder'=>'Confirm Password', 'label'=>false));?>
                            <span ng-show="regForm.password2.$invalid" style="color:red; font-size:80%">Please confirm the password you'd like to use</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('first_name',array('required','ng-model'=>'first_name','name'=>'first_name','class'=>'form-control', 'Placeholder'=>'First Name', 'label'=>false));?>
                            <span ng-show="regForm.first_name.$invalid" style="color:red; font-size:80%">Please enter your first name</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('last_name',array('required','ng-model'=>'last_name','name'=>'last_name','class'=>'form-control', 'Placeholder'=>'Last Name', 'label'=>false));?>
                            <span ng-show="regForm.last_name.$invalid" style="color:red; font-size:80%">Please enter your last name</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('school',array('required','ng-model'=>'school','name'=>'school','class'=>'form-control', 'Placeholder'=>'School', 'label'=>false));?>
                            <span ng-show="regForm.school.$invalid" style="color:red; font-size:80%">Please enter the school you will attend or plan to attend</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('about_me',array('required', 'type'=>'textarea', 'style'=>'resize: none', 'maxlength'=>'500', 'ng-model'=>'about_me','name'=>'about_me','class'=>'form-control', 'Placeholder'=>'About Me', 'label'=>false));?>
                            <span ng-show="regForm.about_me.$invalid" style="color:red; font-size:80%">Please write a small bio. Max 500 characters. It can be short or long.</span>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php
						     echo $this->Html->link('Return to Login',
						  					array('controller'=>'users','action'=>'login'),
						  					array('escape'=>false, 'class'=>'btn btn-primary'));
						     ?>
                            <button ng-show="regForm.username.$invalid||regForm.email.$invalid||regForm.password1.$invalid||regForm.password2.$invalid||regForm.first_name.$invalid||regForm.last_name.$invalid||regForm.school.$invalid||regForm.about_me.$invalid" disabled type="submit" class="btn btn-danger"> Sign up </button>
                            <?php echo $this->Form->submit('Sign Up',array('ng-show'=>'regForm.email.$valid&&regForm.username.$valid&&regForm.password1.$valid&&regForm.password2.$valid&&regForm.first_name.$valid&&regForm.last_name.$valid&&regForm.school.$valid&&regForm.about_me.$valid','class'=>'btn btn-primary'))?>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
                </div>
            </div>
            <div class="col-xs-4">
            </div>
        </div>
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
