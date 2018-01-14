<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript">
 var RecaptchaOptions = {
  theme : 'white'
};
</script>

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once('recaptchalib.php');
include_once('sendMailLib.php');

if(isset($_POST['btnReg'])) {

    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
    $name = $_POST['txtName'];
    
    $email = $_POST['txtEmail'];
    $address = $_POST['txtAddress'];
    $phone = $_POST['txtPhone'];
  
    if(isset($_POST['grpGender'])) {
      $Gender = $_POST['grpGender'];
    }
    
    $birthday = $_POST['slBirthDay'];
    $birthmonth = $_POST['slBirthMonth'];
    $birthyear = $_POST['slBirthYear'];
    
    $error = "";
    
    $privatekey = "6LcB_9sSAAAAAKNBIIYJ20UGedbB-jA15YQfIX-G ";
    $resp = recaptcha_check_answer ($privatekey,
      $_SERVER["REMOTE_ADDR"],
      $_POST["recaptcha_challenge_field"],
      $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
      $error = "<li>Mã số an toàn không đúng!</li>";
    } 

  
    if ($_POST['txtUsername'] == "" || $_POST['txtPassword'] == "" ||
        $_POST['txtEmail'] == ""||$_POST['txtAddress'] == ""||!isset($Gender)) {
        $error .="<li>Please fill all required field (*).</li>";
    }

    if(strlen($_POST['txtPassword'])<=5) {
        $error .="<li>Password must be at least 6 character.</li>";
    }

    if(strpos($_POST['txtEmail'],"@") === false) {
      $error .="<li>Email is not valid.</li>";
    }

    if($_POST['slBirthYear']=="0") {
      $error .="<li>Please choose year of birth</li>";
    }

    if($_POST['slBirthMonth']=="0") {
      $error .="<li>Please choose month of birth</li>";
    }
    if($_POST['slBirthDay']=="0") {
      $error .="<li>Please choose day of birth</li>";
    }


  if($error != "") {
    echo "<ul class='cssLoi'>".$error."</ul>";
  }
  else {
      $randomcode = md5(rand());
      $sq = "SELECT * FROM `customer` WHERE Username='$username' ";
      $ketqua = mysql_query($sq);
      echo mysql_numrows($ketqua);
      if(mysql_num_rows($ketqua)==0)
      {
        $insert="INSERT INTO `customer`(`Username`, `Password`, `Name`, `Sex`, `Address`, `Phone`, `Email`, `Birth_day`, `Birth_month`, `Birth_years`, `IC`, `Active`, `Status`, `Role`)
          VALUES ('$username', '".md5($password)."', '$name', $Gender, '$address', '$phone', '$email',
          $birthday, $birthmonth, $birthyear, '', '$randomcode', 0, 0)";
        mysql_query($insert);
        echo $insert;

        $mail_content = "<p>Congratulation $name registered successfull website AppWine</p>".
        "<p>Please follow to active link: 
        <a href='./?page=kichhoat&taikhoan= $username&ma= $randomcode'>
        http://localhost/AppWine/src/User/Acive.php?taikhoan= $username&ma= $randomcode</a>
        </p>";
        sendGMail("testmailweb02@gmail.com","web02#cusc", "Adminstrator website Salomon", 
          array(array($email,$name)), array(array("testmailweb02@gmail.com", 
            "Adminstrator website App Wine")), "Mail Active user App Wine", $mail_content);
        
        echo "<script language='javascript'>window.location='./'</script>";
      }
  }
}

?>



<div class="container">
  <h2 class="text-center">REGISTER</h2>
  <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
    <div class="form-group">
      <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
      <div class="col-sm-10">
        <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="<?php if(isset($username)) echo $username; ?>"/>
      </div>
    </div>  

    <div class="form-group">   
      <label for="" class="col-sm-2 control-label">Password(*):  </label>
      <div class="col-sm-10">
        <input type="password" name="txtPassword" id="txtPassword" class="form-control"/>
      </div>
    </div>      

    <div class="form-group">                               
      <label for="lblHoten" class="col-sm-2 control-label">Full Names(*):  </label>
      <div class="col-sm-10">
        <input type="text" name="txtName" id="txtName" value="<?php if(isset($name)) echo $name; ?>" class="form-control" placeholder="Full Name"/>
      </div>
    </div> 

    <div class="form-group">      
      <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
      <div class="col-sm-10">
        <input type="text" name="txtEmail" id="txtEmail" value="<?php if(isset($email)) echo $email; ?>" class="form-control" placeholder="Email"/>
      </div>
    </div>  

    <div class="form-group">   
     <label for="lbladdress" class="col-sm-2 control-label">Address(*):  </label>
     <div class="col-sm-10">
      <input type="text" name="txtAddress" id="txtAddress" value="<?php if(isset($address)) echo $address; ?>" class="form-control" placeholder="Cần Thơ, Việt Nam"/>
    </div>
  </div>  

  <div class="form-group">  
    <label for="lblphone" class="col-sm-2 control-label">Phone number(*):  </label>
    <div class="col-sm-10">
      <input type="text" name="txtPhone" id="txtPhone" value="<?php if(isset($phone)) echo $phone; ?>" class="form-control" placeholder="Phone Number" />
    </div>
  </div> 

  <div class="form-group">  
    <label for="lblGender" class="col-sm-2 control-label">Gender(*):  </label>
    <div class="col-sm-10">                              
      <label class="radio-inline"><input type="radio" name="grpGender" value="0" id="grpGender" 
        <?php if(isset($Gender)&&$Gender=="0") { echo "checked";} ?> />
      Male</label>

      <label class="radio-inline"><input type="radio" name="grpGender" value="1" id="grpGender" 
        <?php if(isset($Gender)&&$Gender=="1") { echo "checked";} ?> />
      Female</label>

    </div>
  </div> 

  <div class="form-group"> 
    <label for="lblNgaySinh" class="col-sm-2 control-label">Date of Day(*):  </label>
    <div class="col-sm-10" class="input-group">
      <span class="input-group-btn">
        <select name="slBirthDay" id="slBirthDay" class="form-control" >
          <option value="0">Choice Day</option>
          <?php
          for($i=1;$i<=31;$i++)
          {
           if($i== $birthday) {
             echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
           }
           else{
             echo "<option value='".$i."'>".$i."</option>";
           }
         }
         ?>
       </select>
     </span>
     <span class="input-group-btn">
      <select name="slBirthMonth" id="slBirthMonth" class="form-control">
        <option value="0">Choice Month</option>
        <?php
        for ($i=1; $i<=12; $i++)
        {
          if ($i == $birthmonth) {
           echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
         }
         else{
           echo "<option value='".$i."'>".$i."</option>";
         }
       }
       ?>
     </select>
   </span>
   <span class="input-group-btn">
    <select name="slBirthYear" id="slBirthYear" class="form-control">
      <option value="0">Choice Years</option>
      <?php
      for ($i=1970; $i<=2010; $i++)
      {
         if ($i == $birthyear) {
           echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
         }
         else {
           echo "<option value='".$i."'>".$i."</option>";
         }
     }
     ?>
   </select>
 </span>
</div>  
</div>  

<div class="form-group">
  <label for="lblMMaAnToan" class="col-sm-2 control-label">Security Code(*):  </label>
  <div class="col-sm-10">   
    <?php

    $publickey = "6LcB_9sSAAAAAKLNL0dO-UIorCDMCfJuD-lGs0v7"; 
    echo recaptcha_get_html($publickey);
    ?> 
  </div>
</div>   





<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <input type="submit"  class="btn btn-primary" name="btnReg" id="btnReg" value="Register"/>

  </div>
</div>
</form>
</div>


