if (typeof jQuery === "undefined"){
  throw new Error("sismp requires jQuery");
}

function show_proses(konten, _class){
  $(".content-block").show();
  $(".notif-proses").html(konten).fadeIn();

  if(_class == "proses"){
    $(".notif-proses").removeClass("success");
  }else{
    $(".notif-proses").addClass("success");
  }
}

function hide_proses(){
  $(".notif-proses").slideUp();
  $(".content-block").hide();
}