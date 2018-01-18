function openTable(evt, tableName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tableName).style.display = "table"
	evt.currentTarget.className += " active";
}

/*var teams = document.getElementById("teams");

var btnSched = document.getElementById("showSchedule");
var btnTeams = document.getElementById("showTeams");

btnSched.onclick = function () {
	schedule.style.display = "table";
	teams.style.display = "none";
}

btnTeams.onclick = function () {
	schedule.style.display = "none";
	teams.style.display = "table";
}
*/