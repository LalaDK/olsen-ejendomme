// Search through an array of arrays for a specified key
function searchStr(str, array) {
	var result = new Array();
	for(i = 0; i < array.length; i++) {
		for(j = 0; j < array[i].length; j++) {
			if(array[i][j].toLowerCase().indexOf(str.toLowerCase()) != -1) {
				result.push(array[i]);
				break;
			}
		}
	}
	return result;
}

// Highligther function
function highlight(key, text, before, after) {

	if(key == '' || text == '') {
		return text;
	}
	var result = '';
	var tmpStr = text;
	var keySize = key.length;
	while(tmpStr.length != 0) {
		var firstPos = tmpStr.toLowerCase().indexOf(key.toLowerCase());
		if(firstPos == -1) {
			result += tmpStr;
			break;
		}
		else {
			result += tmpStr.substr(0, firstPos);
			result += before + tmpStr.substr(firstPos, keySize) + after;
			tmpStr = tmpStr.substr(firstPos + keySize);
		}
	}
	return result;
}

function lightbox_dashboard_cancel(){
	parent.window.location="{{URL::to('dashboard')}}";
}