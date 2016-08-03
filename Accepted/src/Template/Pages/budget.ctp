<?php
	$this->layout = 'default';
?>
<div ng-controller="budgetCtrl">
    <h1>Budget Planning</h1>
    <hr>
<div></div>
<div class="col-sm-6 alert4 alert4-info">
    <p5 class= "sidetitle3">Welcome to Accepted's budget planner!</p5>
    <br>
    <p5>Do you ever find yourself having trouble with your money management?</p5>
    <br>
    <p5>Well, luckily for you, you can create a budget for yourself using this tool! Creating the budget summary will create a file with the title, money spent, item name, and money left.</p5>
    <p5></p5>
</div>
<div class="col-sm-6 alert4 alert4-info">
    <p5>A budget done correctly is the most precise tool for analysing your finances imaginable. It answers two key questions...</p5>
    <br>
    <ul>
        <li>
        <p5><b>Do I spend more than I earn?</b></p5>
        </li>
        <br>
        <li><p5><b> What can I afford to spend?</b></p5>
        </li>
    </ul>
    <br>
</div>
    <div class="col-sm-12">
    <hr></div>
    
	<div class="row">
		<div class="col-xs-3">
		</div>
		<div class="well alert1 alert1-info col-xs-6">
		    <form role="form">
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
