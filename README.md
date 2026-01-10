# Proyecto Full Stack – UserConnect  
**Ingeniería Web 1 – Universidad Alfonso X el Sabio (UAX)**

## Descripción del Proyecto

Este proyecto consiste en el desarrollo de una aplicación web sencilla pero funcional, cuyo objetivo principal es la gestión de usuarios mediante un sistema de registro e inicio de sesión.  

La aplicación permite a los usuarios:
- Registrarse de forma segura
- Iniciar sesión
- Acceder a un panel privado
- Visualizar información personalizada cargada dinámicamente

El proyecto ha sido desarrollado siguiendo de forma progresiva las unidades didácticas de la asignatura Ingeniería Web 1.

---

## Tecnologías Utilizadas

Durante el desarrollo del proyecto se han utilizado las siguientes tecnologías:

- **HTML5**: estructura de la aplicación web  
- **CSS3**: diseño visual y maquetación  
- **JavaScript**: validaciones, eventos e interactividad  
- **PHP**: lógica del servidor y gestión de sesiones  
- **MySQL**: base de datos para almacenamiento de usuarios  
- **phpMyAdmin**: administración de la base de datos  
- **XAMPP**: entorno de desarrollo local  
- **Git y GitHub**: control de versiones y entrega del proyecto  

---

## Funcionalidades Implementadas

- Registro de usuarios con validaciones
- Almacenamiento seguro de contraseñas mediante `password_hash`
- Inicio de sesión con verificación mediante `password_verify`
- Gestión de sesiones en PHP
- Panel privado (dashboard) para usuarios autenticados
- Carga dinámica de datos mediante Fetch API y formato JSON
- Estructura del backend organizada mediante Programación Orientada a Objetos (POO)

---

## Estructura del Proyecto

El proyecto está organizado de forma modular, separando frontend y backend para facilitar la lectura y el mantenimiento del código.

---

## Base de Datos

La aplicación utiliza una base de datos MySQL llamada `userconnect_db`, que contiene la tabla `usuarios`, donde se almacenan los datos de los usuarios registrados.

Las contraseñas se almacenan de forma cifrada para garantizar la seguridad.

---

## Instrucciones para Ejecutar el Proyecto

1. Instalar **XAMPP**
2. Copiar la carpeta del proyecto dentro de:htdocs/

3. Iniciar **Apache** y **MySQL** desde el panel de XAMPP
4. Acceder a **phpMyAdmin** y crear la base de datos
5. Importar el archivo: database/userconnect_db.sql

6. Abrir el navegador y acceder a:http://localhost/userconnect

---

## Estado del Proyecto

Proyecto completo y funcional, cumpliendo con los requisitos de las Unidades Didácticas 1 a 6 de la asignatura Ingeniería Web 1.

---

## Autor

Proyecto desarrollado como trabajo académico para la asignatura **Ingeniería Web 1**  
Universidad Alfonso X el Sabio (UAX)