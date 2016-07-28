app.controller("profileCtrl", function ($scope, $filter, $http, profileSvc) {
    //Data to be used on the web page using the controller
    $scope.model = {
        reminders: [],
        newReminder: {
            title: '',
            description: '',
            remindOn: ''
        },
        posts: []
    };

    //Functions
    //Ex: $scope.loadReminders = function() {
    //      ...code that loads reminders
    //    }
    $scope.loadReminders = function() {
        profileSvc.loadReminders()
        .success(function(data) {
            $scope.model.reminders = data.reminders;
        });
    };

    $scope.updateReminders = function() {
        $scope.loadReminders();
    };

    $scope.addReminder = function() {
        profileSvc.addReminder({
            title: $scope.model.newReminder.title ,
            description: $scope.model.newReminder.description,
            remindOn: $filter('date')($scope.model.newReminder.remindOn, "MM/dd/yyyy hh:mm a")
        })
        .success(function(data) {
            if(data.result)
            {
                $scope.updateReminders();
            }
        });

        //$scope.model.reminders.push({
        //    title: $scope.model.newReminder.title ,
        //    description: $scope.model.newReminder.description,
        //    remindOn: $filter('date')($scope.model.newReminder.remindOn, "MM/dd/yyyy hh:mm a")
        //});

        //$scope.model.newReminder.title = "";
        //$scope.model.newReminder.description = "";
        //$scope.model.newReminder.remindOn = "";

        //$scope.updateReminders();
    };

    $scope.deleteReminder = function(selected/*selectedId*/) {
        var index = $scope.model.reminders.indexOf(selected);
        $scope.model.reminders.splice(index, 1);

        /*profileSvc.deleteReminder({
            id: selectedId
        })
        .success(function(data) {
            if(data.result)
            {
                $scope.updateReminders();
            }
        });*/
    };

    $scope.loadPosts = function() {
        profileSvc.loadPosts()
        .success(function(data) {
            if(data.posts.length > 5)
            {
                data.posts.splice(4, data.posts.length - 5);
            }

            $scope.model.posts = data.posts;
            debugger;
        });
    };

    //Initial call to loadReminders from DB
    $scope.loadReminders();
    $scope.loadPosts();
});
