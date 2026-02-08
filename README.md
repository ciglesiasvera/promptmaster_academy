# PromptWise - Plataforma de Ingeniería de Prompts (v0.1.5)

## 🌐 Acceso a Producción
La plataforma está desplegada y operativa en: **[https://promptwise.skylabs.cl](https://promptwise.skylabs.cl)**

## 🚀 Resumen Ejecutivo
**PromptWise** es un ecosistema "Full-Stack" diseñado para profesionalizar la interacción con Modelos de Lenguaje Extensos (LLMs). A diferencia de los constructores simples, PromptWise implementa un **Pipeline de Ingeniería de Prompts** que obliga al usuario a estructurar sus instrucciones bajo parámetros de Dominio, Rol, Contexto y Técnicas avanzadas (CoT, Autocrítica).

Este proyecto es el resultado práctico del curso **IA Lab – Smart Work (b2c-ia-lab-agosto-2025) 2.0 * de SkillNest**.

## ✨ Características Implementadas (v0.1.5)
* **Constructor Universal Dinámico:** Apertura total de dominios de conocimiento y roles, permitiendo al usuario definir cualquier área de expertiz manualmente.
* **Librería de Activos Estratégicos:** Sistema de persistencia en MySQL para usuarios registrados que permite guardar, calificar y reutilizar prompts exitosos.
* **Búsqueda y Filtrado Instantáneo:** Interfaz de usuario (UI) optimizada con filtrado en tiempo real por palabras clave y categorías de dominio.
* **Ingeniería Avanzada:** Interruptores integrados para aplicar *Chain of Thought* (Pensamiento paso a paso) y estructuras de salida viral.
* **Seguridad y UX:** Sanitización de datos (XSS Protection), manejo de sesiones PHP y diseño responsivo "Mobile First" con Bootstrap 5.3.

## 🛠️ Instalación y Despliegue
1.  **Repositorio:** Clonar mediante SSH: `git clone git@github.com:ciglesiasvera/promptmaster_academy.git`
2.  **Base de Datos:** Importar el esquema actualizado desde `database.sql` (Incluye tablas de `users` y `prompts`).
3.  **Conexión:** Configurar credenciales en `db.php`.
4.  **Requerimientos:** Servidor con PHP 7.4+ y MySQL 5.7+ / MariaDB.

## 📈 Sugerencia de Escalabilidad (Roadmap)
Para futuras iteraciones (v0.2.0), se propone la implementación de **Curaduría de Datos Automatizada**: un sistema que analice los dominios personalizados más utilizados por la comunidad para integrarlos dinámicamente en las sugerencias globales, transformando la plataforma en un repositorio de conocimiento colectivo.

## 👤 Autor
* **Nombre:** Cristian Iglesias Vera
* **Usuario Github:** [ciglesiasvera](https://github.com/ciglesiasvera)
* **Email:** ciglesiasvera@gmail.com

---
*Desarrollado para potenciar el Smart Work a través de la estandarización de activos digitales.*