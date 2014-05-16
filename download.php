<?php
	header('Content-Disposition: attachment; filename="ELP_query.csv"');
	header("Content-type: text/csv");
	require_once('beamMeUp.php');
	$query = $_REQUEST['download'];
	$query = stripslashes($query);
	
	$ELP = new ELP($query);
	
	$result = $ELP->ELPConnect();
	$finfo = $result->fetch_fields();
	$output = array();

	$headers= array();
	foreach($finfo as &$val) {
		$headers[] = $val->name;
	}
	array_push($output,$headers);
	
	while ($arr = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		array_push($output, $arr);
	}
	
	$out = fopen('php://output', 'w');
	foreach($output as $event) {
		fputcsv($out, $event);
	}
	fclose($out);
?>