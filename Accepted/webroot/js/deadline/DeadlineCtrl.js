app.controller("deadlineCtrl", function ($scope, $filter, deadlineSvc) {
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

    $scope.createReminder = function(data) {

        var deadline = new Date(data.deadline);

        deadline.setDate(deadline.getDate() - 5);

        deadlineSvc.createReminder({
            title: data.college + " Deadline",
            description: "The last day for applications for " + data.college + " is " + data.deadline,
            remindOn: deadline
        })
        .success(function(data) {
            if(data.result)
            {
                alert("Added deadline to your reminders. Expect a reminder 5 days before the deadline.'");
            }
        });
    };

    //Initial call to loadReminders from DB
    $scope.loadCollegeData();
});
