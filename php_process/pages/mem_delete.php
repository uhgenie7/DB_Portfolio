<meta charset="UTF-8" />
<?php
  $mem_num=$_GET['num'];

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php";
  $sql="delete from portfolio_mem where PORTFOLIO_mem_num=$mem_num";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/db-portfolio/pages/admin/admin.php';
    </script>
  ";
?>