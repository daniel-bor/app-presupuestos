# Aplicación de Control de Presupuestos

## Descripción
Esta aplicación está diseñada para gestionar y controlar los presupuestos de una empresa, permitiendo a los administradores y gerentes de sucursal administrar de manera eficiente los recursos financieros. Desarrollada con Laravel 10 y Livewire, ofrece un conjunto robusto de funciones para el manejo del presupuesto trimestral y mensual, autorizaciones de gastos y seguimiento del presupuesto ejecutado.

## Características
### Para Administradores
- Ingresar el presupuesto trimestral para cada país.
- Autorizar el presupuesto mensual generado por cada gerente de país.
- Visualizar la cantidad de presupuesto utilizado, segmentado por tipo de gasto.

### Para Gerentes de Sucursal
- Visualizar el presupuesto asignado para el periodo trimestral.
- Generar y enviar autorizaciones con listado de gastos para el mes siguiente.
- Seguimiento del total de presupuesto autorizado y ejecutado.

## Instalación
1. Clonar el repositorio:
2. Instalar dependencias: ```composer install```.
3. Configurar el archivo `.env` con las credenciales de la base de datos y otras configuraciones necesarias.
4. Generar la clave de la aplicación: ```php artisan key:generate```.
5. Ejecutar las migraciones y seeders ```php artisan migrate --seed```

## Uso
Para iniciar la aplicación, ejecute el servidor de desarrollo de Laravel:
```php artisan serve```

Acceda a la aplicación en su navegador web en `http://localhost:8000`.

<!-- ## Contribución
Las contribuciones son bienvenidas. Por favor, envía tus pull requests a la rama 'develop' para cualquier característica o corrección de errores. -->

<!-- ## Contacto
Para más información, por favor contacta a [Correo de contacto]. -->