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

$description = 'Forward';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $description ?> : <?= $this->fetch('title') ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	   <?= $this->Html->meta('icon') . "\n" ?>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	  <?= $this->Html->css('site.css') . "\n" ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <?= $this->Html->script('app.js') . "\n" ?>
  	<!--our js -->
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/Crown-Agility2.0/Accepted/users/login">
                    <?= $this->Html->image('crownAgilityLogoTransparent.png', array('alt' => 'CA', 'height' => '25', 'width' => '25')) ?>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li> <?= $this->Html->link(__('Resume Templates'),'/templates')?> </li>
                    <li> <?= $this->Html->link(__('Aplication Deadlines'),'/deadlines')?> </li>
                    <li> <?= $this->Html->link(__('Useful Tips'),'/tips')?> </li>
					<li> <?= $this->Html->link(__('Forums'),'/forums')?></li>
                    <li> <a href="#">Budget Manager</a> </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-group navbar-btn">
                            <button data-toggle="dropdown" class="btn glyphicon glyphicon-cog dropdown-toggle"></button>
                            <ul class="dropdown-menu">
                                <li> <?= $this->Html->link(__('My Profile'),'/profiles/' . $id)?> </li>
                                <li><?= $this->Html->link(__('Sign-out <i class="fa fa-sign-out"></i>'),'/users/logout', ['escape' => false])?></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" ng-app="forwardApp">
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>

    <?= $this->Html->script('landing.js') . "\n" ?>
</body>
</html>
