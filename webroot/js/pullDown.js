$(function(){

  //詳細の表示非表示
  $('.branch tr:nth-child(1)').click(function(){
    $(this).parents("table").next(".node").slideToggle();
  });

  //選択肢必要分表示
  $("#reload").click(function(){
    var choice = $("#choice").val();
    console.log(choice);
    //$(".contentInput").removeAttr("value");
    if(choice == 1){
      console.log("choice == 1");
      $(".choiceContent").css("display", "inline");
      $(".choiceContent_sec").css("display", "inline");
    }else if(choice >= 2){
      console.log("choice >= 2");
      if($(".choiceContent").length){
        console.log("choiceContent");
        $(".choiceContent").css("display", "inline");
        for(var i = 1; i < choice; i++){
          $(".contentInput").clone(true).appendTo(".choiceContent").removeClass("contentInput").addClass("addInput").attr("name", "content["+i+"]");
        }
      }else if($(".choiceContent_sec").length){
        console.log("choiceContent_sec");
        $(".choiceContent_sec").css("display", "inline");
        for(var i = 1; i < choice; i++){
          $(".contentInput").clone(true).appendTo(".choiceContent_sec").removeClass("contentInput").addClass("addInput").attr("name", "content["+i+"]");
        }
      }
    }
    //一回押したら押せなくする
    $(this).prop("disabled", true);
  });

  //やり直し用
  $("#reset").click(function(){
    $(".addInput").remove();
    $(".choiceContent").css("display", "none");
    $(".choiceContent_sec").css("display", "none");
    $("#reload").prop("disabled", false);
    //$(".contentInput").attr("value", "null");
  });
});
