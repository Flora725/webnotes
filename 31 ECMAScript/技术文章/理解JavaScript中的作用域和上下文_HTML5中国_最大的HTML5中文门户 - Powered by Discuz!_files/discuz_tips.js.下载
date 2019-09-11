<html>
<head>


<title>Web Authentication</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">                                             
<!--                                                                
#content {                                                          
       position: relative;                                         
       height: 100%;                                               
       width: 100%;                                                
       margin:0px;        
       padding:0px;       
}                          
#content div{              
       height: 100%;
       width: 100%; 
       position: absolute;
       z-index: 9;        
       left: 0px;         
       top: 0px;          
}                          
#content img {             
       margin: 0px;       
       position: absolute;
       padding:0px;       
}                          
-->
</style>
<script language="javascript">
var ip = "172.16.64.1";var authResult = "";var en_picture = 0;var activePic = 0;var pictureUrl = "http://wh.itcast.cn/images/slidead/WUHAN/20165506135504291.jpg";var billing = "0";var leftTime = "0";var stopData = "0";var idcardauth = "0";/*交互输出变量，不能修改*/
var picturedir="";var tipstitles="";var tipsinfos="";/*交互输出变量，不能修改*/
/*function pic()                                                                
{                                                                               
	if(activePic == 1){
    if(en_picture == 1 || en_picture == 3)
    {
	document.getElementById("picdir").style.backgroundImage="url("+picturedir+")";  
    }else if(en_picture == 0 || en_picture == 2){
	document.getElementById("picdir").style.backgroundImage="url('"+pictureUrl+"')";  
	}
	}
} */           
</script>
</head>
<body id = "content" style="overflow-y:hidden">
<script language="javascript">
if(activePic == 1){
    if((en_picture == 1 || en_picture == 3)&&(picturedir != ""))
    {
	document.write('<img src="'+picturedir+'" width="100%" height="100%" />');
    }else if((en_picture == 0 || en_picture == 2)&&(pictureUrl != "")){
	document.write('<img src="'+pictureUrl+'" width="100%" height="100%" />');
	}else{
	document.write('<a></a>');
	}
}else{
	document.write('<a></a>');
}
</script>
<div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  ><tr>
<td height="551">
<form name="webAuth" method="get" action=""><!--此为要提交的表单 -->
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 1px #CCCCCC">
<tr>
<td colspan="3" height="40" valign="middle" align="center" >
	<table width="300" height="40" cellpadding="0" border="0" cellspacing="0" id="fontTb" bgcolor="">
	<tr>
<td align="center"><font size="+1" id=errFont ><strong><script language="javascript">document.write(authResult);</script></strong></font></td>
	</tr>
	</table>
</td>
</tr>
<tr><td height="20" valign="middle" colspan="3" align="center"><p><strong><font size="+2"><script type='text/javascript'>document.write(tipstitles);</script></font></strong></p></td></tr>
<tr><td height="20" valign="middle" colspan="3" align="center"><strong><font  size="-1"><script type='text/javascript'>document.write(tipsinfos);</script></font></strong></td></tr>

<tr>
<td height="20" valign="middle" colspan="3" align="center"><strong><font >需要认证上网！请输入您的用户名和密码！</font></strong></td>
</tr>
<tr>
<td height="20" valign="middle" colspan="3" align="center"><strong><font >-------------------------------------</font></strong></td>
</tr>


<tr><!--这里是用户名和密码的输入，属性name和id不能修改 -->
<td width="33%" height="30" align="right" valign="middle"><strong><font>用户名</font></strong></td>
<td width="3%"></td>
<td width="64%"><input name="userName" id="userName" type="text" value="" style="width:200px; height:23px"></td>
</tr>
<tr>
<td height="30" valign="middle" align="right"><strong><font >密码</font></strong></td>
<td></td>
<td><input name="userPasswd" id="userPasswd" type="password" value="" style="width:200px; height:23px"></td>
</tr>


<tr>
  <td height="30" valign="middle">&nbsp;</td>
  <td></td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="configSubmit"  bgcolor="#A9D1DC" value=" 登 录 " onClick="save()"><input type="hidden" name="userCommand" id="userCommand" value="userAuth"></td><!--此处为提交按钮，value值及name和id不能修改 -->
</tr>

<tr><td height="30" colspan="3">&nbsp;</td></tr>
</table>
</form>
<form name="webAuthOk" method="get" action="">
<input type="hidden" name="result">
</form>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<!--
<tr>
<td height="40" valign="middle" colspan="3" align="center"><strong><font  size="-1">提示：请允许本网站的弹出框通知，否则您可能无法正常上网！</font></strong></td>
</tr>
-->
<tr>
<td id="contact" colspan="3" valign="middle" align="center" style="display"><strong><font size="-1"></font></strong></td>
</tr>
</table>
</td>
</tr>
</table>
<script language="javascript">
function save()
{
	var tbl = webAuth;
	tbl.action = "http://" + ip + "/goform/formWebAuthUserSubmit";
	tbl.submit();
}

/* 关闭WebAuth.asp窗口 */
function closeWindow() {   
    window.opener = null;    
    window.open('', '_self', ''); 
    window.close();    
} 

function init()
{
    var message_web = "http://" + ip + "/WebAuth_message.asp"
	if (authResult == "认证成功！")
	{	
		window.open(message_web, '_blank', 'height=200, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no, top=0, left=0'); 
	}
	else if (authResult == "认证失败！")
	{
		errFont.color = "#FF0000";
	}
	else if (authResult != "")
	{
	    errFont.color = "#FF0000";
	}
	else
	{
	;
	}
if(en_picture == 2 || en_picture == 3)
{
	tipstitles = "";
	tipsinfos = "";
	document.getElementById("contact").style.display="none";
}

}
init();
</script>
</div>
</body>
</html>
