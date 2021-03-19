<meta charset="UTF-8" />
<?php
  $mem_num=$_GET['num'];
  $mem_level=$_POST['level'];
  $mem_point=$_POST['point'];

  //database connect
  include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php";
  $sql="update portfolio_mem set PORTFOLIO_mem_level=$mem_level, PORTFOLIO_mem_point=$mem_point where PORTFOLIO_mem_num=$mem_num";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('수정이 완료되었습니다.');
      location.href='/db-portfolio/pages/admin/admin.php';
    </script>
  ";
?>