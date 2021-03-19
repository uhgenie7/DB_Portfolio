<?php
 $devel_num=$_GET['num'];
  //  echo $devel_num;
  // database connect
  include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
  $sql="select * from portfolio_de where PORTFOLIO_DE_num=$devel_num";
  $devel_result=mysqli_query($dbConn, $sql);
  $devel_result_row=mysqli_fetch_array($devel_result);

  $devel_result_tit=$devel_result_row['PORTFOLIO_DE_tit'];
  $devel_result_ser=$devel_result_row['PORTFOLIO_DE_ser'];
  $devel_result_des=$devel_result_row['PORTFOLIO_DE_des'];
  $devel_result_img1=$devel_result_row['PORTFOLIO_DE_img1'];
  $devel_result_img2=$devel_result_row['PORTFOLIO_DE_img2'];
  $devel_result_thumb=$devel_result_row['PORTFOLIO_DE_thumb'];
  $devel_result_cli=$devel_result_row['PORTFOLIO_DE_cli'];
  $devel_result_reg=$devel_result_row['PORTFOLIO_DE_reg'];
?>
<!-- devel input contents form -->
            <div class="develInputForm webdevelInput">
              <form action="/db-portfolio/php_process/pages/devel_update.php?num=<?=$devel_num?>" method="post" name="devel_form" enctype="multipart/form-data">
                <div class="titleSer clear">
                  <p class="title_input">
                    <label for="title">Title</label>
                    <input type="text" value="<?=$devel_result_tit?>" id="title" name="devel_title">
                  </p>
                  <p class="serial_input">
                    <label for="serial">SerialNo.</label>
                    <input type="text" value="<?=$devel_result_ser?>" id="serial" name="devel_serial">
                  </p>
                  <p class="client_input">
                    <label for="client">Client</label>
                    <input type="text" value="<?=$devel_result_cli?>" id="client" name="devel_client">
                  </p>
                </div>
                <!-- end of title, serial, client input -->
                <div class="devel_desc uploadDesc">
                  <textarea name="devel_desc"><?=$devel_result_des?></textarea>
                </div>
                <!-- end of text description -->
                <div class="uploadImgs clear">
                  <div class="uploadBox img1">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$devel_result_img1?>">
                      <label for="mainImage">SELECT IMAGE</label>
                      <input type="file" id="mainImage" class="uploadHidden" name="main">
                    </div>
                    <div class="img1_box imgWrap">
                      <img id="img1" src="/db-portfolio/data/devel_page/<?=$devel_result_img1?>">
                    </div>
                  </div>
                  <div class="uploadBox img2">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$devel_result_img2?>">
                      <label for="subImage">SELECT IMAGE</label>
                      <input type="file" id="subImage" class="uploadHidden" name="sub">
                    </div>
                    <div class="img2_box imgWrap">
                      <img id="img2" src="/db-portfolio/data/devel_page/<?=$devel_result_img2?>">
                    </div>
                  </div>
                  <div class="uploadBox img3">
                    <div class="inputControll">
                      <input class="uploadName" placeholder="<?=$devel_result_thumb?>">
                      <label for="thumbImage">SELECT IMAGE</label>
                      <input type="file" id="thumbImage" class="uploadHidden" name="thumbnail">
                    </div>
                    <div class="thumb_box imgWrap">
                      <img id="thumb" src="/db-portfolio/data/devel_page/thumb/<?=$devel_result_thumb?>">
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