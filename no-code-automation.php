<?php
/**
 * no-code-automation.php - Automatización Sin Código
 * Módulo para aprender a automatizar flujos de trabajo sin programación
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatización Sin Código - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .automation-hero {
            background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .tool-card {
            border-left: 5px solid #17a2b8;
            transition: all 0.3s ease;
            height: 100%;
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="automation-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-gear"></i> Automatización Sin Código
                </h1>
                <p class="lead mb-4">
                    Descubre cómo automatizar tareas repetitivas y conectar aplicaciones sin escribir una línea de código.
                    Aumenta tu productividad con herramientas visuales de automatización.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light" style="color: #17a2b8 !important;">Zapier</span>
                    <span class="badge bg-light" style="color: #17a2b8 !important;">Make</span>
                    <span class="badge bg-light" style="color: #17a2b8 !important;">n8n</span>
                    <span class="badge bg-light" style="color: #17a2b8 !important;">IFTTT</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-robot" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #17a2b8;">1</span> Herramientas de Automatización
                </h2>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="tool-card card">
                            <div class="card-body">
                                <h4 class="text-info"><i class="bi bi-lightning"></i> Zapier</h4>
                                <p class="small"><strong>Mejor para:</strong> Conexiones simples entre apps populares.</p>
                                <ul class="small">
                                    <li>+3,000 aplicaciones integradas</li>
                                    <li>Interfaz drag-and-drop</li>
                                    <li>Ideal para automatizaciones básicas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="tool-card card">
                            <div class="card-body">
                                <h4 class="text-info"><i class="bi bi-puzzle"></i> Make (ex-Integromat)</h4>
                                <p class="small"><strong>Mejor para:</strong> Flujos complejos y transformación de datos.</p>
                                <ul class="small">
                                    <li>Automatizaciones visuales avanzadas</li>
                                    <li>Transformación de datos en tiempo real</li>
                                    <li>Escenarios complejos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #17a2b8;">2</span> Casos de Uso Comunes
                </h2>
                
                <div class="card p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <h6 class="text-info">📧 Notificaciones Automáticas</h6>
                                <p class="small mb-0">Cuando recibes un email importante, envía un mensaje a Slack y crea una tarea en Trello.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <h6 class="text-info">📊 Reportes Automatizados</h6>
                                <p class="small mb-0">Cada viernes, extrae datos de Google Analytics y envía un reporte por email al equipo.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <h6 class="text-info">👥 Gestión de Leads</h6>
                                <p class="small mb-0">Cuando alguien completa un formulario web, añádelo a tu CRM y programa un email de bienvenida.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <h6 class="text-info">📅 Programación Social</h6>
                                <p class="small mb-0">Publica automáticamente en redes sociales cuando publiques un nuevo artículo en tu blog.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-diagram-3"></i> Diseña tu Automatización</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label small">Cuando esto ocurra:</label>
                            <select class="form-select form-select-sm" id="trigger">
                                <option>Reciba un email</option>
                                <option>Se cree una nueva fila en Google Sheets</option>
                                <option>Alguien complete un formulario</option>
                                <option>Se publique un nuevo artículo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Entonces haz esto:</label>
                            <select class="form-select form-select-sm" id="action">
                                <option>Envía una notificación a Slack</option>
                                <option>Envía un email</option>
                                <option>Crea una tarea en Trello</option>
                                <option>Actualiza una base de datos</option>
                            </select>
                        </div>
                        <button class="btn btn-info btn-sm w-100" onclick="generateAutomation()">
                            <i class="bi bi-magic"></i> Generar Esquema
                        </button>
                        
                        <div id="automationOutput" class="mt-3 p-2 bg-light rounded border" style="display: none; font-size: 0.8rem;">
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-check-circle"></i> Módulos Completados</h5>
                    </div>
                    <div class="card-body">
                        <p class="small">¡Felicidades! Has completado todos los módulos del curso.</p>
                        <a href="index.php" class="btn btn-success w-100">
                            <i class="bi bi-house"></i> Volver al Inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>PromptMaster Academy</h5>
                <p class="small">Automatiza tu flujo de trabajo sin programación.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2025 IA Lab – Smart Work</p>
                <p class="small">Módulo: Automatización Sin Código</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function generateAutomation() {
        const trigger = document.getElementById('trigger').value;
        const action = document.getElementById('action').value;
        
        const prompt = `Crea una automatización sin código usando Zapier o Make:

DESENCADENANTE (Trigger): ${trigger}

ACCIÓN (Action): ${action}

Pasos recomendados:
1. Configura la aplicación de trigger (ej: Gmail, Google Sheets, Typeform)
2. Establece las condiciones del trigger (ej: email de remitente específico)
3. Configura la aplicación de acción (ej: Slack, Gmail, Trello)
4. Mapea los datos del trigger a la acción
5. Prueba la automatización con datos de ejemplo

Herramienta recomendada: ${trigger.includes('email') ? 'Zapier para simplicidad' : 'Make para flexibilidad'}

Tiempo estimado de configuración: 15-30 minutos`;

        document.getElementById('automationOutput').textContent = prompt;
        document.getElementById('automationOutput').style.display = 'block';
        
        // Copiar automáticamente
        navigator.clipboard.writeText(prompt).then(() => {
            alert('✅ Esquema generado y copiado al portapapeles');
        });
    }
</script>
</body>
</html>