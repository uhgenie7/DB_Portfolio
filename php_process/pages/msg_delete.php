<meta charset="UTF-8" />
<?php
  $msg_num=$_GET['num'];

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php";
  $sql="delete from portfolio_msg where PORTFOLIO_MSG_num=$msg_num";
  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/db-portfolio/pages/admin/admin.php';
    </script>
  ";

?>