<meta charset="UTF-8" />
<?php
  $app_title = nl2br($_REQUEST['app_title']);
  $app_title = addslashes($app_title);
  $app_serial = $_REQUEST['app_serial'];
  $app_client = $_REQUEST['app_client'];
  $app_desc = nl2br($_REQUEST['app_desc']);
  $app_desc = addslashes($app_desc);
  $app_day = date("Y-m-d");

  
  $img_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/db-portfolio/data/app_page/app_main/';
  $thumb_upload_dir=$_SERVER['DOCUMENT_ROOT'].'/db-portfolio/data/app_page/app_thumb/';

  //main image
  $main_name = $_FILES['app_main']['name'];
  $main_tmp_name=$_FILES['app_main']['tmp_name'];
  $main_error=$_FILES['app_main']['error'];

  //sub image
  $sub_name = $_FILES['app_sub']['name'];
  $sub_tmp_name=$_FILES['app_sub']['tmp_name'];
  $sub_error=$_FILES['app_sub']['error'];

  // echo
  // $app_title,
  // $app_serial,
  // $app_client,
  // $app_desc,
  // $app_day,
  // $main_name,
  // $sub_name;

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
    $uploaded_sub_file=$thumb_upload_dir.$sub_name;
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

     //database connect
     include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
     $sql="insert into portfolio_app(
       PORTFOLIO_APP_tit,
       PORTFOLIO_APP_ser,
       PORTFOLIO_APP_cli,
       PORTFOLIO_APP_des,
       PORTFOLIO_APP_reg,
       PORTFOLIO_APP_img,
       PORTFOLIO_APP_thumb) values(
         '$app_title',
         '$app_serial',
         '$app_client',
         '$app_desc',
         '$app_day',
         '$main_name',
         '$sub_name')";
         mysqli_query($dbConn, $sql);

        $sql="select*from portfolio_app order by PORTFOLIO_APP_num desc";

        $app_result=mysqli_query($dbConn, $sql);

        $arr_result=array();

      while($app_row=mysqli_fetch_array($app_result)){
        array_push($arr_result, array(
          'appnum'=>$app_row['PORTFOLIO_APP_num'],
          'apptitle'=>$app_row['PORTFOLIO_APP_tit'],
          'appser'=>$app_row['PORTFOLIO_APP_ser'],
          'appdes'=>$app_row['PORTFOLIO_APP_des'],
          'appmain'=>$app_row['PORTFOLIO_APP_img'],
          'appthumb'=>$app_row['PORTFOLIO_APP_thumb'],
          'appclient'=>$app_row['PORTFOLIO_APP_cli'],
          'appreg'=>$app_row['PORTFOLIO_APP_reg']
        ));
      }

 // make json file
  file_put_contents($_SERVER["DOCUMENT_ROOT"]."/db-portfolio/data/json/app.json", json_encode($arr_result, JSON_PRETTY_PRINT));
  // file_put~ 이기 때문에 0번째에 경로를 지정해주면 파일을 알아서 만들어주는 메서드

  echo "
  <script>
    location.href='/db-portfolio/pages/app/app.php';
  </script>
  ";
?>