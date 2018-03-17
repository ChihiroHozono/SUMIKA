
// データを保持する連想配列
var total_data = {};
// 日付やジオデータを表示しtotal_dataに代入する関数
// ダブりなう
function echo_geodata(position){
	// 日付データ
	var time = new Date();
	total_data['time'] = time;
	// ジオデータ
	var latitude = position.coords.latitude;
	total_data['latitude'] = latitude;
	var longitude= position.coords.longitude;
	total_data['longitude'] = longitude;


}
// 音声ファイルを再生する関数
function sound(){
	document.getElementById( 'sound-file' ).play();
}
// JQuery------------------------------------------------
// ハンバーガーをタップした時の動作（メニューとオーバーレイ）

var num = 0;
$('.fa-align-justify').click(function(){
	$("body").append('<div id="modal-overlay"></div>');
	$(this).data("click",++num);
	var click = $(this).data("click");
	if(click % 2 == 1){
		$('#hide-menu').css('display','block');
		$('#modal-overlay').fadeIn();
	}else{
		$('#hide-menu').css('display','none');
		$('#modal-overlay').fadeOut();
	}
})



// カナヅチを押した時の動作
$('.create-sumika').click(function(){
	navigator.geolocation.getCurrentPosition(echo_geodata);
	$('.main-sumika').animate({opacity: '1'},5000);
	sound();
	$('#sumika-create-modal').fadeIn();
	initMap();

});

// モーダルを閉じる
$('#submit-btn').click(function(){
	$('#sumika-create-modal').fadeOut();
});

// スミトをクリック
$('.fa-male').click(function(){
	$(this).css('opacity','1');
	var color = $(this).css('color');
	$('.main-sumito').css('color',color).css('opacity','1');
	// 色の値を配列に代入
	total_data['color'] = color;
});

// 入力した時のイベント
$('#input').keyup(function(){
	var text = $('#input').val();
	total_data['text'] = text;
});

// メインスミカをタップした時のイベント
$('.main-sumika').click(function(){
	// AJAX
	$.ajax({
	url: 'sumika_recieve.php',
	type: "POST",
	dataType: 'json',
	data:total_data
	}).done(function (data) {
		console.log("データをを取得しました。");
		console.log(data);
	}).fail(function () {
		console.log("処理に失敗しました。");
	});
});

// エンターを押した時のsubmitを防ぐ
$('input[type="text"]').keypress(function(e){
if((e.which == 13) || (e.keyCode == 13)){ return false; }
});

// 現在地取得処理
function initMap() {
  // Geolocation APIに対応している
  if (navigator.geolocation) {
    // 現在地を取得
    navigator.geolocation.getCurrentPosition(
      // 取得成功した場合
      function(position) {
        // 緯度・経度を変数に格納
        var mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        // マップオプションを変数に格納
        var mapOptions = {
          zoom : 15,          // 拡大倍率
          center : mapLatLng  // 緯度・経度
        };
        // マップオブジェクト作成
        var map = new google.maps.Map(
          document.getElementById("map"), // マップを表示する要素
          mapOptions         // マップオプション
        );
        //マップにマーカーを表示する
        var marker = new google.maps.Marker({
          map : map,             // 対象の地図オブジェクト
          position : mapLatLng   // 緯度・経度
        });
      },
      // 取得失敗した場合
      function(error) {
        // エラーメッセージを表示
        switch(error.code) {
          case 1: // PERMISSION_DENIED
            alert("位置情報の利用が許可されていません");
            break;
          case 2: // POSITION_UNAVAILABLE
            alert("現在位置が取得できませんでした");
            break;
          case 3: // TIMEOUT
            alert("タイムアウトになりました");
            break;
          default:
            alert("その他のエラー(エラーコード:"+error.code+")");
            break;
        }
      }
    );
  // Geolocation APIに対応していない
  } else {
    alert("この端末では位置情報が取得できません");
  }
}
