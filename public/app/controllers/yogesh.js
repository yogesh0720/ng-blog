app.controller('YogeshController', function ($scope, $http, API_URL) {
  //retrieve yogesh listing from API
  $http.get(API_URL)
    .success(function (response) {
      $scope.yogesh1 = response;
    });

  //show modal form
  $scope.toggle = function (modalstate, id) {
    $scope.modalstate = modalstate;
    switch (modalstate) {
      case 'add':
        $scope.form_title = "Add New Employee";
        $scope.form = {};
        break;
      case 'edit':
        $scope.form_title = "Employee Detail";
        $scope.id = id;
        $http.get(API_URL + '/' + id)
          .success(function (response) {
            console.log(response);
            $scope.form = response;
          });
        break;
      default:
        break;
    }
    console.log(id);
    $('#myModal').modal('show');
  }

  //save new record / update existing record
  $scope.save = function (modalstate, id) {
    var url = API_URL;
    //append yogesh id to the URL if the form is in edit mode
    if (modalstate === 'edit') {
      url += '/' + id;
    }

    $http({
      method: 'POST',
      url: url,
      data: $scope.form,
      //headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      contentType: "json",
    }).success(function (response) {
      console.log(response);
      location.reload();
      location.reload();
    }).error(function (response) {
      console.log(response);
      alert('This is embarassing. An error has occured. Please check the log for details111');
    });

  }


  //delete record
  $scope.confirmDelete = function (id) {
    var isConfirmDelete = confirm('Are you sure you want this record?');
    if (isConfirmDelete) {
      $http({
        method: 'DELETE',
        url: API_URL + '/' + id
      }).success(function (data) {
        console.log(data);
        location.reload();
      }).error(function (data) {
        console.log(data);
        alert('Unable to delete');
      });
    } else {
      return false;
    }
  }
});