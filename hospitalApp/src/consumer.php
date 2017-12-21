<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$host = 'spider.rmq.cloudamqp.com';
$port = 5672;
$user = 'ydjtkfhg';
$pass = 'SnRM9CiwuIasm1rIDD72gaqsFtsNa5zI';
$vhost = 'ydjtkfhg';

$exchange = 'clinic-exchange';
$queue = 'clinicq';

$connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
$channel = $connection->channel();

$channel->queue_declare($queue, false, true, false, false);

$channel->exchange_declare($exchange, 'direct', false, true, false);
$channel->queue_bind($queue, $exchange);



//process the message from MQ
function process_message($message)
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'hospital';
    
    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
   
    // echo $message->body;
    $messageBody = json_decode($message->body);
    // foreach ($messages as $messageBody) {
        $appointmentid = $messageBody->appointmentid;
        $patient_ic = $messageBody->patient_ic;
        $patient_name = $messageBody->patient_name;
        $dr_name = $messageBody->dr_name;
        $patient_phone = $messageBody->patient_phone;
        $appointment_date = $messageBody->appointment_date;
        $appointment_time = $messageBody->appointment_time;
       // $address = str_replace(",", " ", (str_replace("\n", " ", $messageBody->address)));
        $status = "rejected";

       $sql = "INSERT INTO appointmentstatus (appointmentid,patient_ic,patient_name,dr_name,patient_phone,appointment_date,appointment_time)
    VALUES ('$appointmentid','$patient_ic','$patient_name','$dr_name','$patient_phone','$appointment_date','$appointment_time')";

if ($con->query($sql) === true) {
    echo "New record created successfully" . PHP_EOL;
} else {
    echo "Error: " . $sql . "<br>" . $con->error . PHP_EOL;
}
    // }

        // echo 'consumed data: ' . $messageBody . PHP_EOL;

   
        mysqli_close($con);

    if ($message->body === 'quit') {
        $$message->delivery_info['channel']->basic_cancel($message->delivery_info['consumer_tag']);
    }

}

/*
queue: Queue from where to get the messages
consumer_tag: Consumer identifier
no_local: Don't receive messages published by this consumer.
no_ack: Tells the server if the consumer will acknowledge the messages.
exclusive: Request exclusive consumer access, meaning only this consumer can access the queue
nowait:
callback: A PHP Callback
 */

$consumerTag = 'enterprise_consumer';
$channel->basic_consume($queue, $consumerTag, false, false, false, false, 'process_message');

function shutdown($channel, $connection)
{
    $channel->close();
    $connection->close();
}
register_shutdown_function('shutdown', $channel, $connection);
// Loop as long as the channel has callbacks registered
while (count($channel->callbacks)) {
    $channel->wait();
}
