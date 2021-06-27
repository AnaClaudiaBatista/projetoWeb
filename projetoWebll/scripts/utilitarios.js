function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#imageProduto')
          .attr('src', e.target.result)
          .width(150)
          .height(200);
      };
      
      reader.readAsDataURL(input.files[0]);
    }
  }

  function previewFile() {
    var preview = document.getElementById('imageProduto');
    var file    = document.getElementById('file').files[0];
    var reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }