function echo_geodata(position){
	// 空の連想配列
	var data = [];

	// 日付データ
	var time = new Date();
	data['time'] = time;
	alert(data['time']);


	// ジオデータ
	data['latitude'] = position.coords.latitude;
	data['longitude'] = position.coords.longitude;
	alert(data['latitude'])
	alert(data['longitude'])
}