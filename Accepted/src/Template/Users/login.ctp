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

/*if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;*/

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
</head>
<body class="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="titles">Welcome to Accepted </h1>

                  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:50%; margin:0 auto; float:center;">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img style="width: auto; height: 300px; max-height: 300px; margin:0 auto;" class='img-circle img-responsive' src="img/student.jpg" alt="student">
                            </div>

                            <div class="item">
                                <img style="width: auto; height: 300px; max-height: 300px; margin:0 auto;" class='img-circle img-responsive' src="img/student2.jpg" alt="student">
                            </div>

                            <div class="item">
                                <img style="width: auto; height: 300px; max-height: 300px; margin:0 auto;" class='img-circle img-responsive' src="img/student3.jpg" alt="student">
                            </div>

                            <div class="item">
                                <img style="width: auto; height: 300px; max-height: 300px; margin:0 auto;" class='img-circle img-responsive'  src="img/student4.jpg" alt="student">
                            </div>
                        </div>
                </div>
                <br>
                <br>
               <p class ="p">Accepted is a website for students made by students to help a successful transition from highschool to college.</p>
                <hr id= "linea">
            </div>
        </div>
    </div>
    <div class="container-fluid text-center">
        <p class = "p1">Login or Create an Account</p>
        <div class="row content">

            <div class="col-xs-4">
            </div>
            <div class = "center col-xs-4">
                <div class="col-xs-12">

                    <h3 class= "id1" class="text-left">Log-in</h3>

                 <?php echo $this->Form->create('User',array('class'=>'form-horizontal','name'=>'loginForm','inputDefaults'=>array('label'=>false)));?>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('username',array('required','ng-pattern'=>'/^[a-zA-Z0-9\s]*$/','name'=>'username','ng-model'=>'username','class'=>'form-control', 'Placeholder'=>'Username', 'label'=>false));?>
                            <span ng-show="loginForm.username.$invalid" style="color:red; font-size:80%">You must enter a valid username to continue</span>
                            <br>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->input('password',array('required','name'=>'password','ng-model'=>'password','class'=>'form-control', 'Placeholder'=>'Password', 'label'=>false));?>
                            <span ng-show="loginForm.password.$invalid" style="color:red; font-size:80%">Please enter your password to continue</span>
                            <br>
                        </div>
                        <div class="form-group">
                            <button ng-show="loginForm.username.$invalid||loginForm.password.$invalid" disabled type="submit" class="btn btn-danger"> Login </button>
                            <?php echo $this->Form->submit('Login',array('ng-show'=>'loginForm.username.$valid&&loginForm.password.$valid','class'=>'btn btn-primary'))?>
                        </div>
                        <div class="form-group">
                              <a class="btn btn-lg btn-primary" href="users/register">Register</a>
                        </div>
                    </div>
                    <?= $this->Flash->render() ?>
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
