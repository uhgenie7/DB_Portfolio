<?php 
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['userlevel']);


  echo "
    <script>
      location.href='/db-portfolio/index.php';
    </script>
  "
?>