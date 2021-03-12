<!DOCTYPE html>
<html lang="ko">
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

    <!-- devel form css link -->
    <link rel="stylesheet" href="/gold/css/web_devel_input.css" />

    <!-- animation css link -->
    <link rel="stylesheet" href="/gold/css/animation.css" />

    <!-- media query style css link -->
    <link rel="stylesheet" href="/gold/css/media.css" />

  </head>
  <body>
    <div class="wrap">
      
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/header.php" ?>

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
          <!-- devel input contents form -->
          <div class="develInputForm webdevelInput">
            <form action="/gold/php_process/pages/devel_insert.php" method="post" name="devel_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" placeholder="Title Here" id="title" name="devel_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" placeholder="SerialNo. Here" id="serial" name="devel_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" placeholder="client Here" id="client" name="devel_client">
                </p>
              </div>
              <!-- end of title, serial, client input -->
              <div class="devel_desc uploadDesc">
                <textarea name="devel_desc" placeholder="devel Description Here..."></textarea>
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
          <!-- end devel input form -->
        </div>
        <!-- end of center -->

      </section>

      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/about.php" ?>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/gold/include/footer.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/gold/js/custom.js"></script>
    <script src="/gold/js/devel_upload.js"></script>
    <script>
      const submitBtn = document.querySelector("#submitBtn");
      submitBtn.addEventListener('click', function(){
        if(!document.devel_form.devel_title.value){
          alert('상품명을 입력해주세요');
          document.devel_form.devel_title.focus();
          return;
        }

        if(!document.devel_form.devel_serial.value){
          alert('시리얼 넘버를 입력해주세요');
          document.devel_form.devel_serial.focus();
          return;
        }

        if(!document.devel_form.devel_client.value){
          alert('클라이언트를 입력해주세요');
          document.devel_form.devel_client.focus();
          return;
        }
        
        if(!document.devel_form.devel_desc.value){
          alert('내용을 입력해주세요');
          document.devel_form.devel_desc.focus();
          return;
        }

        if(!document.devel_form.main.value){
          alert('메인 사진을 입력해주세요');
          return;
        }

        if(!document.devel_form.sub.value){
          alert('서브 사진을 입력해주세요');
          return;
        }

        if(!document.devel_form.thumbnail.value){
          alert('썸네일 사진을 입력해주세요');
          return;
        }

        document.devel_form.submit();
      });
    </script>
  </body>
</html>
