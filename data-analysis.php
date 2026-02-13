<?php
/**
 * data-analysis.php - Análisis de Datos con Julius
 * Módulo para aprender a usar IA para análisis de datos
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Datos con Julius - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .analysis-hero {
            background: linear-gradient(135deg, #6f42c1 0%, #9b59b6 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .dataset-card {
            border-left: 5px solid #6f42c1;
            transition: all 0.3s ease;
        }
        
        .analysis-step {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border: 2px solid #e9ecef;
            position: relative;
        }
        
        .step-number-circle {
            width: 40px;
            height: 40px;
            background: #6f42c1;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: absolute;
            left: -20px;
            top: -20px;
        }
        
        .viz-preview {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            border: 2px dashed #6f42c1;
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .prompt-example {
            background: #1e1e1e;
            color: #d4d4d4;
            border-radius: 8px;
            padding: 1rem;
            font-family: 'Consolas', monospace;
            font-size: 0.9rem;
            overflow-x: auto;
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="analysis-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-bar-chart"></i> Análisis de Datos con Julius
                </h1>
                <p class="lead mb-4">
                    Domina el uso de IA para transformar datos en insights accionables. 
                    Aprende a usar Julius AI para análisis exploratorio, visualización y toma de decisiones.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light text-purple fs-6" style="color: #6f42c1 !important;">Julius AI</span>
                    <span class="badge bg-light text-purple fs-6" style="color: #6f42c1 !important;">Visualización</span>
                    <span class="badge bg-light text-purple fs-6" style="color: #6f42c1 !important;">Datasets prácticos</span>
                    <span class="badge bg-light text-purple fs-6" style="color: #6f42c1 !important;">Análisis predictivo</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-pie-chart" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Navegación rápida -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-wrap gap-2 border-bottom pb-3">
                <a href="#introduccion" class="btn btn-outline-purple btn-sm" style="border-color: #6f42c1; color: #6f42c1;">Introducción</a>
                <a href="#flujo-trabajo" class="btn btn-outline-purple btn-sm" style="border-color: #6f42c1; color: #6f42c1;">Flujo de Trabajo</a>
                <a href="#ejemplos" class="btn btn-outline-purple btn-sm" style="border-color: #6f42c1; color: #6f42c1;">Ejemplos</a>
                <a href="#datasets" class="btn btn-outline-purple btn-sm" style="border-color: #6f42c1; color: #6f42c1;">Datasets</a>
                <a href="#practica" class="btn btn-outline-purple btn-sm" style="border-color: #6f42c1; color: #6f42c1;">Práctica</a>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <!-- Introducción a Julius -->
            <section id="introduccion" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #6f42c1;">1</span> ¿Qué es Julius AI?
                </h2>
                
                <div class="card p-4 mb-4">
                    <p class="fs-5">
                        <strong>Julius AI</strong> es una herramienta de análisis de datos impulsada por inteligencia artificial 
                        que permite a cualquier persona, sin conocimientos técnicos avanzados, realizar análisis complejos, 
                        crear visualizaciones y obtener insights de datos.
                    </p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="text-purple"><i class="bi bi-check-circle"></i> Ventajas</h5>
                            <ul>
                                <li>No requiere programación</li>
                                <li>Análisis en lenguaje natural</li>
                                <li>Visualizaciones automáticas</li>
                                <li>Integración con múltiples fuentes</li>
                                <li>Explicaciones paso a paso</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-purple"><i class="bi bi-lightning"></i> Casos de Uso</h5>
                            <ul>
                                <li>Análisis de ventas y marketing</li>
                                <li>Segmentación de clientes</li>
                                <li>Predicción de tendencias</li>
                                <li>Optimización de operaciones</li>
                                <li>Reportes ejecutivos automáticos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Flujo de Trabajo -->
            <section id="flujo-trabajo" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #6f42c1;">2</span> Flujo de Trabajo con Julius
                </h2>
                
                <div class="analysis-step">
                    <div class="step-number-circle">1</div>
                    <h4 class="text-purple">Carga de Datos</h4>
                    <p>Sube tus archivos (CSV, Excel, Google Sheets) o conéctate a fuentes de datos en la nube.</p>
                    <div class="prompt-example small mt-2">
                        <span style="color: #569cd6;"># Ejemplo de prompt para carga</span><br>
                        "Julius, analiza este dataset de ventas mensuales. Aquí está el archivo: [subir archivo]"
                    </div>
                </div>
                
                <div class="analysis-step">
                    <div class="step-number-circle">2</div>
                    <h4 class="text-purple">Limpieza y Preparación</h4>
                    <p>La IA identifica y sugiere correcciones para datos faltantes, outliers y formatos inconsistentes.</p>
                    <div class="prompt-example small mt-2">
                        <span style="color: #569cd6;"># Ejemplo de prompt para limpieza</span><br>
                        "Revisa el dataset y sugiere correcciones para valores faltantes y columnas con formato inconsistente."
                    </div>
                </div>
                
                <div class="analysis-step">
                    <div class="step-number-circle">3</div>
                    <h4 class="text-purple">Análisis Exploratorio</h4>
                    <p>Obtén estadísticas descriptivas, correlaciones y patrones iniciales automáticamente.</p>
                    <div class="prompt-example small mt-2">
                        <span style="color: #569cd6;"># Ejemplo de prompt para EDA</span><br>
                        "Realiza un análisis exploratorio completo: estadísticas básicas, distribuciones y correlaciones entre variables clave."
                    </div>
                </div>
                
                <div class="analysis-step">
                    <div class="step-number-circle">4</div>
                    <h4 class="text-purple">Visualización</h4>
                    <p>Genera gráficos y dashboards interactivos basados en los insights descubiertos.</p>
                    <div class="prompt-example small mt-2">
                        <span style="color: #569cd6;"># Ejemplo de prompt para visualización</span><br>
                        "Crea un dashboard con: 1) Tendencia de ventas mensuales (línea), 2) Distribución por categoría (torta), 3) Top 10 productos (barras)."
                    </div>
                </div>
                
                <div class="analysis-step">
                    <div class="step-number-circle">5</div>
                    <h4 class="text-purple">Insights y Recomendaciones</h4>
                    <p>Recibe interpretaciones en lenguaje natural y sugerencias accionables basadas en los datos.</p>
                    <div class="prompt-example small mt-2">
                        <span style="color: #569cd6;"># Ejemplo de prompt para insights</span><br>
                        "Basándote en el análisis, proporciona 3 recomendaciones clave para aumentar las ventas el próximo trimestre."
                    </div>
                </div>
            </section>
            
            <!-- Ejemplos Prácticos -->
            <section id="ejemplos" class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #6f42c1;">3</span> Ejemplos Prácticos
                </h2>
                
                <div class="card mb-4">
                    <div class="card-header bg-purple text-white" style="background-color: #6f42c1;">
                        <h5 class="mb-0"><i class="bi bi-graph-up"></i> Caso: Análisis de Ventas de E-commerce</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Objetivo:</strong> Identificar patrones de compra y oportunidades de crecimiento.</p>
                        
                        <h6 class="mt-3">Prompt completo para Julius:</h6>
                        <div class="prompt-example">
                            <span style="color: #6a9955;"># Análisis completo de dataset de e-commerce</span><br><br>
                            <span style="color: #dcdcaa;">Julius</span>, actúa como mi <span style="color: #569cd6;">científico de datos senior especializado en retail</span>.<br><br>
                            <span style="color: #ce9178;">Contexto</span>: Tengo un dataset de ventas de e-commerce con las siguientes columnas:<br>
                            - order_date, customer_id, product_category, quantity, unit_price, total_amount, region<br><br>
                            <span style="color: #ce9178;">Tareas</span>:<br>
                            1. Realiza <span style="color: #569cd6;">análisis exploratorio</span> completo<br>
                            2. Identifica <span style="color: #569cd6;">tendencias estacionales</span> en las ventas<br>
                            3. Analiza <span style="color: #569cd6;">comportamiento de clientes</span> por región<br>
                            4. Encuentra <span style="color: #569cd6;">correlaciones</span> entre categorías de productos<br>
                            5. Sugiere <span style="color: #569cd6;">3 oportunidades</span> de crecimiento<br><br>
                            <span style="color: #ce9178;">Formato</span>:<br>
                            - Resumen ejecutivo (1 párrafo)<br>
                            - Hallazgos clave con datos<br>
                            - Visualizaciones recomendadas<br>
                            - Recomendaciones accionables<br><br>
                            <span style="color: #ce9178;">Tono</span>: Profesional, basado en datos, orientado a negocios.
                        </div>
                        
                        <div class="viz-preview mt-3">
                            <i class="bi bi-bar-chart-fill display-4 text-purple mb-3" style="color: #6f42c1;"></i>
                            <p class="text-center small">Visualizaciones generadas automáticamente:<br>Gráficos de tendencia, heatmaps, distribución</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Sidebar: Datasets y Práctica -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <!-- Datasets de Práctica -->
                <section id="datasets" class="mb-5">
                    <div class="card">
                        <div class="card-header bg-purple text-white" style="background-color: #6f42c1;">
                            <h5 class="mb-0"><i class="bi bi-database"></i> Datasets de Práctica</h5>
                        </div>
                        <div class="card-body">
                            <p class="small">Usa estos datasets simulados para practicar con Julius:</p>
                            
                            <div class="dataset-card card mb-3">
                                <div class="card-body">
                                    <h6 class="text-purple">📊 Ventas Minoristas</h6>
                                    <p class="small mb-2">500 transacciones, 6 meses, múltiples categorías.</p>
                                    <button class="btn btn-sm btn-outline-purple w-100" style="border-color: #6f42c1; color: #6f42c1;" onclick="loadDataset('sales')">
                                        <i class="bi bi-download"></i> Descargar CSV
                                    </button>
                                </div>
                            </div>
                            
                            <div class="dataset-card card mb-3">
                                <div class="card-body">
                                    <h6 class="text-purple">👥 Encuestas de Satisfacción</h6>
                                    <p class="small mb-2">1000 respuestas, rating 1-5, múltiples dimensiones.</p>
                                    <button class="btn btn-sm btn-outline-purple w-100" style="border-color: #6f42c1; color: #6f42c1;" onclick="loadDataset('survey')">
                                        <i class="bi bi-download"></i> Descargar CSV
                                    </button>
                                </div>
                            </div>
                            
                            <div class="dataset-card card mb-3">
                                <div class="card-body">
                                    <h6 class="text-purple">📈 Métricas de Marketing</h6>
                                    <p class="small mb-2">Campañas digitales, CTR, conversiones, costo por lead.</p>
                                    <button class="btn btn-sm btn-outline-purple w-100" style="border-color: #6f42c1; color: #6f42c1;" onclick="loadDataset('marketing')">
                                        <i class="bi bi-download"></i> Descargar CSV
                                    </button>
                                </div>
                            </div>
                            
                            <div class="alert alert-info small">
                                <i class="bi bi-info-circle"></i> Estos datasets son ejemplos simulados. En Julius, puedes subirlos directamente o conectarlos vía Google Sheets.
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Práctica Guiada -->
                <section id="practica" class="mb-5">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Práctica Guiada</h5>
                        </div>
                        <div class="card-body">
                            <p class="small">Crea un prompt para analizar métricas de marketing:</p>
                            
                            <div class="mb-3">
                                <label class="form-label small">Objetivo del análisis:</label>
                                <select class="form-select form-select-sm" id="analysisGoal">
                                    <option>Optimizar ROI de campañas</option>
                                    <option>Identificar canales más efectivos</option>
                                    <option>Predecir tendencias futuras</option>
                                    <option>Segmentar audiencia</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small">Nivel de detalle:</label>
                                <select class="form-select form-select-sm" id="detailLevel">
                                    <option>Resumen ejecutivo</option>
                                    <option>Análisis detallado</option>
                                    <option>Dashboard completo</option>
                                </select>
                            </div>
                            
                            <button class="btn btn-success btn-sm w-100 mb-2" onclick="generateJuliusPrompt()">
                                <i class="bi bi-magic"></i> Generar Prompt para Julius
                            </button>
                            
                            <div id="juliusOutput" class="mt-3 p-2 bg-light rounded border" style="display: none;">
                                <h6 class="small">Tu prompt:</h6>
                                <div class="prompt-example small"></div>
                                <button class="btn btn-sm btn-outline-success w-100 mt-2" onclick="copyJuliusPrompt()">
                                    <i class="bi bi-clipboard"></i> Copiar
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                
                <!-- Siguiente Módulo -->
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-arrow-right-circle"></i> Siguiente Módulo</h5>
                    </div>
                    <div class="card-body text-center">
                        <p class="mb-3">Aprende a crear contenido visual con IA:</p>
                        <a href="image-video.php" class="btn btn-primary w-100">
                            <i class="bi bi-camera"></i> Generación de Imágenes y Video
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
                <p class="small">Transforma datos en decisiones inteligentes con IA.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2026 IA Lab – Smart Work</p>
                <p class="small">Módulo: Análisis de Datos con Julius</p>
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
    
    // Cargar datasets (simulado)
    function loadDataset(type) {
        const datasets = {
            sales: "sales_data_practice.csv",
            survey: "customer_survey_practice.csv", 
            marketing: "marketing_metrics_practice.csv"
        };
        
        alert(`✅ Dataset "${datasets[type]}" listo para descargar.\n\nEn un entorno real, este archivo se descargaría automáticamente. Para practicar, puedes crear un archivo CSV con datos simulados o usar los datasets de ejemplo de Julius.`);
    }
    
    // Generador de prompts para Julius
    function generateJuliusPrompt() {
        const goal = document.getElementById('analysisGoal').value;
        const detail = document.getElementById('detailLevel').value;
        
        let detailInstruction = '';
        switch(detail) {
            case 'Resumen ejecutivo':
                detailInstruction = 'Proporciona un resumen ejecutivo de 1 página con los hallazgos más importantes.';
                break;
            case 'Análisis detallado':
                detailInstruction = 'Realiza un análisis detallado con metodología paso a paso y justificación de cada hallazgo.';
                break;
            case 'Dashboard completo':
                detailInstruction = 'Crea un dashboard interactivo con al menos 5 visualizaciones diferentes y un resumen narrativo.';
                break;
        }
        
        const prompt = `Julius, actúa como mi científico de datos senior especializado en análisis de marketing.

Contexto: Tengo un dataset de métricas de marketing digital que incluye:
- campaign_name, channel, spend, impressions, clicks, conversions, revenue, date

Objetivo principal: ${goal}

Tareas específicas:
1. Análisis de ROI por canal y campaña
2. Identificación de tendencias temporales
3. Segmentación de audiencia por comportamiento
4. Recomendaciones de optimización de presupuesto
5. Predicción de performance para el próximo mes

${detailInstruction}

Formato de respuesta:
- Resumen inicial de hallazgos clave
- Análisis estructurado por sección
- Visualizaciones recomendadas (especificar tipo de gráfico)
- Recomendaciones accionables numeradas
- Limitaciones y consideraciones

Tono: Profesional, basado en datos, orientado a la toma de decisiones.`;

        const outputDiv = document.querySelector('#juliusOutput .prompt-example');
        outputDiv.textContent = prompt;
        document.getElementById('juliusOutput').style.display = 'block';
        
        // Scroll to output
        document.getElementById('juliusOutput').scrollIntoView({ behavior: 'smooth' });
    }
    
    function copyJuliusPrompt() {
        const text = document.querySelector('#juliusOutput .prompt-example').textContent;
        navigator.clipboard.writeText(text).then(() => {
            alert('✅ Prompt copiado al portapapeles. ¡Ahora pruébalo en Julius AI!');
        });
    }
    
    // Estilos para botones púrpura
    document.addEventListener('DOMContentLoaded', function() {
        const purpleButtons = document.querySelectorAll('.btn-outline-purple');
        purpleButtons.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.backgroundColor = '#6f42c1';
                this.style.color = 'white';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.backgroundColor = '';
                this.style.color = '#6f42c1';
            });
        });
    });
</script>
</body>
</html>