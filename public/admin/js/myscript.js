$("div.alert").delay(5000).slideUp();


function deleteConfirm(msg){
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}