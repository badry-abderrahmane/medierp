<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="MediERP - Finance et comptabilité">
  <meta name="author" content="Badry Abderrahmane">
  <meta name="keyword" content="medirelay,medierp">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="img/favicon.png">
  <title>MediERP V2.0 - Finance et comptabilité</title>

  <link href="css/app.css" rel="stylesheet">

  <!-- Icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/simple-line-icons.css" rel="stylesheet">
</head>
<body class="site">
  <div class="site-content">
      @yield('content')
  </div>
  <!-- CoreUI main scripts -->
  <script src="js/jquery.min.js"></script>
</body>
</html>
