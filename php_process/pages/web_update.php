<meta charset="UTF-8" />
<?php
    $web_update_num=$_GET['num'];
    $web_title = nl2br($_REQUEST['web_title']);
    $web_title = addslashes($web_title);
    $web_serial = $_REQUEST['web_serial'];
    $web_client = $_REQUEST['web_client'];
    $web_domain = $_REQUEST['web_domain'];
    $web_desc = nl2br($_REQUEST['web_desc']);
    $web_desc = addslashes($web_desc);
    $regist_day = date("Y-m-d");

    // web page image upload directory
    $img_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/db-portfolio/data/web_page/pc/';
    $mobile_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/db-portfolio/data/web_page/mobile/';
    $thumb_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/db-portfolio/data/web_page/thumb/';

    //main image
    $main_name = $_FILES['main']['name'];
    // $~=$_files['가져오는 name값']['name']
    $main_tmp_name=$_FILES['main']['tmp_name'];
    $main_error=$_FILES['main']['error'];

    //sub image
    $mobile_name = $_FILES['mobile']['name'];
    $mobile_tmp_name=$_FILES['mobile']['tmp_name'];
    $mobile_error=$_FILES['mobile']['error'];

    //thumb image
    $thumbnail_name = $_FILES['thumbnail']['name'];
    $thumbnail_tmp_name=$_FILES['thumbnail']['tmp_name'];
    $thumbnail_error=$_FILES['thumbnail']['error'];

    // echo $web_title, 
    // $web_serial, 
    // $web_client, 
    // $web_domain, 
    // $web_desc, 
    // $main_name,
    // $mobile_name,
    // $thumbnail_name,
    // $regist_day;

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

  //mobile image upload
  if($mobile_name && !$mobile_error) {
    $uploaded_mobile_file=$mobile_upload_dir.$mobile_name;
    if(!move_uploaded_file($mobile_tmp_name, $uploaded_mobile_file)){
      echo "
        <script>
          alert('모바일사진이 업로드되지 않았습니다.');
        </script>
      ";
      exit;
    }
  } else {
    $mobile_name="";

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
    include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

    $sql="update portfolio_web set PORTFOLIO_WEB_tit='$web_title', PORTFOLIO_WEB_ser='$web_serial', PORTFOLIO_WEB_des='$web_desc', PORTFOLIO_WEB_img='$main_name', PORTFOLIO_WEB_mo='$mobile_name', PORTFOLIO_WEB_thumb='$thumbnail_name', PORTFOLIO_WEB_cli='$web_client', PORTFOLIO_WEB_reg='$regist_day', PORTFOLIO_WEB_dom='$web_domain' where PORTFOLIO_WEB_num='$web_update_num'";
    
    mysqli_query($dbConn, $sql);

    echo "
    <script>
      location.href='/db-portfolio/pages/web/web.php';
    </script>
    ";
?>