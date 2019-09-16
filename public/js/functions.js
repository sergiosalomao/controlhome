//*  Relogio
var myVar = setInterval(relogio, 1000);
function relogio() {
	var d = new Date(),
		displayDate;
	if (navigator.userAgent.toLowerCase().indexOf("firefox") > -1)
		displayDate = d.toLocaleTimeString("pt-BR");
	else
		displayDate = d.toLocaleTimeString("pt-BR", { timeZone: "America/Belem" });
	var visivel = $("#relogio").is(":visible");
	if (visivel) document.getElementById("relogio").innerHTML = displayDate;
}