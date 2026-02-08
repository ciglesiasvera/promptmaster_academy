# PromptWise - Plataforma de Ingeniería de Prompts (v0.1.5)

## 🌐 Acceso a Producción
La plataforma está desplegada y operativa en: **[https://promptwise.skylabs.cl](https://promptwise.skylabs.cl)**

## 🚀 Resumen Ejecutivo
**PromptWise** es un ecosistema "Full-Stack" diseñado para profesionalizar la interacción con Modelos de Lenguaje Extensos (LLMs). A diferencia de los constructores simples, PromptWise implementa un **Pipeline de Ingeniería de Prompts** que obliga al usuario a estructurar sus instrucciones bajo parámetros de Dominio, Rol, Contexto y Técnicas avanzadas (CoT, Autocrítica).

Este proyecto es el resultado práctico del curso **IA Lab – Smart Work (b2c-ia-lab-agosto-2025) 2.0** de SkillNest.



## ✨ Características Implementadas (v0.1.5)
* **Constructor Universal Dinámico:** Sincronización inteligente entre sugerencias predefinidas y entrada manual de dominios/roles.
* **Librería de Activos Estratégicos:** Persistencia robusta en MySQL que permite a los usuarios guardar, calificar con estrellas (Rating) y gestionar sus prompts.
* **Búsqueda y Filtrado Instantáneo:** Motor de búsqueda en el lado del cliente (JS) para filtrado en tiempo real por contenido o dominio sin recargar la página.
* **Ingeniería Avanzada de Prompts:** * *Chain of Thought (CoT):* Forzado de razonamiento lógico.
    * *Autocrítica:* Instrucciones de revisión de sesgos integradas.
    * *Estructura Viral:* Esquemas de salida (Gancho/Cuerpo/Cierre).
* **Arquitectura Refactorizada:** Gestión centralizada de sesiones en `db.php` y API RESTful simplificada para operaciones CRUD.
* **Diseño "Smart UX":** Interfaz responsiva con Bootstrap 5.3, navegación con *Smooth Scroll* y previsualización en tiempo real.

## 🛠️ Instalación y Despliegue
1.  **Repositorio:** Clonar mediante SSH: `git clone git@github.com:ciglesiasvera/promptmaster_academy.git`
2.  **Base de Datos:** Importar el esquema desde `database.sql` (Tablas `users` y `prompts` con llaves foraneas e índices optimizados).
3.  **Conexión:** Configurar host, DB, usuario y contraseña en `db.php`.
4.  **Requerimientos:** Servidor con PHP 7.4+ (soporte para PDO) y MySQL 5.7+ / MariaDB.

## 🧪 Pruebas y Calidad
El proyecto incluye un módulo de pruebas unitarias (`test.php`) que verifica:
* Conexión exitosa a la base de datos.
* Integridad del sistema de Hashing (BCRYPT).
* Lógica de construcción de cadenas para prompts.

## 📈 Roadmap (Próximas Versiones)
* **v0.2.0:** Implementación de "Modo Equipo" para compartir librerías de prompts entre departamentos.
* **v0.2.5:** Integración directa con API de OpenAI/Anthropic para probar los prompts desde la misma plataforma.

## 👤 Autor
* **Nombre:** Cristian Iglesias Vera
* **Usuario Github:** [ciglesiasvera](https://github.com/ciglesiasvera)
* **Email:** ciglesiasvera@gmail.com

---
*Desarrollado para potenciar el Smart Work a través de la estandarización de activos digitales.*