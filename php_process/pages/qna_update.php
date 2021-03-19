<meta charset="UTF-8" />
<?php
  $update_num=$_GET['num'];
  $update_title=$_POST['ansTitle'];
  $update_con=$_POST['ansTxt'];
  $update_reg=date("Y-m-d");

  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  // 데이터 수정 sql문 https://inforyou.tistory.com/23
  $sql="UPDATE portfolio_qna SET 
  PORTFOLIO_QNA_tit='$update_title', 
  PORTFOLIO_QNA_con='".addslashes($update_con)."', 
  PORTFOLIO_QNA_reg='$update_reg' WHERE PORTFOLIO_QNA_num = '$update_num'";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
    alert('수정이 완료되었습니다.');
      location.href='/db-portfolio/pages/qna/qna.php';
    </script>
    ";
?>