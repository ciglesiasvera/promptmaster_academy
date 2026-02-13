<?php
/**
 * image-video.php - Generación de Imágenes y Video con IA
 * Módulo para aprender técnicas de generación multimedia con IA
 */
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generación de Imágenes y Video - PromptMaster Academy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        .media-hero {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
            color: white;
            padding: 3rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
        }
        
        .tool-card {
            border-left: 5px solid #ff6b6b;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .prompt-visualizer {
            background: #1e1e1e;
            border-radius: 10px;
            padding: 1.5rem;
            color: #d4d4d4;
            font-family: 'Consolas', monospace;
            min-height: 200px;
        }
        
        .style-example {
            width: 100%;
            height: 150px;
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin: 1rem 0;
        }
    </style>
</head>
<body>

<?php include 'navigation.php'; ?>

<div class="media-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-camera"></i> Generación de Imágenes y Video
                </h1>
                <p class="lead mb-4">
                    Domina el arte de crear contenido visual impactante con IA. 
                    Aprende a generar imágenes, ilustraciones y videos con herramientas como DALL-E, Midjourney y Runway.
                </p>
                <div class="d-flex gap-2 flex-wrap">
                    <span class="badge bg-light" style="color: #ff6b6b !important;">DALL-E</span>
                    <span class="badge bg-light" style="color: #ff6b6b !important;">Midjourney</span>
                    <span class="badge bg-light" style="color: #ff6b6b !important;">Stable Diffusion</span>
                    <span class="badge bg-light" style="color: #ff6b6b !important;">RunwayML</span>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-palette" style="font-size: 8rem; opacity: 0.8;"></i>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #ff6b6b;">1</span> Herramientas Principales
                </h2>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="tool-card card">
                            <div class="card-body">
                                <h4 class="text-danger"><i class="bi bi-brush"></i> DALL-E (OpenAI)</h4>
                                <p class="small"><strong>Mejor para:</strong> Conceptos creativos, ilustraciones detalladas, variaciones.</p>
                                <p class="small"><strong>Estilo:</strong> Más literal, sigue instrucciones precisas.</p>
                                <div class="prompt-visualizer small mt-3">
                                    <span style="color: #6a9955;"># Prompt para DALL-E</span><br>
                                    "Un astronauta flotando en el espacio, estilo ilustración digital detallada, colores vibrantes, luz dramática, 4K"
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="tool-card card">
                            <div class="card-body">
                                <h4 class="text-danger"><i class="bi bi-stars"></i> Midjourney</h4>
                                <p class="small"><strong>Mejor para:</strong> Arte conceptual, estilos artísticos, composición avanzada.</p>
                                <p class="small"><strong>Estilo:</strong> Más artístico y atmosférico.</p>
                                <div class="prompt-visualizer small mt-3">
                                    <span style="color: #6a9955;"># Prompt para Midjourney</span><br>
                                    "ciudad futurista al atardecer, estilo cyberpunk, neón, lluvia, detalle hiperrealista, cinematográfico --ar 16:9"
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="mb-5">
                <h2 class="mb-4">
                    <span class="step-number" style="background: #ff6b6b;">2</span> Estructura de Prompts Visuales
                </h2>
                
                <div class="card p-4">
                    <p>Un prompt efectivo para imágenes incluye estos elementos en orden:</p>
                    
                    <div class="row g-3 mt-3">
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="style-example">Sujeto</div>
                                <p class="small mb-0">Qué o quién es el protagonista</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="style-example">Acción</div>
                                <p class="small mb-0">Qué está haciendo</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="style-example">Ambiente</div>
                                <p class="small mb-0">Dónde ocurre la escena</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <div class="style-example">Estilo</div>
                                <p class="small mb-0">Técnica artística</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="prompt-visualizer mt-4">
                        <span style="color: #569cd6;">Estructura completa:</span><br>
                        <span style="color: #ce9178;">[Sujeto]</span> + <span style="color: #ce9178;">[Acción]</span> + <span style="color: #ce9178;">[Ambiente]</span> + <span style="color: #ce9178;">[Estilo]</span> + <span style="color: #ce9178;">[Detalles técnicos]</span><br><br>
                        <span style="color: #6a9955;"># Ejemplo aplicado:</span><br>
                        "Un <span style="color: #dcdcaa;">gato siamés</span> <span style="color: #dcdcaa;">leyendo un libro antiguo</span> en una <span style="color: #dcdcaa;">biblioteca gótica iluminada por velas</span>, <span style="color: #dcdcaa;">estilo ilustración de cuento de hadas</span>, <span style="color: #dcdcaa;">detalle 8K, iluminación cálida</span>"
                    </div>
                </div>
            </section>
        </div>
        
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 100px;">
                <div class="card mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0"><i class="bi bi-magic"></i> Generador de Prompts</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label small">Sujeto:</label>
                            <input type="text" class="form-control form-control-sm" id="subject" placeholder="Ej: robot, paisaje, personaje">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Estilo:</label>
                            <select class="form-select form-select-sm" id="style">
                                <option>Realista</option>
                                <option>Ilustración</option>
                                <option>Pixel art</option>
                                <option>Pintura al óleo</option>
                                <option>Anime</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Calidad:</label>
                            <select class="form-select form-select-sm" id="quality">
                                <option>4K, detallado</option>
                                <option>8K, hiperrealista</option>
                                <option>Estilo sketch</option>
                            </select>
                        </div>
                        <button class="btn btn-danger btn-sm w-100" onclick="generateImagePrompt()">
                            <i class="bi bi-image"></i> Generar Prompt
                        </button>
                        
                        <div id="imagePromptOutput" class="mt-3 p-2 bg-dark text-light rounded" style="display: none; font-family: monospace; font-size: 0.8rem;">
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-arrow-right-circle"></i> Siguiente Módulo</h5>
                    </div>
                    <div class="card-body text-center">
                        <a href="project-management.php" class="btn btn-primary w-100">
                            <i class="bi bi-kanban"></i> IA para Gestión de Proyectos
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
                <p class="small">Crea contenido visual impactante con IA.</p>
            </div>
            <div class="col-md-6 text-end">
                <p class="small mb-0">© 2026 IA Lab – Smart Work</p>
                <p class="small">Módulo: Generación de Imágenes y Video</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function generateImagePrompt() {
        const subject = document.getElementById('subject').value || 'un personaje fantástico';
        const style = document.getElementById('style').value;
        const quality = document.getElementById('quality').value;
        
        const environments = ['en un bosque encantado', 'en una ciudad futurista', 'en un estudio de arte', 'en un paisaje surrealista'];
        const actions = ['contemplando el horizonte', 'creando arte', 'explorando', 'interactuando con tecnología'];
        
        const randomEnv = environments[Math.floor(Math.random() * environments.length)];
        const randomAction = actions[Math.floor(Math.random() * actions.length)];
        
        let styleInstruction = '';
        switch(style) {
            case 'Realista': styleInstruction = 'estilo fotográfico realista'; break;
            case 'Ilustración': styleInstruction = 'estilo ilustración digital profesional'; break;
            case 'Pixel art': styleInstruction = 'estilo pixel art retro, 16-bit'; break;
            case 'Pintura al óleo': styleInstruction = 'estilo pintura al óleo clásica'; break;
            case 'Anime': styleInstruction = 'estilo anime japonés, colores vibrantes'; break;
        }
        
        const prompt = `${subject} ${randomAction} ${randomEnv}, ${styleInstruction}, ${quality}, composición equilibrada, iluminación dramática`;
        
        document.getElementById('imagePromptOutput').textContent = prompt;
        document.getElementById('imagePromptOutput').style.display = 'block';
        
        // Copiar automáticamente
        navigator.clipboard.writeText(prompt).then(() => {
            alert('✅ Prompt generado y copiado al portapapeles');
        });
    }
</script>
</body>
</html>