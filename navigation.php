<?php
/**
 * navigation.php - Componente de navegación unificada para PromptMaster Academy
 * 
 * Incluir este archivo en todas las páginas para mantener navegación consistente
 * Requiere que db.php ya haya sido incluido para verificar sesión de usuario
 */

// Verificar si la sesión ya está activa (db.php debería haber iniciado sesión)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Navegación principal -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-cpu"></i> PromptMaster Academy 
            <span class="badge bg-primary" style="font-size: 0.6em;">v2.0</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-magic"></i> Constructor de Prompts</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-book"></i> Módulos de Aprendizaje
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="theory.php"><i class="bi bi-lightbulb"></i> Teoría de Prompts</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header text-primary">Módulos del Curso</h6></li>
                        <li><a class="dropdown-item" href="personal-assistant.php"><i class="bi bi-person-badge"></i> IA como Asistente</a></li>
                        <li><a class="dropdown-item" href="data-analysis.php"><i class="bi bi-bar-chart"></i> Análisis de Datos</a></li>
                        <li><a class="dropdown-item" href="image-video.php"><i class="bi bi-camera"></i> Imágenes y Video</a></li>
                        <li><a class="dropdown-item" href="project-management.php"><i class="bi bi-kanban"></i> Gestión de Proyectos</a></li>
                        <li><a class="dropdown-item" href="no-code-automation.php"><i class="bi bi-gear"></i> Automatización Sin Código</a></li>
                    </ul>
                </li>
                <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)" onclick="document.getElementById('myLibrary').scrollIntoView()">
                        <i class="bi bi-collection"></i> Mi Librería
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="progress.php">
                        <i class="bi bi-graph-up"></i> Mi Progreso
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            
            <div class="d-flex align-items-center gap-2">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <span class="navbar-text text-white me-3 d-none d-md-block">
                        <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user_email']); ?>
                    </span>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-gear"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button class="dropdown-item" onclick="logout()"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</button></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <button class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right"></i> Ingresar
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- Modal de Login/Registro (compartido) -->
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

<script>
// Funciones de autenticación compartidas
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

function logout() {
    const formData = new FormData();
    formData.append('action', 'logout');
    fetch('api.php', { method: 'POST', body: formData }).then(() => location.href = 'index.php');
}
</script>