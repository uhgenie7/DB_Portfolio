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

      <section class="contents web hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>WEBSITE PROJECTS</h2>
            <div class="subTit">
              <span class="subLine"></span>
            </div>
          </div>
          <!-- end of contact title -->

          <div class="webBoxes deWeBoxes">

            <?php
              include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
              $sql="select * from portfolio_web order by PORTFOLIO_WEB_num desc";
              // desc : 역순
              
              $web_result=mysqli_query($dbConn, $sql);

              while($web_row=mysqli_fetch_array($web_result)){
                $web_num=$web_row['PORTFOLIO_WEB_num'];
                $web_thumb_path=$web_row['PORTFOLIO_WEB_thumb'];
                $web_title=$web_row['PORTFOLIO_WEB_tit'];
                $web_desc=$web_row['PORTFOLIO_WEB_des'];
                $web_domain=$web_row['PORTFOLIO_WEB_dom'];
            ?>

              <div class="webBox deWeBox">
                <div>
                  <p class="webImg deWeImg">
                    <img src="/db-portfolio/data/web_page/thumb/<?=$web_thumb_path?>" alt="">
                  </p>
                  <div class="webTxt deWeTxt">
                    <h2><?=$web_title?></h2>
                    <em class="cutTxt"><?=$web_desc?></em>
                  </div>
                  <div class="webBoxBtns">
                    <a href="/db-portfolio/pages/web/web_detail.php?num=<?=$web_num?>">View Details</a>
                    <a href="<?=$web_domain?>" target="_blank">View Website</a>
                  </div>
                </div>
              </div>

            <?php
              }
            ?>

          </div>
          <!-- end of loop web box -->

          <div class="btns">

          <?php
            if($userlevel == 1){
          ?>
            <a href="#" class="commonBtn webLoadMore">Loard More</a>
            <a href="#" class="commonBtn toTop">Go To Top</a>
            <a href="/db-portfolio/pages/web/web_input_form.php" class="commonBtn">Upload Contents</a>
          </div>

          <?php
            } else {
          ?>  
            <a href="#" class="commonBtn webLoadMore">Loard More</a>
            <a href="#" class="commonBtn toTop">Go To Top</a>
          <?php
            }
          ?>
        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src=/db-portfolio/js/web_devel_page.js></script>

  </body>
</html>