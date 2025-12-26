<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// IMPORTANT: if your MySQL root has a password, put it in the 3rd parameter
$connection = mysqli_connect("localhost", "paintedHorizons", "greenPhoenix@UWGB", "userinformation");



$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$phone   = trim($_POST["phone"] ?? "");
$service = trim($_POST["service"] ?? "");
$address = trim($_POST["address"] ?? "");
$notes   = trim($_POST["notes"] ?? "");

if ($name === "" || $email === "" || $service === "" || $address === "") {
  header("Location: index.php?error=1#quote");
  exit;
}

$sql = "INSERT INTO userservices (name, email, phone, service, jobLocation, notes)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $phone, $service, $address, $notes);
mysqli_stmt_execute($stmt);

header("Location: index.php?sent=1#quote");
exit;
