
$(document).ready(function(){
  $("#buy").on("click change",function(){
    swal("Đã thêm mặt hàng này vào giỏ !", "Hãy kiểm tra giỏ hàng của bạn!", "success");
  });
});

function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("img_prv");
      preview.src = src;
    }
}
