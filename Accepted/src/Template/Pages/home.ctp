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

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$title = 'Forward';
?>

<!DOCTYPE html>
<html lang="en">
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
                <h1 id="h1" class="text-center">Welcome! <small>Please log in or sign up to continue</small> </h1>
                
                <img class='img-circle img-responsive' id="student" src="img/student.jpg">
                <br>
                <p id="p" class="text-center">Forward is a website for students made by students to help a successful transition from highschool to college. Login or create an account</p>
                <hr>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-6">
                <div class="col-xs-9">
                    <h3 id="h3" class="text-left">Log-in</h3>
                </div>
                <form role="form" action="Profile">
                    <div class="form-group">
                        <div class="col-xs-9">
                            <input type="email" class="form-control" placeholder="Email">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" placeholder="Password">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <button type="submit" class="btn btn-primary"> Log-in </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="col-xs-9">
                    <h3 id="h3" class="text-left"> Sign-up </h3>
                </div>
                <form role="form">
                    <div class="form-group">
                        <div class="col-xs-9">
                            <input type="email" class="form-control" placeholder="Email">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <input class="form-control" placeholder="Username">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" placeholder="Password">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <input type="password" class="form-control" placeholder="Confirm Password">
                            <br>
                        </div>
                        <div class="col-xs-9">
                            <button type="submit" class="btn btn-primary"> Sign up </button>
                            <br>
                        </div>

                    </div>
                </form>
            </div>
        </div>
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
