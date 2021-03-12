<?php
 $design_num=$_GET['num'];
  //  echo $design_num;
  // database connect
  include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
  $sql="select * from gold_de where GOLD_DE_num=$design_num";
  $design_result=mysqli_query($dbConn, $sql);
  $design_result_row=mysqli_fetch_array($design_result);

  $design_result_tit=$design_result_row['GOLD_DE_tit'];
  $design_result_ser=$design_result_row['GOLD_DE_ser'];
  $design_result_des=$design_result_row['GOLD_DE_des'];
  $design_result_img1=$design_result_row['GOLD_DE_img1'];
  $design_result_img2=$design_result_row['GOLD_DE_img2'];
  $design_result_thumb=$design_result_row['GOLD_DE_thumb'];
  $design_result_cli=$design_result_row['GOLD_DE_cli'];
  $design_result_reg=$design_result_row['GOLD_DE_reg'];
?>
<!-- design input contents form -->
            <div class="designInputForm webDesignInput">
              <form action="/gold/php_process/pages/design_update.php?num=<?=$design_num?>" method="post" name="design_form" enctype="multipart/form-data">
                <div class="titleSer clear">
                  <p class="title_input">
                    <label for="title">Title</label>
                    <input type="text" value="<?=$design_result_tit?>" id="title" name="design_title">
                  </p>
                  <p class="serial_input">
                    <label for="serial">SerialNo.</label>
                    <input type="text" value="<?=$design_result_ser?>" id="serial" name="design_serial">
                  </p>
                  <p class="client_input">
                    <label for="client">Client</label>
                    <input type="text" value="<?=$design_result_cli?>" id="client" name="design_client">
                  </p>
                </div>
                <!-- end of title, serial, client input -->
                <div class="design_desc uploadDesc">
                  <textarea name="design_desc"><?=$design_result_des?></textarea>
                </div>
                <!-- end of text description -->
                <div class="uploadImgs clear">
                  <div class="uploadBox img1">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$design_result_img1?>">
                      <label for="mainImage">SELECT IMAGE</label>
                      <input type="file" id="mainImage" class="uploadHidden" name="main">
                    </div>
                    <div class="img1_box imgWrap">
                      <img id="img1" src="/gold/data/design_page/<?=$design_result_img1?>">
                    </div>
                  </div>
                  <div class="uploadBox img2">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$design_result_img2?>">
                      <label for="subImage">SELECT IMAGE</label>
                      <input type="file" id="subImage" class="uploadHidden" name="sub">
                    </div>
                    <div class="img2_box imgWrap">
                      <img id="img2" src="/gold/data/design_page/<?=$design_result_img2?>">
                    </div>
                  </div>
                  <div class="uploadBox img3">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$design_result_thumb?>">
                      <label for="thumbImage">SELECT IMAGE</label>
                      <input type="file" id="thumbImage" class="uploadHidden" name="thumbnail">
                    </div>
                    <div class="thumb_box imgWrap">
                      <img id="thumb" src="/gold/data/design_page/thumb/<?=$design_result_thumb?>">
                    </div>
                  </div>
                </div>
              <!-- end of image upload box -->
            </form>
              </div>
              <!-- img upload box -->
            <div class="btns">
              <button type="button" class="commonBtn" id="submitBtn">UPDATE</button>
            </div>
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