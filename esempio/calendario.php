<!doctype html>
<html lang="it"> 
<head>
	<title>BBManager</title>
	<?php
	include_once("./tpl/head_meta.tpl.php");
   include_once("./tpl/head_css.tpl.php");
   include_once("./tpl/head_js.tpl.php");
	?>
   <script src="./js/bbm_datiPrenotazioni.js"></script>
   <script src="./js/bbm_caricaCalendario.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-2 alert-success">Colonna camere<br>
		<ul>
			<li>
			  <input name="bt_loadReservations" type="button" id="bt_loadReservations" onClick="loadReservations(rooms_bookings_list, null);" value="Carica" />
				
			  <input name="bt_loadReservations2" type="button" id="bt_loadReservations2" onClick="getHTTP();" value="Carica HTTP" />
				
			 </li>
			<li>----------</li>
			<li>
			  <input type="button" onClick="toogleReservations(null);" value="ON | OFF - ALL" />
			 </li>
			<li>----------</li>
			<li>
			  <input type="button" onClick="toogleReservations(2);" value="ON | OFF - C1 - id2" />
			 </li>
			<li>
			  <input type="button" onClick="toogleReservations(7);" value="ON | OFF - C2 - id7" />
			 </li>
		</ul>
		</div>       
		<div class="col-7 alert-light">Colonna calendario

		  <div class="row">
				 <div class="col alert-dark">Lunedì</div>
				 <div class="col alert-info">Martedì</div>
				 <div class="col alert-warning">Mercoledì</div>
				 <div class="col alert-success">Giovedì</div>
				 <div class="col alert-danger">Venerdì</div>
				 <div class="col alert-secondary">Sabato</div>
				 <div class="col alert-dark">Domenica</div>
			</div>
		  <hr />

			<div id="loading" class="hide"><img src="img/loading2.gif"></div>

			<table class="table table-bordered">
			<thead class="thead-light">
				<tr id="header">
					<th scope="col">Lunedì</th>
					<th scope="col">Martedì</th>
					<th scope="col">Mercoledì</th>
					<th scope="col">Giovedì</th>
					<th scope="col">Venerdì</th>
					<th scope="col">Sabato</th>
					<th scope="col">Domenica</th>
				</tr>
			</thead>
			<tbody>
				<tr id="week1" class="week">
					<td id="day1" class="day"></td>
					<td id="day2" class="day"></td>
					<td id="day3" class="day"></td>
					<td id="day4" class="day"></td>
					<td id="day5" class="day"></td>
					<td id="day6" class="day"></td>
					<td id="day7" class="day"></td>
				</tr>
				<tr id="week2" class="week">
					<td id="day8" class="day"></td>
					<td id="day9" class="day"></td>
					<td id="day10" class="day"></td>
					<td id="day11" class="day"></td>
					<td id="day12" class="day"></td>
					<td id="day13" class="day"></td>
					<td id="day14" class="day"></td>
				</tr>
				<tr id="week3" class="week">
					<td id="day15" class="day"></td>
					<td id="day16" class="day"></td>
					<td id="day17" class="day"></td>
					<td id="day18" class="day"></td>
					<td id="day19" class="day"></td>
					<td id="day20" class="day"></td>
					<td id="day21" class="day"></td>
				</tr>
				<tr id="week4" class="week">
					<td id="day22" class="day"></td>
					<td id="day23" class="day"></td>
					<td id="day24" class="day"></td>
					<td id="day25" class="day"></td>
					<td id="day26" class="day"></td>
					<td id="day27" class="day"></td>
					<td id="day28" class="day"></td>
				</tr>
				<tr id="week5" class="week">
					<td id="day29" class="day"></td>
					<td id="day30" class="day"></td>
					<td id="day31" class="day"></td>
					<td id="day32" class="day"></td>
					<td id="day33" class="day"></td>
					<td id="day34" class="day"></td>
					<td id="day35" class="day"></td>
				</tr>
			</tbody>
			</table>
		</div>       
		<div class="col-3 alert-success">Colonna varie</div>
    </div>
</div>
</body>
</html>
