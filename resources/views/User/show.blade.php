<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <title>Look! I'm CRUDding</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

  <nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ URL::to('User') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('User') }}">View All Nerds</a></li>
      <li><a href="{{ URL::to('User/create') }}">Create a Nerd</a>
    </ul>
  </nav>

  <h1>Showing {{ $user->name }}</h1>

  <div class="jumbotron text-center">
    <p>
      <strong>Name:</strong> {{ $user->name }}<br>
      <strong>Email:</strong> {{ $user->email }}<br>
      <strong>Date:</strong> {{ $user->created_at }}
    </p>
  </div>

</div>
</body>
</html>