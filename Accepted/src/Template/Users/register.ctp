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
    
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    
    </head> 
<body class="home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class ="titles" class="text-center">Register</h1>
            </div>
        </div>
    </div>
           <div class= "center1" class="col-sm-4">
                <div class="col-xs-9">
                    <h3 class = "id2"> <b>Sign-up</b> </h3>
                </div>
                <?php echo $this->Form->create('User',array('class'=>'form-horizontal','role' => 'form', 'inputDefaults'=>array('label'=>false)));?>
                    <div class="form-group">
                      <div class = "user2" class="col-xs-9">
                          <?php echo $this->Form->input('email',array('class'=>'form-control', 'Placeholder'=>'Email', 'label'=>false));?>
                          <br>
                      </div>
                        <div class = "user2" class="col-xs-9">
                            <?php echo $this->Form->input('username',array('class'=>'form-control', 'Placeholder'=>'Username', 'label'=>false));?>
                            <br>
                        </div>
                        <div class = "user2" class="col-xs-9">
                            <?php echo $this->Form->input('password',array('class'=>'form-control', 'Placeholder'=>'Password', 'label'=>false));?>
                            <br>
                        </div>
                        <div class = "user2" class="col-xs-9">
                            <?php echo $this->Form->input('password',array('class'=>'form-control', 'Placeholder'=>'Confirm Password', 'label'=>false));?>
                            <br>
                        </div>
                        <div class="col-xs-11">
                            <?php echo $this->Form->submit('Sign Up',array('class'=>'btn btn-lg btn-primary'))?>
                        </div>
                    </div>
                <?php echo $this->Form->end();?>
            </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
