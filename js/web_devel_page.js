$(function () {
  //  cutting text each boxes
  let develBox = $(".deWeBox");

  for (let i = 0; i < develBox.length; i++) {
    let allTxt = develBox.eq(i).find(".cutTxt").text();

    function cutTxt() {
      let winWidth = $(window).width();
      if (winWidth < 800) {
        develBox
          .eq(i)
          .find(".cutTxt")
          .text(allTxt.substr(0, 20) + " ...");
      } else {
        develBox
          .eq(i)
          .find(".cutTxt")
          .text(allTxt.substr(0, 60) + " ...");
      }
    }

    $(window).resize(function () {
      cutTxt();
    });
    cutTxt();
  }

  // load more when clicking load more button
  const develLoadMore = function () {
    $(".develBox").hide();
    $(".develBox").slice(0, 4).show();

    $(".develLoadMore").click(function (e) {
      e.preventDefault();
      $(".develBox:hidden").slice(0, 4).show();

      if ($(".develBox:hidden").length == 0) {
        $(".develLoadMore").hide();
      }
    });
  };

  develLoadMore();

  // load more when clicking load more button
  const webLoadMore = function () {
    $(".webBox").hide();
    $(".webBox").slice(0, 3).show();

    $(".webLoadMore").click(function (e) {
      e.preventDefault();
      $(".webBox:hidden").slice(0, 3).show();

      if ($(".webBox:hidden").length == 0) {
        $(".webLoadMore").hide();
      }
    });
  };

  webLoadMore();

  // go to top
  $(".toTop").click(function () {
    $("html,body").animate({ scrollTop: 0 }, 300);
  });
});
