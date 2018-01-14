<link rel="stylesheet" type="text/css" href="style.css"/>

<?php
if (isset($_POST['btnLogin'])) {
    $username = trim($_POST["txtSignIn"]);
    $password = trim($_POST["txtPassword"]);
    
    $err = "";
    if ($username ==""){
        $err .= "Please type your username!<br/>";
    }
    if ($password==""){
        $err .= "Please type your password!<br/>";
    }

    if ($err != ""){
        echo "<span class=\"cssLoi\">".$err."</span>";
    }
    else{
        //$username = mysql_real_escape_string($conn, $username);
        $password = md5($password);
        $result = mysql_query("SELECT * FROM customer WHERE Username='$username' AND Password='$password'") or die(mysql_error());
        if (mysql_num_rows($result) == 1)
        {
            $Role = mysql_fetch_object($result)->Role;
            $_SESSION["username"] = $username;
            if ($Role) 
                $_SESSION['admin'] = $username;
            echo "<script language='javascript'>window.location='./'</script>";
        }
        else{
            echo 'Username or Password is not correct';
        }
    }
}
?>


<div class="container">
  <h2 class="text-center">Sign In</h2>
    <form id="form1" name="form1" method="POST" action="" class="form-horizontal" role="form">
        <div class="row">
            <div class="form-group">                            
                <label for="txtSignIn" class="col-sm-2 control-label">Username(*):  </label>
                <div class="col-sm-10">
                      <input type="text" name="txtSignIn" id="txtSignIn" class="form-control" placeholder="Username" value=""/>
                </div>
            </div>  
              
            <div class="form-group">
                <label for="txtPassword" class="col-sm-2 control-label">Password(*):  </label>
                <div class="col-sm-10">
                      <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Password" value=""/>
                </div>
             </div> 
                 
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Sign In"/>
            </div>            
       
        </div>    
    </form>
</div>
   