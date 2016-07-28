app.config(function ($compileProvider) {
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|tel|ftp|file|blob|content|ms-appx|x-wmapp0):|data:image\//);
});

app.controller("budgetCtrl", function ($scope) {
    //Data to be used on the web page using the controller
    $scope.model = {
        title: "",
        tentativeAmount: "",
        totalAmount: "",
        spendItems: [],
        amountLeft: "",
        showDownload: false,
        downloadLink: ""
    };

    $scope.calculateRemainder = function() {
        $left = parseFloat($scope.model.totalAmount);

        if(isNaN($left))
        {
            return;
        }

        for(var i = 0; i < $scope.model.spendItems.length; i++)
        {
            $parsed = parseFloat($scope.model.spendItems[i].value);

            if(!isNaN($parsed))
            {
                $left -= $parsed;
            }
        }

        $scope.model.amountLeft = $left.toString();
    };

    $scope.addSpendItem = function() {
        $scope.model.spendItems.push({ name: "", value: "" });
    };

    $scope.downloadBudget = function() {
        var summary = {
            title: $scope.model.title,
            total: $scope.model.totalAmount,
            expenditures: $scope.model.spendItems,
            moneyLeft: $scope.model.amountLeft
        };

        var text = "Title: " + summary.title + "\r\n\r\n";
        text += "Total: $" + summary.total + "\r\n\r\n";
        text += "Expenditures\r\n-------------------\r\n\r\n";

        for(var i = 0; i < summary.expenditures.length; i++)
        {
            text += summary.expenditures[i].name + ": $" + summary.expenditures[i].value + "\r\n\r\n";
        }

        text += "-------------------\r\n\r\n";

        text += "Money Left Over: $" + summary.moneyLeft + "\r\n";

        var textFile = null;

        var data = new Blob([text], {type: 'text/plain'});

        if (textFile !== null) {
          window.URL.revokeObjectURL(textFile);
        }

        textFile = window.URL.createObjectURL(data);

        $scope.model.downloadLink = textFile;

        $scope.model.showDownload = true;

        debugger;
    };

    //Functions
    //Ex: $scope.loadReminders = function() {
    //      ...code that loads reminders
    //    }

    //Initial call
    $scope.model.spendItems.push({ name: "", value: "" });
});
