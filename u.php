<?php
ini_set('display_errors',1);

  require "db.php";
  if( $_COOKIE["uaa_login"] == "" ){
    header('Location: http://127.0.0.1/');
    exit;
  };
  $q = "SELECT * FROM settings WHERE id='" . $_COOKIE["uaa_login"] . "';";
  $userdetails = db_query($q);

date_default_timezone_set("UTC");
$date = file_get_contents("/tmp/last_update.txt");
//$seconds = strtotime($date);
  $last = new DateTime($date, new DateTimeZone('UTC'));
  $now = new DateTime(NULL, new DateTimeZone('UTC'));
  // hack

  $diff = $last->diff($now);
  print_r($diff);
  print_r($last);
  print_r($now);
  
  //$last = new DateTime(); //create dateTime object
  //$last->setTimezone(new DateTimeZone('Europe/London'));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Up and About</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="/css/bootstrap-switch.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/bootstrap-switch.js"></script>
<script src="/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <style type="text/css">
    body {
      font-face: helvetica,arial;
  padding-top: 60px;
  padding-bottom: 40px;
  background-color: #eee;
} 
  .rb { border-right: solid 4px #bbb;}
  .tabbox {
      height: 200px; background-color: white; padding: 8px;
  }

</style>
  </head>

  <body>

  	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Up and about</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><? print($userdetails["username"]);?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/u.php">My settings</a></li>
                <li><a href="/">Logout</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="alert alert-danger">
          You are not currently receiving alerts for <strong>'Hallway'</strong> and we have not received a notification from your WeMo in 7 hours
      </div>

      <div class="row">
          <div class="col-md-2 rb" style="margin: 10px;">
              <h3>Sensors</h3>
              <div>&nbsp;</div>
          </div>
          <div class="col-md-8" style="margin: 10px;">

            <h4>
              <div class="make-switch switch-small">
                  <input type="checkbox">
              </div>
              Hallway <small>last triggered 7 hours ago</small></h4>

            <h4>
              <div class="make-switch switch-small">
                  <input type="checkbox" checked>
              </div>

              Kitchen <small>last triggered X minutes ago</small></h4>

            <h4></h4>
        </div>
      </div>

      <hr/>

      <div class="row">
          <div class="col-md-2 rb" style="margin: 10px; min-height:240px;">
              <h3>Schedule</h3>
              <div>&nbsp;</div>
          </div>
          <div class="col-md-8" style="margin: 10px;">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#simple" data-toggle="tab">Simple</a></li>
              <li><a href="#advanced" data-toggle="tab">Advanced</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane  active tabbox" id="simple">
                  <strong>Every day</strong><br/><br/>
                  <table width="100%">
                      <tr>
                          <td>
                              Start time
                          </td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:30%;">
                          </td>
                      </tr>
                      <tr>
                          <td>End time</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1730" style="width:30%;">
                          </td>
                      </tr>                      
                  </table>
                </div>
                                    
                <div class="tab-pane tabbox" id="advanced">
                  <table width="100%">
                      <tr>
                          <td>
                              Monday
                          </td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                          <td>Saturday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                      </tr>
                      <tr>
                          <td>Tuesday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                          <td>Sunday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>                          
                      </tr>
                      <tr>
                          <td>Wednesday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                          <td></td><td></td>
                      </tr>
                      <tr>
                          <td>Thursday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                          <td></td><td></td>
                      </tr>
                      <tr>
                          <td>Friday</td>
                          <td>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 0800" style="width:35%; display:inline;">
                              -
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="e.g. 1700" style="width:40%; display:inline;">
                          </td>
                          <td></td><td></td>
                      </tr>                                  
                  </table>
                </div>                
              </div>
            </div>
        </div>




      <hr/>

      <div class="row">
          <div class="col-md-2 rb" style="margin: 10px; min-height: 120px;">
              <h3>Alerts</h3>
              <div>&nbsp;</div>
          </div>
          <div class="col-md-div8" style="margin: 10px;">

              <form class="form form-inline">
                <div class="control-group">
                  Email me at
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" style="width:50%;" value="<?  print($userdetails['email']); ?>">
                </div>

                <div class="control-group" style="margin-top:10px;">
                  Send me a text message at
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone number" style="width:50%;" value="<?  print($userdetails['phone']); ?>"> 
                </div>


                <div class="control-group" style="margin-top:10px;">
                  If there is no motion for 
                  <input type="text" class="form-control" id="exampleInputEmail1"  style="width:40px;" value="<?  print($userdetails['alert_hours']); ?>"> hours and  <input type="text" class="form-control" id="exampleInputEmail1" style="width:40px;" value="<?  print($userdetails['alert_minutes']); ?>"> minutes
                </div>                
              </form>
          </div>
        </div> 

    </div> <!-- /container -->


    <script type="text/javascript">
      $(document).ready(function(){
        $('#myTab a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
        $('#myTab a:first').tab('show')
      })
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
