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

    <!-- design form css link -->
    <link rel="stylesheet" href="/db-portfolio/css/web_design_input.css" />

    <!-- animation css link -->
    <link rel="stylesheet" href="/db-portfolio/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/db-portfolio/css/media.css" />

  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/header.php" ?>

      <section class="contents upload hasTitle">
        <div class="center">
           <!-- contact title -->
          <div class="title">
            <h2>UPLOAD PROJECTS</h2>
            <div class="subTit">
              <span class="subLine"></span>
            </div>
          </div>
          <!-- end of contact title -->
          <!-- design input contents form -->
          <div class="designInputForm webDesignInput">
            <form action="/db-portfolio/php_process/pages/design_insert.php" method="post" name="design_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" placeholder="Title Here" id="title" name="design_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" placeholder="SerialNo. Here" id="serial" name="design_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" placeholder="client Here" id="client" name="design_client">
                </p>
              </div>
              <!-- end of title, serial, client input -->
              <div class="design_desc uploadDesc">
                <textarea name="design_desc" placeholder="Design Description Here..."></textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="Main Image">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1">
                  </div>
                </div>
                <div class="uploadBox img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="Sub Image">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="sub">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2">
                  </div>
                </div>
                <div class="uploadBox img3">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="Thumbnail Image(400 * 400)">
                    <label for="thumbImage">SELECT IMAGE</label>
                    <input type="file" id="thumbImage" class="uploadHidden" name="thumbnail">
                  </div>
                  <div class="thumb_box imgWrap">
                    <img id="thumb">
                  </div>
                </div>
                </div>

              </div>
              <!-- img upload box -->
            </form>
            <div class="btns">
              <button class="commonBtn" id="submitBtn">UPLOAD</button>
            </div>
          </div>
          <!-- end design input form -->
        </div>
        <!-- end of center -->

      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/db-portfolio/include/footer.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/db-portfolio/js/custom.js"></script>
    <script src="/db-portfolio/js/design_upload.js"></script>
    <script>
      const submitBtn = document.querySelector("#submitBtn");
      submitBtn.addEventListener('click', function(){
        if(!document.design_form.design_title.value){
          alert('상품명을 입력해주세요');
          document.design_form.design_title.focus();
          return;
        }

        if(!document.design_form.design_serial.value){
          alert('시리얼 넘버를 입력해주세요');
          document.design_form.design_serial.focus();
          return;
        }

        if(!document.design_form.design_client.value){
          alert('클라이언트를 입력해주세요');
          document.design_form.design_client.focus();
          return;
        }
        
        if(!document.design_form.design_desc.value){
          alert('내용을 입력해주세요');
          document.design_form.design_desc.focus();
          return;
        }

        if(!document.design_form.main.value){
          alert('메인 사진을 입력해주세요');
          return;
        }

        if(!document.design_form.sub.value){
          alert('서브 사진을 입력해주세요');
          return;
        }

        if(!document.design_form.thumbnail.value){
          alert('썸네일 사진을 입력해주세요');
          return;
        }

        document.design_form.submit();
      });
    </script>
  </body>
</html>
