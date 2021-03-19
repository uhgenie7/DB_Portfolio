$(function(){
  // header top fix when scrolling down
  const offTop = $(".gnb").offset().top;

  let fixHeader = function(){
    $(window).scroll(function(){
      let scroll = $(window).scrollTop();
      let winWidth = $(window).width();
      if(winWidth <= 480 && offTop <= scroll){
        $(".gnb").css({"position":"fixed"});
      } else {
        $(".gnb").css({"position":"relative"});
      }
    });
  }

  fixHeader();

  $(window).resize(function(){  
    fixHeader();
  });

  // mobile menu click and show and hide menu
  $(".mobileMenu").click(function(){
    $(this).toggleClass("on");
    if($(this).hasClass("on")){
      $(this).find("i").attr("class","fa fa-times");
      $(this).prev("ul").slideDown();
    }else {
      $(this).find("i").attr("class","fa fa-bars");
      $(this).prev("ul").slideUp();
    }
  });


  let fitHeight = function(){
    $(window).resize(function(){
      let imgHeight = $(".newProjectCon>img").height();
      // console.log(imgHeight);
      $(".newProjectCon").height(imgHeight);
    });   
  }

  fitHeight();

  $(".develImg").click(function(){
    let index = $(this).index();

    $(".develTxt").hide();
    $(".develTxt").eq(index).show();
  });

  $(".develImg").eq(0).trigger("click");
});

// content_top scroll and click event
// scroll event dom
const wrap = document.querySelector(".wrap");
const contentTop = document.querySelector(".content_top");
const header = document.querySelector(".topMain");
const headerHeight = header.getBoundingClientRect().height;

// gnb & contentTop display show or none 
function scrollEvent() {
  if (window.scrollY > headerHeight / 2) {
    contentTop.classList.add("show");
  } else {
    contentTop.classList.remove("show");
  }
}

scrollEvent();



contentTop.addEventListener("click", () => {
  window.scroll({
    behavior: 'smooth',
    left: 0,
    top: wrap.offsetTop
  });
});

document.addEventListener('scroll', scrollEvent);
