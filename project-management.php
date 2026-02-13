<?php
/**
 * project-management.php - IA para Gestión de Proyectos
 * Módulo para aprender a usar IA en planificación y ejecución de proyectos
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IA para Gestión de Proyectos - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .pm-hero {
            background: linear-gradient(135deg, #fd7e14 0%, #ffa94d 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .phase-card {
            border-left: 5px solid #fd7e14;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="pm-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-kanban"></i> IA para Gestión de Proyectos
                </h1>
                <p class="lead mb-4">
                    Aprende a usar IA para planificar, ejecutar y monitorear proyectos de manera eficiente.
                    Automatiza tareas repetitivas y toma decisiones basadas en datos.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light" style="color: #fd7e14 !important;">Planificación</span>
                    <span class="badge bg-light" style="color: #fd7e14 !important;">Seguimiento</span>
                    <span class="badge bg-light" style="color: #fd7e14 !important;">Automatización</span>
                    <span class="badge bg-light" style="color: #fd7e14 !important;">Análisis de Riesgos</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-diagram-3" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #fd7e14;">1</span> Herramientas de IA para Gestión de Proyectos
                </h2>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="phase-card card">
                            <div class="card-body">
                                <h4 class="text-warning"><i class="bi bi-notion"></i> Notion AI</h4>
                                <p class="small"><strong>Mejor para:</strong> Documentación, bases de conocimiento, planificación colaborativa.</p>
                                <ul class="small">
                                    <li>Genera templates de proyectos</li>
                                    <li>Resume reuniones automáticamente</li>
                                    <li>Crea documentación estructurada</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="phase-card card">
                            <div class="card-body">
                                <h4 class="text-warning"><i class="bi bi-microsoft"></i> Microsoft Copilot</h4>
                                <p class="small"><strong>Mejor para:</strong> Integración con Office 365, equipos corporativos.</p>
                                <ul class="small">
                                    <li>Analiza datos en Excel</li>
                                    <li>Genera presentaciones en PowerPoint</li>
                                    <li>Coordina equipos en Teams</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #fd7e14;">2</span> Fases del Proyecto con IA
                </h2>
                
                <div class="card p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <div class="fs-1 text-warning mb-2">1</div>
                                <h5>Iniciación</h5>
                                <p class="small">IA ayuda a definir alcance, stakeholders y objetivos.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <div class="fs-1 text-warning mb-2">2</div>
                                <h5>Planificación</h5>
                                <p class="small">Genera cronogramas, asigna recursos, identifica riesgos.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 border rounded">
                                <div class="fs-1 text-warning mb-2">3</div>
                                <h5>Ejecución</h5>
                                <p class="small">Automatiza reportes, monitorea progreso, facilita comunicación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="bi bi-tools"></i> Generador de Plan de Proyecto</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label small">Tipo de proyecto:</label>
                            <select class="form-select form-select-sm" id="projectType">
                                <option>Desarrollo de Software</option>
                                <option>Marketing Digital</option>
                                <option>Evento Corporativo</option>
                                <option>Investigación</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Duración estimada:</label>
                            <select class="form-select form-select-sm" id="duration">
                                <option>1 mes</option>
                                <option>3 meses</option>
                                <option>6 meses</option>
                                <option>1 año</option>
                            </select>
                        </div>
                        <button class="btn btn-warning btn-sm w-100" onclick="generateProjectPlan()">
                            <i class="bi bi-kanban"></i> Generar Plan
                        </button>
                        
                        <div id="projectPlanOutput" class="mt-3 p-2 bg-light rounded border" style="display: none; font-size: 0.8rem;">
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-arrow-right-circle"></i> Siguiente Módulo</h5>
                    </div>
                    <div class="card-body text-center">
                        <a href="no-code-automation.php" class="btn btn-primary w-100">
                            <i class="bi bi-gear"></i> Automatización Sin Código
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
                <h5>SkillNest-AI-Copilot - PromptMaster Academy</h5>
                <p class="small">Gestiona proyectos inteligentemente con IA.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2026 IA Lab – Smart Work</p>
                <p class="small">Módulo: IA para Gestión de Proyectos</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function generateProjectPlan() {
        const type = document.getElementById('projectType').value;
        const duration = document.getElementById('duration').value;
        
        const prompt = `Actúa como un project manager senior especializado en ${type}.

Contexto: Necesito crear un plan de proyecto para una iniciativa de ${type} con duración estimada de ${duration}.

Por favor, genera:
1. Estructura de desglose de trabajo (WBS) con 5-7 entregables principales
2. Cronograma de hitos clave
3. Asignación recomendada de recursos
4. Métricas de éxito (KPIs)
5. Plan de gestión de riesgos con 3 riesgos potenciales y mitigaciones

Formato: Documento ejecutivo claro, listo para presentar a stakeholders.

Tono: Profesional, práctico, orientado a resultados.`;

        document.getElementById('projectPlanOutput').textContent = prompt;
        document.getElementById('projectPlanOutput').style.display = 'block';
        
        // Copiar automáticamente
        navigator.clipboard.writeText(prompt).then(() => {
            alert('✅ Prompt generado y copiado al portapapeles');
        });
    }
</script>
</body>
</html>