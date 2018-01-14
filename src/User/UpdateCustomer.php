
<?php

$query = "SELECT Email, Name, Address, Phone 
FROM customer
WHERE Username = '" . $_SESSION['username'] . "'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$username =$_SESSION['username'];
$email = $row["Email"];
$hoten=$row["Name"];
$diachi = $row["Address"];
$dienthoai = $row["Phone"];

//Cap nhat khach hang khi nhan vao nut cap nhat
if(isset($_POST['btnCapNhat'])){
	$query = "SELECT Email, Name, Address, Phone  
	FROM customer
	WHERE Username = '" . $_SESSION['username'] . "'";

	$result = mysql_query($query) ;
	$row = mysql_fetch_row($result);
	if($_POST['txtMatKhau1']!="")
	{
		$matkhau=$_POST['txtMatKhau1'];
	}
	$hoten=$_POST['txtHoTen'];
	$diachi = $_POST['txtDiaChi'];
	$dienthoai = $_POST['txtDienThoai'];
	
	$kiemtra = kiemTra();
	if($kiemtra==""){
		//Khach hang co thay doi mat khau
		if($_POST['txtMatKhau1']!=""){
			mysql_query(
				"UPDATE `customer`
				SET Name='".$hoten."',Address='".$diachi."',
				Phone='".$dienthoai."',Password='".md5($_POST['txtMatKhau1'])."'
				WHERE Username = '" . $_SESSION['username'] . "'") 
			;
		}
		//Khach hang khong thay doi mat khau
		else{ 
			mysql_query("UPDATE `customer`
			SET Name='".$hoten."',Address='".$diachi."',
			Phone='".$dienthoai."'
			WHERE Username = '" . $_SESSION['username'] . "'") 
			;
	}
	echo "<script>alert('Update Success!');window.location='./';</script>";
}else{
	echo $kiemtra;
}
}

function kiemTra(){
	if($_POST['txtHoTen']==""||$_POST['txtDiaChi']==""){
		return "<p class='cssLoi'>Please Enter full information</p>";
	}
	
	elseif(strlen($_POST['txtMatKhau1'])<=5 && strlen($_POST['txtMatKhau1'])>0){
		return "<p class='cssLoi'>Password . </p>";
	}
	else{
		return "";
	}
}

?>
<div class="container">
	
	<h2 class="text-center">Update Information</h2>

	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
		<div class="form-group">

			<label for="lblusername" class="col-sm-2 control-label">Username(*):  </label>
			<div class="col-sm-10">
				<label class="form-control" style="font-weight:400"><?php echo $username; ?></label>
			</div>
		</div>

		<div class="form-group">   
			<label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
			<div class="col-sm-10">
				<label class="form-control" style="font-weight:400"><?php echo $email; ?></label>
			</div>
		</div>  

		<div class="form-group"> 
			<label for="lblMatKhau1" class="col-sm-2 control-label">Passwords(*):  </label>
			<div class="col-sm-10">
				<input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control"/>
			</div>
		</div>

		

		<div class="form-group">                         
			<label for="lblHoten" class="col-sm-2 control-label">Full Name(*):  </label>
			<div class="col-sm-10">
				<input type="text" name="txtHoTen" id="txtHoTen" value="<?php echo $hoten; ?>" class="form-control" placeholder="Giá"/>
			</div>
		</div>

		<div class="form-group"> 
			<label for="lblDiaChi" class="col-sm-2 control-label">Address(*):  </label>
			<div class="col-sm-10">
				<input type="text" name="txtDiaChi" id="txtDiaChi" value="<?php if(isset($diachi)) echo $diachi; ?>" class="form-control" placeholder="Địa chỉ"/>
			</div>
		</div>

		<div class="form-group"> 
			<label for="lblDienThoai" class="col-sm-2 control-label">Phone(*):  </label>
			<div class="col-sm-10">
				<input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php if(isset($dienthoai)) echo $dienthoai; ?>" class="form-control" placeholder="Điện thoại" />
			</div>
		</div>





	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Update"/>

		</div>
	</div>
</form>
</div>






