<meta charset="UTF-8" />
<?php
  $rep_ans_num=$_GET['num'];

  // database connect
  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
  $sql="delete from portfolio_ans where PORTFOLIO_ANS_num=$rep_ans_num";
  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('삭제가 완료되었습니다.');
      history.go(-1);
    </script>
    ";
?>