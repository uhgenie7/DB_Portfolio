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

    <!-- login css link -->
    <link rel="stylesheet" href="/db-portfolio/css/login.css" />

    <!-- animation css link -->
    <link rel="stylesheet" href="/db-portfolio/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/media.css" />

    <script src="/db-portfolio/js/join_check.js" defer></script>
  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/header.php" ?>

      <section class="contents login hasTitle">
        <div class="center">
           <!-- contact title -->
          <div class="title">
            <h2>LOG IN</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">View More Details</a>
            </div>
          </div>
          <!-- end of contact title -->

          <!-- login box -->
          <form action="/db-portfolio/php_process/login/login.php" method="post" name="loginForm">
            <div class="loginBox">
              <p><input type="text" placeholder="Enter your ID" name="loginId"></p>
              <p><input type="password" placeholder="Enter your Password" name="loginPass"></p>
              <div class="loginBtns">
                <a href="#" class="loginBtn">LOGIN</a>
                <a href="/db-portfolio/pages/login/join_form.php" class="joinBtn">JOIN US</a>
              </div>
            </div>
          </form>
          <!-- end of login box -->
          <div class="findInfo">
            <a href="#">아이디 찾기</a>
            <a href="#">비밀번호 찾기</a>
          </div>
        </div>
        <!-- end of center -->

      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>
      
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script>
      const logBtn = document.querySelector('.loginBtn')
      logBtn.addEventListener('click', checkLogin);

      function checkLogin() {
        if(!document.loginForm.loginId.value) {
          alert('아이디를 입력해주세요');
          document.loginForm.loginId.focus();
          return;
        }

        if(!document.loginForm.loginPass.value) {
          alert('비밀번호를 입력해주세요');
          document.loginForm.loginPass.focus();
          return;
        }

        document.loginForm.submit();
      }

      (function(){
        document.addEventListener('keydown', function(e){//모든 키 중 하나를 눌렀을 때
          const keyCode = e.keyCode;
          if(keyCode == 13) {
            checkLogin();
          }
        });
      })();
      

    </script>


  </body>
</html>
