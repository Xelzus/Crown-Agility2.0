'use strict';

app.factory('deadlineSvc', function ($http) {
    return {
        loadCollegeData: function(state) {
            return $http.get('deadlines/getDeadlines/' + state, {
                headers:
                {
                  'Content-Type' : 'application/json; charset=utf-8',
                  'Accept' : 'application/json'
                }
            });
        }
    }
});
