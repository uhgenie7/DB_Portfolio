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

      <section class="contents app hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>APPLICATIONS</h2>
            <div class="subTit">
              <span class="subLine"></span>
            </div>
          </div>
          <!-- end of contact title -->

            <div class="appBoxes deWeBoxes">
              <div class="appBox-sizer"></div>
                
            </div>
          <!-- end of loop web box -->

          <div class="btns">

          <?php
            if($userlevel == 1){
          ?>
            <button class="commonBtn appLoadMore">Loard More</button>
            <a href="#" class="commonBtn toTop">Go To Top</a>
            <a href="/db-portfolio/pages/app/app_input_form.php" class="commonBtn">Upload Contents</a>
          </div>

          <?php
            } else {
          ?>  
            <button class="commonBtn appLoadMore">Loard More</button>
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
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/web_devel_page.js"></script>
    <script src="/db-portfolio/js/app.js"></script>
  </body>
</html>