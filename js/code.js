$(function() {
  seatSelect();
  $(document).ready(function(){
        //チェック済み座席の座席表反映
        $("#selectedSeatBox span").each(function(i) {
          var listSeatId = $(this).attr("id");
          var chartSeatId = listSeatId.replace("_selected", '');
          $("#"+chartSeatId).parent("td").addClass("seat_checked");
        });
        //仮予約済み座席の座席表反映
        $("#selectedSeatTempBox span").each(function(i) {
            var listSeatId = $(this).attr("id");
            var chartSeatId = listSeatId.replace("_temp", '');
            $("#"+chartSeatId).parent("td").removeClass("seat_reserved");
            $("#"+chartSeatId).parent("td").addClass("seat_temp");
          });
  });

});

// 座席指定
function seatSelect() {

  if ($("#seat-select-table").length) {
    $("#seat-select-table td").click(function(){

      var clickSeat = $(this).attr("class");
      if(clickSeat){
        clickSeat = clickSeat.replace("cboxElement", '');
          clickSeat = clickSeat.replace(/(^\s+)|(\s+$)/g, '');
      }

      switch (clickSeat){
        case "seat_checked"://チェック済み→デフォルト
          var target = $(this);
          var clickedID = $(this).find("input").attr("id");
          var clickedVal = $(this).find("input").val();
          var removeSelected = clickedID+"_selected";
          //$("#"+removeSelected).remove();
          $.ajax({//チェック済みセッション削除のajax通信
              type: "POST",
              url: BASE_URL+"/ticket/selectseat/delchkseat",
              data: {'value' : clickedID},
              success: function(msg){
                target.removeClass("seat_checked");
                $("#"+removeSelected).remove();
            }
          });
          break;
        case "seat_temp"://仮予約済み→キャンセル
            var targetObj = $(this);
            var clickedID = $(this).find("input").attr("id");

            $.colorbox({//キャンセル確認ポップアップ
              inline:true,
              href:'#dialog',
              opacity:0.5,width:"600px",height:"300px"});

            var ajaxResult="";

            $('#cancel_exec').bind('click', function() {//キャンセル実行ボタンクリック時
              var removeSelected = clickedID+"_temp";
              targetObj.find(":checkbox").prop("checked", false);
              var sekiwariId = clickedID.split("_");
              $.ajax({//仮予約済みセッション削除のajax通信
                    type: "POST",
                    async: false,
                    url: BASE_URL+"/ticket/selectseatcinema/deltmpseat",
                    data: {'value' : clickedID},
                    success: function(data){
                        //var message = data.slice(-5);
                        //if(message == "FATAL") {
                          //ajaxResult = message;
                        //}else{
                          $("#"+removeSelected).remove();
                          targetObj.removeClass("seat_temp");
                          $.colorbox.close();
                        //}
                    },
                    error: function(data){
                        ajaxResult = "FATAL";
                    }
                });
                if (ajaxResult=="FATAL"){
                  $.colorbox({
                    href: BASE_URL+"/ticket/selectseat/fatalalert",
                    iframe:true,opacity:0.5,width:"600px",height:"300px"
                  });
                }
                $('#cancel_exec').unbind();
            });
            $('#cancel_non_exec').bind('click', function() {//キャンセル実行ボタンクリック時
                $('#cancel_exec').unbind();
                $.colorbox.close();
            });
          break;
        case "seat_reserved"://販売済み
          break;
        case "seat_handicap"://車いす
          break;
        case ""://デフォルト→チェック済み
          if($("#selectedSeatBox span").length+$("#selectedSeatTempBox span").length+1>$("#seigen_su").val()){
            //alert("購入枚数制限を超えています");
            $.colorbox({
                href: BASE_URL+"/ticket/selectseat/limitover",
                iframe:true,
                opacity:0.5,
                width:"600px",
                height:"300px"
              });
              break;
            }
          var target = $(this);
          var clickedID = $(this).find("input").attr("id");
          var clickedVal = $(this).find("input").val();

          $.ajax({//チェック済みセッション追加のajax通信
              type: "POST",
              url: BASE_URL+"/ticket/selectseatcinema/chkseat",
              data: {'value' : clickedID},
              success: function(data){
                  var message = data.slice(-7);//PHP側で、return直前にechoで出した文字
                  if(message=="success"){
                      target.addClass("seat_checked");
                      $("#selectedSeatBox").prepend("<span class='selectedSeatNum' id='"+clickedID+"_selected'>"+clickedVal+"</span>");
                  }
              }
            });
          break;
        default://デフォルト
            if($("#selectedSeatBox span").length+$("#selectedSeatTempBox span").length+1>$("#seigen_su").val()){
              $.colorbox({
                href: BASE_URL+"/ticket/selectseat/limitover",
                iframe:true,
                opacity:0.5,
                width:"600px",
                height:"300px"
              });
              break;
            }
          var target = $(this);
          var clickedID = $(this).find("input").attr("id");
          var clickedVal = $(this).find("input").val();

          $.ajax({//チェック済みセッション追加のajax通信
            type: "POST",
            url: BASE_URL+"/ticket/selectseatcinema/chkseat",
            data: {'value' : clickedID},
            success: function(data){
                var message = data.slice(-7);//PHP側で、return直前にechoで出した文字
                if(message=="success"){
                    target.addClass("seat_checked");
                    $("#selectedSeatBox").prepend("<span class='selectedSeatNum' id='"+clickedID+"_selected'>"+clickedVal+"</span>");
                }
            }
          });
          break;
      }

    });

    var clicked = false;
    // 【仮押さえする】
    $("#btnTemp").click(function(){
        if (clicked) {
            return false;
        }
        clicked = true;
        $("[id^='unclicked_btn_']").hide();
        $("[id^='clicked_btn_']").show();

        var postValues = new Array();
        var i = 0

        //チェック済み座席リスト内にある席を取得
        $("#selectedSeatBox span").each(function(i) {
            var tempID =  $(this).attr("id");
            postValues[i] = tempID;//各パラメータの「_」区切り
            i++;
        });
        if (postValues.length == 0) {
            $(this).parent("a").addClass("dialog iframe cboxElement");
            $(".dialog").colorbox({opacity:0.5 });
            $(".iframe").colorbox({iframe:true, width:"600px", height:"300px"});
            $(this).parent("a").attr("href", BASE_URL+"/ticket/selectseat/alertemptychklist");
            $("[id^='clicked_btn_']").hide();
            $("[id^='unclicked_btn_']").show();
            clicked = false;
            return;
        } else {
            $(this).parent("a").removeClass("dialog iframe cboxElement");
            $(this).parent("a").attr("href", "javascript:void(0);");
        }
        var target = $(this);
        var ajaxResult = "";

        $.ajax({//仮予約済みセッション追加のajax通信
            type: "POST",
            async: false,
            url: BASE_URL+"/ticket/selectseatcinema/tmpreserve",
            data: {'value[]' : postValues},
            success: function(data){
                var message = data.slice(-5);
                if (message == "ERROR" || message == "FATAL" || message == "ENDED") {
                    ajaxResult = message;
                } else if (message.slice(-2) == "OK") {  //席予約が正常に行われた場合
                    $("#selectedSeatBox span").each(function(i) {  //仮予約済みリストに追加
                        var tempID =  $(this).attr("id");
                        var tempVal = $(this).html();
                        var newTempId = tempID.replace("_selected", '_temp');
                        $("#selectedSeatTempBox").append("<span class='selectedSeatNum red' id='"+newTempId+"'>"+tempVal+"</span>");
                    });
                    $("#selectedSeatBox .selectedSeatNum").remove();//チェック済みリストから除去
                    $("#seat-select-table td.seat_checked").each(function(i) {
                        $(this).removeClass("seat_checked").addClass("seat_temp").find(":checkbox").prop("checked", true);
                        var tempID =  $(this).find(":checkbox").attr("id");
                        var clickedVal = $(this).find("input").val();
                        var tempVal = $(this).find(":checkbox").val();
                    });
                } else {
                    ajaxResult = "FATAL";
                }
            },
            error: function(data) {
                ajaxResult = "FATAL";
            }
        });

        if (ajaxResult == "FATAL") {
            $("#selectedSeatBox .selectedSeatNum").remove();//チェック済みリストから除去
            $("#seat-select-table td.seat_checked").each(function(i) {//座席表のスタイル変更（チェック済みから仮予約へ）
                $(this).removeClass("seat_checked");
            });
            target.colorbox({
                href: BASE_URL+"/ticket/selectseat/fatalalert",
                iframe:true,opacity:0.5,width:"600px",height:"300px"
            });
        } else if (ajaxResult=="ERROR") {
            $("#selectedSeatBox .selectedSeatNum").remove();//チェック済みリストから除去
            $("#seat-select-table td.seat_checked").each(function(i) {//座席表のスタイル変更（チェック済みから仮予約へ）
               $(this).removeClass("seat_checked");
            });
            target.colorbox({
                href: BASE_URL+"/ticket/selectseat/erroralert",
                iframe:true,opacity:0.5,width:"600px",height:"300px"
            });
        } else if (ajaxResult=="ENDED") {
            $("#selectedSeatBox .selectedSeatNum").remove();//チェック済みリストから除去
            $("#seat-select-table td.seat_checked").each(function(i) {//座席表のスタイル変更（チェック済みから仮予約へ）
               $(this).removeClass("seat_checked");
            });
            target.colorbox({
                href: BASE_URL+"/ticket/selectseat/salesend",
                iframe:true,opacity:0.5,width:"600px",height:"300px"
            });
        }
        $("[id^='clicked_btn_']").hide();
        $("[id^='unclicked_btn_']").show();
        clicked = false;
    });

    //【別の日時で選びなおす】
    $("#btnOtherDate").click(function(){
        if (clicked) {
            return false;
        }
        clicked = true;
        $("[id^='unclicked_btn_']").hide();
        $("[id^='clicked_btn_']").show();

        var isEmpty=1;
        $("#selectedSeatTempBox span").each(function(i) {
        	isEmpty=0;
        });
        if (isEmpty==0) {//仮予約リストがある時→キャンセル確認ポップアップ
	        $(this).parent("a").addClass("dialog iframe cboxElement");
	        $(".dialog").colorbox({opacity:0.5 });
	        $(".iframe").colorbox({iframe:true, width:"600px", height:"300px"});
	        $(this).parent("a").attr("href", BASE_URL+"/ticket/selectseatcinema/reselectdateconf");
            $("[id^='clicked_btn_']").hide();
            $("[id^='unclicked_btn_']").show();
            clicked = false;
        } else {
        	$(this).parent("a").removeClass("dialog iframe cboxElement");
        	$(this).parent("a").attr("href", BASE_URL+"/ticket/selectseatcinema/reselectdate");
        }
    });

    //【戻る】
    $("#btnBack").click(function(){
        if (clicked) {
            return false;
        }
        clicked = true;
        $("[id^='unclicked_btn_']").hide();
        $("[id^='clicked_btn_']").show();

        var isEmpty=1;
    	$("#selectedSeatTempBox span").each(function(i) {
    		isEmpty=0;
    	});
    	if (isEmpty==0) {//仮予約リストがある時→キャンセル確認ポップアップ
	        $(this).parent("a").addClass("dialog iframe cboxElement");
	        $(".dialog").colorbox({opacity:0.5 });
	        $(".iframe").colorbox({iframe:true, width:"600px", height:"300px"});
	        $(this).parent("a").attr("href", BASE_URL+"/ticket/selectseatcinema/backconf");
	        $("[id^='clicked_btn_']").hide();
	        $("[id^='unclicked_btn_']").show();
	        clicked = false;
    	} else {
	        $(this).parent("a").removeClass("dialog iframe cboxElement");
	        $(this).parent("a").attr("href", BASE_URL+"/ticket/selectseatcinema/back");
    	}
    });

    //【次へ】
    $("#btnNext").click(function(){
        if (clicked) {
            return false;
        }
        clicked = true;
        $("[id^='unclicked_btn_']").hide();
        $("[id^='clicked_btn_']").show();

        var reqAlert=1;
    	$("#selectedSeatTempBox span").each(function(i) {//仮予約リストがある=正常
    		reqAlert=0;
    	});
    	$("#selectedSeatBox span").each(function(i) {//チェック済みリストがある=アラート表示
    		reqAlert=1;
    	});
    	if($("#selectedSeatTempBox span").length<$("#seigen_su").val()){//購入枚数に足りていない=アラート表示
    		reqAlert=1;
    	}
    	if (reqAlert==1) {//ポップアップフラグON
    		$(this).parent("a").addClass("dialog iframe cboxElement");
    		$(".dialog").colorbox({opacity:0.5 });
    		$(".iframe").colorbox({iframe:true, width:"600px", height:"300px"});
	        $("[id^='clicked_btn_']").hide();
	        $("[id^='unclicked_btn_']").show();
	        clicked = false;
    	} else {
    		$(this).parent("a").removeClass("dialog iframe cboxElement");
    	}
    	$(this).parent("a").attr("href", BASE_URL+"/ticket/selectseatcinema/next");
    });

  }
};
