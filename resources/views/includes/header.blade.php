<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>IVIC Platform:Voter's Login Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> 

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> 
    
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
      
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="welcome">IVIC Platform</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="Autharization/Logout">Logout</a></li>
        
      </ul
      </div>
    </nav>