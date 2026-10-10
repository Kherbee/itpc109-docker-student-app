<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$sn = trim($_POST['student_number'] ?? '');
$fn = trim($_POST['first_name'] ?? '');
$ln = trim($_POST['last_name'] ?? '');
$c = trim($_POST['course'] ?? '');

if ($sn === '' || $fn === '' || $ln === '' || $c === '') {
    exit('All fields are required.');
}

$stmt = $pdo->prepare(
    'INSERT INTO students
    (student_number, first_name, last_name, course)
    VALUES (:sn, :fn, :ln, :c)'
);

$stmt->execute([
    ':sn' => $sn,
    ':fn' => $fn,
    ':ln' => $ln,
    ':c' => $c
]);

header('Location: index.php');
exit;