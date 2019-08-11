<?php
//including the configuration file to the database
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'bodaichecksystem');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//declaring a variable that will be used when saving to db
$msgtype="message.txt";
//capturing the message and the sender from the web connector for diafaan
if(($_SERVER['REQUEST_METHOD'])=="POST"){
    $FROM=$_POST['from'];
    $message=$_POST["message"];
	//getting the first character to determine the action
	$firstCharacter = $message[0];
	//quering the registration details incase the first letter begins with K
		if($firstCharacter='K'){
        $query=mysqli_query($con,"select * from operators_personal_acc where Boda_plate_number='$message'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	$fullname=$row[1];
        $numberplate= $row[2]; 
		//formulating the message feedback to the customer and saving it to the table named outbox in the database
		$message1="Dear Customer the numberplate {NUMBERPLATE} is registered with us with the rider {NAME}";
		$message1 = str_replace('{NAME}', $fullname, $message1);
		$message1 = str_replace('{NUMBERPLATE}', $numberplate, $message1);
		
		$query=mysqli_query($con,"insert into messageout(MessageTo,MessageText,MessageType) values('$FROM','$message1','$msgtype')");
}
  }
  else if($firstCharacter==1) {
	   $message1="Thankyou for choosing to ride with us";
 
	$query=mysqli_query($con,"insert into messageout(MessageTo,MessageText,MessageType) values('$FROM','$message1','$msgtype')");
   
   }
   else{
	   $message1="Dear Customer the rider numberplate given is not registered with us. ";
	   $query=mysqli_query($con,"insert into messageout(MessageTo,MessageText,MessageType) values('$FROM','$message1','$msgtype')");
   }


}


?>