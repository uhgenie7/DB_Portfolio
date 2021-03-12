<?php
  $devel_title = nl2br($_REQUEST['devel_title']);
  $devel_title = addslashes($devel_title);
  
  $devel_serial = $_REQUEST['devel_serial'];
  $devel_client = $_REQUEST['devel_client'];
  
  $devel_desc = nl2br($_REQUEST['devel_desc']);
  $devel_desc = addslashes($devel_desc);

  $regist_day = date("Y-m-d");


  $img_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/gold/data/devel_page/';
  $thumb_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/gold/data/devel_page/thumb/';


  //main image
  $main_name = $_FILES['main']['name'];
  $main_tmp_name=$_FILES['main']['tmp_name'];
  $main_error=$_FILES['main']['error'];

  //sub image
  $sub_name = $_FILES['sub']['name'];
  $sub_tmp_name=$_FILES['sub']['tmp_name'];
  $sub_error=$_FILES['sub']['error'];

  //thumb image
  $thumbnail_name = $_FILES['thumbnail']['name'];
  $thumbnail_tmp_name=$_FILES['thumbnail']['tmp_name'];
  $thumbnail_error=$_FILES['thumbnail']['error'];

  //main image upload
  if($main_name && !$main_error) {
    $uploaded_main_file = $img_upload_dir.$main_name;

    if(!move_uploaded_file($main_tmp_name, $uploaded_main_file)){
      echo "
        <script>
          alert('메인사진이 업로드되지 않았습니다.');
        </script>
      ";
      exit;
    }
  } else {
    $main_name="";
  }

  //sub image upload
  if($sub_name && !$sub_error) {
    $uploaded_sub_file=$img_upload_dir.$sub_name;
    if(!move_uploaded_file($sub_tmp_name, $uploaded_sub_file)){
      echo "
        <script>
          alert('서브사진이 업로드되지 않았습니다.');
        </script>
      ";
      exit;
    }
  } else {
    $sub_name="";

  }

    //thumbnail image upload
    if($thumbnail_name && !$thumbnail_error) {
      $uploaded_thumbnail_file=$thumb_upload_dir.$thumbnail_name;
      if(!move_uploaded_file($thumbnail_tmp_name, $uploaded_thumbnail_file)){
        echo "
          <script>
            alert('썸네일사진이 업로드되지 않았습니다.');
          </script>
        ";
        exit;
      }
    } else {
      $thumbnail_name="";
  
    }

    //database connect
    include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
    $sql="insert into gold_de(
    GOLD_DE_tit, 
    GOLD_DE_ser, 
    GOLD_DE_des, 
    GOLD_DE_img1, 
    GOLD_DE_img2, 
    GOLD_DE_thumb, 
    GOLD_DE_cli, 
    GOLD_DE_reg) values(
      '$devel_title',
      '$devel_serial',
      '$devel_desc',
      '$main_name',
      '$sub_name',
      '$thumbnail_name',
      '$devel_client',
      '$regist_day')";

  mysqli_query($dbConn, $sql);


  echo "
    <script>
      location.href='/gold/pages/devel/devel.php';
    </script>
    ";

?>