# 📰 Proyecto Blog - Basado en la plantilla "Calvin" de StyleShout

Este proyecto es una aplicación web desarrollada con **PHP**, **MySQL** y **jQuery**, que utiliza como base la plantilla **[Calvin](https://styleshout.com/free-templates/calvin/)** de StyleShout para su interfaz frontend.  
Su objetivo principal es gestionar y mostrar artículos de blog con funcionalidades CRUD completas y un sistema de comentarios con hilos de discusión.

---

## 📁 Estructura del proyecto

```bash
├───admin
│   ├───assets
│   │   ├───css
│   │   ├───font-awesome
│   │   │   └───fonts
│   │   ├───fonts
│   │   ├───img
│   │   └───js
│   │       ├───dataTables
│   │       └───morris
│   ├───images
│   │   └───blog-images
│   ├───includes
│   └───summernote
│       ├───font
│       ├───lang
│       └───plugin
│           ├───databasic
│           ├───hello
│           └───specialchars
├───css
├───images
│   ├───avatars
│   ├───icons
│   └───thumbs
│       ├───about
│       ├───contact
│       ├───masonry
│       └───single
└───js
    └───fontawesome
```
---

## ⚙️ Tecnologías utilizadas
- **Frontend:**  
  - HTML5, CSS3  
  - JavaScript, jQuery  
  - Plantilla Calvin (StyleShout)
  
- **Backend:**  
  - PHP (programación estructurada)
  - MySQL (gestión de base de datos)
  
- **Librerías adicionales:**  
  - **Summernote:** editor de texto enriquecido para crear artículos con formato y multimedia.
  - **Fontawesome:** proporciona los íconos utilizados en el sistema.
  - **Morris.js:** Presenta algunos gráficos interactivos utilizados en el panel de administración
  - **DataTables.js:** Presenta información en tablas con estilo moderno y limpio. Usado en el panel de administración.
 ---

## 🧠 Descripción general
El sistema está dividido en dos partes principales:

### 🖥️ Frontend
Basado en la plantilla Calvin, esta sección muestra el blog al usuario final.  
Entre sus principales funcionalidades:
- Visualización de artículos de blog almacenados en la base de datos.  
- Búsqueda y filtrado de artículos mediante **etiquetas** (palabras clave asociadas).  
- Sección de **comentarios** en cada artículo, con la posibilidad de:
  - Agregar nuevos comentarios.
  - Realizar **réplicas** (respuestas) a otros comentarios, generando hilos de discusión.  
- Carga dinámica de contenido desde el backend mediante consultas SQL.

### 🔐 Backend (`/admin`)
Sección restringida para la administración del sitio.  
Permite realizar **operaciones CRUD** sobre:

- **Categorías** de los artículos.
- **Artículos** de blog, incluyendo:
  - Título, contenido, etiquetas y categoría.
  - Subida de imágenes asociadas al artículo.
  - Edición con el editor **Summernote**, para aplicar formato enriquecido.

---

## 🗄️ Base de datos

El archivo `blogs.sql` define las tablas principales del sistema:
- `blog_post` – artículos del blog  
- `blog_categories` – categorías de artículos  
- `blog_comments` – comentarios asociados a los artículos  
- `blog_tags` – etiquetas asociadas a artículos  
- Relaciones entre artículos, categorías, etiquetas y comentarios.

---
## 💬 Comentarios y réplicas

Cada comentario ingresado se almacena asociado al artículo correspondiente.  
El sistema permite **responder a comentarios existentes**, almacenando la referencia del comentario padre para mantener la jerarquía (comentarios y réplicas), lo que da lugar a pequeños hilos de discusión dentro de cada artículo.

---
## 🧩 Observaciones sobre la arquitectura

Este proyecto fue uno de los primeros desarrollados durante la carrera de Ingeniería Informática.  
Por tanto, **no sigue estrictamente un patrón de diseño** (como MVC).  
El código mezcla la lógica de presentación con la lógica de negocio, aunque mantiene una separación básica entre la parte pública (frontend) y administrativa (backend).

Aun así, constituye una **base funcional y didáctica** para comprender:
- La integración entre PHP y MySQL.
- La manipulación de datos mediante formularios y consultas SQL.
- La carga dinámica de contenido en una interfaz preexistente (plantilla HTML).

---
## 🧾 Créditos

- **Diseño base:** [Calvin Template](https://styleshout.com/free-templates/calvin/) – by StyleShout  
- **Licencia:** Creative Commons Attribution 3.0 (requiere mantener atribución)  
- **Desarrollo y adaptación backend:** Saúl Gutiérrez

---
## 📌 Notas finales

Este proyecto puede servir como punto de partida para implementar un sistema de gestión de contenidos (CMS) más robusto o como práctica para migrar hacia un patrón **MVC** con frameworks como Laravel o CodeIgniter.

---
