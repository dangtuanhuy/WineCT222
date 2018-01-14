<?php
define(ROOT_PATH, dirname(dirname(__DIR__)));
include(ROOT_PATH."/library/connect.php");
?>
<meta charset="utf-8" />

<script language="javascript">
function deleteConfirm(){
    if(confirm("Are you sure want to delete?")){
        return true;
    }
    else {
        return false;
    }
}
</script>

<?php
if (isset($_GET['id']))
{
    $WineId = $_GET['id'];
    $sql = "SELECT `WineName` FROM `wine` WHERE WineId = $WineId";
    $rs = mysql_query($sql);
    $row = mysql_fetch_array($rs);
    $name = $row[0];
}   
else 
{
    echo '<meta http-equiv="refresh" content="0: URL=./admin/wine/"/>';
}

if(isset($_POST['btnUpload']))
{
  $wineId = $_POST['txtId'];
  $file = $_FILES['fileToUpload'];
  // check if file is image
  // determine the size of supported given image
  // return an array up to 7 elements
  if (is_array(getimagesize($file['tmp_name'])))
  {
      if ($file['size'] <= 5*1024*1024 ) // maximum file size 5MB
      {
          list($width, $height) = getimagesize($file['tmp_name']);
          $ratio = $height / $width;
          if ($ratio < 1.5) {
              // new width 50(this is in pixel format)
              $nw = 200;
              $nh = ceil( $ratio * $nw );
              $dst = imagecreatetruecolor( $nw, $nh );
            
              $ext = pathinfo($file['name'], PATHINFO_EXTENSION); // Get file extension
              $file_name = $wineId."_".random_name().".".$ext;
              copy($file['tmp_name'], ROOT_PATH."/public/images/products/".$file_name);
              $cmd = "INSERT INTO imgwine (ImgWine, WineId) values('$file_name', '$wineId')";
              $rs = mysql_query($cmd);
              if($rs)
              {
                  echo "<script>alert('Upload successful...');</script>";
              }
              else 
              {
                  echo "<script>alert('Upload failed...');</script>";
                  echo '<meta http-equiv="refresh" content="0;URL=/AppWine/admin/wine/image/'.$wineId.'">';
              }
          }
          else {
            ////////// Croppie Javascript
            echo "Please choose other image has lower ratio";
          }
      }
      else
      {
          echo "hình có kích thước quá lớn";
      }
  }
  else
  {
      echo "Hình không đúng định dạng";
  } 
}

if(isset($_GET["del"]))
{
    $Imageid = $_GET["del"];
    $result= mysql_query("SELECT * FROM imgwine WHERE ImgWineId=$Imageid ");
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $fileDelete = $row['ImgWine'];
    $WineId = $row['WineId'];
    unlink(ROOT_PATH."/public/images/products/".$fileDelete);
    mysql_query("DELETE FROM imgwine WHERE ImgWineId=$Imageid");
    echo '<meta http-equiv="refresh" content="0; URL=/AppWine/admin/wine/image/'.$WineId.'"/>';
}
?>

<?php 
// Genarate file name
function random_name() {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
    // string length = 10
    for ($i = 0; $i < 10; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
?>

<h2>Manage IMG</h2>
<div class="container">
    <form  id="frmHinhAnh" class="form-horizontal" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Wine ID (*):  </label>
            <div class="col-sm-10">
                <input type="text" name="txtId" id="txtId" class="form-control" placeholder="Wine Id" value='<?php echo $WineId; ?>' readonly="readonly"/>
            </div>
        </div>  
        <div class="form-group">    
            <label for="txtTen" class="col-sm-2 control-label">Wine Name (*):  </label>
            <div class="col-sm-10">
                <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $name; ?>' readonly="readonly"/> 
            </div>
        </div>    
        <div class="form-group">    
            <label for="" class="col-sm-2 control-label">IMG (*):  </label>
            <div class="col-sm-10">
                <input type="file" accept=".jpg, .png, .jpeg, .gif" name="fileToUpload" id="fileToUpload" class="form-control" /><br/>
                <input type="submit" class="btn btn-primary" name="btnUpload" value="Upload Image"/>    
            </div>
        </div>       
        
        <!--Danh sach hinh anh-->
        <div class="col-sm-offset-2 col-sm-12">
          <div class="row">
            <div class="col-sm-1">
                <label class="control-label">Num</label>
            </div>
            <div class="col-sm-2">
                <label class="control-label">IMG</label>
            </div>
            <div class="col-sm-1">
                <label class="control-label">Delete</label>
            </div>
          </div>
        </div> <!-- <div class="col-sm-offset-2 col-sm-12">1 hang bang hinh anh-->
            <!--Row du lieu-->
            <?php
            $query = "SELECT ImgWineId, ImgWine FROM imgwine WHERE WineId=".$WineId;
            $result = mysql_query($query);
            $num = 1;
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){  
                $id = $row['id'];
            ?>
                <div class='col-sm-offset-2 col-sm-12'>
                    <div class="row">

                    <div class='col-sm-1'>
                        <?php echo $num; ?>
                    </div>
                    <div class='col-sm-2'>
                        <img src="public/images/products/<?php echo $row['ImgWine']; ?>" width="100px"/>
                    </div>
                    <div class='col-sm-3'>
                        <a onclick="return deleteConfirm()" 
                        href='./admin/wine/image/<?php echo $WineId ?>/delete/<?php echo $row['ImgWineId']; ?>'>
                        <i class="fa fa-remove"></i></a>
                    </div>
                    
                </div>
                <div class='col-sm-offset-2 col-sm-4'>
                    <div><hr /></div>
                </div>
              </div>
                <?php
                $num++;
            }
            ?>

            <div class="col-sm-offset-2 col-sm-12">
                <div class="col-sm-1">
                    <a class="btn btn-primary" href="./admin/wine/"> Back</a>
                </div>
            </div>
                
    </form>
</div>
