<?php
// api/tasks.php
require_once 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

// For PUT/DELETE sent as JSON with method override
if ($method === 'POST' && isset($_POST['_method'])) {
    $method = strtoupper($_POST['_method']);
}

if ($method === 'GET') {
    // list tasks
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
    $tasks = $stmt->fetchAll();
    echo json_encode($tasks);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
if ($method === 'POST') {
    // create
    $title = trim($_POST['title'] ?? ($input['title'] ?? ''));
    if (!$title) { http_response_code(400); echo json_encode(['error'=>'Title required']); exit; }
    $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (:title)");
    $stmt->execute([':title'=>$title]);
    echo json_encode(['success'=>true, 'id'=>$pdo->lastInsertId()]);
    exit;
}
if ($method === 'PUT') {
    // update (toggle complete or edit)
    $id = intval($input['id'] ?? 0);
    if (!$id) { http_response_code(400); echo json_encode(['error'=>'ID required']); exit; }
    if (isset($input['completed'])) {
        $stmt = $pdo->prepare("UPDATE tasks SET completed = :c WHERE id = :id");
        $stmt->execute([':c'=>($input['completed']?1:0), ':id'=>$id]);
    } elseif (isset($input['title'])) {
        $stmt = $pdo->prepare("UPDATE tasks SET title = :t WHERE id = :id");
        $stmt->execute([':t'=>trim($input['title']), ':id'=>$id]);
    }
    echo json_encode(['success'=>true]);
    exit;
}
if ($method === 'DELETE') {
    $id = intval($input['id'] ?? 0);
    if (!$id) { http_response_code(400); echo json_encode(['error'=>'ID required']); exit; }
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute([':id'=>$id]);
    echo json_encode(['success'=>true]);
    exit;
}

http_response_code(405);
echo json_encode(['error'=>'Method not allowed']);
