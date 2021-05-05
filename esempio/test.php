<?php
	$data = array(
		0 => [
			'room_id' 		=> 3,
			'room_name' 	=> 'Camera 05',
			'room_color'	=> 'yellow',
			'bookings'		=> [
				0 => [
					'booking_id'=>  34,
					'booking_startOnDay'=>  12,
					'booking_from'=> 	'2019-01-03',
					'booking_to'	=> '2019-01-06',
					'booking_days'=>  3,
					'booking_pax'=>  2,
				],
				1 => [
					'booking_id'=>  50,
					'booking_startOnDay'=>  23,
					'booking_from'=> 	'2019-01-03',
					'booking_to'	=> '2019-01-06',
					'booking_days'=>  2,
					'booking_pax'=>  2,
				],
			],
		],
		1 => [
			'room_id' 		=> 3,
			'room_name' 	=> 'Camera 07',
			'room_color'	=> 'magenta',
			'bookings'		=> [
				0 => [
					'booking_id'=>  342,
					'booking_startOnDay'=>  16,
					'booking_from'=> 	'2019-01-03',
					'booking_to'	=> '2019-01-06',
					'booking_days'=>  1,
					'booking_pax'=>  2,
				],
				1 => [
					'booking_id'=>  503,
					'booking_startOnDay'=>  3,
					'booking_from'=> 	'2019-01-03',
					'booking_to'	=> '2019-01-06',
					'booking_days'=>  4,
					'booking_pax'=>  2,
				],
			],
		],
	);

	$out = json_encode($data);

	echo($out);
?>
