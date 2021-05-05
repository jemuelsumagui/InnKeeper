var isReservationsShow = false;
//var booking_days_countZero = false;


function getHTTP() {			// rbl = rooms_bookings_list
	var 
		xmlhttp = new XMLHttpRequest();

	loading('show');
	
	xmlhttp.onreadystatechange = function() {
		console.debug('readyState: ' + this.readyState);
		console.debug('status: ' + this.status);
		
		if (this.readyState == 4 && this.status == 200) {
			
			var myArr2 = this.responseText;
			console.log(myArr2);

			var myArr = JSON.parse(this.responseText);
			console.log('Elementi: ' + myArr);
			
			setTimeout(function() {
					loading('hide');
				}, 1700);
			loadReservations(myArr, 'bt_loadReservations2');
			
		}
	};

	xmlhttp.open("GET", "test.php", true);
	xmlhttp.send();

	return true;
}


function loading(style) {// = 'hide'
	document.getElementById('loading').className = style;
	return true;
}


function loadReservations(rbl, btToDisable) {			// rbl = rooms_bookings_list
	var 
		//btToDisable = "bt_loadReservations",
		booking_info = '',
		booking_isStartDayFromZero = false,
		booking_startOnDay, booking_dayOne, booking_days, booking_id,
		booking_element, booking_elementId,
		gui_calendarDay, gui_elementId,
		r=0,b=0,d=0;
		
		btToDisable = (btToDisable) ? btToDisable : 'bt_loadReservations';

	
	for (r in rbl) {
		console.debug('#' + r + ' >> room_name: ' + rbl[r]["room_name"] + ' | color: ' + rbl[r]["room_color"]);
		
		for (b in rbl[r]["bookings"]) {
			console.debug('--- ' + b + ' - booking_id: ' + rbl[r]["bookings"][b]["booking_id"]);
			
			booking_info = 'Prenotazione:' + rbl[r]["bookings"][b]["booking_id"];
			booking_info += ' Inizio:' + rbl[r]["bookings"][b]["booking_startOnDay"];
			booking_info += ' Notti:' + rbl[r]["bookings"][b]["booking_days"];
			booking_info += ' Pax:' + rbl[r]["bookings"][b]["booking_pax"];
			
			booking_startOnDay = rbl[r]["bookings"][b]["booking_startOnDay"];
			booking_days = rbl[r]["bookings"][b]["booking_days"];
			booking_id = 'r' + rbl[r]["room_id"] + '_b'+rbl[r]["bookings"][b]["booking_id"] + '_d';

			for (d; d<booking_days; d++) {
				gui_calendarDay = booking_startOnDay + d;
				gui_elementId = 'day' + gui_calendarDay;

				booking_dayOne = (booking_isStartDayFromZero) ? 0 : 1;
				booking_elementId = booking_id + (d + booking_dayOne);

				booking_element = document.createElement('div');
					booking_element.id					= booking_elementId;
					booking_element.title 				= booking_info;
					booking_element.className			= 'd-block roomBooking roomId_'+rbl[r]['room_id'];
					booking_element.style.backgroundColor 	= rbl[r]["room_color"];
					booking_element.textContent		= rbl[r]["room_name"];
				document.getElementById(gui_elementId).appendChild(booking_element);
			}
			d = 0;
		}
	}
	
	isReservationsShow = true;
	document.getElementById(btToDisable).setAttribute("disabled","disabled");
	
	return true;
}


function toogleReservations(room_id) {
	// NOTE:  isReservationsShow funziona a livello globale, quindi è influenzata anche dal toggle di una singola entità
	
	var
		elementClass = 'room',
		bookingsRoom, bookingsRoomNum, room;
	
	
	if (room_id != null) {
		elementClass = elementClass + 'Id_' + room_id;
	} else {
		elementClass = elementClass + 'Booking';
	}

	bookingsRoom = document.getElementsByClassName(elementClass);
	bookingsRoomNum = bookingsRoom.length;
	
	if (isReservationsShow) {
		//$(local_selection).css({"display": "none", "visibility": "hidden"});
		for (room=0; room<bookingsRoomNum; room++){
			console.debug('Elemento:' + room);
			//console.debug('bookingsRoom:' + bookingsRoom[room]);
			bookingsRoom[room].style.display = 'none';
			bookingsRoom[room].style.visibility = 'hidden';
		}
	} else {
		for (room=0; room<bookingsRoomNum; room++){
			//console.debug('Elemento:' + room);
			//console.debug('bookingsRoom:' + bookingsRoom[room]);
			bookingsRoom[room].style.display = 'block';
			bookingsRoom[room].style.visibility = 'visible';
		}
	}

	isReservationsShow = !(isReservationsShow);
	
	return true;
}
