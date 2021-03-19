<?php
  $web_detail_num=$_GET['num'];
  // 물음표 뒤에 있는 키의 이름을 저장하면 그 값을 출력함.
  // echo "get 변수".$de_detail_num;

  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';

  $sql="select * from portfolio_web where PORTFOLIO_WEB_num=$web_detail_num";

  $result=mysqli_query($dbConn, $sql);
  $row=mysqli_fetch_array($result);

  $web_detail_tit=$row['PORTFOLIO_WEB_tit'];
  $web_detail_ser=$row['PORTFOLIO_WEB_ser'];
  $web_detail_des=$row['PORTFOLIO_WEB_des'];
  $web_detail_img=$row['PORTFOLIO_WEB_img'];
  $web_detail_mo=$row['PORTFOLIO_WEB_mo'];
  $web_detail_thumb=$row['PORTFOLIO_WEB_thumb'];
  $web_detail_cli=$row['PORTFOLIO_WEB_cli'];
  $web_detail_reg=$row['PORTFOLIO_WEB_reg'];
  $web_detail_dom=$row['PORTFOLIO_WEB_dom'];
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

      <section class="contents webDetail deWeDetail">
        <div class="center clear">
          <div class="webLeft deWeLeft">
            <!-- title width common style -->
            <div class="title">
              <h2><?=$web_detail_tit?></h2>
              <div class="linkBox">
                <span class="line"></span>
              </div>
            </div>
            <!-- end of common title -->
            <div class="detailCon">
              <div class="webTabBtns">
                <button type="button">PC</button>
                <button type="button">MOBILE</button>
                <div class="webBox webTab">
                  <div class="webPcFrame">
                    <div class="webMainImg">
                      <img src="/db-portfolio/data/web_page/pc/<?=$web_detail_img?>" alt="" class="scrollUp">
                    </div>
                    <img src="/db-portfolio/img/mac_frame.png" alt="">
                  </div>
                </div>
              </div>
              <!-- end of pc web box -->
                <div class="webBox_m webTab">
                  <div class="webMobileFrame">
                    <div class="webMainImg_m">
                      <img src="/db-portfolio/data/web_page/mobile/<?=$web_detail_mo?>" alt="" class="scrollUp_m">
                    </div>
                    <img src="/db-portfolio/img/iphone_frame.png" alt="">
                  </div>
                </div>
                <!-- end of mobile web box -->
                <!-- start -->
                <p class="detailInfo">
                Projected By DB Portfolio devel / <?=$web_detail_ser?> / Used in <?=$web_detail_cli?> / <?=$web_detail_reg?>
                </p>
                <div class="detailDesc">
                  <p><?=$web_detail_des?></p>
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
                  <button type="button" onclick="location.href='/db-portfolio/pages/admin/update_devel.php?key=web_update_form&num=<?=$web_detail_num?>'">수정</button>
                  <button type="button" onclick="confirmDel()">삭제</button>
              </div>
              <?php
              }
              ?>
            </div>
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
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/web_detail.js"></script>
    <script>
              function confirmDel(){
                let confirmCheck = confirm('정말로 삭제하시겠습니까?')
                if(confirmCheck == false){
                  return false;
                } else {
                  location.href='/db-portfolio/php_process/pages/web_detail_delete.php?num=<?=$web_detail_num?>';
                }            
              }
    </script>
  </body>
</html>