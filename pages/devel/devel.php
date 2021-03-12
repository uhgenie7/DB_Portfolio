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

      <section class="contents devel hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>DEVELOPE COLLECTION</h2>
            <div class="subTit">
              <span class="subLine"></span>
            </div>
          </div>
          <!-- end of contact title -->

          <div class="develBoxes deWeBoxes">

            <?php
              include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
              $sql="select * from gold_de order by GOLD_DE_num desc";
              // desc : 역순
              
              $result=mysqli_query($dbConn, $sql);

              while($row=mysqli_fetch_array($result)){
                $devel_num=$row['GOLD_DE_num'];
                $thumb_path=$row['GOLD_DE_thumb'];
                $devel_title=$row['GOLD_DE_tit'];
                $devel_desc=$row['GOLD_DE_des'];
            ?>

            <div class="develBox deWeBox">
              <div>
                <p class="deWeImg">
                  <img src="/gold/data/devel_page/thumb/<?=$thumb_path?>" alt="">
                </p>
                <div class="develTxt deWeTxt">
                  <h2 class="cutH2"><?=$devel_title?></h2>
                  <em class="cutTxt"><?=$devel_desc?></em>
                </div>
                <div class="boxOverlay">
                  <a href="/gold/pages/devel/devel_detail.php?num=<?=$devel_num?>"><i class="fa fa-search"></i></a>
                </div>
              </div>
            </div>
            <!-- end of develBox -->

            <?php
            }
            ?>

          </div>
          <!-- end of develBoxes -->

          <div class="btns">


          <?php
            if($userlevel == 1){
          ?>
            <a href="#" class="commonBtn develLoadMore">Loard More</a>
            <a href="#" class="commonBtn toTop">Go To Top</a>
            <a href="/gold/pages/devel/devel_input_form.php" class="commonBtn">Upload Contents</a>
          </div>

          <?php
            } else {
          ?>  
            <a href="#" class="commonBtn develLoadMore">Loard More</a>
            <a href="#" class="commonBtn toTop">Go To Top</a>
          <?php
            }
          ?>
        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src=/gold/js/web_devel_page.js></script>

  </body>
</html>