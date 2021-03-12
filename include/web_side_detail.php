<div class="detailWeb">
  <div class="webTit">
    <h2>Recent Web Services</h2>
  </div>
  <?php
     include $_SERVER['DOCUMENT_ROOT'].'/gold/php_process/connect/db_connect.php';
     $sql="select * from gold_web order by GOLD_WEB_num desc limit 3";


    $web_side_result=mysqli_query($dbConn, $sql);

    while($web_side_row=mysqli_fetch_array($web_side_result)){
      $web_side_num=$web_side_row['GOLD_WEB_num'];
      $web_side_thumb=$web_side_row['GOLD_WEB_thumb'];
      $web_side_title=$web_side_row['GOLD_WEB_tit'];
      $web_side_desc=$web_side_row['GOLD_WEB_des'];
  ?>
    <div class="webLinks">
        <div class="subWebImg">
          <img src="/gold/data/web_page/thumb/<?=$web_side_thumb?>" alt="">
        </div>
        <div class="subWebTxt">
        <a href="/gold/pages/web/web_detail.php?num=<?=$web_side_num?>"><?=$web_side_title?></a>
          <em><?=$web_side_desc?></em>
        </div>
    </div>
  <?php
    }
  ?>
  <!-- end of looped web links -->
</div>
<!-- end of detail web -->