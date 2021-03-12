$(function(){
  const fileTarget = $(".uploadHidden");
  $("#mainImage").on("change", img1FileSelect);
  $("#subImage").on("change", img2FileSelect);
  $("#thumbImage").on("change", ThumbFileSelect);


  fileTarget.on('change', function(){
    if(window.FileReader){
      let filename = $(this)[0].files[0].name;
      $(this).siblings('.uploadName').val(filename);
      // console.log(filename);
    }

  }); 
});


  // filereader
  let img1FileSelect = function(e){
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    
    reader.onload = function(){
      let dataURL = reader.result;
      // console.log(dataURL);
      
      let output = document.querySelector("#img1");
      // #img1 DOM으로 가져옴
      
      output.src=dataURL;
      // #img1.src = dataURL
    };
    
  }

  let img2FileSelect = function(e){
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    
    reader.onload = function(){
      let dataURL = reader.result;
      // console.log(dataURL);

      let output = document.querySelector("#img2");
      // #img2 DOM으로 가져옴

      output.src=dataURL;
      // #img2.src = dataURL
    };
    
  }

  let ThumbFileSelect = function(e){
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    
    reader.onload = function(){
      let dataURL = reader.result;

      let output = document.querySelector("#thumb");

      output.src=dataURL;
    };
    
  }