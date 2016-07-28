app.controller("deadlineCtrl", function ($scope, deadlineSvc) {
    //Data to be used on the web page using the controller
    $scope.model = {
        collegeData: [],
        selectedState: 'alabama'
    };

    //Functions
    //Ex: $scope.loadReminders = function() {
    //      ...code that loads reminders
    //    }
    $scope.loadCollegeData = function() {
        collegeData = [];
        deadlineSvc.loadCollegeData($scope.model.selectedState)
        .success(function(data) {
            $scope.model.collegeData = data.collegeData;
        });
    };

    //Initial call to loadReminders from DB
    $scope.loadCollegeData();
});
