$(function(){

    var addressCount = 1;
    var linkCount = 1;
    $(".addAddress").click(function(){
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
    $('.branch').click(function(){
        $(this).next(".node").slideToggle();
        if($(this).find("p").hasClass("text-success"))
        {
            $(this).find("p").removeClass("text-success");
        }
        else
        {
            $(this).find("p").addClass("text-success");
        }
    });
    
    //選択肢必要分表示
    $("#reload").click(function(){
        var choice = $("#choice").val();
        if(choice == 1){
            $(".contentInput").clone(true).appendTo(".choiceContent").removeClass("contentInput").addClass("addInput").attr("name", "content[1]");
        }else if(choice >= 2 && choice < 6){
            if($(".choiceContent").length){
                $(".contentInput").clone(true).appendTo(".choiceContent").removeClass("contentInput").addClass("addInput").attr("name", "content[1]");
                for(var i = 2; i <= choice; i++){
                    $(".contentInput").clone(true).appendTo(".choiceContent").removeClass("contentInput").addClass("addInput").attr("name", "content["+i+"]");
                }
            }
        }

        //一回押したら押せなくする
        $(this).prop("disabled", true);
    });
    
    //やり直し用
    $("#reset").click(function(){
        $(".addInput").remove();
        $("#reload").prop("disabled", false);
    });

});
