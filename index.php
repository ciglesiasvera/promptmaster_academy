<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PromptMaster - IA Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .card { border: none; shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 12px; }
        .step-number { background: #0d6efd; color: white; width: 30px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; }
        .generated-box { background: #e9ecef; border-left: 5px solid #0d6efd; padding: 20px; font-family: 'Courier New', monospace; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">PromptMaster v0.1.0</a>
        <div class="d-flex align-items-center"> <?php if(isset($_SESSION['user_id'])): ?>
        
                <span class="navbar-text text-white me-3 d-none d-sm-block">
                    <i class="bi bi-person-circle"></i> 
                    <?php echo htmlspecialchars($_SESSION['user_email']); ?>
                </span>
                <button class="btn btn-outline-light btn-sm" onclick="logout()">Cerrar Sesión</button>
            <?php else: ?>
                <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</button>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card p-4">
                <h4 class="mb-4">Constructor de Prompts Didáctico</h4>
                
                <form id="promptForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">1</span>Dominio de Conocimiento</label>
                        <select class="form-select" id="domain" onchange="updatePrompt()">
                            <option value="">Selecciona un área...</option>
                            <option value="Ingeniería de Software">Ingeniería de Software</option>
                            <option value="Marketing Digital">Marketing Digital</option>
                            <option value="Derecho y Leyes">Derecho y Leyes</option>
                            <option value="Medicina y Salud">Medicina y Salud</option>
                            <option value="Escritura Creativa">Escritura Creativa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">2</span>Rol del Asistente</label>
                        <div class="input-group">
                            <select class="form-select" id="roleSelect" onchange="setRole()">
                                <option value="">Seleccionar o escribir...</option>
                                <option value="Experto Senior">Experto Senior</option>
                                <option value="Tutor Académico">Tutor Académico</option>
                                <option value="Crítico Constructivo">Crítico Constructivo</option>
                            </select>
                            <input type="text" class="form-control" id="roleInput" placeholder="O escribe un rol manual" oninput="updatePrompt()">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">3</span>Contexto del Problema</label>
                        <textarea class="form-control" id="context" rows="3" placeholder="Ej: Estoy desarrollando una app móvil y necesito optimizar la base de datos..." oninput="updatePrompt()"></textarea>
                        <div class="form-text">Describe la situación actual y por qué necesitas ayuda.</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Formato de Salida</label>
                            <select class="form-select" id="format" onchange="updatePrompt()">
                                <option value="Texto plano">Texto plano</option>
                                <option value="Tabla comparativa">Tabla comparativa</option>
                                <option value="Lista paso a paso">Lista paso a paso</option>
                                <option value="Código comentado">Código comentado</option>
                                <option value="JSON">JSON</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tono</label>
                            <select class="form-select" id="tone" onchange="updatePrompt()">
                                <option value="Profesional">Profesional</option>
                                <option value="Académico">Académico</option>
                                <option value="Persuasivo">Persuasivo</option>
                                <option value="Empático">Empático</option>
                                <option value="Sencillo (ELI5)">Sencillo (ELI5)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-light rounded">
                        <label class="form-label fw-bold">Ingeniería de Prompts Avanzada</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkCoT" onchange="updatePrompt()">
                            <label class="form-check-label">Chain of Thought (Pensamiento paso a paso)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkCritic" onchange="updatePrompt()">
                            <label class="form-check-label">Autocrítica (Revisar respuesta antes de enviar)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkStructure" onchange="updatePrompt()">
                            <label class="form-check-label">Estructura Viral (Gancho/Cuerpo/Cierre)</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card p-4 sticky-top" style="top: 20px;">
                <h5 class="text-primary"><i class="bi bi-robot"></i> Resultado en Tiempo Real</h5>
                <hr>
                <div class="generated-box mb-3" id="finalOutput">
                    Completa el formulario para ver la magia...
                </div>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-success" onclick="copyToClipboard()"><i class="bi bi-clipboard"></i> Copiar Prompt</button>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <div class="input-group">
                            <select class="form-select" id="rating">
                                <option value="5">⭐⭐⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="3">⭐⭐</option>
                                <option value="3">⭐</option>
                            </select>
                            <button class="btn btn-outline-primary" onclick="savePrompt()">Guardar</button>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning text-center mt-2 p-2">
                            <small>Inicia sesión para guardar tus prompts.</small>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Acceso Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs mb-3" id="authTab" role="tablist">
                    <li class="nav-item"><button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Login</button></li>
                    <li class="nav-item"><button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Registro</button></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login">
                        <form onsubmit="handleAuth(event, 'login')">
                            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register">
                        <form onsubmit="handleAuth(event, 'register')">
                            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                            <button type="submit" class="btn btn-success w-100">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Lógica Frontend
    function setRole() {
        const select = document.getElementById('roleSelect');
        const input = document.getElementById('roleInput');
        if(select.value) input.value = select.value;
        updatePrompt();
    }

    function updatePrompt() {
        const domain = document.getElementById('domain').value;
        const role = document.getElementById('roleInput').value;
        const context = document.getElementById('context').value;
        const format = document.getElementById('format').value;
        const tone = document.getElementById('tone').value;
        
        let prompt = "";

        // Construcción lógica del Prompt
        if(role) prompt += `Actúa como un **${role}** `;
        if(domain) prompt += `experto en el área de **${domain}**. `;
        if(context) prompt += `\n\n**Contexto:** ${context}`;
        
        // Estructura Viral
        if(document.getElementById('checkStructure').checked) {
            prompt += `\n\nPor favor sigue estrictamente la siguiente estructura:\n1. GANCHO (Frase llamativa)\n2. DESARROLLO (Contenido principal)\n3. CIERRE (Llamada a la acción)`;
        }

        // Técnicas
        if(document.getElementById('checkCoT').checked) prompt += `\n\n**Metodología:** Antes de responder, piensa paso a paso (Chain of Thought) y explica tu razonamiento.`;
        if(document.getElementById('checkCritic').checked) prompt += `\n\n**Revisión:** Analiza tu respuesta en busca de sesgos o errores antes de mostrar la salida final.`;

        prompt += `\n\n**Formato de Salida:** ${format}.`;
        prompt += `\n**Tono:** ${tone}.`;

        document.getElementById('finalOutput').innerText = prompt || "Completa el formulario...";
        
        // Persistencia Local (Guest)
        if(!<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>) {
            localStorage.setItem('lastDraft', prompt);
        }
    }

    // Cargar borrador para guests
    window.onload = function() {
        if(localStorage.getItem('lastDraft') && !<?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>) {
            // Lógica simple para restaurar visualización si se desea
        }
    };

    function copyToClipboard() {
        navigator.clipboard.writeText(document.getElementById('finalOutput').innerText);
        alert('Prompt copiado!');
    }

    async function handleAuth(e, action) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append('action', action);
        
        const res = await fetch('api.php', { method: 'POST', body: formData });
        const data = await res.json();
        alert(data.msg);
        if(data.status === 'success') location.reload();
    }

    async function savePrompt() {
        const formData = new FormData();
        formData.append('action', 'save_prompt');
        formData.append('domain', document.getElementById('domain').value);
        formData.append('role', document.getElementById('roleInput').value);
        formData.append('context', document.getElementById('context').value);
        formData.append('final_prompt', document.getElementById('finalOutput').innerText);
        formData.append('rating', document.getElementById('rating').value);

        const res = await fetch('api.php', { method: 'POST', body: formData });
        const data = await res.json();
        alert(data.msg);
    }

    function logout() {
        const formData = new FormData();
        formData.append('action', 'logout');
        fetch('api.php', { method: 'POST', body: formData }).then(() => location.reload());
    }
</script>
</body>
</html>