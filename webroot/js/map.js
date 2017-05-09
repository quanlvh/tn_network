var map;
var titleLayer;
var marker;

$(document).ready(function(){
  $("#area_list").scrollTop();
  $(".selected").each(function(idx, elm){
      console.log($(elm).offset());
      $("#area_list").scrollTop($(elm).offset().top - 270);
  });
    
  // 地図のデフォルトの緯度経度と拡大率
  // 適当に日本の真ん中あたり(35.5, 137)をZoomレベル5で
  map = L.map('map_area').setView([37.5,137.5], 5);

  // 描画する
  tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a><br>CSISシンプルジオコーディング実験（街区レベル位置参照情報）利用',
    maxZoom: 19
  });
  tileLayer.addTo(map);
  
  addMarker($('#id_pref_name').val(), $('#id_area_name').val(), $('#id_address').val());
});

/*
 * 地域名からピンを立ててズームする
 */
function addMarker(prefName, areaName, address = "") 
{
    //地名から緯度経度を取得
    $.ajax({
        url:'/requests/getAddress',
        type: 'POST',
        data: {
            'prefName':prefName,
            'areaName':areaName,
            'address':address
        },
        dataType: 'json',
        success: function (response) {
            //取得した座標にピンを立てる
            marker = L.marker([response['latitude'], response['longitude']]).addTo(map);

            //表示位置をピンを立てた位置に変更
            map.setView([response['latitude'], response['longitude']], 11);
            
        },
        error: function () {
            console.log('***ERROR***');
        }
    });
    
}