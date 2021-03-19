$(function () {
  let url = "/db-portfolio/data/ajax/qna_ajax.php";
  $.get(url, { page: 1 }, function (qna_data) {
    $(".qnaList").html(qna_data);
    // qna.php의 .qnaList에 qna_data 파라미터를 넣어준다.
    // html 메서드는 기존의 것을 없애고 새로운 것을 대체한다.
  });
});

let currentPage = 1;

function getPage(currentNum) {
  // "qna.php"에 onclick 이벤트가 걸려있다.
  let url = "/db-portfolio/data/ajax/qna_ajax.php";
  // 현재 페이지 번호 배경 색깔 바꾸기
  $(".pgNum").removeClass("active");
  $(".pgNum")
    .eq(currentNum - 1)
    .addClass("active");

  // end
  $.get(url, { page: currentNum }, function (qna_data) {
    $(".qnaList").html(qna_data);
    // qna.php의 .qnaList에 qna_data 파라미터를 넣어준다.
    currentPage = currentNum;
  });
}

// > 아이콘 클릭 함수
function goNext() {
  let pageLength = $(".pgNum").length;
  console.log(pageLength);
  if (currentPage == pageLength) {
    getPage(pageLength);
  } else {
    getPage(currentPage + 1);
  }
}

// < 아이콘 클릭 함수
function goPrev() {
  if (currentPage === 1) {
    getPage(1);
  } else {
    getPage(currentPage - 1);
  }
}

// << 클릭 함수
function goFirst() {
  getPage(1);
}

// >> 클릭 함수
function goLast() {
  let pageLength = $(".pgNum").length;
  getPage(pageLength);
}

$(".pgNum").eq(0).trigger("click");
