<script language="javascript">
            function confirmDelete(){
                if(confirm("Are you sure want to delete it?")){
                    return true;
                }
                else{
                    return false;
                }
            }
</script>
<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "del") {
        $id = $_GET["id"];
        unset($_SESSION["cart"][$id]);
        echo "<script>window.location.href='./cart/'</script>";
    }
}

if (isset($_POST['btnYes'])) {
    if (isset($_SESSION['username'])) {
        foreach ($_SESSION["cart"] as $key => $row) {
            $_SESSION['cart'][$key]['quantity'] = $_POST['Wine' . $key];
        }
        echo "<script>window.location.href='./cart/checkout'</script>";
    } else {
        echo "<script>alert('Please Login to Checkout');</script>";
    }
}

?>

<div class="container">

<form id="form1" name="form1" method="post" action="">
    <div class="row">
        <div class="col-sm-3"><label>Product Names</label></div>
        <div class="col-sm-2"><label>Publisher</label></div>
        <div class="col-sm-2"><label>Price</label></div>
        <div class="col-sm-2"><label>Quantity</label></div>
        <div class="col-sm-2"><label>Total</label></div>
        <div class="col-sm-1"><label>Delete</label></div>
    </div>
    
    <?php
    if ($_SESSION["cart"] != null) 
    {
          $total = 0;
          foreach ($_SESSION["cart"] as $key => $row) 
          {
    ?>
                <div class="row">
                    <div class="col-sm-3"><?php echo $row['name'] ?></div>
                    <div class="col-sm-2"><?php echo $row["publisher_name"] ?></div>
                    <div class="col-sm-2"><?php echo number_format($row["sold_price"], 0, ",", ".") ?></div>
                    <div class="col-sm-2"><input type='text' name='Wine<?php echo $key ?>' value='<?php echo $row["quantity"] ?>' size='5' style='text-align:center;' maxlength='3'/></div>
                    <div class="col-sm-2"><?php echo number_format($row["sold_price"] * $row["quantity"], 0, ",", ".") ?></div>
                    <div class="col-sm-1"><a onclick='return confirmDelete()' href="./cart/del/<?php echo $key ?>"><span class="fa fa-remove"></span></a></div>
                                
                    </div>             
                <?php
                        $total += $row["sold_price"] * $row["quantity"];
                    }
                    echo "<div class='row'><div class='col-sm-12' align='right'>
                          <label>Total</label>: <span class='price'>"
                          .number_format($total, 0, ",", ".") . "</span> VND</div></div>";
                } else {
                    echo "<div class='row'><div class='col-sm-12'>There are not any wine in cart</div></div>";
                }
                ?>
    <div class='row'>
        <div class='col-sm-12' align="center">
            <input type="submit" value="Accept and check out" name="btnYes" id="btnXoa" class="InputButton"/>
        </div>
    </div>
</form>
</div>