<head>
<?= $this->Html->css('site.css') . "\n" ?>
</head>

<h1 style="text-align: center">Univerisity Fall 2016 Deadlines</h1>

<hr>
<div class="col-xs-12">
    <div class="box alert5 alert5-info">
        <p6>Hey! Class of 2016! You have to stay on top of these college application deadlines! Don't let any of these pass you by!</p6>
        <br>
        
        <p6>Just choose the state you're interested in and you will be shown all the upcoming deadlines for that state's colleges. If you don't see the school you're interested in, then their deadline for the Fall 2016 semester may have already passed or we may not have info on the school. If that is the case, we apologize for the inconvienience. </p6>
    </div>



<hr>
</div>

<div ng-controller="deadlineCtrl">
    <div class="row">
        <div class="col-xs-1">
        </div>
        <div class="col-xs-10">
            <select ng-model="model.selectedState" class="form-control" name="state" ng-change="loadCollegeData()">
            	<option value="alabama">Alabama</option>
            	<option value="alaska">Alaska</option>
            	<option value="arizona">Arizona</option>
            	<option value="arkansas">Arkansas</option>
            	<option value="california">California</option>
            	<option value="colorado">Colorado</option>
            	<option value="connecticut">Connecticut</option>
            	<option value="delaware">Delaware</option>
            	<option value="district-of-columbia">District Of Columbia</option>
            	<option value="florida">Florida</option>
            	<option value="georgia">Georgia</option>
            	<option value="hawaii">Hawaii</option>
            	<option value="idaho">Idaho</option>
            	<option value="illinois">Illinois</option>
            	<option value="indiana">Indiana</option>
            	<option value="iowa">Iowa</option>
            	<option value="kansas">Kansas</option>
            	<option value="kentucky">Kentucky</option>
            	<option value="louisiana">Louisiana</option>
            	<option value="maine">Maine</option>
            	<option value="maryland">Maryland</option>
            	<option value="massachusetts">Massachusetts</option>
            	<option value="michigan">Michigan</option>
            	<option value="minnesota">Minnesota</option>
            	<option value="mississippi">Mississippi</option>
            	<option value="missouri">Missouri</option>
            	<option value="montana">Montana</option>
            	<option value="nebraska">Nebraska</option>
            	<option value="nevada">Nevada</option>
            	<option value="new-hampshire">New Hampshire</option>
            	<option value="new-jersey">New Jersey</option>
            	<option value="new-mexico">New Mexico</option>
            	<option value="new-york">New York</option>
            	<option value="north-carolina">North Carolina</option>
            	<option value="north-dakota">North Dakota</option>
            	<option value="ohio">Ohio</option>
            	<option value="oklahoma">Oklahoma</option>
            	<option value="oregon">Oregon</option>
            	<option value="pennsylvania">Pennsylvania</option>
            	<option value="rhode-island">Rhode Island</option>
            	<option value="south-carolina">South Carolina</option>
            	<option value="south-dakota">South Dakota</option>
            	<option value="tennessee">Tennessee</option>
            	<option value="texas">Texas</option>
            	<option value="utah">Utah</option>
            	<option value="vermont">Vermont</option>
            	<option value="virginia">Virginia</option>
            	<option value="washington">Washington</option>
            	<option value="west-virginia">West Virginia</option>
            	<option value="wisconsin">Wisconsin</option>
            	<option value="wyoming">Wyoming</option>
            </select>
        </div>
        <div class="col-xs-1">
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-xs-1">
        </div>
        <div class="col-xs-10">
            <div class="box alert3 alert3-info" ng-repeat="collegeDatum in model.collegeData">
                <div class="row">
                    <div class="col-xs-8">
                        <strong class = "sidetitle4"> {{ collegeDatum.college }} </strong>
                        <br>
                        Deadline: {{ collegeDatum.deadline }}
                    </div>
                    <div class="col-xs-4">
                        <button ng-click="createReminder(collegeDatum)" class="btn btn-primary">Create Reminder</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-1">
        </div>
    </div>
</div>

<?= $this->Html->script('deadline/DeadlineSvc.js') . "\n" ?>
<?= $this->Html->script('deadline/DeadlineCtrl.js') . "\n" ?>
