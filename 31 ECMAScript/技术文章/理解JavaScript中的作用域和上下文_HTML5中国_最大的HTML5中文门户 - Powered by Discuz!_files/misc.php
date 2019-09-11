if($('secqaa_qSJIRi3O')) {
	var sectpl = seccheck_tpl['qSJIRi3O'] != '' ? seccheck_tpl['qSJIRi3O'].replace(/<hash>/g, 'codeqSJIRi3O') : '';
	var sectplcode = sectpl != '' ? sectpl.split('<sec>') : Array('<br />',': ','<br />','');
	var string = '<input name="secqaahash" type="hidden" value="qSJIRi3O" />' + sectplcode[0] + '验证问答' + sectplcode[1] + '<input name="secanswer" id="secqaaverify_qSJIRi3O" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec(\'qaa\', \'qSJIRi3O\')" />' +
		' <a href="javascript:;" onclick="updatesecqaa(\'qSJIRi3O\');doane(event);" class="xi2">换一个</a>' +
		'<span id="checksecqaaverify_qSJIRi3O"><img src="' + STATICURL + 'image/common/none.gif" width="16" height="16" class="vm" /></span>' +
		sectplcode[2] + 'HTML5中国网址(html5cn.org)' + sectplcode[3];
	evalscript(string);
	$('secqaa_qSJIRi3O').innerHTML = string;
}