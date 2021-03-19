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

    <!-- qna css link -->
    <link rel="stylesheet" href="/db-portfolio/css/qna.css">

    <!-- admin_view css link -->
    <link rel="stylesheet" href="/db-portfolio/css/admin.css">

    <!-- animation css link -->
    <link rel="stylesheet" href="/db-portfolio/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/media.css" />
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/header.php" ?>

      <section class="contents qna hasTitle">
        <div class="center">
          <!-- contact title -->
          <div class="title">
            <h2>Message Details</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">View More Details</a>
            </div>
          </div>
          <!-- end of contact title -->

          <?php
          $msg_num = $_GET['num'];
          //database connect
          include $_SERVER['DOCUMENT_ROOT']."/db-portfolio/php_process/connect/db_connect.php"; 
          $sql="select * from portfolio_msg where PORTFOLIO_MSG_num=$msg_num";

          $msg_result=mysqli_query($dbConn, $sql);
          $msg_row=mysqli_fetch_array($msg_result);

          $msg_id=$msg_row['PORTFOLIO_MSG_name'];
          $msg_tit=$msg_row['PORTFOLIO_MSG_tit'];
          $msg_con=$msg_row['PORTFOLIO_MSG_con'];
          $msg_reg=$msg_row['PORTFOLIO_MSG_reg'];
          $msg_email=$msg_row['PORTFOLIO_MSG_email'];
          ?>

          <!-- qna_view.php 페이지와 동일한 클래스로 작성 -->
          <div class="qnaBoxes qnaView adminView deWeBoxes">    
            <div class="writerInfo">
              <p>From <?=$msg_id?> / No.<?=$msg_num?> / <?=$msg_reg?></p>
            </div>
            <div class="writeBox clear">
              <div class="writeForm">
                <p class="adminTitInput">
                  <label for="adminTitle">제목</label>
                  <input type="text" name="adminTitle" id="adminTitle"placeholder="제목을 입력해 주세요." value="<?=$msg_tit?>">
                </p>
                <p class="adminTxtInput">
                  <textarea name="adminTxt" placeholder="내용을 입력해 주세요"><?=$msg_con?></textarea>
                </p>
              </div>
            </div>
            <!-- end of write box -->

            <div class="adminViewBtns">
              <a href="mailto:<?=$msg_email?>">메일쓰기</a>
              <a href="/db-portfolio/php_process/pages/msg_delete.php?num=<?=$msg_num?>">삭제</a>
              <a href="/db-portfolio/pages/admin/admin.php">뒤로가기</a>       
            </div>
            
          </div> 

        </div>
        <!-- end of center -->
  
      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/web_devel_page.js"></script>
  </body>
</html>