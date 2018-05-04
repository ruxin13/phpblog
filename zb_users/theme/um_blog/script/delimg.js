function clearing() {
    var el = document.getElementById('uplod_img1');
    if (el) {
        el.value = '';
    }
	document.getElementById('img-preview1').style.display = document.getElementById('img-preview1').style.display=='none'?'block':'none';
}
function clearwei() {
    var el = document.getElementById('uplod_img2');
    if (el) {
        el.value = '';
    }
	document.getElementById('img-preview2').style.display = document.getElementById('img-preview2').style.display=='none'?'block':'none';
}
function clearbgimg() {
    var el = document.getElementById('uplod_img3');
    if (el) {
        el.value = '';
    }
	document.getElementById('img-preview3').style.display = document.getElementById('img-preview3').style.display=='none'?'block':'none';
}

function cleartst() {
    var el = document.getElementById('postimga');
    if (el) {
        el.value = '';
    }
	document.getElementById('localImag').style.display = document.getElementById('localImag').style.display=='none'?'block':'none';
	document.getElementById('delmag').style.display = document.getElementById('delmag').style.display=='none'?'block':'none';
}

function cleartjt() {
    var el = document.getElementById('postimgb');
    if (el) {
        el.value = '';
    }
	document.getElementById('localImag2').style.display = document.getElementById('localImag2').style.display=='none'?'block':'none';
	document.getElementById('delmag2').style.display = document.getElementById('delmag2').style.display=='none'?'block':'none';
}


