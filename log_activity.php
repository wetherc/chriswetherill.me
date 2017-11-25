<?php
header('Access-Control-Allow-Origin: *');
$MYSQL = parse_ini_file("/opt/api/logging.ini");
$MYSQL_COLS = "sessionId, remoteAddr, fingerprint, components,
  protocol, hostname, pathname, timestamp";

$POST_VALS = json_decode(file_get_contents('php://input'), true);

// Connect
$conn = new mysqli(
  $MYSQL["HOST"],
  $MYSQL["USER"],
  $MYSQL["PWD"],
  $MYSQL["DB"]
);

if ($conn->connect_errno) {
    http_response_code(500);
    exit;
}

$POST_VALS = [
  "sessionId" => "'".mysqli_real_escape_string($conn, $POST_VALS["sessionId"])."'",
  "remoteAddr" => "'".mysqli_real_escape_string($conn, $POST_VALS["remoteAddr"])."'",
  "fingerprint" => "'".mysqli_real_escape_string($conn, $POST_VALS["fingerprint"])."'",
  "components" => "'".mysqli_real_escape_string($conn, json_encode($POST_VALS["components"]))."'",
  "protocol" => "'".mysqli_real_escape_string($conn, $POST_VALS["protocol"])."'",
  "hostname" => "'".mysqli_real_escape_string($conn, $POST_VALS["hostname"])."'",
  "pathname" => "'".mysqli_real_escape_string($conn, $POST_VALS["pathname"])."'",
  "timestamp" => mysqli_real_escape_string($conn, time())
];

// Query
$query = sprintf(
  "INSERT INTO %s (%s) VALUES (%s)",
  $MYSQL["TABLE"],
  $MYSQL_COLS,
  implode(',', $POST_VALS)
);

if (!$result = $conn->query($query)) {
  // Oh no! The query failed. 
  http_response_code(500);
  exit;
}

$result->free();
$conn->close();
