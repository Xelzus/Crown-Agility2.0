<?php
	$this->layout = 'default';
?>
<div ng-controller="budgetCtrl">
    <h1>Budget Planning</h1>
    <hr>

	<div class="box alert5 alert5-info">

	<p5>Welcome to Accepted's budget planner!</p5>
    <br>
    <p5>Do you ever find yourself having trouble with your money management?</p5>
    <br>
    <p5>
		Well, luckily for you, you can create a budget for yourself using this
		tool!
	</p5>
	<br>
	<br>
	<p5>
		Create a title for the budget, type in an initial amount, set it with the "Set" button
		and then add your expenditures. Your balance will auto-update as you add
		more items.
	</p5>
	<br>
    <p5>
		Once you are done, you can hit the "Create Budget Summary" button and a
		new button will appear that will allow you to download a summary of what
		you entered into the form that you can keep for your records.
	</p5>

    <br>
	<p5>Refresh the page if you'd like to start over.</p5>
	</div>

	<hr>

	<div class="row">
		<div class="col-xs-3">
		</div>
		<div class="well alert1 alert1-info col-xs-6">
		    <form name="budgetForm" role="form">
		        <div class="form-group">
		            <label class="sidetitle2" for="total">Title</label>
		            <input ng-model="model.title" class="form-control" type="text" id="total" placeholder="Enter title for this budget" >

		            <br>

		            <label class="sidetitle2" for="total">Total Amount</label>
		            <div class="input-group">
		                <div class="input-group-addon">$</div>
		                <input ng-model="model.tentativeAmount" class="form-control" type="text" id="total" placeholder="Enter your total spending money">
		            </div>
		            <br>
		            <button ng-click="model.totalAmount = model.tentativeAmount" class="btn btn-primary">Set</button>
		        </div>

		        <div class="form-group">
		            <label class="sidetitle2">Money Spread</label>
		            <div ng-repeat="spendItem in model.spendItems">
		                <p><input ng-model="spendItem.name" class="form-control" type="text" placeholder="Enter expenditure name"></p>
		                <div class="input-group">
		                    <div class="input-group-addon form-control-sm">$</div>
		                    <input ng-change="calculateRemainder()" ng-model="spendItem.value" class="form-control" type="text" placeholder="Enter expenditure">
		                </div>
		                <br>
		            </div>
		        </div>
		    </form>
		    <button ng-click="addSpendItem()" class="btn btn-primary margin1"><i class="fa fa-plus"></i></button>

		    <br>
		    <br>

		    <p ng-class='model.amountLeft < 0 ? "text-danger margin2" : "text-success margin2"'><strong>Money Left: ${{ model.amountLeft }}</strong></p>

		    <br>

		    <button ng-click="createBudgetText()" class="btn btn-primary margin1">Create Budget Summary</button>
		    <br>
		    <br>
		    <a ng-click="downloadBudget()" class="btn btn-primary margin1" download="{{ model.title }}Budget.txt" ng-if="model.showDownload" ng-href="{{ model.downloadLink }}">Download Budget Summary</a>
		</div>
		<div class="col-xs-3">
		</div>
	</div>
</div>

<?= $this->Html->script('budget/BudgetSvc.js') . "\n" ?>
<?= $this->Html->script('budget/BudgetCtrl.js') . "\n" ?>
