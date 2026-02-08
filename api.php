<?php
// api.php
require 'db.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

if ($action === 'register') {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $pass]);
        echo json_encode(['status' => 'success', 'msg' => 'Usuario registrado']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'msg' => 'Email ya existe']);
    }
    exit;
}

if ($action === 'login') {
    $email = $_POST['email'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        echo json_encode(['status' => 'success', 'msg' => 'Login correcto']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Credenciales inválidas']);
    }
    exit;
}

if ($action === 'save_prompt') {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'msg' => 'No autorizado']);
        exit;
    }
    $stmt = $pdo->prepare("INSERT INTO prompts (user_id, domain, role, context, final_prompt, rating) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['user_id'], 
        $_POST['domain'], 
        $_POST['role'], 
        $_POST['context'], 
        $_POST['final_prompt'], 
        $_POST['rating']
    ]);
    echo json_encode(['status' => 'success', 'msg' => 'Prompt guardado']);
    exit;
}

if ($action === 'logout') {
    session_destroy();
    echo json_encode(['status' => 'success']);
    exit;
}
?>