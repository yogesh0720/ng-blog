<!DOCTYPE html>
<html lang="en-US" ng-app="yogeshRecords">
<head>
  <title>Laravel 5 AngularJS CRUD Example</title>

  <!-- Load Bootstrap CSS -->
  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>-->

  <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
  <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
  <script src="<?= asset('js/jquery.min.js') ?>"></script>
  <script src="<?= asset('js/bootstrap.min.js') ?>"></script>

  <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">-->

</head>
<body>
<h2>Employees Database</h2>
<div ng-controller="YogeshController">

  <!-- Table-to-load-the-data Part -->
  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Address</th>
      <th>Gender</th>
      <th>
        <button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Employee</button>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr ng-repeat="yogesh in yogesh1">
      <td>{{ yogesh.id }}</td>
      <td>{{ yogesh.name }}</td>
      <td>{{ yogesh.age }}</td>
      <td>{{ yogesh.address }}</td>
      <td>{{ yogesh.gender }}</td>
      <td>
        <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', yogesh.id)">Edit</button>
        <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(yogesh.id)">Delete</button>
      </td>
    </tr>
    </tbody>
  </table>
  <!-- End of Table-to-load-the-data Part -->
  <!-- Modal (Pop up when detail button clicked) -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
        </div>
        <div class="modal-body">
          <form name="frmEmployees" class="form-horizontal" novalidate="">

            <div class="form-group error">
              <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname"
                       value="{{name}}"
                       ng-model="form.name" ng-required="true">
                <span class="help-inline"
                      ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Age</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="age" name="age" placeholder="age" value="{{age}}"
                       ng-model="form.age" ng-required="true">
                <span class="help-inline"
                      ng-show="frmEmployees.age.$invalid && frmEmployees.age.$touched">Age is required</span>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="address" name="address" placeholder="address"
                       value="{{address}}"
                       ng-model="form.address" ng-required="true">
                <span class="help-inline"
                      ng-show="frmEmployees.address.$invalid && frmEmployees.address.$touched">Address is required</span>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="gender" name="gender" placeholder="gender"
                       value="{{gender}}"
                       ng-model="form.gender" ng-required="true">
                <span class="help-inline"
                      ng-show="frmEmployees.gender.$invalid && frmEmployees.gender.$touched">Gender field is required</span>
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                  ng-disabled="frmEmployees.$invalid">Save changes
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- AngularJS Application Scripts -->
<script src="<?= asset('app/app.js') ?>"></script>
<script src="<?= asset('app/controllers/yogesh.js') ?>"></script>
</body>
</html>