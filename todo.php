<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "focuszen_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$action = $_POST['action'] ?? '';

if($action == 'add'){
    $title = $_POST['title'];
    $stmt = $conn->prepare("INSERT INTO todo (title) VALUES (?)");
    $stmt->bind_param("s",$title);
    $stmt->execute();
    echo json_encode(["status"=>"success"]); exit;
}

if($action == 'toggle'){
    $id = $_POST['id'];
    $completed = $_POST['completed'];
    $stmt = $conn->prepare("UPDATE todo SET completed=? WHERE id=?");
    $stmt->bind_param("ii",$completed,$id);
    $stmt->execute();
    echo json_encode(["status"=>"success"]); exit;
}

if($action == 'delete'){
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM todo WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    echo json_encode(["status"=>"success"]); exit;
}

$result = $conn->query("SELECT * FROM todo ORDER BY id DESC");
$rows = [];
while($row = $result->fetch_assoc()) $rows[] = $row;
echo json_encode($rows);

$conn->close();
?>
