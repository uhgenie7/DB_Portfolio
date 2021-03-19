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

    <!-- join form css link -->
    <link rel="stylesheet" href="/db-portfolio/css/join_form.css" />

    <!-- animation css link -->
    <link rel="stylesheet" href="/db-portfolio/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/media.css" />

  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/header.php" ?>

      <section class="contents join hasTitle">
        <div class="center">
           <!-- contact title -->
          <div class="title">
            <h2>JOIN US</h2>
            <div class="subTit">
              <span class="subLine"></span>
              <a href="#" class="subLink">View More Details</a>
            </div>
          </div>
          <!-- end of contact title -->

          <div class="joinBox">
            <form action="/db-portfolio/php_process/login/insertMembers.php" method="post" name="memberForm">
              <p class="idInputBox inputBox">
                <label for="id">ID</label>
                <input type="text" name="id" class="columnTitle" id="id" placeholder="Your ID">
                <button type="button" name="button" class="columnTitle" id="idCheck">Check</button>
              </p>
              <p class="nameInputBox inputBox">
                <label for="name">NAME</label>
                <input type="text" name="name" class="columnTitle" id="name" placeholder="Your Name">
              </p>
              <p class="passInputBox inputBox">
                <label for="pass">PASSWORD</label>
                <input type="password" name="pass" class="columnTitle" id="pass" placeholder="Your Password">
              </p>
              <p class="checkInputBox inputBox">
                <label for="pass">PASSWORD CHECK</label>
                <input type="password" name="check" class="columnTitle" id="check" placeholder="Check Your Password">
              </p>
              <p class="emailInputBox inputBox">
                <label for="email1">EMAIL</label>
                <input type="text" name="email1" class="email1" id="email1" placeholder="Your Email ID">
                <span>@</span>
                <input type="text" name="email2" class="email2" id="email2" placeholder="Your Email Address">
              </p>

              <div class="formBtns">
                <button type="button" class="sendBtn">SEND</button>
                <button type="button" class="resetBtn">RESET</button>
              </div>
            </form>
          </div>
          <!-- end of join box -->
        </div>

      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/join_check.js"></script>
    <script>
      $(function(){
        $("#idCheck").click(function(){
          const url = '/db-portfolio/php_process/login/member_check_id.php?id=' + $("#id").val();
          $.get(url, function(data){
            alert(data);
          });
        });
      });
    </script>
  </body>
</html>
