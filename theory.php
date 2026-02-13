<?php
/**
 * theory.php - Teoría de Ingeniería de Prompts
 * Módulo educativo sobre fundamentos teóricos de ingeniería de prompts
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría de Ingeniería de Prompts - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .theory-hero {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .concept-card {
            border-left: 5px solid #0d6efd;
            transition: all 0.3s ease;
        }
        
        .concept-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .example-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 2px solid #e9ecef;
        }
        
        .example-good {
            border-left: 5px solid #198754;
        }
        
        .example-bad {
            border-left: 5px solid #dc3545;
        }
        
        .principles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }
        
        .principle-item {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="theory-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-lightbulb"></i> Teoría de Ingeniería de Prompts
                </h1>
                <p class="lead mb-4">
                    Aprende los fundamentos teóricos para crear prompts efectivos. 
                    Entiende la ciencia detrás de la comunicación con IA y maximiza tus resultados.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light text-primary fs-6">Para principiantes</span>
                    <span class="badge bg-light text-primary fs-6">15-20 minutos</span>
                    <span class="badge bg-light text-primary fs-6">Ejemplos prácticos</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-journal-text" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Navegación de secciones -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2 border-bottom pb-3">
                <a href="#que-es" class="btn btn-outline-primary btn-sm">¿Qué es?</a>
                <a href="#principios" class="btn btn-outline-primary btn-sm">Principios</a>
                <a href="#tecnicas" class="btn btn-outline-primary btn-sm">Técnicas</a>
                <a href="#ejemplos" class="btn btn-outline-primary btn-sm">Ejemplos</a>
                <a href="#mejores-practicas" class="btn btn-outline-primary btn-sm">Mejores Prácticas</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Sección 1: ¿Qué es la ingeniería de prompts? -->
            <section id="que-es" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number">1</span> ¿Qué es la Ingeniería de Prompts?
                </h2>
                
                <div class="concept-card card p-4 mb-4">
                    <p class="fs-5">
                        La <strong>ingeniería de prompts</strong> es el arte y ciencia de diseñar instrucciones 
                        (prompts) efectivas para sistemas de inteligencia artificial, especialmente modelos de lenguaje.
                    </p>
                    <p>
                        No se trata solo de "hacer preguntas", sino de <strong>estructurar la comunicación</strong> 
                        para obtener respuestas precisas, relevantes y útiles.
                    </p>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    <i class="bi bi-check-circle"></i> Lo que SÍ es
                                </h5>
                                <ul>
                                    <li>Diseñar instrucciones claras</li>
                                    <li>Proporcionar contexto relevante</li>
                                    <li>Especificar formato de respuesta</li>
                                    <li>Definir rol y tono</li>
                                    <li>Probar y refinar iterativamente</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title text-danger">
                                    <i class="bi bi-x-circle"></i> Lo que NO es
                                </h5>
                                <ul>
                                    <li>Escribir cualquier pregunta</li>
                                    <li>Asumir que la IA "adivina"</li>
                                    <li>Ignorar el contexto</li>
                                    <li>No especificar formato</li>
                                    <li>Usar un solo intento</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección 2: Principios Fundamentales -->
            <section id="principios" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number">2</span> Principios Fundamentales
                </h2>
                
                <div class="principles-grid">
                    <div class="principle-item">
                        <h4 class="text-primary">🧠 Claridad</h4>
                        <p class="mb-0">Instrucciones específicas y sin ambigüedades. La IA no lee mentes.</p>
                    </div>
                    
                    <div class="principle-item">
                        <h4 class="text-primary">🎯 Contexto</h4>
                        <p class="mb-0">Proporciona información relevante sobre la situación, dominio y objetivos.</p>
                    </div>
                    
                    <div class="principle-item">
                        <h4 class="text-primary">📝 Estructura</h4>
                        <p class="mb-0">Organiza la información de manera lógica: rol, tarea, formato, restricciones.</p>
                    </div>
                    
                    <div class="principle-item">
                        <h4 class="text-primary">🎨 Formato</h4>
                        <p class="mb-0">Especifica cómo quieres la respuesta: lista, tabla, código, JSON, etc.</p>
                    </div>
                    
                    <div class="principle-item">
                        <h4 class="text-primary">🎭 Rol</h4>
                        <p class="mb-0">Define quién debe responder: experto, tutor, crítico, asistente.</p>
                    </div>
                    
                    <div class="principle-item">
                        <h4 class="text-primary">🔁 Iteración</h4>
                        <p class="mb-0">Mejora progresivamente basándote en los resultados anteriores.</p>
                    </div>
                </div>
            </section>
            
            <!-- Sección 3: Técnicas Avanzadas -->
            <section id="tecnicas" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number">3</span> Técnicas Avanzadas
                </h2>
                
                <div class="accordion" id="techniquesAccordion">
                    <!-- Técnica 1: Chain of Thought -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#technique1">
                                <strong>Chain of Thought (Pensamiento paso a paso)</strong>
                            </button>
                        </h2>
                        <div id="technique1" class="accordion-collapse collapse show" data-bs-parent="#techniquesAccordion">
                            <div class="accordion-body">
                                <p><strong>Concepto:</strong> Pedir a la IA que explique su razonamiento paso a paso antes de dar la respuesta final.</p>
                                <p><strong>Beneficio:</strong> Mejora la precisión en problemas complejos y permite verificar la lógica.</p>
                                
                                <div class="example-box example-good mt-3">
                                    <h6><i class="bi bi-check-circle-fill text-success"></i> Ejemplo Correcto:</h6>
                                    <div class="code-block mt-2">
                                        <span class="code-comment"># Prompt con Chain of Thought</span><br>
                                        "Resuelve este problema matemático: 15 × (8 + 3) - 25<br>
                                        <strong>Por favor, muestra tu razonamiento paso a paso</strong> antes de dar la respuesta final."
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Técnica 2: Few-Shot Learning -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technique2">
                                <strong>Few-Shot Learning (Aprendizaje con pocos ejemplos)</strong>
                            </button>
                        </h2>
                        <div id="technique2" class="accordion-collapse collapse" data-bs-parent="#techniquesAccordion">
                            <div class="accordion-body">
                                <p><strong>Concepto:</strong> Proporcionar ejemplos de entrada-salida antes de pedir la tarea real.</p>
                                <p><strong>Beneficio:</strong> Entrena rápidamente a la IA sobre el formato y estilo deseado.</p>
                                
                                <div class="example-box example-good mt-3">
                                    <h6><i class="bi bi-check-circle-fill text-success"></i> Ejemplo Correcto:</h6>
                                    <div class="code-block mt-2">
                                        <span class="code-comment"># Few-shot para traducción de jerga técnica</span><br>
                                        "Traduce estos términos técnicos a lenguaje sencillo:<br><br>
                                        <strong>Ejemplo 1:</strong> 'Implementar una solución escalable' → 'Crear un sistema que pueda crecer sin problemas'<br>
                                        <strong>Ejemplo 2:</strong> 'Optimizar el rendimiento' → 'Hacer que funcione más rápido y mejor'<br><br>
                                        Ahora traduce: 'Leverage sinergies across verticals'"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Técnica 3: Autocrítica -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technique3">
                                <strong>Autocrítica y Revisión</strong>
                            </button>
                        </h2>
                        <div id="technique3" class="accordion-collapse collapse" data-bs-parent="#techniquesAccordion">
                            <div class="accordion-body">
                                <p><strong>Concepto:</strong> Pedir a la IA que revise su propia respuesta antes de presentarla.</p>
                                <p><strong>Beneficio:</strong> Reduce errores, mejora la coherencia y aumenta la calidad.</p>
                                
                                <div class="example-box example-good mt-3">
                                    <h6><i class="bi bi-check-circle-fill text-success"></i> Ejemplo Correcto:</h6>
                                    <div class="code-block mt-2">
                                        <span class="code-comment"># Prompt con autocrítica</span><br>
                                        "Escribe un correo para solicitar una reunión con un cliente importante.<br>
                                        <strong>Antes de mostrarme el correo final:</strong><br>
                                        1. Revisa que el tono sea profesional pero amigable<br>
                                        2. Verifica que incluya fecha, hora y objetivo claros<br>
                                        3. Asegúrate de que sea conciso (máx. 150 palabras)"
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección 4: Ejemplos Comparativos -->
            <section id="ejemplos" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number">4</span> Ejemplos Comparativos
                </h2>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-danger">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0"><i class="bi bi-x-octagon"></i> Prompt Débil</h5>
                            </div>
                            <div class="card-body">
                                <div class="code-block">
                                    "Háblame sobre marketing"
                                </div>
                                <div class="mt-3">
                                    <h6>Problemas:</h6>
                                    <ul>
                                        <li>Demasiado vago y genérico</li>
                                        <li>Sin contexto específico</li>
                                        <li>No define formato de respuesta</li>
                                        <li>No establece tono o profundidad</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-success">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="bi bi-check2-circle"></i> Prompt Efectivo</h5>
                            </div>
                            <div class="card-body">
                                <div class="code-block">
                                    "Actúa como un <strong>experto senior en marketing digital</strong> con 10 años de experiencia.<br><br>
                                    <strong>Contexto:</strong> Soy dueño de una pequeña cafetería artesanal que quiere aumentar sus ventas online.<br><br>
                                    <strong>Tarea:</strong> Proporciona 5 estrategias de bajo costo para atraer clientes en redes sociales.<br><br>
                                    <strong>Formato:</strong> Lista numerada con:<br>
                                    - Nombre de estrategia<br>
                                    - Descripción breve<br>
                                    - Acción concreta a implementar<br>
                                    - Recursos necesarios<br><br>
                                    <strong>Tono:</strong> Práctico y motivador, dirigido a emprendedores."
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Sección 5: Mejores Prácticas -->
            <section id="mejores-practicas" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number">5</span> Mejores Prácticas
                </h2>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">1</div>
                                <h5>Comienza Simple</h5>
                                <p class="small">Empieza con un prompt básico y añade complejidad gradualmente.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">2</div>
                                <h5>Sé Específico</h5>
                                <p class="small">Cuanto más específico sea el prompt, más útil será la respuesta.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">3</div>
                                <h5>Proporciona Contexto</h5>
                                <p class="small">La IA necesita entender el "por qué" para dar mejores respuestas.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">4</div>
                                <h5>Define el Formato</h5>
                                <p class="small">Especifica exactamente cómo quieres que se estructure la respuesta.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">5</div>
                                <h5>Establece un Rol</h5>
                                <p class="small">Asigna un personaje o experto para sesgar la respuesta apropiadamente.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 text-center">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-3">6</div>
                                <h5>Itera y Mejora</h5>
                                <p class="small">Ningún prompt es perfecto a la primera. Refina basándote en los resultados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Sidebar: Resumen y Práctica -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-clipboard-check"></i> Resumen Rápido</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Claridad
                                <span class="badge bg-primary rounded-pill">Esencial</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Contexto
                                <span class="badge bg-primary rounded-pill">Clave</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Formato
                                <span class="badge bg-primary rounded-pill">Importante</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Rol
                                <span class="badge bg-primary rounded-pill">Estratégico</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Iteración
                                <span class="badge bg-primary rounded-pill">Continua</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Práctica Guiada</h5>
                    </div>
                    <div class="card-body">
                        <p class="small">Aplica lo aprendido mejorando este prompt:</p>
                        
                        <div class="alert alert-warning small mb-3">
                            <strong>Prompt inicial:</strong><br>
                            "Escribe algo sobre inteligencia artificial"
                        </div>
                        
                        <form id="practiceForm">
                            <div class="mb-3">
                                <label class="form-label small">Agrega un rol:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ej: 'Experto en ética de IA'">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Agrega contexto:</label>
                                <textarea class="form-control form-control-sm" rows="2" placeholder="Ej: 'Para una audiencia de estudiantes universitarios...'"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small">Especifica formato:</label>
                                <select class="form-select form-select-sm">
                                    <option>Lista de puntos</option>
                                    <option>Párrafo explicativo</option>
                                    <option>Tabla comparativa</option>
                                    <option>Código/comentarios</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm w-100" onclick="generatePracticePrompt()">
                                <i class="bi bi-magic"></i> Generar Prompt Mejorado
                            </button>
                        </form>
                        
                        <div id="practiceOutput" class="mt-3 p-2 bg-light rounded border" style="display: none;">
                            <h6 class="small">Tu prompt mejorado:</h6>
                            <div class="code-block small"></div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-arrow-right-circle"></i> Siguiente Paso</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-3">¡Ahora aplica esta teoría en la práctica!</p>
                        <a href="index.php" class="btn btn-primary mb-2 w-100">
                            <i class="bi bi-magic"></i> Ir al Constructor de Prompts
                        </a>
                        <a href="personal-assistant.php" class="btn btn-outline-primary w-100">
                            <i class="bi bi-person-badge"></i> Módulo: IA como Asistente
                        </a>
                    </div>
                </div>
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
                <p class="small">Plataforma educativa para dominar la ingeniería de prompts y aplicaciones de IA.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2026 IA Lab – Smart Work. Todos los derechos reservados.</p>
                <p class="small">Desarrollado como proyecto final del curso.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navegación suave entre secciones
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
    
    // Generador de práctica
    function generatePracticePrompt() {
        const role = document.querySelector('#practiceForm input[type="text"]').value || 'Experto en IA';
        const context = document.querySelector('#practiceForm textarea').value || 'Para una audiencia general interesada en tecnología';
        const format = document.querySelector('#practiceForm select').value;
        
        let formatInstruction = '';
        switch(format) {
            case 'Lista de puntos':
                formatInstruction = 'Proporciona una lista de 5 puntos clave.';
                break;
            case 'Párrafo explicativo':
                formatInstruction = 'Escribe un párrafo explicativo claro y conciso.';
                break;
            case 'Tabla comparativa':
                formatInstruction = 'Crea una tabla comparativa con ventajas y desventajas.';
                break;
            case 'Código/comentarios':
                formatInstruction = 'Incluye ejemplos de código con comentarios explicativos.';
                break;
        }
        
        const improvedPrompt = `Actúa como un ${role}.\n\nContexto: ${context}\n\nTarea: Escribe sobre inteligencia artificial, enfocándote en su impacto en la sociedad actual.\n\nFormato: ${formatInstruction}\n\nTono: Informativo y accesible para no expertos.`;
        
        const outputDiv = document.querySelector('#practiceOutput .code-block');
        outputDiv.textContent = improvedPrompt;
        document.getElementById('practiceOutput').style.display = 'block';
        
        // Scroll to output
        document.getElementById('practiceOutput').scrollIntoView({ behavior: 'smooth' });
    }
    
    // Marcar sección activa en navegación
    window.addEventListener('scroll', function() {
        const sections = document.querySelectorAll('section[id]');
        const scrollPos = window.scrollY + 100;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            const sectionId = section.getAttribute('id');
            
            if(scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                document.querySelectorAll('.btn-outline-primary').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                const correspondingBtn = document.querySelector(`a[href="#${sectionId}"]`);
                if(correspondingBtn) {
                    correspondingBtn.classList.add('active');
                }
            }
        });
    });
</script>
</body>
</html>