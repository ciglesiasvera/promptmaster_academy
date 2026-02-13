<?php
// db.php - Conexión a base de datos con fallback a SQLite
$host = 'localhost';
$db   = 'prompt_lab_v1';
$user = 'root'; // Cambiar según configuración local
$pass = '';     // Cambiar según configuración local
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = null;

// Intentar conexión MySQL
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Verificar si las tablas existen, si no, crearlas
    checkAndCreateTables($pdo, 'mysql');
} catch (\PDOException $e) {
    // Fallback a SQLite
    try {
        $pdo = new PDO('sqlite:' . __DIR__ . '/promptmaster.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Habilitar claves foráneas en SQLite
        $pdo->exec('PRAGMA foreign_keys = ON');
        checkAndCreateTables($pdo, 'sqlite');
    } catch (\PDOException $sqliteException) {
        // Si SQLite también falla, crear base de datos en memoria como último recurso
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('PRAGMA foreign_keys = ON');
        checkAndCreateTables($pdo, 'sqlite');
    }
}

function checkAndCreateTables($pdo, $driver) {
    // Verificar si la tabla users existe
    $tableCheck = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='users'");
    if ($driver === 'mysql') {
        $tableCheck = $pdo->query("SHOW TABLES LIKE 'users'");
    }
    
    $usersTableExists = false;
    try {
        $usersTableExists = ($tableCheck && $tableCheck->rowCount() > 0);
    } catch (Exception $e) {
        $usersTableExists = false;
    }
    
    if (!$usersTableExists) {
        createTables($pdo, $driver);
    }
}

function createTables($pdo, $driver) {
    if ($driver === 'mysql') {
        // Crear tablas MySQL
        $pdo->exec("CREATE DATABASE IF NOT EXISTS prompt_lab_v1 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE prompt_lab_v1");
        
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(191) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS prompts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                domain VARCHAR(100) NOT NULL,
                role VARCHAR(100) NOT NULL,
                context TEXT,
                final_prompt TEXT NOT NULL,
                rating INT DEFAULT 5,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                CONSTRAINT fk_user FOREIGN KEY (user_id) 
                    REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
        
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_user_prompts ON prompts(user_id)");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_domain ON prompts(domain)");
    } else {
        // Crear tablas SQLite
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                email TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
        
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS prompts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                domain TEXT NOT NULL,
                role TEXT NOT NULL,
                context TEXT,
                final_prompt TEXT NOT NULL,
                rating INTEGER DEFAULT 5,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            )
        ");
        
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_user_prompts ON prompts(user_id)");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_domain ON prompts(domain)");
    }
}

// Único lugar donde debe estar el inicio de sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>