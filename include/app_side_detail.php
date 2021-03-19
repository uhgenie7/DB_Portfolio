<div class="detailApp">
  <div class="appTit">
    <h2>Recent App Services</h2>
  </div>

  <?php
     include $_SERVER['DOCUMENT_ROOT'].'/db-portfolio/php_process/connect/db_connect.php';
     $sql="select * from portfolio_app order by PORTFOLIO_APP_num desc limit 3";


    $app_side_result=mysqli_query($dbConn, $sql);

    while($app_side_row=mysqli_fetch_array($app_side_result)){
      $app_side_num=$app_side_row['PORTFOLIO_APP_num'];
      $app_side_thumb=$app_side_row['PORTFOLIO_APP_thumb'];
      $app_side_title=$app_side_row['PORTFOLIO_APP_tit'];
      $app_side_desc=$app_side_row['PORTFOLIO_APP_des'];
  ?>

    <div class="appLinks">
        <div class="subAppImg">
          <img src="/db-portfolio/data/app_page/app_thumb/<?=$app_side_thumb?>" alt="">
        </div>
        <div class="subAppTxt">
          <a href="/db-portfolio/pages/app/app_detail.php?num=<?=$app_side_num?>"><?=$app_side_title?></a>
          <em><?=$app_side_desc?></em>
        </div>
    </div>
  <?php
    }
  ?>
  <!-- end of looped app links -->
</div>
<!-- end of detail app -->