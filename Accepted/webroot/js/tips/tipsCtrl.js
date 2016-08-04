app.controller("tipsCtrl", function ($scope, $sce) {
    $scope.model = {
        tab: 1
        , content: ''
        , tips: [
            {
                description: [
                    {
                        item: $sce.trustAsHtml("<strong>Learn proper portion size.</strong> To avoid eating too much of even the healthiest foods, keep track of how much you're eating")
                    }
                    , {
                        item: $sce.trustAsHtml("<strong>Changing up your diet from day to day</strong> is an important part of good nutrition so take advantage of the variety of selections available to you.")
                    }
                    , {
                        item: $sce.trustAsHtml("<strong>Limit sugary and caffeinated beverages.</strong> Beverages may not fill you up, but they sure can help fatten you up and have a detrimental effect on your overall health. You don't have to completely give up soda and coffee, but you should scale back in order to keep yourself in tip top shape.")
                    }
                    , {
                        item: $sce.trustAsHtml("<strong>Drink water</strong>. Drinking enough water can help boost your concentration as well as keep you from overeating. Make sure to keep hydrated as you go through your day by bringing water with you.")
                    }

                ]
            },
            {
                description : [
                    {
                        item: $sce.trustAsHtml("<strong>Play a sport</strong>. One way to get yourself motivated to exercise is to make it a game by playing a sport. Join an intramural team or play recreational sports through your school to get active and have fun at the same time.")
                    },

                    {
                        item: $sce.trustAsHtml("<strong>Head to the gym</strong>. Most schools provide students with gym facilities they can take advantage of for free. Head to the gym between classes or when you get up in the morning to squeeze in a workout.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Bring a friend</strong>. With someone else relying on you showing up, you'll be much more likely to make the effort to work out. Plus, working out with a friend can be a great way to make working out more fun.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Take advantage of open spaces</strong>. Most colleges are equipped with large grassy quads or arboretums with trails you can walk on. Take advantage of these spaces to take hikes, play frisbee or just walk around.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Take advantage of open spaces.</strong> Most colleges are equipped with large grassy quads or arboretums with trails you can walk on. Take advantage of these spaces to take hikes, play frisbee or just walk around.")
                    }

                ]
            },
            {
                description : [
                    {
                        item: $sce.trustAsHtml("<strong>Create a routine</strong>. If you get yourself in the habit of studying, working out, and sleeping at certain hours, it will be easier to fit in all the things you need to do in a day without feeling too stressed out.")
                    },

                    {
                        item: $sce.trustAsHtml("<strong>Give yourself a break</strong>. If you've been working steadily for hours, give your eyes and mind a chance for a rest by taking a break. You can come back feeling more refreshed and ready to go.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Relax with hobbies.</strong> Whether you like to paint or to destroy aliens with your friends in video games, making time for the things you love is an important part of keeping yourself from getting too stressed out.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Spend time with friends.</strong> There are few things that can cheer you up like being around the people you like most. Eat dinner with friends or just hang out and watch tv or take a walk to get away from the stress of homework.")
                    },
                    {
                        item: $sce.trustAsHtml("<strong>Don't let yourself get run down</strong>. With so much to do, it's easy to get run down. If you feel yourself getting stretched too thin, take a step back and evaluate everything you've got going on to determine what's really important.")
                    }
                ]
            }
        ]
    };
    $scope.selectTab = function (setTab) {
        $scope.model.tab = setTab;
        $scope.model.content = $scope.model.tips[setTab - 1].description;
    };
    $scope.isSelected = function (checkTab) {
        return $scope.model.tab === checkTab
    };
    $scope.model.content = $scope.model.tips[0].description;
    $scope.selectTab(1);
});
