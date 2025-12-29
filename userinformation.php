<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.php");
  exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$db   = "painted_horizons";
$port = 4306;

$connection = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_set_charset($connection, "utf8mb4");

/* FORM DATA */
$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$phone   = trim($_POST["phone"] ?? "");
$service = trim($_POST["service"] ?? "");
$address = trim($_POST["address"] ?? "");
$notes   = trim($_POST["notes"] ?? "");

/* BASIC VALIDATION */
if ($name === "" || $email === "") {
  header("Location: index.php?error=1");
  exit;
}

/* 🔑 Generate confirmation code */
$confirmationCode = "PH" . "-" . strtoupper(bin2hex(random_bytes(2)));

/* INSERT */
$sql = "INSERT INTO quote_requests
        (confirmation_code, name, email, phone, service, address, notes)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param(
  $stmt,
  "sssssss",
  $confirmationCode,
  $name,
  $email,
  $phone,
  $service,
  $address,
  $notes
);
mysqli_stmt_execute($stmt);

/* Redirect WITH confirmation code */
header("Location: index.php?sent=1&conf=" . urlencode($confirmationCode) . "#contact");

exit;
