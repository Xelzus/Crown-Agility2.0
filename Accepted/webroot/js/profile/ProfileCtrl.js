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
        var dateRegEx = /^(?:(?:(?:0?[13578]|1[02])(\/|-|\.)31)\1|(?:(?:0?[1,3-9]|1[0-2])(\/|-|\.)(?:29|30)\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:0?2(\/|-|\.)29\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:(?:0?[1-9])|(?:1[0-2]))(\/|-|\.)(?:0?[1-9]|1\d|2[0-8])\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

        if($scope.model.newReminder.title == '' || $scope.model.newReminder.description == '' || $scope.model.newReminder.remindOn == '' || dateRegEx.test($scope.model.newReminder.remindOn))
        {
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
        }
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
