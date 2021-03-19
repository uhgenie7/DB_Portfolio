<meta charset="UTF-8" />
<?php
  $delete_num=$_REQUEST['num'];

  include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php";
  $sql="delete from portfolio_app where PORTFOLIO_APP_num=$delete_num";

  mysqli_query($dbConn, $sql);

  // JSON 재갱신
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
      alert('삭제가 완료되었습니다.');
      location.href='/db-portfolio/pages/app/app.php';
    </script>
  ";
?>