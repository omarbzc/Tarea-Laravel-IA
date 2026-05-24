# Integración de Laravel con Modelos de IA Locales (Ollama)

Este proyecto proporciona una interfaz web sencilla construida con Laravel para interactuar con modelos de lenguaje de gran tamaño (LLM) ejecutados localmente mediante **Ollama**. Permite enviar consultas a un modelo configurado y recibir respuestas procesadas en tiempo real, facilitando la experimentación con IA sin dependencia de servicios en la nube.

## 🛠️ Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

### 1. Clonar el repositorio
```bash
git clone https://github.com/omarbzc/Tarea-Laravel-IA.git
cd Tarea-Laravel-IA
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Configurar el entorno
- Crea una copia del archivo de ejemplo:
  ```bash
  cp .env.example .env
  ```
- Genera la clave de la aplicación:
  ```bash
  php artisan key:generate
  ```

### 4. Configurar Ollama (Servidor de IA)
- Asegúrate de tener instalado [Ollama](https://ollama.com/).
- Descarga el modelo requerido (por defecto `qwen2.5:1.5b`):
  ```bash
  ollama run qwen2.5:1.5b
  ```
- En tu archivo `.env`, asegúrate de que las variables de conexión apunten a tu instancia local:
  ```env
  OPENAI_API_KEY=ollama
  OPENAI_BASE_URL=http://localhost:11434/v1
  ```

## 🚀 Ejecución

Inicia el servidor de desarrollo de Laravel:
```bash
php artisan serve
```

Accede a la aplicación a través de tu navegador en: `http://localhost:8000/ia-config`

---
*Desarrollado como base para prácticas de integración de IA en entornos servidor.*
