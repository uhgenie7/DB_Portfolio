<?php
  
  $login_id = $_POST['loginId'];
  $login_pass = $_POST['loginPass'];


  echo $login_id, $login_pass;

  // 데이터베이스 접속 후 조회 결과 회수
  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  // PORTFOLIO_mem_id 컬럼 데이터가 $login_id 입력 데이터와 같은 값 조회
  $sql = "select * from portfolio_mem where PORTFOLIO_mem_id='$login_id'";

  $result = mysqli_query($dbConn, $sql);
  $num_match = mysqli_num_rows($result);

  // mysqli_fetch_array()
  // $row = mysqli_fetch_array($result);
  // $db_pass = $row['PORTFOLIO_mem_pass'];
  // $db_name = $row['PORTFOLIO_mem_name'];

  // echo $db_pass, $db_name;

  if(!$num_match){
    echo "
      <script>
        alert('등록되지 않은 아이디입니다.');
        history.go(-1);
      </script>
    ";
  } else {
    $row = mysqli_fetch_array($result);
    $db_pass = $row['PORTFOLIO_mem_pass'];

    if($login_pass != $db_pass){
      echo "
      <script>
        alert('비밀번호가 틀립니다.');
        history.go(-1);
      </script>
    ";
    } else {
      session_start();
      $_SESSION["userid"]=$row['PORTFOLIO_mem_id'];
      $_SESSION["userpoint"]=$row['PORTFOLIO_mem_point'];
      $_SESSION["userlevel"]=$row['PORTFOLIO_mem_level'];

      
      echo "
        <script>
          location.href='/db-portfolio/index.php';
        </script>
      ";
    }
  }
?>