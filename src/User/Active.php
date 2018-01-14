<?php
if(isset($_GET["taikhoan"])&&isset($_GET["ma"])){
	$taikhoan = $_GET["taikhoan"];
	$ma = $_GET["ma"];
	$result = mysql_query("SELECT * FROM customer WHERE Username='$taikhoan' AND Active='$ma'");
	if(mysql_num_rows($result) > 0){
		mysql_query("UPDATE customer SET status=1 WHERE Username='$taikhoan'");
		echo "congratulation";
	}
	else{
		echo "Erro";
	}
}
?>

