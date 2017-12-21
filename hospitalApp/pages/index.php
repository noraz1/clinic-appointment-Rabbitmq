<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Appointment List</title>
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<script src="assets/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <title>Hospital appointment</title>
</head>
<body>
<button type="button" id="getdata">Get all from clinic</button>   
<button type="button" id="senddata">Send all to clinic</button>   

<div id="data"></div>
    <script>
     $(document).ready( function () {
         $("#getdata").click(function(){
            $.ajax({
            method: 'get',
            url: 'src/consumer.php',
            success: function(data) {
                $("#data").append(data);
            }
            });
         });
        $('#table').DataTable( {
            "pagingType": "full_numbers"
        } );
        
    } );
    </script>

    <!-- publish -->
      

<div id="send"></div>
    <script>
     $(document).ready( function () {
         $("#senddata").click(function(){
            $.ajax({
            method: 'get',
            url: 'src/publisher.php',
            success: function(data) {
                $("#data").append(data);
            }
            });
         });
        $('#table').DataTable( {
            "pagingType": "full_numbers"
        } );
        
    } );
    </script>
</body>
</html>