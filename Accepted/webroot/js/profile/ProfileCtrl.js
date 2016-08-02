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
            $scope.model.reminders = [];

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
            remindOn: $filter('date')($scope.model.newReminder.remindOn, "MM/dd/yyyy"),
            isActive: 1
        })
        .success(function(data) {
            if(data.result)
            {
                $scope.model.newReminder.title = '';
                $scope.model.newReminder.description = '';
                $scope.model.newReminder.remindOn = '';
                $scope.updateReminders();
            }
        });
    };

    $scope.deleteReminder = function(selected) {
        profileSvc.deleteReminder({
            id: selected.id
        })
        .success(function(data) {
            if(data.result)
            {
                $scope.updateReminders();
            }
        });
    };

    $scope.loadPosts = function() {
        var url = window.location.href;

        var tokens = url.split("/");

        var ownerId = tokens[tokens.length - 1];

        profileSvc.loadPosts(ownerId)
        .success(function(data) {
            $scope.model.posts = data.posts;
        });
    };

    //Initial call to loadReminders from DB
    $scope.loadReminders();
    $scope.loadPosts();
});
