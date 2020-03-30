$(function(){

    var addressCount = 1;
    var linkCount = 1;
    $(".addAddress").click(function(){
        //console.log("add click");
        $(".address").eq(0).clone(true).appendTo($(this).prev()).addClass("cloneAddress").attr("name", "destination_address["+addressCount+"]");
        addressCount++;
    });

    $(".addLink").click(function(){
        $(".link").eq(0).clone(true).appendTo($(this).prev()).addClass("cloneLink").attr("name", "link["+linkCount+"]");
        linkCount++;
    });

    $(".removeAddress").click(function(){
        $(".cloneAddress").remove();
        addressCount = 1;
    });

    $(".removeLink").click(function(){
        $(".cloneLink").remove();
        linkCount = 1;
    });

    //詳細の表示非表示
    $('.branch tr:nth-child(1)').click(function(){
        $(this).parents("table").next(".node").slideToggle();
    });
    
    //選択肢必要分表示
    $("#reload").click(function(){
        var choice = $("#choice").val();
        //$(".contentInput").removeAttr("value");
        if(choice == 1){
            $(".choiceContent").css("display", "inline");
            $(".choiceContent_sec").css("display", "inline");
        }else if(choice >= 2){
            if($(".choiceContent").length){
                $(".choiceContent").css("display", "inline");
                for(var i = 1; i < choice; i++){
                    $(".contentInput").clone(true).appendTo(".choiceContent").removeClass("contentInput").addClass("addInput").attr("name", "content["+i+"]");
                }
            }else if($(".choiceContent_sec").length){
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
