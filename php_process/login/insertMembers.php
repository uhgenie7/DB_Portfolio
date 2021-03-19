<?php 
  $member_id = $_POST['id'];
  $name = $_POST['name'];
  $member_pass = $_POST['pass'];
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];

  $email = $email1."@".$email2;
  // .은 js의 +와 같다

  date_default_timezone_set('Asia/Seoul');
  $regist_day = date("Y-m-d H:i:s");
  $level = 9;
  $point = 0;

  // echo $input_id, $name, $pass, $email, $regist_day, $level, $point;

  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  $sql="insert into portfolio_mem(
    PORTFOLIO_mem_id, 
    PORTFOLIO_mem_name, 
    PORTFOLIO_mem_email, 	
    PORTFOLIO_mem_pass, 
    PORTFOLIO_mem_regi_day, 
    PORTFOLIO_mem_level, 
    PORTFOLIO_mem_point
    )values('$member_id','$name','$email','$member_pass','$regist_day','$level','$point')";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      location.href='/db-portfolio/index.php';
    </script>
  ";
?>