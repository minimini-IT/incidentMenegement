$(function(){

    //chedulesの曜日
    $('input[name="repe_flag"]').click(function(){
        $(".dayOfWeek").slideToggle();
        if($(this).prop("checked")){
            $(".dayOfWeek :input").prop("required", true);
        }else{
            $(".dayOfWeek :input").prop("checked", false);
        }

    });

    $(".dayOfWeek :input").click(function(){
        if($(".dayOfWeek :checked").length >= 1){
            $(".dayOfWeek :input").prop("required", false);
        }else{
            $(".dayOfWeek :input").prop("required", true);
        }

    })



    //初期状態
    privateInitialize();
    destinationInitialize();


    //private user チェック後 destination user 選択可能
    //private user でチェックしていないユーザは destination user 選択不可
    



    //閲覧可能ユーザは必ず選択
    //選択ない場合は全ユーザがcheckされる

//----------------------- private ------------------------
    //
    //チェックボックス（private）
    //id="privateAllUser" => 全ユーザ
    //id="privateUser" => 全ユーザ以外の各ユーザ
    //id="privateGroup" => 各班のチェックボックス
    //$('#privateAllUser').click(function(){
    $('input[name="allUser[]"]').click(function(){
        allClick($(this).prop("checked"), true, ".privateUser", ".privateGroup");
        privateInitialize();
    });
 
    //id="privateSoukatu" => 総括班checkbox
    //id="privateSoukatuUser" => 総括ユーザを囲っているdiv
    $("#privateSoukatu").click(function(){
        groupClick($(this).prop("checked"), "#privateSoukatuUser");
    });
    //class="privateSoukatu" => 各総括ユーザ
    $(".privateSoukatu").click(function(){
        userClick(
            $("#privateSoukatuUser :checked").length == $("#privateSoukatuUser :input").length -1, 
            "#privateSoukatu"
        );
    });

    //id="privateKenkyo" => 研教班checkbox
    //id="privateKenkyoUser" => 研教ユーザを囲っているdiv
    $("#privateKenkyo").click(function(){
        groupClick($(this).prop("checked"), "#privateKenkyoUser");
    });
    //class="privateKenkyo" => 各総括ユーザ
    $(".privateKenkyo").click(function(){
        userClick(
            $("#privateKenkyoUser :checked").length == $("#privateKenkyoUser :input").length -1, 
            "#privateKenkyo"
        );
    });

    //id="privateSystem" => シス監班checkbox
    //id="privateSystemUser" => シス監ユーザを囲っているdiv
    $("#privateSystem").click(function(){
        groupClick($(this).prop("checked"), "#privateSystemUser");
    });
    //class="privateSystem" => 各緊対ユーザ
    $(".privateSystem").click(function(){
        userClick(
            $("#privateSystemUser :checked").length == $("#privateSystemUser :input").length -1, 
            "#privateSystem"
        );
    });

    //id="privateKintai" => 緊対班checkbox
    //id="privateKintaiUser" => 緊対ユーザを囲っているdiv
    $("#privateKintai").click(function(){
        groupClick($(this).prop("checked"), "#privateKintaiUser");
    });
    //class="privateKintai" => 各緊対ユーザ
    $(".privateKintai").click(function(){
        userClick(
            $("#privateKintaiUser :checked").length == $("#privateKintaiUser :input").length -1, 
            "#privateKintai"
        );
    });

    //全班が選択されたなら、全ユーザをチェック
    $(".privateGroup :input").click(function(){
        GUClick(".privateGroup", 0, true, 'input[name="allUser[]"]', ".privateUser", ".privateGroup");
    });

    //全ユーザが選択されたなら、全ユーザをチェック
    //id="privateUsers" => 全ユーザ以外のユーザを囲むdiv
    $(".privateUser :input").click(function(){
        //controlでcheckbox作成時、label部分にhidden input作成されるので-4
        GUClick(".privateUser", -4, true, 'input[name="allUser[]"]', ".privateUser", ".privateGroup");
    });

//----------------------- destination ------------------------
    
    //チェックボックス(destination)
    //id="allUser" => 全選択
    //id="destinationUser" => あて先ユーザを囲うdiv
    //id="group" => 各班のcheckboxを囲うdiv
    $("#allUser").click(function(){
        allClick($(this).prop("checked"), false, ".destinationUser", ".group");
        destinationInitialize();
    });

    //チェックボックス(destination 総括班用)
    //id="soukatu" => 総括班checkbox
    $("#soukatu").click(function(){
        groupClick($(this).prop("checked"), "#soukatuUser");
    });
    //id="soukatuUser" => 総括班ユーザのcheckboxに設定されているid
    //class="soukatu" => 総括班ユーザのチェックボックス
    $(".soukatu").click(function(){
        //controlでcheckbox作成時、label部分にhidden input作成されるので-1
        userClick(
            $("#soukatuUser :checked").length == $("#soukatuUser :input").length -1, 
            "#soukatu"
        );
    });

    //チェックボックス(destination 研教班用)
    //id="kenkyo" => 研教班checkbox
    $("#kenkyo").click(function(){
        groupClick($(this).prop("checked"), "#kenkyoUser");
    });
    //id="kenkyoUser" => 総括班ユーザのcheckboxに設定されているid
    //class="kenkyo" => 研教班ユーザのチェックボックス
    $(".kenkyo").click(function(){
        userClick(
            $("#kenkyoUser :checked").length == $("#kenkyoUser :input").length -1, 
            "#kenkyo"
        );
    });

    //チェックボックス(destination シス監班用)
    //id="system" => シス監班checkbox
    $("#system").click(function(){
        groupClick($(this).prop("checked"), "#systemUser");
    });
    //class="system" => シス監班ユーザのチェックボックス
    //id="systemUser" => シス監班ユーザのcheckboxに設定されているid
    $(".system").click(function(){
        userClick(
            $("#systemUser :checked").length == $("#systemUser :input").length -1, 
            "#system"
        );
    });

    //チェックボックス(destination ｷﾝﾀｲ監班用)
    //id="kintai" => 緊対班checkbox
    $("#kintai").click(function(){
        groupClick($(this).prop("checked"), "#kintaiUser");
    });
    //class="kintai" => 緊対班ユーザのチェックボックス
    $(".kintai").click(function(){
        userClick(
            $("#kintaiUser :checked").length == $("#kintaiUser :input").length -1, 
            "#kintai"
        );
    });

    //各班チェックボックス全選択で全ユーザチェック
    $("input[name='group']").click(function(){
        GUClick(".group", 0, false, "#allUser", ".destinationUser", ".group");
    });



    //全選択からユーザを選択した場合の処理
    //class="destUser" => すべてのユーザinput checkboxに付与しているclass
    $(".destUser").click(function(){
        //controlでcheckbox作成時、label部分にhidden input作成されるので-4
        if($(".destinationUser :checked").length == $(".destinationUser :input").length -4){
            $("#allUser").prop("checked", true);
            $(".group :input").prop("checked", false).prop("disabled", true);
            destinationInitialize();
        }else{
            $("#allUser").prop("checked", false);
            if($(".group :input").prop("disabled")){
                $(".group :input").prop("disabled", false);
                if($("#soukatuUser :checked").length == $("#soukatuUser :input").length -1){
                    $("#soukatu").prop("checked", true);
                }
                if($("#kenkyoUser :checked").length == $("#kenkyoUser :input").length -1){
                    $("#kenkyo").prop("checked", true);
                }
                if($("#systemUser :checked").length == $("#systemUser :input").length -1){
                    $("#system").prop("checked", true);
                }
                if($("#kintaiUser :checked").length == $("#kintaiUser :input").length -1){
                    $("#kintai").prop("checked", true);
                }
            }
            destinationInitialize();
        }
    });


    function groupClick(result, user){
        if(result){
            $(user + " :input").prop("checked", true);
        }else{
            $(user + " :input").prop("checked", false);
        }
    }

    function userClick(result, group){
        if(result){
            $(group).prop("checked", true);
        }else{
            $(group).prop("checked", false);
        }
    }

    function GUClick(thisClick, inputLength, flag, allUser, user, group){
        if($(thisClick + " :checked").length == $(thisClick + " :input").length + inputLength){
            $(allUser).prop("checked", true);
            if(flag){
                $(user + " :input").prop("checked", false).prop("disabled", true);
            }else{
                $(user + " :input").prop("checked", true);
            }
            $(group + " :input").prop("checked", false).prop("disabled", true);
        }else{
            $(allUser).prop("checked", false);
        }
    }

    //flag => private(true) destination(false)
    function allClick(result, flag, user, group){
        if(result){
            if(flag){
                $(user + " :input").prop("checked", false).prop("disabled", true);
            }else{
                $(user +" :input").prop("checked", true);
            }
            $(group + " :input").prop("checked", false).prop("disabled", true);
        }else{
            $(user + " :input").prop("checked", false).prop("disabled", false);
            $(group + " :input").prop("disabled", false);
        }
    }

    function privateInitialize(){
        if($("#privateSoukatuUser :input").length -1 == 0)
        {
            $("#privateSoukatu").prop("checked", true).prop("disabled", true);
        }
        if($("#privateKenkyoUser :input").length -1 == 0)
        {
            $("#privateKenkyo").prop("checked", true).prop("disabled", true);
        }
        if($("#privateSystemUser :input").length -1 == 0)
        {
            $("#privateSystem").prop("checked", true).prop("disabled", true);
        }
        if($("#privateKintaiUser :input").length -1 == 0)
        {
            $("#privateKintai").prop("checked", true).prop("disabled", true);
        }
    }

    function destinationInitialize(){
        if($("#soukatuUser :input").length -1 == 0)
        {
            $("#soukatu").prop("checked", true).prop("disabled", true);
        }
        if($("#kenkyoUser :input").length -1 == 0)
        {
            $("#kenkyo").prop("checked", true).prop("disabled", true);
        }
        if($("#systemUser :input").length -1 == 0)
        {
            $("#system").prop("checked", true).prop("disabled", true);
        }
        if($("#kintaiUser :input").length -1 == 0)
        {
            $("#kintai").prop("checked", true).prop("disabled", true);
        }
    }

    
});
