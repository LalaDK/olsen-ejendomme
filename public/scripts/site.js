// Search through an array of arrays for a specified key
function searchStr(str, array) {
	var result = new Array();
	var strArr = str.split(' ');
	// Loop through the search words
	for(h = 0; h < strArr.length; h++) {
		var searchString = array[h];

		if(result.length > 0) {
			array = result;
		}

		// If the search word is undefined, then skip the loop
		if(searchString == undefined || searchString == '') {
			break;
		}

		for(i = 0; i < array.length; i++) {
			for(j = 0; j < array[i].length; j++) {
				var current = array[i][j];
				if(current.toLowerCase().indexOf(searchString.toLowerCase()) != -1) {
					if(result.indexOf(array[i]) == -1) {
						result.push(array[i]);
					}
					break;
				}
			}
		}
	}
	return result;
}


// Highligther function
function highlight(key, text, split, before, after) {
	var result = '';

	// If either the search value or the text to earch is empty just return
	if(key == '' || text == '') {
		return text;
	}

	if(!split) {
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
	else {
		var keyArr = key.split(' ');
		for(m = 0; m < keyArr.length; m++) {
			if(keyArr[m] == '' || keyArr[m] == "" || keyArr[m] == undefined) {
				keyArr.splice(m, 1);
			}
		}
		var tmpStr = text;
		// For each search string
		for(k = 0; k < keyArr.length; k++) {
			if(result != undefined && result != '') {
				tmpStr = result;
				result = '';
			}
			// Define key. If not available, then stop
			key = keyArr[k];
			if(key == undefined || key == '') {
				break;
			}

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
		}
		return result;
	}
}

function lightbox_dashboard_cancel(){
	parent.window.location="{{URL::to('dashboard')}}";
}

//Ajax call to delete companies
function delete_companies(){
	$.ajax({
		url: 'destroy',
		type: 'DELETE',
		data: {'ids' : removeid},
		success: function(result) {
			parent.window.location="{{URL::to('dashboard')}}";
		},
		error: function(){
			$('#status-msg').addClass('alert alert-danger');
			$('#status-msg').text('Der er ikke valgt nogen selskaber');
		}
	});
}

//Toggle details on tables
function toggleTableDetails(id){
	var dh = '.header-'+id;
	var dd = '.detail-'+id;
	var di = '.icon-'+id;
	if($(dd).is(':visible')){
			$(di).removeClass('glyphicon-chevron-down');
			$(di).addClass('glyphicon-chevron-right');
		} else {
			$(di).removeClass('glyphicon-chevron-right');
			$(di).addClass('glyphicon-chevron-down');
		}
	$(dh).fadeToggle();
	$(dd).fadeToggle();
}