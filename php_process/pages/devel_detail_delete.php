<meta charset="UTF-8" />
<?php
  $delete_num=$_GET['num'];

  include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php";
  $sql="delete from portfolio_de where PORTFOLIO_DE_num=$delete_num";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      location.href='/db-portfolio/pages/devel/devel.php';
    </script>
  ";
?>