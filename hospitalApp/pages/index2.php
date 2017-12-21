<?php
include_once '../src/conn.php';

$result4=mysqli_query($conn,"SELECT * FROM appointmentstatus");
$count=mysqli_num_rows($result4);

if(isset($_POST['update'])){
  $appointmentid = $_POST['appointmentid'];
	$status = $_POST['status'];
  $sql1="UPDATE appointmentstatus SET status='$status' WHERE appointmentid='$appointmentid'";
  $result5=mysqli_query($conn,$sql1);
  if($result5){
    
    header("location:".$_SERVER['HTTP_REFERER']);
     
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
  <title>Hospital</title>
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
    <a class="navbar-brand" href="index2.php">Hospital Appointment System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index2.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Appointment Status</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="status.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">View Status</span>
          </a>
        </li> -->
      
       
      
      
      
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
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Appointment</button>   -->
          <div class="table-responsive">
          <div class="container">


      <div style="overflow-x:auto;">
      <form method="post" action="">
        <table class="table table-hover table-bordered" >
            <thread>    
                <tr>
                <th>ic</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Dr. Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
   
                 </tr>
            </thread>  
<!-- body table -->
            

            <?php
           
            $i =1;
            
            while ($row=mysqli_fetch_array($result4)) {
              $appointmentid= $row['appointmentid'];
                $patient_ic= $row['patient_ic'];
                $patient_name= $row['patient_name'];
                $patient_phone= $row['patient_phone'];
                $dr_name= $row['dr_name'];
                $appointment_date= $row['appointment_date'];
                $appointment_time= $row['appointment_time'];
                $status= $row['status'];
              
            
                
            ?>
            <tr>
        
             <td><?php echo $patient_ic; ?></td>
             <td><?php echo $patient_name; ?></td>
             <td><?php echo $patient_phone; ?></td>
             <td><?php echo $dr_name; ?></td>
             <td><?php echo $appointment_date; ?></td>
             <td><?php echo $appointment_time; ?></td>
             <td>
                <?php echo $status; ?>
            </td>
             <td class= 'text-center'><a href="#edit<?php echo $appointmentid;?>"  data-toggle="modal" >Status</button></a>
            </td>
             </tr>

<div id="edit<?php echo $appointmentid;?>" class="modal fade" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
    <span type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</span>
    
         <div class="modal-header"><h4 class="modal-title">Status</h4></div>
            
        <div class="modal-body">
        <div class="row">
            <form method="post">
                <div class="form-group ">
                 <!-- newly added field -->
                 <input type="hidden" name="appointmentid" value="<?php echo $appointmentid; ?>">
                 <select name= "status" id="status">
                 <option  value=""></option>
                 <option value="Accept">Accept</option>
                 <option value="Reject">Reject</option>
                 
                 </select>
                 <button class="btn btn-primary " name="update" type="submit" onclick="return confirm('Are you sure?')" > Update</button>
           
            </form>
        </div>
        </div>
        </div>
    </div>
</div>
</div>


         
         <?php

    $i++;
            
 }
 ?>
   </tbody>
<!--end  body table -->
         </table>
       
         </form>
        

  
</div>
         
          <button type="button" id="senddata" class="btn btn-primary">Send all to Clinic</button>   
          <button type="button" id="getdata" class="btn btn-primary">Get all from Clinic</button>    

  
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
