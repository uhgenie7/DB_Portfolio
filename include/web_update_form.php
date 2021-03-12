<?php
  $web_detail_num=$_GET['num'];
  // 물음표 뒤에 있는 키의 이름을 저장하면 그 값을 출력함.
  // echo "get 변수".$de_detail_num;

  include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';

  $sql="select * from gold_web where GOLD_WEB_num=$web_detail_num";

  $result=mysqli_query($dbConn, $sql);
  $row=mysqli_fetch_array($result);

  $web_detail_tit=$row['GOLD_WEB_tit'];
  $web_detail_ser=$row['GOLD_WEB_ser'];
  $web_detail_des=$row['GOLD_WEB_des'];
  $web_detail_img=$row['GOLD_WEB_img'];
  $web_detail_mo=$row['GOLD_WEB_mo'];
  $web_detail_thumb=$row['GOLD_WEB_thumb'];
  $web_detail_cli=$row['GOLD_WEB_cli'];
  $web_detail_reg=$row['GOLD_WEB_reg'];
  $web_detail_dom=$row['GOLD_WEB_dom'];
?>

<div class="webInputForm webdevelInput">
            <form action="/gold/php_process/pages/web_update.php?num=<?=$web_detail_num?>" method="post" name="web_form" enctype="multipart/form-data">
              <div class="titleSer clear">
                <p class="title_input">
                  <label for="title">Title</label>
                  <input type="text" value="<?=$web_detail_tit?>" id="title" name="web_title">
                </p>
                <p class="serial_input">
                  <label for="serial">SerialNo.</label>
                  <input type="text" value="<?=$web_detail_ser?>" id="serial" name="web_serial">
                </p>
                <p class="client_input">
                  <label for="client">Client</label>
                  <input type="text" value="<?=$web_detail_cli?>" id="client" name="web_client">
                </p>
                <p class="domain_input">
                  <label for="domain">Domain</label>
                  <input type="text"value="<?=$web_detail_dom?>" id="domain" name="web_domain">
                </p>
              </div>
              <!-- end of title, serial, client input -->
              <div class="web_desc uploadDesc">
                <textarea name="web_desc"><?=$web_detail_des?></textarea>
              </div>
              <!-- end of text description -->
              <div class="uploadImgs clear">
                <div class="uploadBox img1">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_detail_img?>">
                    <label for="mainImage">SELECT IMAGE</label>
                    <input type="file" id="mainImage" class="uploadHidden" name="main">
                  </div>
                  <div class="img1_box imgWrap">
                    <img id="img1" src="/gold/data/web_page/pc/<?=$web_detail_img?>">
                  </div>
                </div>
                <div class="uploadBox img2">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_detail_mo?>">
                    <label for="subImage">SELECT IMAGE</label>
                    <input type="file" id="subImage" class="uploadHidden" name="mobile">
                  </div>
                  <div class="img2_box imgWrap">
                    <img id="img2" src="/gold/data/web_page/mobile/<?=$web_detail_mo?>">
                  </div>
                </div>
                <div class="uploadBox img3">
                  <div class="inputControll">
                    <input class="uploadName" placeholder="<?=$web_detail_thumb?>">
                    <label for="thumbImage">SELECT IMAGE</label>
                    <input type="file" id="thumbImage" class="uploadHidden" name="thumbnail">
                  </div>
                  <div class="thumb_box imgWrap">
                    <img id="thumb" src="/gold/data/web_page/thumb/<?=$web_detail_thumb?>">
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
                if(!document.web_form.web_title.value){
                  alert('상품명을 입력해주세요');
                  document.web_form.web_title.focus();
                  return;
                }

                if(!document.web_form.web_serial.value){
                  alert('시리얼 넘버를 입력해주세요');
                  document.web_form.web_serial.focus();
                  return;
                }

                if(!document.web_form.web_client.value){
                  alert('클라이언트를 입력해주세요');
                  document.web_form.web_client.focus();
                  return;
                }

                if(!document.web_form.web_domain.value){
                  alert('도메인를 입력해주세요');
                  document.web_form.web_domain.focus();
                  return;
                }
                
                if(!document.web_form.web_desc.value){
                  alert('내용을 입력해주세요');
                  document.web_form.web_desc.focus();
                  return;
                }

                if(!document.web_form.main.value){
                  alert('메인 사진을 입력해주세요');
                  return;
                }

                if(!document.web_form.mobile.value){
                  alert('모바일 사진을 입력해주세요');
                  return;
                }

                if(!document.web_form.thumbnail.value){
                  alert('썸네일 사진을 입력해주세요');
                  return;
                }

                document.web_form.submit();
              });
            </script>