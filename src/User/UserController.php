<?php
function addCustommer($username, $password,$fullname,$sex,$address,$phone,$email,$day,$month,$Years)
{
	$insert = "INSERT INTO `customer`(`Username`, `Password`, `Name`, `Sex`, `Address`, `Phone`, `Email`, `Birth_day`, `Birth_month`, `Birth_years`, `IC`, `Active`, `Status`, `Role`) VALUES ('$username', '".md5($password)."', '$fullname', '$sex','$address', '$phone', '$email', '$day','$month', '$Years', '$ic', '', 0,0)";
	mysql_query($insert);
}
?>
