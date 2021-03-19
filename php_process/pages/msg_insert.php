<meta charset="UTF-8" />
<?php
 $msg_name = $_POST['msgName'];
 $msg_email = $_POST['msgEmail'];
 $msg_title = $_POST['msgTit'];
 $msg_title = addslashes($msg_title);
 $msg_txt = $_POST['msgTxt'];
 $msg_txt = addslashes($msg_txt);
 $regist_day = date("Y-m-d H:i:s");

 echo $msg_name, $msg_email, $msg_title, $msg_txt, $regist_day;

 include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
  $sql="insert into portfolio_msg(
    PORTFOLIO_MSG_name,
    PORTFOLIO_MSG_email,
    PORTFOLIO_MSG_tit,
    PORTFOLIO_MSG_con,
    PORTFOLIO_MSG_reg) values(
      '$msg_name',
      '$msg_email',
      '$msg_title',
      '$msg_txt',
      '$regist_day')";
      mysqli_query($dbConn, $sql);

      echo "
    <script>
    alert('메시지가 전송되었습니다.');
      location.href='/db-portfolio/index.php';
    </script>
    ";
?>