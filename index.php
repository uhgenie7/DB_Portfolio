<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Portfolio</title>
    <!-- font awesome link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- main style css link -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- animation css link -->
    <link rel="stylesheet" href="css/animation.css" />
    <!-- media query style css link -->
    <link rel="stylesheet" href="css/media.css" />
  </head>
  <body>
    <div class="wrap">
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>   
        <!-- new Project title -->
      <section class="contents newProject">
        <div class="center clear">
          <div class="title">
            <h2>NEW PROJECT</h2>
            <div class="linkBox">
              <span class="line"></span>
            </div>
          </div>
          <!-- end of new Project title -->
          <?php
            include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
          ?>
          <div class="newProjectBox">
            <div class="newProjectCon first">
              <img src="img/website_godiva.png" alt="godiva" />
              <span class="overlay"></span>
              <div class="newProjectTxt">
                <h2>GODIVA</h2>
                <em>Clone website</em>
              </div>
            </div>
            <div class="newProjectCon second">
              <img src="img/new-arrival-2.jpg" alt="" />
              <span class="overlay"></span>
              <div class="newProjectTxt">
                <h2>Portfolio-2021</h2>
                <em>Development</em>
              </div>
            </div>
            <div class="newProjectCon third">
              <img src="img/website_movie.jpg" alt="api_project" />
              <span class="overlay"></span>
              <div class="newProjectTxt">
                <h2>API_PROJECT</h2>
                <em>Development</em>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end of project section -->
      <section class="contents devel">
        <div class="center clear">
          <!-- title width common style -->
          <div class="title">
            <h2>DEVELOPMENT</h2>
            <div class="linkBox">
              <span class="line"></span>
            </div>
          </div>
          <!-- end of common title -->
          <div class="develBox clear">
            <div class="boxLeft">

              <?php
                $sql="select * from gold_de order by GOLD_DE_num desc limit 4";
                $result_devel=mysqli_query($dbConn, $sql);

                while($row_result=mysqli_fetch_array($result_devel)){
                  $devel_thumb=$row_result['GOLD_DE_thumb']
                  
              ?>

              <div class="develImg">
                <img src="/gold/data/devel_page/thumb/<?=$devel_thumb?>" alt="" />
                <span class="outline"><i class="fa fa-search"></i></span>
              </div>
              
              <?php
                }
              ?>

            </div>
            <div class="boxRight">

              <?php
                $sql="select * from gold_de order by GOLD_DE_num desc limit 4";
                $result_devel=mysqli_query($dbConn, $sql);
                while($row_result=mysqli_fetch_array($result_devel)){
                  $devel_num=$row_result['GOLD_DE_num'];
                  $devel_tit=$row_result['GOLD_DE_tit'];
                  $devel_des=$row_result['GOLD_DE_des'];
              ?>

              <div class="develTxt">
                <div>
                  <h2><?=$devel_tit?></h2>
                  <p><?=$devel_des?></p>
                  <a href="/gold/pages/devel/devel_detail.php?num=<?=$devel_num?>">view more</a>
                </div>
              </div>
              <!-- end of devel txt panel -->
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </section>
      <!-- end of devel section -->
      <section class="contents ours">
        <div class="center clear">
          <!-- title width common style -->
          <div class="title">
            <h2>WEB & APP</h2>
            <div class="linkBox">
              <span class="line"></span>
            </div>
          </div>
          <!-- end of common title -->

          <div class="fashionBox men">
            <div class="fashionTxt">
              <h2><em>WEB</em> PROJECTS</h2>
              <p>
                웹에 최적화된 프로젝트
              </p>
              <a href="/gold/pages/web/web.php">view more</a>
            </div>
            <!-- loop fasionImp start -->
            <?php
              include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
              $sql="select * from gold_web order by GOLD_WEB_num desc limit 3";

              $web_result=mysqli_query($dbConn, $sql);

              while($web_row=mysqli_fetch_array($web_result)){
                $web_num=$web_row['GOLD_WEB_num'];
                $web_thumb_path=$web_row['GOLD_WEB_thumb'];
                $web_title=$web_row['GOLD_WEB_tit'];
                $web_desc=$web_row['GOLD_WEB_des'];
            ?>

              <div class="fasionImg">
                <div>
                  <img src="/gold/data/web_page/thumb/<?=$web_thumb_path?>" alt="" />
                  <h2><?=$web_title?></h2>
                  <em class="cutTxt"><?=$web_desc?></em>
                  <a href="/gold/pages/web/web_detail.php?num=<?=$web_num?>">View Details</a>
                </div>
              </div>
            
            <?php
              }
            ?>
          </div>
          <!-- loop end -->
          <!-- end of web project -->
          <div class="fashionBox men">
            <div class="fashionTxt">
              <h2><em>APP</em> PROJECTS</h2>
              <p>
                모바일에 최적화된 프로젝트
              </p>
              <a href="/gold/pages/app/app.php">view more</a>
            </div>
            <!-- loop fasionImp start -->
            <?php
              include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
              $sql="select * from gold_app order by GOLD_APP_num desc limit 3";

              $app_result=mysqli_query($dbConn, $sql);

              while($app_row=mysqli_fetch_array($app_result)){
                $app_num=$app_row['GOLD_APP_num'];
                $app_thumb_path=$app_row['GOLD_APP_thumb'];
                $app_title=$app_row['GOLD_APP_tit'];
                $app_desc=$app_row['GOLD_APP_des'];
            ?>

              <div class="fasionImg">
                <div>
                  <img src="/gold/data/app_page/app_thumb/<?=$app_thumb_path?>" alt="" />
                  <h2><?=$app_title?></h2>
                  <em class="cutTxt"><?=$app_desc?></em>
                  <a href="/gold/pages/app/app_detail.php?num=<?=$app_num?>">View Details</a>
                </div>
              </div>
            
            <?php
              }
            ?>
          </div>
      </section>
      <!-- end of preview section -->
      <!-- contact section -->
      <section class="contents contact hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>CONTACT ME</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">관심이 있으신가요?</a>
            </div>
          </div>
          <!-- end of contact title -->
          <div class="contactBox">
            <div class="mapBox">
              <div class="map">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3165.9975987333755!2d127.01202961556719!3d37.48438303658609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca114196137d5%3A0xac3dea447afe04b8!2z7Iah66a867mM65Sp!5e0!3m2!1sko!2skr!4v1608280816678!5m2!1sko!2skr"
                ></iframe>
              </div>
            </div>
            <div class="formBox">
              <form action="/gold/php_process/pages/msg_insert.php" method="post" class="form" name="msgForm">
                <p class="nameMail">
                  <input type="text" name="msgName" placeholder="Your Name" />
                  <input type="text" name="msgEmail" placeholder="Your Email" />
                </p>
                <p class="subject">
                  <input type="text" name="msgTit" placeholder="Subject" />
                </p>
                <p class="message">
                  <textarea placeholder="Your Message" name="msgTxt"></textarea>
                </p>
                <button type="button" class="msgSend" onclick="msgInput()">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- end of contact section -->
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
