# Dental Clinic Backend API

Sistema de gestión odontológica - API REST con Symfony

## Tecnologías
- PHP 8.1+
- Symfony 6.4
- PostgreSQL (Neon)
- JWT Authentication

## Instalación
```bash
composer install
symfony server:start
```

## Base de Datos
- 14 tablas principales
- Historia clínica digital
- Odontograma interactivo
- Control de inventario con alertas

## Estructura
```
src/
├── Controller/     # Endpoints de la API
├── Service/        # Lógica de negocio
├── Repository/     # Acceso a datos
└── Entity/         # Modelos de BD
```
