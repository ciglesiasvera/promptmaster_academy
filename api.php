<?php
// api.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'db.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';

// --- REGISTRO ---
if ($action === 'register') {
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email || strlen($password) < 6) {
        echo json_encode(['status' => 'error', 'msg' => 'Email inválido o contraseña muy corta']);
        exit;
    }

    $passHash = password_hash($password, PASSWORD_BCRYPT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $passHash]);
        echo json_encode(['status' => 'success', 'msg' => 'Usuario registrado con éxito']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'msg' => 'El email ya se encuentra registrado']);
    }
    exit;
}

// --- LOGIN ---
if ($action === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        echo json_encode(['status' => 'success', 'msg' => 'Bienvenido, acceso concedido']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Credenciales incorrectas']);
    }
    exit;
}

// --- PROTECCIÓN DE SESIÓN PARA ACCIONES DE LIBRERÍA ---
if (in_array($action, ['save_prompt', 'delete_prompt', 'delete_all_prompts'])) {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['status' => 'error', 'msg' => 'Sesión expirada o no autorizada']);
        exit;
    }
}

// --- GUARDAR PROMPT ---
if ($action === 'save_prompt') {
    $stmt = $pdo->prepare("INSERT INTO prompts (user_id, domain, role, context, final_prompt, rating) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['user_id'], 
        $_POST['domain'] ?? 'General', 
        $_POST['role'] ?? 'Asistente', 
        $_POST['context'] ?? '', 
        $_POST['final_prompt'] ?? '', 
        $_POST['rating'] ?? 5
    ]);
    echo json_encode(['status' => 'success', 'msg' => 'Prompt guardado en tu librería']);
    exit;
}

// --- ELIMINAR PROMPT INDIVIDUAL ---
if ($action === 'delete_prompt') {
    $id = $_POST['id'] ?? 0;
    $stmt = $pdo->prepare("DELETE FROM prompts WHERE id = ? AND user_id = ?");
    $stmt->execute([$id, $_SESSION['user_id']]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => 'success', 'msg' => 'Prompt eliminado']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'No se pudo eliminar el registro']);
    }
    exit;
}

// --- VACIAR LIBRERÍA ---
if ($action === 'delete_all_prompts') {
    $stmt = $pdo->prepare("DELETE FROM prompts WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    echo json_encode(['status' => 'success', 'msg' => 'Librería vaciada por completo']);
    exit;
}

// --- LOGOUT ---
if ($action === 'logout') {
    $_SESSION = []; // Vacía el array de sesión
    session_destroy();
    echo json_encode(['status' => 'success']);
    exit;
}