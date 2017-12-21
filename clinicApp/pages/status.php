<?php
include_once '../src/conn.php';


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
        <li class="breadcrumb-item active">Appointment Status</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Appointment Status</div>
        <div class="card-body">
      
          <div class="table-responsive">
         
          <table id="clinic"  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>ic</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>dr. Name</th>
                  <th>Appointment Date</th>
                  <th>Appointment Time</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
          <?php 
          $result = mysqli_query($conn, "SELECT * FROM appointmentstatusclinic");
  
  
          while ($appointmentstatus = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $appointmentstatus['patient_ic'] . "</td>";
              echo "<td>" . $appointmentstatus['patient_name'] . "</td>";
              echo "<td>" . $appointmentstatus['patient_phone'] . "</td>";
              echo "<td>" . $appointmentstatus['dr_name'] . "</td>";
              echo "<td>" . $appointmentstatus['appointment_date'] . "</td>";
              echo "<td>" . $appointmentstatus['appointment_time'] . "</td>";
              echo "<td>" . $appointmentstatus['status'] . "</td>";
  
  
          }
          echo "</tr>";
          ?>
          </tbody>
          </table>
          <!-- <button type="button" id="senddata" class="btn btn-primary">Send all to hospital</button>    -->
          <button type="button" id="getdata" class="btn btn-primary">Get all from hospital</button>   
  
  <div id="data"></div>
      <!-- <script>
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
      </script> -->
      <div id="getdata"></div>
      <script>
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
      </script>
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
