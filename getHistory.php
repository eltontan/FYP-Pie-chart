<?php
//                                          write your database name here
//												 |
//											    \|/
$mysqli = new mysqli("localhost","root","","fyp");

if ($mysqli -> connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

$sql = "SELECT * from historyy";
$result = mysqli_query($mysqli, $sql);

$mysqli -> close();

$response = [];
$labels = [];
$data = [];
while ($row = $result->fetch_assoc()) {
	$data[] = $row;
	$labels[] = $row['time'];
}

$datasetsLabel['vegetable'] = [];
$datasetsLabel['color'] = [];

foreach ($data as $key => $value) {
	if(!in_array($value['type_vegetable'], $datasetsLabel['vegetable'])) {
		array_push($datasetsLabel['vegetable'], $value['type_vegetable']);
		array_push($datasetsLabel['color'], random_color());
	}
}


$finalData = [];
foreach ($datasetsLabel['vegetable'] as $dataKey => $dataValue) {
	$finalData["humidity"][$dataKey]['label'] = $dataValue;
	$finalData["humidity"][$dataKey]['backgroundColor'] = "#".$datasetsLabel['color'][$dataKey];
	$finalData["humidity"][$dataKey]['borderWidth'] = 0;

	$finalData["temperature_number"][$dataKey]['label'] = $dataValue;
	$finalData["temperature_number"][$dataKey]['borderWidth'] = 0;
	$finalData["temperature_number"][$dataKey]['backgroundColor'] = "#".$datasetsLabel['color'][$dataKey];

	foreach ($data as $key => $value) {
		if($dataValue == $value['type_vegetable']) {
			$finalData["humidity"][$dataKey]['data'][] = $value['humidity'];

			$finalData["temperature_number"][$dataKey]['data'][] = $value['temperature_number'];
		}
	}
}

$response['labels'] = $labels;
$response['barData'] = $finalData;

echo json_encode($response);

?>