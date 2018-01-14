<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;AppWine&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./cart/"><span class="glyphicon glyphicon-shopping-cart text-primary"></span> &nbsp;Shopping Cart&nbsp; <span class="badge"><?php if((isset($_SESSION['cart'])) && count($_SESSION['cart'])>0) echo count($_SESSION['cart']); else echo 0;?></span></a></li>
        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
          $username = $_SESSION['username'];
          $sql = "SELECT Role, Name FROM customer WHERE username = '$username'";
          $result = mysql_query($sql);
          // $is_admin = mysql_fetch_object($result)->Role;
          // $Name = mysql_fetch_object($result)->Name;
          list($is_admin, $Name) = mysql_fetch_array($result);
        ?>
        <?php if ($is_admin): ?>
          <li><a href="./admin/"><span class="glyphicon glyphicon-tasks text-danger"></span> Admin Panel</a></li>
        <? endif;?>
        <li><a href="./user/update"><span class="glyphicon glyphicon-user"></span> <?= $Name ?></a></li>
        <li><a href="?page=SignOut"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
        <?php
        }
        else
        {
         ?>
        <li><a href="?page=SignUp"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="?page=SignIn"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>