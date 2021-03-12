<?php
  $devel_detail_num=$_GET['num'];

  include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';

  $sql="select * from gold_de where GOLD_DE_num=$devel_detail_num";

  $result=mysqli_query($dbConn, $sql);
  $row=mysqli_fetch_array($result);

  $devel_detail_tit=$row['GOLD_DE_tit'];
  $devel_detail_ser=$row['GOLD_DE_ser'];
  $devel_detail_des=$row['GOLD_DE_des'];
  $devel_detail_img1=$row['GOLD_DE_img1'];
  $devel_detail_img2=$row['GOLD_DE_img2'];
  $devel_detail_thumb=$row['GOLD_DE_thumb'];
  $devel_detail_cli=$row['GOLD_DE_cli'];
  $devel_detail_reg=$row['GOLD_DE_reg'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gold</title>

    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- main style css link -->
    <link rel="stylesheet" href="/gold/css/style.css" />

    <!-- devel css link -->
    <link rel="stylesheet" href="/gold/css/devel_web_app.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/gold/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/gold/css/media.css" />
  </head>
  <body>
    <div class="wrap"> 
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>
      <section class="contents develDetail deWeDetail">
        <div class="center clear">
          <div class="develLeft deWeLeft">
            <!-- title width common style -->
            <div class="title">
              <h2><?=$devel_detail_tit?></h2>
              <div class="linkBox">
                <span class="line"></span>
              </div>
            </div>
            <!-- end of common title -->
            <div class="detailCon">
              <div class="detailImg1 clear">
                <div class="imgBox">
                  <img src="/gold/data/devel_page/<?=$devel_detail_img1?>" alt="">
                </div>
                <div class="imgBox">
                  <img src="/gold/data/devel_page/<?=$devel_detail_img2?>" alt="">
                </div>
                <div class="imgNav">
                  <a href="#" class="active">
                    <img src="/gold/data/devel_page/<?=$devel_detail_img1?>" alt="">
                    <span class="dotOverlay"></span>
                  </a>
                  <a href="#"><img src="/gold/data/devel_page/<?=$devel_detail_img2?>" alt="">
                  <span class="dotOverlay"></span>
                  </a>
                </div>
              </div>
              <p class="detailInfo">
                develed By Gold devel Team / <?=$devel_detail_ser?> / Used in <?=$devel_detail_cli?> / <?=$devel_detail_reg?>
              </p>

              <div class="detailDesc">
                <p><?=$devel_detail_des?></p>
                <a href="/gold/index.php#contact"><i class="fa fa-arrow-right"></i>Get In Touch With...</a>
              </div>

              <?php
                if($userlevel!=1){
              ?>
                <input type="hidden">   
              <?php
                }else{
              ?>
              
                <div class="develAdminBtns">
                  <button type="button" onclick="location.href='/gold/pages/admin/update_devel.php?key=devel_update_form&num=<?=$devel_detail_num?>'">수정</button>
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
                  location.href='/gold/php_process/pages/devel_detail_delete.php?num=<?=$devel_detail_num?>';
                }            
              }
            </script>
            <!-- end of devel contents -->
          </div>
          <!-- end of left box -->
          <div class="develRight deWeRight">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/web_side_detail.php" ?>
            <!-- end of detail web -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/app_side_detail.php" ?>
            <!-- end of detail app -->
          </div>
          <!-- end of right box -->
        </div>
        
          <!-- end of center -->
      </section>
  
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script>
      $(function(){
        $(".imgNav>a").click(function(e){
          e.preventDefault();
          let index = $(this).index();
          $(".imgNav>a").removeClass("active");
          $(this).addClass("active");
          $(".imgBox").hide();
          $(".imgBox").eq(index).show();
        });
        $(".imgNav>a").eq(0).trigger("click");

        //cut right side text
        const cutTxtBox=$(".webLinks, .appLinks");
        // console.log(cutTxtBox);
        for(let i=0; i<cutTxtBox.length; i++){
          let allTxt=cutTxtBox.eq(i).find("em").text();
          // console.log(allTxt);
          cutTxtBox.eq(i).find("em").text(allTxt.substr(0, 60)+'...');
        }
      });

    </script>
  </body>
</html>