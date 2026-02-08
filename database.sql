CREATE DATABASE prompt_lab_v1;
USE prompt_lab_v1;

-- Estructura de la base de datos para PromptWise v0.1.5

-- 1. Tabla de Usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(191) NOT NULL UNIQUE, -- Longitud optimizada para índices utf8mb4
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Tabla de Prompts (Librería de Activos)
CREATE TABLE IF NOT EXISTS prompts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    domain VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    context TEXT,
    final_prompt TEXT NOT NULL,
    rating INT DEFAULT 5,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Relación con la tabla usuarios
    CONSTRAINT fk_user FOREIGN KEY (user_id) 
        REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Índices para optimizar la búsqueda y filtrado en la librería
CREATE INDEX idx_user_prompts ON prompts(user_id);
CREATE INDEX idx_domain ON prompts(domain);