<?php
/**
 * personal-assistant.php - IA como Asistente Personal
 * Módulo para aprender a usar IA para optimizar tareas personales y profesionales
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IA como Asistente Personal - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .assistant-hero {
            background: linear-gradient(135deg, #198754 0%, #20c997 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .use-case-card {
            border-left: 5px solid #198754;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .use-case-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(25, 135, 84, 0.15);
        }
        
        .template-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 2px solid #e9ecef;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .template-box:hover {
            background: #e9f7ef;
            border-color: #198754;
        }
        
        .simulator-area {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            border: 1px solid #dee2e6;
        }
        
        .chat-bubble {
            max-width: 80%;
            padding: 1rem 1.5rem;
            border-radius: 18px;
            margin: 0.5rem 0;
            position: relative;
        }
        
        .user-bubble {
            background: #0d6efd;
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 5px;
        }
        
        .ai-bubble {
            background: #e9ecef;
            color: #212529;
            border-bottom-left-radius: 5px;
        }
        
        .tool-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #198754 0%, #20c997 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="assistant-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-person-badge"></i> IA como Asistente Personal
                </h1>
                <p class="lead mb-4">
                    Aprende a delegar tareas a la IA para optimizar tu productividad personal y profesional. 
                    Desde gestión de correos hasta planificación estratégica.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light text-success fs-6">Productividad</span>
                    <span class="badge bg-light text-success fs-6">Automatización</span>
                    <span class="badge bg-light text-success fs-6">Casos reales</span>
                    <span class="badge bg-light text-success fs-6">Plantillas descargables</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-robot" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Navegación rápida -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2 border-bottom pb-3">
                <a href="#casos-uso" class="btn btn-outline-success btn-sm">Casos de Uso</a>
                <a href="#herramientas" class="btn btn-outline-success btn-sm">Herramientas</a>
                <a href="#simulador" class="btn btn-outline-success btn-sm">Simulador</a>
                <a href="#plantillas" class="btn btn-outline-success btn-sm">Plantillas</a>
                <a href="#ejercicios" class="btn btn-outline-success btn-sm">Ejercicios</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Sección 1: Casos de Uso Comunes -->
            <section id="casos-uso" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #198754;">1</span> Casos de Uso Comunes
                </h2>
                <p class="lead mb-4">Identifica tareas repetitivas que puedes delegar a tu asistente de IA.</p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="use-case-card card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="tool-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <h5 class="card-title mb-0 ms-3">Gestión de Correos</h5>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Redacción de respuestas profesionales</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Clasificación automática de mensajes</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Resumen de hilos largos</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Programación de envíos</li>
                                </ul>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-success" onclick="loadTemplate('email')">Ver plantilla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="use-case-card card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="tool-icon">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                    <h5 class="card-title mb-0 ms-3">Calendario y Agenda</h5>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Planificación de reuniones</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Recordatorios inteligentes</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Optimización de horarios</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Síntesis de agendas semanales</li>
                                </ul>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-success" onclick="loadTemplate('calendar')">Ver plantilla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="use-case-card card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="tool-icon">
                                        <i class="bi bi-list-task"></i>
                                    </div>
                                    <h5 class="card-title mb-0 ms-3">Gestión de Tareas</h5>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Desglose de proyectos complejos</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Priorización automática</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Estimación de tiempos</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Seguimiento de progreso</li>
                                </ul>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-success" onclick="loadTemplate('tasks')">Ver plantilla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="use-case-card card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="tool-icon">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                    <h5 class="card-title mb-0 ms-3">Documentación</h5>
                                </div>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Redacción de informes</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Resúmenes ejecutivos</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success"></i> Creación de presentaciones</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Revisión y edición</li>
                                </ul>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-success" onclick="loadTemplate('docs')">Ver plantilla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección 2: Herramientas Recomendadas -->
            <section id="herramientas" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #198754;">2</span> Herramientas Recomendadas
                </h2>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="bi bi-chat-left-text"></i> ChatGPT</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Mejor para:</strong> Conversaciones generales, brainstorming, redacción creativa.</p>
                                <p><strong>Configuración recomendada:</strong></p>
                                <ul>
                                    <li>Activar historial de conversación</li>
                                    <li>Configurar instrucciones personalizadas</li>
                                    <li>Usar GPT-4 para tareas complejas</li>
                                </ul>
                                <div class="alert alert-info small">
                                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Guarda prompts frecuentes como "instrucciones personalizadas".
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="bi bi-clipboard-data"></i> Claude</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Mejor para:</strong> Análisis de documentos largos, razonamiento lógico, tareas técnicas.</p>
                                <p><strong>Configuración recomendada:</strong></p>
                                <ul>
                                    <li>Subir documentos directamente</li>
                                    <li>Usar el contexto extendido (100K tokens)</li>
                                    <li>Aprovechar su capacidad de análisis</li>
                                </ul>
                                <div class="alert alert-info small">
                                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Ideal para resumir informes extensos o analizar contratos.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="mb-0"><i class="bi bi-google"></i> Gemini</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Mejor para:</strong> Integración con Google Workspace, búsqueda en tiempo real.</p>
                                <p><strong>Configuración recomendada:</strong></p>
                                <ul>
                                    <li>Conectar con Gmail y Calendar</li>
                                    <li>Activar búsqueda web cuando sea necesario</li>
                                    <li>Usar extensiones de Workspace</li>
                                </ul>
                                <div class="alert alert-info small">
                                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Perfecto si ya usas el ecosistema Google.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="bi bi-gear"></i> Herramientas Especializadas</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Otras opciones:</strong></p>
                                <ul>
                                    <li><strong>Notion AI:</strong> Para gestión de proyectos y bases de conocimiento</li>
                                    <li><strong>Microsoft Copilot:</strong> Integrado con Office 365</li>
                                    <li><strong>Zapier/Make:</strong> Para automatización entre apps</li>
                                    <li><strong>Otter.ai:</strong> Para transcripción y síntesis de reuniones</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección 3: Simulador de Conversaciones -->
            <section id="simulador" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #198754;">3</span> Simulador de Conversaciones
                </h2>
                
                <div class="simulator-area">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h5>Practica cómo interactuar con tu asistente de IA</h5>
                            <p class="small text-muted">Elige un escenario y conversa con el simulador para mejorar tus habilidades.</p>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="scenarioSelect" onchange="changeScenario()">
                                <option value="email">Redactar correo profesional</option>
                                <option value="meeting">Planificar reunión</option>
                                <option value="report">Crear informe</option>
                                <option value="brainstorm">Brainstorming de ideas</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="chat-container mb-4" style="height: 300px; overflow-y: auto; padding: 1rem; background: #f8f9fa; border-radius: 10px;">
                        <div id="chatMessages">
                            <div class="chat-bubble ai-bubble">
                                <strong>Asistente IA:</strong> ¡Hola! Soy tu asistente personal de IA. ¿En qué puedo ayudarte hoy? Puedo ayudarte con correos, calendario, tareas, documentación y más.
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        <input type="text" id="chatInput" class="form-control" placeholder="Escribe tu mensaje al asistente de IA..." onkeypress="handleChatKeyPress(event)">
                        <button class="btn btn-success" onclick="sendChatMessage()">
                            <i class="bi bi-send"></i> Enviar
                        </button>
                    </div>
                    
                    <div class="mt-3 text-end">
                        <button class="btn btn-sm btn-outline-secondary" onclick="resetChat()">
                            <i class="bi bi-arrow-clockwise"></i> Reiniciar conversación
                        </button>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Sidebar: Plantillas y Ejercicios -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <!-- Sección 4: Plantillas Descargables -->
                <section id="plantillas" class="mb-5">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-download"></i> Plantillas Descargables</h5>
                        </div>
                        <div class="card-body">
                            <p class="small">Copia y personaliza estos prompts para tus necesidades.</p>
                            
                            <div class="template-box" onclick="copyTemplate('emailTemplate')">
                                <h6 class="text-success"><i class="bi bi-envelope"></i> Correo Profesional</h6>
                                <p class="small mb-2">Para redactar correos claros y efectivos.</p>
                                <div id="emailTemplate" class="d-none">
Actúa como mi asistente ejecutivo experto en comunicación corporativa.

Contexto: Necesito enviar un correo a [Nombre del destinatario] sobre [Tema específico]. La relación es [Ej: cliente, colega, jefe] y el tono debe ser [Ej: profesional, cordial, urgente].

Tarea: Redacta un correo que:
1. Tenga un asunto claro y atractivo
2. Comience con un saludo apropiado
3. Presente el tema principal de manera concisa
4. Incluya los puntos clave en viñetas o párrafos cortos
5. Termine con un llamado a acción claro
6. Cierre profesionalmente

Formato: Estructura de correo empresarial estándar, máximo 200 palabras.

Tono: [Especificar: Formal/semi-formal/amigable]
                                </div>
                                <button class="btn btn-sm btn-outline-success w-100" onclick="copyTemplate('emailTemplate', event)">
                                    <i class="bi bi-clipboard"></i> Copiar Plantilla
                                </button>
                            </div>
                            
                            <div class="template-box" onclick="copyTemplate('meetingTemplate')">
                                <h6 class="text-success"><i class="bi bi-calendar-event"></i> Planificación de Reuniones</h6>
                                <p class="small mb-2">Para organizar reuniones efectivas.</p>
                                <div id="meetingTemplate" class="d-none">
Actúa como mi asistente de productividad especializado en gestión de reuniones.

Contexto: Necesito organizar una reunión sobre [Tema de la reunión] con [Número] participantes. La duración estimada es de [X] horas/minutos.

Tarea: Crea una estructura completa para la reunión que incluya:
1. Agenda detallada con tiempos
2. Objetivos claros y medibles
3. Lista de participantes y roles
4. Materiales de preparación necesarios
5. Puntos de decisión a alcanzar
6. Plan de seguimiento post-reunión

Formato: Tabla con columnas: Hora, Tema, Responsable, Duración, Notas.

Tono: Profesional y orientado a resultados.
                                </div>
                                <button class="btn btn-sm btn-outline-success w-100" onclick="copyTemplate('meetingTemplate', event)">
                                    <i class="bi bi-clipboard"></i> Copiar Plantilla
                                </button>
                            </div>
                            
                            <div class="template-box" onclick="copyTemplate('reportTemplate')">
                                <h6 class="text-success"><i class="bi bi-file-earmark-text"></i> Informe Ejecutivo</h6>
                                <p class="small mb-2">Para crear reportes claros y accionables.</p>
                                <div id="reportTemplate" class="d-none">
Actúa como mi analista senior especializado en reportes ejecutivos.

Contexto: Necesito crear un informe sobre [Área/tema del informe] para presentar a [Audiencia]. El período cubierto es [Fecha inicio] a [Fecha fin].

Tarea: Genera la estructura de un informe ejecutivo que incluya:
1. Resumen ejecutivo (1 párrafo)
2. Hallazgos clave (3-5 puntos principales)
3. Métricas y datos relevantes
4. Análisis de tendencias
5. Recomendaciones accionables
6. Próximos pasos

Formato: Documento estructurado con secciones claras, máximo 2 páginas.

Tono: Conciso, basado en datos, orientado a la toma de decisiones.
                                </div>
                                <button class="btn btn-sm btn-outline-success w-100" onclick="copyTemplate('reportTemplate', event)">
                                    <i class="bi bi-clipboard"></i> Copiar Plantilla
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Sección 5: Ejercicios Prácticos -->
                <section id="ejercicios">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Ejercicio Práctico</h5>
                        </div>
                        <div class="card-body">
                            <p class="small mb-3">Aplica lo aprendido con este caso real:</p>
                            
                            <div class="alert alert-warning small">
                                <strong>Escenario:</strong><br>
                                Eres project manager y necesitas:
                                1. Redactar un correo para postergar una reunión
                                2. Crear una agenda para la nueva fecha
                                3. Preparar un informe de progreso
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small">Elige tu herramienta:</label>
                                <select class="form-select form-select-sm" id="toolSelect">
                                    <option>ChatGPT</option>
                                    <option>Claude</option>
                                    <option>Gemini</option>
                                    <option>Notion AI</option>
                                </select>
                            </div>
                            
                            <button class="btn btn-info btn-sm w-100 mb-2" onclick="generateExercisePrompt()">
                                <i class="bi bi-magic"></i> Generar Prompt Completo
                            </button>
                            
                            <div id="exerciseOutput" class="mt-3 p-2 bg-light rounded border" style="display: none;">
                                <h6 class="small">Tu prompt para el ejercicio:</h6>
                                <div class="code-block small"></div>
                                <button class="btn btn-sm btn-outline-primary w-100 mt-2" onclick="copyExercisePrompt()">
                                    <i class="bi bi-clipboard"></i> Copiar
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-arrow-right-circle"></i> Siguiente Módulo</h5>
                        </div>
                        <div class="card-body text-center">
                            <p class="mb-3">Continúa con el análisis de datos:</p>
                            <a href="data-analysis.php" class="btn btn-primary w-100">
                                <i class="bi bi-bar-chart"></i> Análisis de Datos con Julius
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>SkillNest-AI-Copilot - PromptMaster Academy</h5>
                <p class="small">Transforma tu productividad con asistentes de IA inteligentes.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2026 IA Lab – Smart Work</p>
                <p class="small">Módulo: IA como Asistente Personal</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navegación suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if(targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Simulador de chat
    const chatResponses = {
        email: [
            "Claro, puedo ayudarte a redactar un correo profesional. ¿Cuál es el propósito del correo y a quién va dirigido?",
            "Excelente. Para un correo de seguimiento a un cliente, te recomiendo incluir: 1) Recordatorio amable del tema anterior, 2) Valor agregado o actualización, 3) Llamado a acción claro, 4) Disponibilidad para seguir conversando.",
            "¿Prefieres un tono más formal o informal? ¿Alguna información específica que deba incluirse?"
        ],
        meeting: [
            "Entiendo que necesitas planificar una reunión. ¿Cuál es el objetivo principal y quiénes serán los participantes?",
            "Para una reunión efectiva, sugiero esta estructura: 1) 5 min: Contexto y objetivos, 2) 15 min: Presentación/discusión principal, 3) 10 min: Brainstorming/solución de problemas, 4) 5 min: Decisiones y próximos pasos.",
            "¿Necesitas que genere una agenda detallada o prefieres una estructura más flexible?"
        ],
        report: [
            "Puedo ayudarte a estructurar un informe ejecutivo. ¿Sobre qué tema y para qué audiencia?",
            "Un buen informe ejecutivo debe tener: 1) Resumen de una página, 2) Hallazgos clave con datos, 3) Análisis de tendencias, 4) Recomendaciones accionables, 5) Métricas de seguimiento.",
            "¿Tienes los datos ya recopilados o necesito sugerir métricas relevantes para tu industria?"
        ],
        brainstorm: [
            "¡Perfecto para una sesión de brainstorming! ¿Cuál es el desafío o oportunidad que quieres explorar?",
            "Te sugiero usar la técnica '6-3-5': 6 personas, 3 ideas cada una, 5 minutos por ronda. Podemos generar ideas alrededor de: 1) Soluciones convencionales, 2) Enfoques disruptivos, 3) Implementación práctica.",
            "¿Quieres que me enfoque en ideas innovadoras o en soluciones prácticas y de implementación inmediata?"
        ]
    };
    
    let currentScenario = 'email';
    let chatStep = 0;
    
    function changeScenario() {
        currentScenario = document.getElementById('scenarioSelect').value;
        resetChat();
    }
    
    function resetChat() {
        chatStep = 0;
        document.getElementById('chatMessages').innerHTML = `
            <div class="chat-bubble ai-bubble">
                <strong>Asistente IA:</strong> ¡Hola! Soy tu asistente personal de IA. ¿En qué puedo ayudarte hoy? Puedo ayudarte con correos, calendario, tareas, documentación y más.
            </div>
        `;
        document.getElementById('chatInput').value = '';
    }
    
    function handleChatKeyPress(event) {
        if (event.key === 'Enter') {
            sendChatMessage();
        }
    }
    
    function sendChatMessage() {
        const input = document.getElementById('chatInput');
        const message = input.value.trim();
        
        if (!message) return;
        
        // Agregar mensaje del usuario
        const userBubble = document.createElement('div');
        userBubble.className = 'chat-bubble user-bubble';
        userBubble.innerHTML = `<strong>Tú:</strong> ${message}`;
        document.getElementById('chatMessages').appendChild(userBubble);
        
        input.value = '';
        
        // Respuesta del asistente después de un breve delay
        setTimeout(() => {
            const responses = chatResponses[currentScenario];
            const response = responses[chatStep % responses.length];
            
            const aiBubble = document.createElement('div');
            aiBubble.className = 'chat-bubble ai-bubble';
            aiBubble.innerHTML = `<strong>Asistente IA:</strong> ${response}`;
            document.getElementById('chatMessages').appendChild(aiBubble);
            
            chatStep++;
            
            // Scroll al final
            const chatContainer = document.querySelector('.chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }, 1000);
    }
    
    // Plantillas descargables
    function copyTemplate(templateId, event) {
        if (event) event.stopPropagation();
        
        const template = document.getElementById(templateId);
        const text = template.textContent;
        
        navigator.clipboard.writeText(text).then(() => {
            alert('✅ Plantilla copiada al portapapeles');
        });
    }
    
    // Ejercicio práctico
    function generateExercisePrompt() {
        const tool = document.getElementById('toolSelect').value;
        
        const prompt = `Actúa como mi asistente personal de productividad especializado en ${tool}.

Contexto: Soy project manager y necesito manejar tres tareas urgentes:
1. Redactar un correo para postergar una reunión importante con stakeholders clave
2. Crear una agenda detallada para la nueva fecha de reunión
3. Preparar un informe de progreso del proyecto para presentar en la reunión postergada

Tarea: Proporciona un plan completo que incluya:
A) Prompt para redactar el correo de postergación (tono profesional pero empático)
B) Estructura de agenda para la nueva reunión (45 minutos, 5 participantes)
C) Template para el informe de progreso (máximo 1 página, métricas clave)

Formato: Tres secciones claramente separadas, cada una con instrucciones específicas para ${tool}.

Tono: Práctico, orientado a resultados, adecuado para entornos corporativos.`;

        const outputDiv = document.querySelector('#exerciseOutput .code-block');
        outputDiv.textContent = prompt;
        document.getElementById('exerciseOutput').style.display = 'block';
        
        // Scroll to output
        document.getElementById('exerciseOutput').scrollIntoView({ behavior: 'smooth' });
    }
    
    function copyExercisePrompt() {
        const text = document.querySelector('#exerciseOutput .code-block').textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('✅ Prompt copiado al portapapeles');
        });
    }
    
    // Cargar plantilla en el área principal
    function loadTemplate(type) {
        const templates = {
            email: 'emailTemplate',
            calendar: 'meetingTemplate',
            tasks: 'reportTemplate',
            docs: 'reportTemplate'
        };
        
        if (templates[type]) {
            copyTemplate(templates[type]);
            alert('✅ Plantilla copiada. Ahora puedes pegarla en tu herramienta de IA favorita.');
        }
    }
</script>
</body>
</html>