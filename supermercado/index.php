<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Base de Datos</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Estilos básicos para el carrusel */
        .carousel-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
            overflow: hidden;
        }

        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-images img {
            width: 100%;
            border-radius: 10px;
        }

        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }

        .carousel-dots {
            text-align: center;
            margin-top: 10px;
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 5px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
            cursor: pointer;
        }

        .active {
            background-color: #717171;
        }
    </style>
</head>
<body>
    <header>
        <h1>GESTIÓN SUPERMERCADO</h1>
        <nav>
            <ul>
                <li><a href="cajeros/index.php">Cajeros</a></li>
                <li><a href="categorias/index.php">Categorías</a></li>
                <li><a href="clientes/index.php">Clientes</a></li>
                <li><a href="detalle_facturas/index.php">Detalle Facturas</a></li>
                <li><a href="facturas/index.php">Facturas</a></li>
                <li><a href="productos/index.php">Productos</a></li>
                <li><a href="proveedores/index.php">Proveedores</a></li>
            </ul>
        </nav>
    </header>

    <!-- Carrusel de imágenes -->
    <div class="carousel-container">
        <div class="carousel-images">
            <img src="img/img1.jpg" alt="Imagen 1">
            <img src="img/david-becker-mGx5-xt1uec-unsplash.jpg" alt="Imagen 2">
            <img src="img/img.jpg" alt="Imagen 3">
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
    
    <!-- Dots de navegación -->
    <div class="carousel-dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>

    <script>
        // Lógica para el carrusel de imágenes
        let slideIndex = 1;
        showSlides(slideIndex);

        function moveSlide(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let slides = document.querySelectorAll(".carousel-images img");
            let dots = document.querySelectorAll(".dot");
            
            // Ajusta el índice si es necesario
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }

            // Oculta todas las imágenes
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            // Muestra la imagen activa
            slides[slideIndex - 1].style.display = "block";

            // Actualiza los puntos de navegación
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>
</html>
