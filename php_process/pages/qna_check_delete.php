<meta charset="UTF-8" />
<?php
  // echo $_POST['item'][0];
  if(!isset($_POST['item'])){
    echo  "
    <script>
      alert('삭제할 게시글을 선택해주세요.');
      history.go(-1);
    </script>
    ";
  } else {
    // database connect
    include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

    for($i=0; $i<count($_POST['item']); $i++){
      $check_num=$_POST['item'][$i];
      $sql="delete from portfolio_qna where PORTFOLIO_QNA_num=$check_num";
      mysqli_query($dbConn, $sql);
    }
    
    echo  "
    <script>
      alert('삭제되었습니다.');
      location.href='/db-portfolio/pages/admin/admin.php';
    </script>
    ";
  }
?>