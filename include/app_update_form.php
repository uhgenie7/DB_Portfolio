<?php

  $app_detail_num=$_GET['num'];

  include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';

  $sql="select * from gold_app where GOLD_APP_num=$app_detail_num";

  $result=mysqli_query($dbConn, $sql);
  $row=mysqli_fetch_array($result);

  $app_detail_tit=$row['GOLD_APP_tit'];
  $app_detail_ser=$row['GOLD_APP_ser'];
  $app_detail_des=$row['GOLD_APP_des'];
  $app_detail_img=$row['GOLD_APP_img'];
  $app_detail_thumb=$row['GOLD_APP_thumb'];
  $app_detail_cli=$row['GOLD_APP_cli'];
  $app_detail_reg=$row['GOLD_APP_reg'];

?>
<!-- devel input contents form -->
<div class="develInputForm webdevelInput appdevelInput">
            <form action="/gold/php_process/pages/app_update.php?num=<?=$app_detail_num?>" method="post" name="app_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" value="<?=$app_detail_tit?>" id="title" name="app_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" value="<?=$app_detail_ser?>" id="serial" name="app_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" value="<?=$app_detail_cli?>" id="client" name="app_client">
                </p>
              </div>
              <!-- end of title, serial, client input -->
              <div class="app_desc uploadDesc">
                <textarea name="app_desc"><?=$app_detail_des?></textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox appImg img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$app_detail_img?>">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="app_main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1" src="/gold/data/app_page/app_main/<?=$app_detail_img?>">
                  </div>
                </div>
                <div class="uploadBox appImg img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$app_detail_thumb?>">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="app_sub">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2" src="/gold/data/app_page/app_thumb/<?=$app_detail_thumb?>">
                  </div>
                </div>
                </div>

              </div>
              <!-- img upload box -->
            </form>
            <div class="btns">
              <button class="commonBtn" id="submitBtn">UPDATE</button>
            </div>
            <script>
      const submitBtn = document.querySelector("#submitBtn");
      submitBtn.addEventListener('click', function(){
        if(!document.app_form.app_title.value){
          alert('상품명을 입력해주세요');
          document.app_form.app_title.focus();
          return;
        }

        if(!document.app_form.app_serial.value){
          alert('시리얼 넘버를 입력해주세요');
          document.app_form.app_serial.focus();
          return;
        }

        if(!document.app_form.app_client.value){
          alert('클라이언트를 입력해주세요');
          document.app_form.app_client.focus();
          return;
        }
        
        if(!document.app_form.app_desc.value){
          alert('내용을 입력해주세요');
          document.app_form.app_desc.focus();
          return;
        }

        if(!document.app_form.app_main.value){
          alert('메인 사진을 입력해주세요');
          return;
        }

        if(!document.app_form.app_sub.value){
          alert('서브 사진을 입력해주세요');
          return;
        }

        document.app_form.submit();
      });
    </script>