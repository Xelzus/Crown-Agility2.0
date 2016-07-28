'use strict';

app.factory('profileSvc', function ($http) {
    return {
        loadReminders: function() {
            return $http.get('getReminders', {
                headers:
                {
                  'Content-Type' : 'application/json; charset=utf-8',
                  'Accept' : 'application/json'
                }
            });
        },

        addReminder: function(reminder) {
            return $http.post('addReminder', reminder, {
              headers:
              {
                  'Content-Type' : 'application/json; charset=utf-8',
                  'Accept' : 'application/json'
              }
            });
        },

        deleteReminder: function(reminderId) {
            return $http.post('deleteReminder', reminderId, {
              headers:
              {
                  'Content-Type' : 'application/json; charset=utf-8',
                  'Accept' : 'application/json'
              }
            });
        },

        loadPosts: function() {
            return $http.get('getLatestPosts', {
                headers:
                {
                  'Content-Type' : 'application/json; charset=utf-8',
                  'Accept' : 'application/json'
                }
            });
        }
    }
});
