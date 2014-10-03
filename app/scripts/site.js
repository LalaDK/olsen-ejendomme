// Search through an array of arrays for a specified key
function searchStr(str, array) {
	var result = new Array();
	for(i = 0; i < array.length; i++) {
		for(j = 0; j < array[i].length; j++) {
			if(array[i][j].toLowerCase().indexOf(str.toLowerCase()) != -1) {
				result.push(users[i]);
			}
		}
	}
	return result;
}