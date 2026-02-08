<?php
// tests.php
require 'db.php';

function run_test($name, $condition) {
    echo $name . ": " . ($condition ? "<span style='color:green'>PASS</span>" : "<span style='color:red'>FAIL</span>") . "<br>";
}

echo "<h2>Ejecutando Pruebas Unitarias v0.1.0</h2>";

// Test 1: Conexión DB
run_test("Conexión a Base de Datos", $pdo != null);

// Test 2: Hashing
$pass = "123456";
$hash = password_hash($pass, PASSWORD_BCRYPT);
run_test("Verificación de Hash", password_verify($pass, $hash));

// Test 3: Simulación de Prompt
$role = "Ingeniero";
$domain = "IT";
$prompt = "Actúa como $role experto en $domain";
run_test("Construcción de String", strpos($prompt, "Ingeniero") !== false);

?>