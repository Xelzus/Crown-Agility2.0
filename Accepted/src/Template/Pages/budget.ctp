<?php
	$this->layout = 'default';
?>
<div ng-controller="budgetCtrl">
    <h2>Budget Planning</h2>
    <hr>

    <p>Welcome to Accepted's budget planner!</p>
    <p>Do you ever find yourself having trouble with your money management?</p>
    <p>Well, luckily for you, you can create a budget for yourself using this tool!</p>

    <hr>

    <form role="form">
        <div class="form-group">
            <label class="text-primary" for="total">Title</label>
            <input ng-model="model.title" class="form-control" type="text" id="total" placeholder="Enter title for this budget">

            <br>

            <label class="text-primary" for="total">Total Amount</label>
            <div class="input-group">
                <div class="input-group-addon">$</div>
                <input ng-model="model.tentativeAmount" class="form-control" type="text" id="total" placeholder="Enter your total spending money">
            </div>
            <br>
            <button ng-click="model.totalAmount = model.tentativeAmount" class="btn btn-primary">Set</button>
        </div>

        <div class="form-group">
            <label class="text-primary">Money Spread</label>
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
    <button ng-click="addSpendItem()" class="btn btn-primary"><i class="fa fa-plus"></i></button>

    <br>
    <br>

    <p>Money Left: ${{ model.amountLeft }}</p>

    <br>

    <button ng-click="downloadBudget()" class="btn btn-primary">Create Budget Summary</button>
    <br>
    <br>
    <a class="btn btn-primary" download="{{ model.title }}budget.txt" ng-if="model.showDownload" ng-href="{{ model.downloadLink }}">Download Budget Summary</a>
</div>

<?= $this->Html->script('budget/BudgetSvc.js') . "\n" ?>
<?= $this->Html->script('budget/BudgetCtrl.js') . "\n" ?>
