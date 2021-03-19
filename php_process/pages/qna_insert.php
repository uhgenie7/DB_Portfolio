<meta charset="UTF-8" />
<?php
  $qna_id=$_GET['id'];
  $qna_title=nl2br($_POST['qnaTitle']);
  $qna_title=addslashes($qna_title);
  $qna_txt=nl2br($_POST['qnaTxt']);
  $qna_txt=addslashes($qna_txt);
  $qna_reg=date("Y-m-d");
  $qna_hit=0;

  // database connect
  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  $sql="insert into portfolio_qna(
    PORTFOLIO_QNA_id,
    PORTFOLIO_QNA_tit,
    PORTFOLIO_QNA_con,
    PORTFOLIO_QNA_reg,
    PORTFOLIO_QNA_hit
  ) values('$qna_id','$qna_title','$qna_txt','$qna_reg','$qna_hit')";
  mysqli_query($dbConn, $sql);

  echo "
    <script>
      location.href='/db-portfolio/pages/qna/qna.php';
    </script>
    ";
?>