<?php

  session_start();
  if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
  } else {
    $userid='';
  }

  if(isset($_SESSION["userpoint"])){
    $userpoint=$_SESSION["userpoint"];
  } else {
    $userpoint='';
  }

  if(isset($_SESSION["userlevel"])){
    $userlevel=$_SESSION["userlevel"];
  } else {
    $userlevel='';
  }

  // echo $userlevel;

?>

<!-- top main section -->
<div class="topMain clear">
  <a href="/db-portfolio/index.php"><div class="bannerBox">
    <!-- <img src="img/banner.jpg" alt="" /> -->
    <span class="overlay"></span>
    <div class="slogan">
      <h2>DB <b>PORTFOLIO</b></h2>
      <hr />
      <p>작은 기록이 모여 하나되다</p>
    </div>
  </div></a>
  <div class="headerBox">
    <span class="overlay"></span>
  </div>
  <div class="loginWrap">
    <div class="logBox">

      <?php
        if(!$userid){
      ?>

        <a href="/db-portfolio/pages/login/login_form.php">LOGIN</a>
        <a href="/db-portfolio/pages/login/join_form.php">JOIN US</a>

      <?php 
        } else {
            if($userlevel == 1) {
      ?>
            <a href="/db-portfolio/php_process/login/logout.php">LOG OUT</a>
            <a href="/db-portfolio/pages/login/join_form.php"><?=$userid?>[<?=$userpoint?>]</a>
            <a href="/db-portfolio/pages/admin/admin.php">ADMIN</a>

          <?php
          } else {
          ?>

            <a href="/db-portfolio/php_process/login/logout.php">LOG OUT</a>
            <a href="/db-portfolio/pages/login/join_form.php"><?=$userid?>[<?=$userpoint?>]</a>

      <?php
          }
        }
      ?>
    </div>
  </div>
  <div class="gnb">
    <ul class="clear">
      <li class="active"><a href="/db-portfolio/index.php?key=0">HOME</a></li>
      <li><a href="/db-portfolio/pages/devel/devel.php">DEVELOPE</a></li>
      <li><a href="/db-portfolio/pages/web/web.php">WEB</a></li>
      <li><a href="/db-portfolio/pages/app/app.php">APP</a></li>
      <li><a href="/db-portfolio/pages/about.php">ABOUT</a></li>
      <li><a href="/db-portfolio/pages/qna/qna.php">Q&A</a></li>
    </ul>
    <div class="mobileMenu">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</div>
<!-- end of top main -->
<button class="content_top">↑</button>
<script>
  const pathname = window.location.pathname;
  const gnbLi = document.querySelectorAll('.gnb li');
  for(let i = 0; i < gnbLi.length; i++) {
    gnbLi[i].classList.remove('active');
  }

  if(pathname.includes('index')){
    gnbLi[0].classList.add('active');
  } else if(pathname.includes('devel')){
    gnbLi[1].classList.add('active');
  } else if(pathname.includes('web')){
    gnbLi[2].classList.add('active');
  } else if(pathname.includes('app')){
    gnbLi[3].classList.add('active');
  } else if(pathname.includes('qna')){
    gnbLi[5].classList.add('active');
  } else if(pathname.includes('about')){
    gnbLi[4].classList.add('active');
  } 
</script>