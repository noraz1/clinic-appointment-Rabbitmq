<?php
include_once '../src/conn.php';

if (isset ($_POST['submit'])) {
  // declare variable untuk store data dari input
  
  $patient_ic =$_POST['patient_ic'];
  $patient_name =$_POST['patient_name'];
  $dr_name =$_POST['dr_name'];
  $patient_phone =$_POST['patient_phone'];
  $appointment_date =$_POST['appointment_date'];
  $appointment_time =$_POST['appointment_time'];

$query= "INSERT INTO appointments (patient_ic, patient_name, dr_name, patient_phone,appointment_date,appointment_time ) 
VALUES ('$patient_ic','$patient_name', '$dr_name', '$patient_phone', '$appointment_date', '$appointment_time') ";

$result= mysqli_query($conn,$query);

if ($result)
  {
?>
<script type="text/javascript">
alert ('Add appointment success!');

</script>
<?php
}

else
{
?>
<script type="text/javascript">
alert ('failed to add appointment. please try again!');
</script>
<?php
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Clinic</title>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Clinic Appointment System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Create Appointment</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="status.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">View Status</span>
          </a>
        </li>
      
       
      
      
      
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Appointment list</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Appointment list</div>
        <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Appointment</button>  
          <div class="table-responsive">
          <div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Create Appointment</h4>
        </div>
        <div class="modal-body">
         <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
      <label class="control-label requiredField" for="patient_ic">
       Patient IC
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="patient_ic" name="patient_ic" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="patient_name">
       Patient Name
      </label>
      <input class="form-control" id="patient_name" name="patient_name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="patient_phone">
       Patient Phone Number
      </label>
      <input class="form-control" id="patient_phone" name="patient_phone" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="dr_name">
       Dr. Name
      </label>
      <input class="form-control" id="dr_name" name="dr_name" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="appointment_date">
       Appointment Date
      </label>
      <input class="form-control" id="appointment_date" name="appointment_date" placeholder="DD/MM/YYYY" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="appointment_time">
       Appointment Time
      </label>
      <input class="form-control" id="appointment_time" name="appointment_time" placeholder="eg: 1-2 pm" type="text"/>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
          <table id="clinic"  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>ic</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>dr. Name</th>
                  <th>Appointment Date</th>
                  <th>Appointment Time</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          $result = mysqli_query($conn, "SELECT * FROM appointments");
  
  
          while ($appointments = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $appointments['patient_ic'] . "</td>";
              echo "<td>" . $appointments['patient_name'] . "</td>";
              echo "<td>" . $appointments['patient_phone'] . "</td>";
              echo "<td>" . $appointments['dr_name'] . "</td>";
              echo "<td>" . $appointments['appointment_date'] . "</td>";
              echo "<td>" . $appointments['appointment_time'] . "</td>";
  
  
          }
          echo "</tr>";
          ?>
          </tbody>
          </table>
          <button type="button" id="senddata" class="btn btn-primary">Send all to hospital</button>   
          <!-- <button type="button" id="getdata" class="btn btn-primary">Get all from hospital</button>    -->
  
  <div id="data"></div>
      <script>
       $(document).ready( function () {
           $("#senddata").click(function(){
              $.ajax({
              method: 'get',
              url: '../src/publisher.php',
              success: function(data) {
                  $("#data").append(data);
              }
              });
           });
          $('#clinic').DataTable( {
              "pagingType": "full_numbers"
          } );
          
      } );
      </script>
      <div id="getdata"></div>
      <!-- <script>
       $(document).ready( function () {
           $("#getdata").click(function(){
              $.ajax({
              method: 'get',
              url: '../src/consumer.php',
              success: function(data) {
                  $("#data").append(data);
              }
              });
           });
        
      } );
      </script> -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
