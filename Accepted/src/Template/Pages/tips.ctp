<?php
	$this->layout = 'default';
?>
	<?= $this->Html->css('tips.css') . "\n" ?>

    <div class="container-fluid text-center" ng-controller="tipsCtrl">
        <h1 style="text-align: center">Useful Tips for College Life</h1>
        <hr>
        <section>
            <ul class="nav nav-pills">
                <li ng-class="isSelected(1) ? 'active' : ''"><a href ng-click='selectTab(1)'>Diet</a></li>
                <li ng-class="isSelected(2) ? 'active' : ''"><a href ng-click='selectTab(2)'>Excercise</a></li>
                <li ng-class="isSelected(3) ? 'active' : ''"><a href ng-click='selectTab(3)'>Stress Management</a></li>
            </ul>
            
            <div class="well alert1 alert1-info" >
                <ul>
                <li class="textleft" ng-repeat="tip in model.content" ng-bind-html="tip.item"></li>
                </ul>
            </div>
        </section>
    </div>
    <?= $this->Html->script('tips/tipsCtrl.js') . "\n" ?>