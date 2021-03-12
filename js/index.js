     $(function(){
        // click 'get in touch' with move scroll to contact in devel detail page
        const loca=$(location).attr('href').split('#')[1];

        if(loca=='contact'){
          const contactOff=$(`.${loca}`).offset().top;
          // location: js 주소 가져오기
          console.log(loca);
          console.log(contactOff);

          $("html, body").animate({scrollTop:contactOff}, 1000, 'easeInQuint');
        }

        //cutting txt on web text contents
        let mainWebBox = $(".fasionImg");

        for(let i = 0; i < mainWebBox.length; i++){
          let allTxt = mainWebBox.eq(i).find(".cutTxt").text();        

          function cutTxt(){
            let winWidth = $(window).width();
            if(winWidth < 800){
              mainWebBox.eq(i).find(".cutTxt").text(allTxt.substr(0, 20) + ' ...');
            } else {
              mainWebBox.eq(i).find(".cutTxt").text(allTxt.substr(0, 40) + ' ...');
            }
          }       

          $(window).resize(function(){
            cutTxt()
          });
          cutTxt()
        }
      });

      function msgInput(){
        if(!document.msgForm.msgName.value){
          alert("이름을 입력해주세요.");
          document.msgForm.msgName.focus();
          return;
        }

        if(!document.msgForm.msgEmail.value){
          alert("이메일을 입력해주세요.");
          document.msgForm.msgEmail.focus();
          return;
        }

        if(!document.msgForm.msgTit.value){
          alert("제목을 입력해주세요.");
          document.msgForm.msgTit.focus();
          return;
        }

        if(!document.msgForm.msgTxt.value){
          alert("내용을 입력해주세요.");
          document.msgForm.msgTxt.focus();
          return;
        }

        document.msgForm.submit();
      }