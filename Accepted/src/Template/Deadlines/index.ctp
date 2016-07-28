<br>

<div class="col-sm-12" ng-controller="deadlineCtrl">
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

    <br>

    <div class="alert alert-info" ng-repeat="collegeDatum in model.collegeData">
        <ul>
          <li> {{ collegeDatum.college }} </li>
          <li> Deadline: {{ collegeDatum.deadline }} </li>
        </ul>
    </div>
</div>

<?= $this->Html->script('deadline/DeadlineSvc.js') . "\n" ?>
<?= $this->Html->script('deadline/DeadlineCtrl.js') . "\n" ?>
