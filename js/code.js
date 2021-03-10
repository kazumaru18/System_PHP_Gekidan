"use strict";

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