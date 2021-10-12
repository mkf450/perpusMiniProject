// Nama: Muhammad Keenan Fathurrahman
// Nim: 24060119130052
// Kelas: PBP Kelas A2 Tugas Praktikum ke-5
// Tanggal: 01 Oktober 2021

//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest(){
	if (window.XMLHttpRequest){
		// code for modern browsers
		return new XMLHttpRequest();
	} else {
		// code for old IE browsers
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
}

// Fungsi urlAjax
function callAjax(url,inner){
	var xmlhttp = getXMLHTTPRequest();
	xmlhttp.open('GET', url, true);
	xmlhttp.onreadystatechange = function() {
		document.getElementById(inner).innerHTML = '<img src="./ajax_loader.png"/>';
		if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)){
			document.getElementById(inner).innerHTML = xmlhttp.responseText;
		} return false;
	}
	xmlhttp.send(null);
}

// Fungsi showBook
function showBook(title) {
	var inner = 'detail_book';
	var url = 'get_book.php?kata=' + title;
	if(title == ""){
		document.getElementById(inner).innerHTML = '';
	} else {
		callAjax(url,inner);
	}
}
