<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./home.css">
  <link rel="stylesheet" type="text/css" href="style.css"/>
 </head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">HUMAN CLOUD BUSINESS SOLUTIONS- To-Do List</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./home.php">HOME</a></li>
        <li><a href="#">HOW IT WORKS</a></li>
        <li><a href="#">TRIAL</a></li>
        <li><a href="#">PRICING</a></li>
        <li><a href="./login.php">LOG IN</a></li>
        <li><a href="./register.php">SIGN UP</a></li>
        <li><button class="btn" data-toggle="modal" data-target="#myModal">Comments</a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Your Comments</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Name or email</label>
              <input type="text" class="form-control" id="psw" placeholder="John Joe or johnjoe@humancloud.in">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Comment</label>
              <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
            </div>
              <button type="submit" class="btn btn-block">Send 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          </div>
        <p>Need <a href="#">help?</a></p>
      </div>
    </div>
  </div>
</div>


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
<div id="middle">

