// JavaScript Document

function do_js_beautify() {
	js_source = document.getElementById('code_in').value.replace(/^\s+/, '');
	tabsize = document.getElementById('sel_tabsize').value;
	tabchar = ' ';
	if (tabsize == 1) {
		tabchar = '\t';
	}
	if (js_source && js_source.charAt(0) === '<') {
		document.getElementById('code_out').value = style_html(js_source, tabsize, tabchar, 80);
	} else {
		document.getElementById('code_out').value = js_beautify(js_source, tabsize, tabchar);
	}
	return false;
}
function pack_js(base64) {
	var input = document.getElementById('code_in').value;
	var packer = new Packer;
	if (base64) {
		var output = packer.pack(input, 1, 0);
	} else {
		var output = packer.pack(input, 0, 0);
	}
	document.getElementById('code_out').value = output;
}
function Empty() {
	document.getElementById('code_in').value = '';
	document.getElementById('code_out').value = '';
}

