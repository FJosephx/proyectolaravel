# Sistema de Gestión de Tareas

Un sistema moderno y robusto para la gestión de tareas personales, desarrollado con PHP / Laravel y tecnologías web modernas.

## 🚀 Características

- **Gestión completa de tareas**: Sistema CRUD completo con validaciones robustas
- **Autenticación segura**: Registro, login, recuperación de contraseña y verificación de email
- **Interfaz moderna**: Diseño responsive con Tailwind CSS y Alpine.js
- **Arquitectura MVC**: Implementación completa del patrón Model-View-Controller
- **Base de datos robusta**: Migraciones y seeders para MySQL con Eloquent ORM
- **Control de versiones**: Repositorio Git estructurado y documentado

## 🛠️ Tecnologías utilizadas

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Tailwind CSS, Alpine.js, Blade Templates
- **Base de datos**: MySQL
- **Gestión de assets**: Vite
- **Autenticación**: Laravel Breeze

## 📋 Requisitos previos

- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL 8.0 o superior
- Git

## 🚀 Instalación

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd proyecto-laravel
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar la base de datos**
   - Crear una base de datos MySQL
   - Actualizar las credenciales en el archivo `.env`
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_base_de_datos
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Compilar assets**
   ```bash
   npm run build
   ```

8. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

El sistema estará disponible en `http://localhost:8000`

## 📁 Estructura del proyecto

```
proyecto-laravel/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Proveedores de servicios
├── database/
│   ├── migrations/          # Migraciones de BD
│   ├── seeders/            # Seeders para datos de prueba
│   └── factories/          # Factories para testing
├── resources/
│   ├── views/              # Vistas Blade
│   ├── css/                # Estilos CSS
│   └── js/                 # JavaScript
├── routes/                 # Definición de rutas
└── tests/                  # Tests automatizados
```

## 🎯 Funcionalidades principales

### Sistema de Autenticación
- Registro de usuarios
- Inicio de sesión
- Recuperación de contraseña
- Verificación de email
- Gestión de perfiles

### Gestión de Tareas
- Crear nuevas tareas
- Editar tareas existentes
- Marcar tareas como completadas
- Eliminar tareas
- Validación de formularios

### Interfaz de Usuario
- Diseño responsive
- Componentes reutilizables
- Navegación intuitiva
- Feedback visual

## 🧪 Testing

Ejecutar los tests:
```bash
php artisan test
```

## 📚 Aprendizajes aplicados

Este proyecto demuestra competencias en:

- **Rutas en PHP**: Definición y gestión de rutas web
- **Controladores y validaciones**: Manejo de requests y validaciones
- **Migraciones y ORM Eloquent**: Estructura de BD y consultas optimizadas
- **Plantillas Blade**: Componentes reutilizables y optimización
- **Vite**: Gestor de frontend moderno
- **Arquitectura MVC**: Patrón aprendido en DuocUC

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Objetivo

Este proyecto es de uso educativo y académico.

## 👨‍💻 Autor

Desarrollado como proyecto académico para demostrar competencias en Laravel, arquitectura MVC y desarrollo web moderno.

---

**Nota**: Este sistema es una base sólida para continuar agregando funcionalidades y puede ser utilizado como punto de partida para proyectos más complejos.