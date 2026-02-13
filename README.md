# SkillNest-AI-Copilot - Plataforma Educativa de IA (v1.0)

## 🌐 Acceso a Producción
La plataforma para cración de prompts está desplegada y operativa en: **[https://promptwise.skylabs.cl](https://promptwise.skylabs.cl)**

La plataforma de la entrega final como parte del curso está desplegada en:
**[https://skillnest-ia-copilot.skylabs.cl](https://promptwise.skylabs.cl)** 

## 🚀 Resumen Ejecutivo
**PromptMaster Academy** es un ecosistema educativo completo diseñado para dominar la ingeniería de prompts y aplicaciones prácticas de IA. Esta plataforma integra los conocimientos del curso **IA Lab – Smart Work** de SkillNest en una experiencia de aprendizaje interactiva y práctica.

Este proyecto representa la evolución de PromptWise hacia una academia completa que cubre todos los módulos del curso, manteniendo la funcionalidad original del constructor de prompts mientras añade contenido teórico y módulos prácticos.

## ✨ Características Implementadas (v1.0)

### 🎓 Módulos de Aprendizaje Completo
1. **Teoría de Ingeniería de Prompts** - Fundamentos teóricos con principios, técnicas y ejemplos comparativos
2. **IA como Asistente Personal** - Optimización de productividad con casos reales y plantillas descargables
3. **Análisis de Datos con Julius** - Transformación de datos en insights usando IA
4. **Generación de Imágenes y Video** - Creación de contenido visual con DALL-E, Midjourney y otras herramientas
5. **IA para Gestión de Proyectos** - Automatización de planificación y seguimiento de proyectos
6. **Automatización Sin Código** - Conexión de aplicaciones con Zapier, Make y otras herramientas

### 🔧 Funcionalidades Técnicas
* **Constructor Universal Dinámico:** Sincronización inteligente entre sugerencias predefinidas y entrada manual de dominios/roles
* **Librería de Activos Estratégicos:** Persistencia robusta con sistema de calificación y filtrado avanzado
* **Navegación Unificada:** Sistema de navegación centralizado con acceso a todos los módulos
* **Diseño Responsive:** Interfaz moderna con Bootstrap 5.3 y estilos personalizados
* **Base de datos Flexible:** Conexión con fallback automático a SQLite cuando MySQL no está disponible
* **API RESTful:** Sistema de autenticación y gestión de datos completo

### 🧠 Enfoque Pedagógico
* **Aprendizaje Práctico:** Ejercicios guiados en cada módulo
* **Plantillas Descargables:** Templates listos para usar en herramientas reales de IA
* **Simuladores Interactivos:** Práctica de conversaciones con asistentes de IA
* **Generadores de Prompts:** Herramientas para crear instrucciones específicas por dominio

## 🛠️ Instalación y Despliegue

### Requisitos del Sistema
* PHP 7.4+ (soporte para PDO)
* MySQL 5.7+ / MariaDB (opcional, tiene fallback a SQLite)
* Servidor web (Apache, Nginx, o servidor PHP incorporado)

### Instalación Rápida
1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/ciglesiasvera/SkillNest-AI-Copilot.git
   cd SkillNest-AI-Copilot
   ```

2. **Configurar base de datos:**
   - Opción A (MySQL): Importar `database.sql` y configurar `db.php`
   - Opción B (SQLite): No se requiere configuración - se crea automáticamente

3. **Iniciar servidor de desarrollo:**
   ```bash
   php -S localhost:8080
   ```

4. **Acceder a la plataforma:**
   Abrir navegador en `http://localhost:8080`

### Configuración de Base de Datos
El sistema intentará conectarse a MySQL primero. Si falla, automáticamente:
1. Crea un archivo `promptmaster.sqlite` localmente
2. Genera las tablas necesarias automáticamente
3. Funciona completamente sin configuración adicional

## 🧪 Pruebas y Calidad
El proyecto incluye un módulo de pruebas (`test.php`) que verifica:
* Conexión exitosa a la base de datos
* Integridad del sistema de Hashing (BCRYPT)
* Lógica de construcción de prompts
* Funcionamiento de la API

## 📈 Roadmap y Mejoras Futuras

### 🎯 Fase 1: Chatbot Pedagógico Guiado (v1.5)
**Objetivo:** Implementar un chatbot que guíe el aprendizaje en lugar de dar respuestas directas.

**Características planeadas:**
- **Sistema de Tutoría Inteligente:** Chatbot que hace preguntas socráticas para guiar al estudiante hacia soluciones
- **Evaluación Formativa:** Análisis de respuestas del estudiante para identificar brechas de conocimiento
- **Rutas de Aprendizaje Personalizadas:** Adaptación del contenido basado en el progreso y estilo de aprendizaje
- **Retroalimentación Constructiva:** Comentarios que explican por qué una respuesta es correcta o incorrecta
- **Escenarios de Aprendizaje:** Casos prácticos donde el estudiante debe aplicar conceptos paso a paso

**Configuración del Chatbot:**
```yaml
chatbot_pedagogico:
  enfoque: "guiado_socratico"
  objetivo: "desarrollar_comprension_profunda"
  estrategias:
    - hacer_preguntas_clave
    - proporcionar_pistas_progresivas
    - evitar_respuestas_directas
    - fomentar_exploracion
  metricas_exito:
    - tiempo_para_solucion
    - nivel_asistencia_requerida
    - transferencia_conocimiento
```

### 🚀 Fase 2: Integraciones Avanzadas (v2.0)
- **API de IA en Tiempo Real:** Conexión directa con OpenAI, Anthropic, Google Gemini
- **Analítica de Aprendizaje:** Dashboard con métricas de progreso estudiantil
- **Colaboración en Equipo:** Espacios de trabajo compartidos para proyectos grupales
- **Gamificación:** Sistema de logros, puntos y niveles para motivar el aprendizaje
- **Mobile App:** Versión nativa para iOS y Android

### 🔬 Fase 3: Personalización Avanzada (v2.5)
- **Aprendizaje Adaptativo:** Contenido que se ajusta automáticamente al nivel del estudiante
- **Recomendaciones Inteligentes:** Sugerencias de módulos basadas en intereses y objetivos
- **Integración LMS:** Compatibilidad con sistemas como Moodle, Canvas, Blackboard
- **Analítica Predictiva:** Identificación de estudiantes en riesgo de abandonar
- **Certificaciones Digitales:** Emisión de certificados verificables en blockchain

### 💡 Innovación Pedagógica
- **Metodología de Aprendizaje Activo:** Enfoque "learning by doing" con proyectos reales
- **Microlearning:** Contenido en pequeñas unidades para mejor retención
- **Espacios de Reflexión:** Promoción del pensamiento crítico y metacognición
- **Aprendizaje Social:** Foros de discusión y revisión por pares
- **Portafolio Digital:** Espacio para mostrar proyectos y logros

## 🔧 Arquitectura Técnica

### Stack Tecnológico
- **Frontend:** HTML5, CSS3, JavaScript (ES6+), Bootstrap 5.3
- **Backend:** PHP 8.3+, PDO para base de datos
- **Base de Datos:** MySQL/MariaDB con fallback a SQLite
- **Servidor:** Compatible con Apache, Nginx, o servidor PHP incorporado
- **Seguridad:** Hashing BCRYPT, sanitización de inputs, protección CSRF

### Estructura de Archivos
```
promptmaster_academy/
├── index.php              # Constructor de prompts (funcionalidad original)
├── theory.php            # Módulo de teoría de ingeniería de prompts
├── personal-assistant.php # Módulo IA como asistente
├── data-analysis.php     # Módulo análisis de datos con Julius
├── image-video.php       # Módulo generación de imágenes/video
├── project-management.php # Módulo IA para gestión de proyectos
├── no-code-automation.php # Módulo automatización sin código
├── navigation.php        # Sistema de navegación unificado
├── api.php              # API RESTful para autenticación y datos
├── db.php              # Conexión a BD con fallback a SQLite
├── assets/
│   ├── css/
│   │   └── custom.css   # Estilos personalizados
│   └── js/             # (Próximamente) Scripts adicionales
├── database.sql         # Esquema MySQL inicial
└── README.md           # Este archivo
```

## 👤 Autor
* **Nombre:** Cristian Iglesias Vera
* **Usuario Github:** [ciglesiasvera](https://github.com/ciglesiasvera)
* **Email:** ciglesiasvera@gmail.com
* **LinkedIn:** [ciglesiasvera](https://linkedin.com/in/ciglesiasvera)

## 📄 Licencia
Este proyecto está desarrollado como parte del curso **IA Lab – Smart Work** de SkillNest. El código está disponible para fines educativos y de aprendizaje.

## 🤝 Contribuciones
Las contribuciones son bienvenidas. Por favor:
1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 🐛 Reportar Problemas
Si encuentras algún problema, por favor:
1. Revisa si ya existe un issue similar
2. Crea un nuevo issue con:
   - Descripción detallada del problema
   - Pasos para reproducirlo
   - Comportamiento esperado vs actual
   - Capturas de pantalla (si aplica)

---

*Desarrollado para transformar el aprendizaje de IA a través de una educación práctica, guiada y significativa.*