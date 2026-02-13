<?php 
/**
 * index.php - PromptMaster Academy v1.0
 * Constructor de Prompts Didáctico (funcionalidad original preservada)
 */
require 'db.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PromptMaster Academy - Constructor de Prompts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; scroll-behavior: smooth; }
        .card { border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-radius: 12px; }
        .step-number { background: #0d6efd; color: white; width: 30px; height: 30px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; }
        .generated-box { background: #e9ecef; border-left: 5px solid #0d6efd; padding: 20px; font-family: 'Courier New', monospace; white-space: pre-wrap; min-height: 100px; }
        .prompt-card { transition: transform 0.2s; }
        .prompt-card:hover { transform: translateY(-5px); }
        .text-truncate-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card p-4">
                <h4 class="mb-4">Constructor de Prompts Didáctico</h4>
                <form id="promptForm">
                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">1</span>Dominio de Conocimiento</label>
                        <div class="input-group shadow-sm">
                            <select class="form-select" id="domainSelect" onchange="setDomain()">
                                <option value="">Seleccionar área...</option>
                                <option value="Ingeniería de Software">Ingeniería de Software</option>
                                <option value="Marketing Digital">Marketing Digital</option>
                                <option value="Derecho y Leyes">Derecho y Leyes</option>
                                <option value="Medicina y Salud">Medicina y Salud</option>
                                <option value="Escritura Creativa">Escritura Creativa</option>
                                <option value="Finanzas">Finanzas</option>
                            </select>
                            <input type="text" class="form-control" id="domainInput" placeholder="O escribe una nueva" oninput="updatePrompt()">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">2</span>Rol del Asistente</label>
                        <div class="input-group shadow-sm">
                            <select class="form-select" id="roleSelect" onchange="setRole()">
                                <option value="">Seleccionar rol...</option>
                                <option value="Experto Senior">Experto Senior</option>
                                <option value="Tutor Académico">Tutor Académico</option>
                                <option value="Crítico Constructivo">Crítico Constructivo</option>
                                <option value="Científico de Datos">Científico de Datos</option>
                            </select>
                            <input type="text" class="form-control" id="roleInput" placeholder="O escribe un rol manual" oninput="updatePrompt()">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold"><span class="step-number">3</span>Contexto del Problema</label>
                        <textarea class="form-control shadow-sm" id="context" rows="3" placeholder="Describe la situación actual..." oninput="updatePrompt()"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Formato</label>
                            <select class="form-select" id="format" onchange="updatePrompt()">
                                <option value="Texto plano">Texto plano</option>
                                <option value="Tabla comparativa">Tabla comparativa</option>
                                <option value="Lista paso a paso">Lista paso a paso</option>
                                <option value="Código comentado">Código comentado</option>
                                <option value="JSON">JSON</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-muted text-uppercase">Tono</label>
                            <select class="form-select" id="tone" onchange="updatePrompt()">
                                <option value="Profesional">Profesional</option>
                                <option value="Académico">Académico</option>
                                <option value="Persuasivo">Persuasivo</option>
                                <option value="Empático">Empático</option>
                                <option value="Sencillo (ELI5)">Sencillo (ELI5)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-light rounded border">
                        <label class="form-label fw-bold mb-2">Ingeniería de Prompts Avanzada</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="checkCoT" onchange="updatePrompt()">
                            <label class="form-check-label">Chain of Thought (Pensamiento paso a paso)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="checkCritic" onchange="updatePrompt()">
                            <label class="form-check-label">Autocrítica (Revisión antes de enviar)</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="checkStructure" onchange="updatePrompt()">
                            <label class="form-check-label">Estructura Viral (Gancho/Cuerpo/Cierre)</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card p-4 sticky-top" style="top: 85px;">
                <h5 class="text-primary"><i class="bi bi-robot"></i> Vista Previa del Prompt</h5>
                <hr>
                <div class="generated-box mb-3 shadow-inner" id="finalOutput">Completa el formulario para ver la magia...</div>
                
                <div class="d-grid gap-2">
                    <button class="btn btn-success shadow-sm" onclick="copyText()">
                        <i class="bi bi-clipboard"></i> Copiar al Portapapeles
                    </button>
                    
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <div class="input-group">
                            <select class="form-select border-primary" id="rating">
                                <option value="5">⭐⭐⭐⭐⭐</option>
                                <option value="4">⭐⭐⭐⭐</option>
                                <option value="3">⭐⭐⭐</option>
                                <option value="2">⭐⭐</option>
                                <option value="1">⭐</option>
                            </select>
                            <button class="btn btn-primary" onclick="savePrompt()">
                                <i class="bi bi-cloud-arrow-up"></i> Guardar
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning text-center mt-2 p-2 small">
                            <i class="bi bi-info-circle"></i> Inicia sesión para guardar en tu librería.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_SESSION['user_id'])): ?>
    <hr class="my-5" id="myLibrary">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h3><i class="bi bi-journal-bookmark"></i> Mi Librería de Activos</h3>
                    <p class="text-muted mb-0">Tus prompts estratégicos guardados.</p>
                </div>
                
                <div class="d-flex gap-2">
                    <input type="text" id="searchInput" class="form-control" placeholder="🔍 Buscar..." onkeyup="filterPrompts()">
                    <select id="domainFilter" class="form-select" onchange="filterPrompts()">
                        <option value="all">Todos los dominios</option>
                        <option value="Ingeniería de Software">Ingeniería de Software</option>
                        <option value="Marketing Digital">Marketing Digital</option>
                        <option value="Derecho y Leyes">Derecho y Leyes</option>
                        <option value="Medicina y Salud">Medicina y Salud</option>
                        <option value="Escritura Creativa">Escritura Creativa</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="row" id="promptsContainer">
            <?php
            $stmt = $pdo->prepare("SELECT * FROM prompts WHERE user_id = ? ORDER BY created_at DESC");
            $stmt->execute([$_SESSION['user_id']]);
            $mis_prompts = $stmt->fetchAll();

            if ($mis_prompts):
                foreach ($mis_prompts as $p):
            ?>
            <div class="col-md-4 mb-3 prompt-card" 
                 data-domain="<?php echo htmlspecialchars($p['domain']); ?>" 
                 data-content="<?php echo htmlspecialchars(strtolower($p['role'] . ' ' . $p['final_prompt'])); ?>">
                <div class="card h-100 shadow-sm border-top border-primary border-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-light text-primary border border-primary"><?php echo htmlspecialchars($p['domain']); ?></span>
                            <span class="small"><?php echo str_repeat('⭐', (int)$p['rating']); ?></span>
                        </div>
                        <h6 class="card-title fw-bold">Rol: <?php echo htmlspecialchars($p['role']); ?></h6>
                        <p class="card-text small text-muted text-truncate-3">
                            <?php echo htmlspecialchars($p['final_prompt']); ?>
                        </p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary flex-grow-1" 
                                    onclick='copyText(<?php echo json_encode($p["final_prompt"]); ?>)'>
                                <i class="bi bi-files"></i> Copiar
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deletePrompt(<?php echo $p['id']; ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            else:
                echo '<div class="col-12"><div class="alert alert-light text-center border">Aún no tienes prompts guardados. ¡Crea el primero arriba!</div></div>';
            endif;
            ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills nav-fill mb-4" id="authTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button">Ingresar</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button">Crear Cuenta</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login">
                        <form onsubmit="handleAuth(event, 'login')">
                            <div class="mb-2">
                                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Iniciar Sesión</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register">
                        <form onsubmit="handleAuth(event, 'register')">
                            <div class="mb-2">
                                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña (mín. 6 caracteres)" minlength="6" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 py-2">Registrarme</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // --- Lógica del Generador ---
    function setDomain() {
        const select = document.getElementById('domainSelect');
        const input = document.getElementById('domainInput');
        if(select.value) input.value = select.value;
        updatePrompt();
    }

    function setRole() {
        const select = document.getElementById('roleSelect');
        const input = document.getElementById('roleInput');
        if(select.value) input.value = select.value;
        updatePrompt();
    }

    function updatePrompt() {
        const domain = document.getElementById('domainInput').value;
        const role = document.getElementById('roleInput').value;
        const context = document.getElementById('context').value;
        const format = document.getElementById('format').value;
        const tone = document.getElementById('tone').value;
        
        let prompt = "";

        if(role) prompt += `Actúa como un **${role}** `;
        if(domain) {
            prompt += (role) ? `experto en el área de **${domain}**. ` : `Eres un experto en **${domain}**. `;
        }
        if(context) prompt += `\n\n**Contexto:** ${context}`;
        
        if(document.getElementById('checkStructure').checked) {
            prompt += `\n\n**Estructura:** Sigue este esquema:\n1. GANCHO (Frase inicial)\n2. CUERPO (Análisis detallado)\n3. CIERRE (Pasos a seguir)`;
        }

        if(document.getElementById('checkCoT').checked) prompt += `\n\n**Instrucción:** Usa Chain of Thought; piensa paso a paso antes de dar la respuesta final.`;
        if(document.getElementById('checkCritic').checked) prompt += `\n\n**Filtro:** Realiza una autocrítica interna para eliminar errores antes de responder.`;

        prompt += `\n\n**Formato:** ${format}.\n**Tono:** ${tone}.`;

        document.getElementById('finalOutput').innerText = prompt || "Completa el formulario para ver la magia...";
    }

    // --- Lógica de Librería y Filtrado ---
    function filterPrompts() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const domainFilter = document.getElementById('domainFilter').value;
        const cards = document.querySelectorAll('.prompt-card');

        cards.forEach(card => {
            const content = card.getAttribute('data-content');
            const domain = card.getAttribute('data-domain');
            const matchesSearch = content.includes(searchTerm);
            const matchesDomain = (domainFilter === 'all' || domain === domainFilter);
            card.style.display = (matchesSearch && matchesDomain) ? "block" : "none";
        });
    }

    // --- Lógica de API ---
    async function handleAuth(e, action) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append('action', action);
        
        try {
            const res = await fetch('api.php', { method: 'POST', body: formData });
            const data = await res.json();
            alert(data.msg);
            if(data.status === 'success') location.reload();
        } catch (error) {
            alert("Error de conexión con el servidor");
        }
    }

    async function savePrompt() {
        const domain = document.getElementById('domainInput').value;
        const finalPrompt = document.getElementById('finalOutput').innerText;

        if(!domain || finalPrompt.includes("Completa el formulario")) {
            alert("Completa el dominio y el contenido antes de guardar.");
            return;
        }

        const formData = new FormData();
        formData.append('action', 'save_prompt');
        formData.append('domain', domain);
        formData.append('role', document.getElementById('roleInput').value || 'Asistente');
        formData.append('context', document.getElementById('context').value);
        formData.append('final_prompt', finalPrompt);
        formData.append('rating', document.getElementById('rating').value);

        const res = await fetch('api.php', { method: 'POST', body: formData });
        const data = await res.json();
        if(data.status === 'success') {
            alert(data.msg);
            location.reload();
        }
    }

    async function deletePrompt(id) {
        if(confirm("¿Eliminar este prompt de forma permanente?")) {
            const formData = new FormData();
            formData.append('action', 'delete_prompt');
            formData.append('id', id);
            const res = await fetch('api.php', { method: 'POST', body: formData });
            const data = await res.json();
            location.reload();
        }
    }

    async function deleteAllPrompts() {
        if(confirm("⚠️ ¿Estás seguro de VACIAR toda tu librería?")) {
            const formData = new FormData();
            formData.append('action', 'delete_all_prompts');
            await fetch('api.php', { method: 'POST', body: formData });
            location.reload();
        }
    }

    function logout() {
        const formData = new FormData();
        formData.append('action', 'logout');
        fetch('api.php', { method: 'POST', body: formData }).then(() => location.href = 'index.php');
    }

    function copyText(text) {
        const content = text || document.getElementById('finalOutput').innerText;
        if (!content || content.includes("Completa el formulario")) {
            alert("No hay nada que copiar.");
            return;
        }
        navigator.clipboard.writeText(content).then(() => alert('✅ ¡Copiado!'));
    }
</script>
</body>
</html>