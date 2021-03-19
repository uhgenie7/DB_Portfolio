<meta charset="UTF-8" />
<?php
  $ans_qna_num=$_GET['num'];
  $ans_con=$_POST['ansInputTxt'];
  $ans_con=addslashes($ans_con);
  $ans_reg=date("Y-m-d");

  // echo $ans_qna_num, $ans_con, $ans_reg;

  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
  $sql="insert into portfolio_ans(
    PORTFOLIO_ANS_QNA_num,
    PORTFOLIO_ANS_con,
    PORTFOLIO_ANS_reg) values(
      '$ans_qna_num',
      '$ans_con',
      '$ans_reg')";
      mysqli_query($dbConn, $sql);

      echo "
    <script>
    alert('답변 등록이 완료되었습니다.');
      location.href='/db-portfolio/pages/qna/qna.php';
    </script>
    ";
?>