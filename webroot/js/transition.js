$(function(){

    $(".crewSendTransition").click(function(){
        window.location.href = "crew-sends" + "?page=1" + "?transition" + "?" + this.id;
    })

    $(".messageBordTransition").click(function(){
        window.location.href = "message-bords" + "?page=1" + "?transition" + "?" + this.id;
    })

    var url = location.href;
    parameters = url.split("?");

    var flag = 0;
    if($.inArray("transition", parameters) != -1)
    {
        var count = $(".incidentManagementsId").length;
        //インシデントID
        var id = parameters[parameters.length -1];
        for(var i = 0; i < count; i++)
        {
            var text = $("p[name='incidentId[" + i + "]']").text();
            var prm = $.inArray(id, parameters);
            if(parameters[prm] == text)
            {
                $("p[name='incidentId[" + i + "]']").parents(".branch").find("p").addClass("text-success");
                //$("p[name='incidentId[" + i + "]']").parents(".branch").next(".node").slideToggle();
                $("p[name='incidentId[" + i + "]']").parents(".branch").next(".node").css("display", "block");
                var offset = $("p[name='incidentId[" + i + "]']").parents(".branch").offset();
                $(window).scrollTop(offset.top);
                flag = 1;
                break;
            }
        }
        if(flag == 0)
        {
            //正規表現でページ数を取得
            var page = /page=[1-9]/;
            for(var i = 0; i < parameters.length; i++)
            {
                if(page.test(parameters[i]))
                {
                    para = parameters[i].split("=");
                    nextPageNumber = Number(para[1]) + 1;
                }
            }
            window.location.href = parameters[0] + "?page=" + nextPageNumber  +"?transition" + "?" + id;
        }
    }

});
