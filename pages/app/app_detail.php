<?php

  $app_detail_num=$_GET['num'];

  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  $sql="select * from portfolio_app where PORTFOLIO_APP_num=$app_detail_num";

  $result=mysqli_query($dbConn, $sql);
  $row=mysqli_fetch_array($result);

  $app_detail_tit=$row['PORTFOLIO_APP_tit'];
  $app_detail_ser=$row['PORTFOLIO_APP_ser'];
  $app_detail_des=$row['PORTFOLIO_APP_des'];
  $app_detail_img=$row['PORTFOLIO_APP_img'];
  $app_detail_thumb=$row['PORTFOLIO_APP_thumb'];
  $app_detail_cli=$row['PORTFOLIO_APP_cli'];
  $app_detail_reg=$row['PORTFOLIO_APP_reg'];


  // echo $devel_detail_tit, $devel_detail_ser, $devel_detail_des, $devel_detail_img1, $devel_detail_img2,  $devel_detail_thumb, $devel_detail_cli, $devel_detail_reg;

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DB Portfolio</title>

    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- light slider plugin link -->
    <link rel="stylesheet" href="/db-portfolio/plugin/lightslider.css" />


    <!-- main style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/style.css" />

    <!-- devel css link -->
    <link rel="stylesheet" href="/db-portfolio/css/devel_web_app.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/db-portfolio/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/media.css" />
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/header.php" ?>

      <section class="contents appDetail deWeDetail">
        <div class="center clear">
          <div class="appLeft deWeLeft">
            <!-- title width common style -->
            <div class="title">
              <h2><?=$app_detail_tit?></h2>
              <div class="linkBox">
                <span class="line"></span>
              </div>
            </div>
            <!-- end of common title -->
            <div class="detailCon">
              <div class="appFramebox">
                <ul id="appMain">
                  <li><img src="/db-portfolio/data/app_page/app_main/<?=$app_detail_img?>" alt=""></li>
                  <li><img src="/db-portfolio/data/app_page/app_main/app_main_002.jpg" alt=""></li>
                  <li><img src="/db-portfolio/data/app_page/app_main/app_main_003.png" alt=""></li>
                </ul>
                <span class="frameTop"></span>
                <span class="frameLeft"></span>
                <span class="frameRight"></span>
                <span class="frameBottom"></span>
              </div>
              <div class="appStoreBtns">
                <a href="#"><img src="/db-portfolio/img/app_store.jpg" alt=""></a>
                <a href="#"><img src="/db-portfolio/img/google_play.jpg" alt=""></a>

              </div>

              <p class="detailInfo">
                Projected By DB Portfolio devel / <?=$app_detail_ser?> / Used in <?=$app_detail_cli?> / <?=$app_detail_reg?>
                </p>

              <div class="detailDesc">
                <p><?=$app_detail_des?></p>
                <a href="/db-portfolio/index.php#contact"><i class="fa fa-arrow-right"></i>Get In Touch With...</a>
              </div>

              <?php
                if($userlevel!=1){
              ?>
                <input type="hidden">   
              <?php
                }else{
              ?>
                <div class="develAdminBtns">
                  <button type="button" onclick="location.href='/db-portfolio/pages/admin/update_devel.php?key=app_update_form&num=<?=$app_detail_num?>'">수정</button>
                  <button type="button" onclick="confirmDel()">삭제</button>
              </div>
              <?php
              }
              ?>
              
            </div>
            <script>
              function confirmDel(){
                let confirmCheck = confirm('정말로 삭제하시겠습니까?')
                if(confirmCheck == false){
                  return false;
                } else {
                  location.href='/db-portfolio/php_process/pages/app_detail_delete.php?num=<?=$app_detail_num?>';
                }            
              }
            </script>
            <!-- end of devel contents -->
          </div>
          <!-- end of left box -->
          <div class="develRight deWeRight">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/web_side_detail.php" ?>
            <!-- end of detail web -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/app_side_detail.php" ?>
            <!-- end of detail app -->
          </div>
          <!-- end of right box -->
        </div>
          <!-- end of center -->
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/plugin/lightslider.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/web_detail.js"></script>

    <script>
      $(function(){
        // lightslider 옵션 참조 : http://sseung-fire.tistory.com/18
        $("#appMain").lightSlider({
          loop:true,
          keyPress:true,
          item:1,
          auto: true,
          speed: 500,
          onSliderLoad: function(){
            $(".ISAction").css({display:"none"});
          }
      });
    });
    </script>
  </body>
</html>