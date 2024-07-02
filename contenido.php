<!DOCTYPE html>
<html>
<head>
    <title>MOVIESGE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <style>
        /* Estilos adicionales para el efecto tipo Netflix */
        body {
            font-family: Arial, sans-serif;
            background-color: #141414; /* Fondo oscuro */
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #000000; /* Fondo del encabezado */
            padding: 10px 0;
            animation: fadeInDown 1s ease-in-out;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        #header img {
            display: block;
            margin: 0 auto;
        }
        #navigation ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        #navigation ul li {
            display: inline;
            margin-right: 20px;
        }
        #navigation ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }
        #navigation ul li a:hover {
            color: #ff0000;
        }
        #navigation ul li a.active {
            color: #ff0000;
        }
        #sub-navigation {
            text-align: center;
            margin-top: 20px;
            animation: fadeInUp 1s ease-in-out;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        #sub-navigation input[type="text"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ffffff;
            background-color: #333333;
            color: #ffffff;
            transition: background-color 0.3s ease-in-out;
        }
        #sub-navigation input[type="text"]:focus {
            background-color: #555555;
        }
        #sub-navigation .register-button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            margin-left: 10px;
            transition: background-color 0.3s ease-in-out;
        }
        #sub-navigation .register-button:hover {
            background-color: #990000;
        }
        .box {
            background-color: #333333; /* Fondo de las cajas de películas */
            padding: 20px;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .head {
            overflow: hidden;
            padding-bottom: 10px;
            border-bottom: 1px solid #666666;
            margin-bottom: 20px;
        }
        .head h2 {
            float: left;
            margin: 0;
            padding: 0;
            font-size: 24px;
            font-weight: normal;
            text-transform: uppercase;
            animation: slideInLeft 1s ease-in-out;
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .head p.text-right {
            float: right;
            margin: 0;
            padding: 0;
        }
        .movie {
            width: 20%;
            float: left;
            margin-right: 5%;
            position: relative;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            animation: fadeIn 1s ease-in-out;
        }
        .movie:hover {
            transform: scale(1.05);
        }
        .movie:last-child {
            margin-right: 0;
        }
        .movie-image {
            position: relative;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .movie-image img {
            width: 100%;
            display: block;
            transition: transform 0.3s ease-in-out;
        }
        .movie-image:hover img {
            transform: scale(1.1);
        }
        .play {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }
        .movie-image:hover .play {
            opacity: 1;
        }
        .play .name {
            display: block;
            font-size: 18px;
            color: #ffffff;
            text-decoration: none;
            margin-top: 20px;
            animation: fadeInDown 1s ease-in-out;
        }
        .rating {
            overflow: hidden;
            color: #ffffff;
        }
        .rating p {
            margin: 0;
            padding: 0;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .stars {
            float: left;
            width: 60%;
            position: relative;
            top: 2px;
        }
        .stars-in {
            width: 80%;
            height: 10px;
            background: url('css/images/stars.png') repeat-x left top;
            position: absolute;
            top: 0;
            left: 0;
            animation: slideInLeft 1s ease-in-out;
        }
        .comments {
            float: right;
            font-size: 12px;
        }
        .cl {
            clear: both;
        }
        #footer {
            background-color: #000000; /* Fondo del pie de página */
            padding: 10px 0;
            text-align: center;
            color: #ffffff;
            font-size: 12px;
            clear: both;
            animation: fadeInUp 1s ease-in-out;
        }
        #footer a {
            color: #ffffff;
            text-decoration: none;
        }
        #footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div id="shell">
    <div id="header">
        <img src="css/images/logo2.png" alt="" width="350" height="100">
        <div class="social">
            <ul>
                <li><a class="twitter" href="#">twitter</a></li>
                <li><a class="facebook" href="#">facebook</a></li>
                <li><a class="vimeo" href="#">vimeo</a></li>
                <li><a class="rss" href="#">rss</a></li>
            </ul>
        </div>
        <div id="navigation">
            <ul>
                <li><a class="active" href="#">Inicio</a></li>
                <li><a href="#">Chat</a></li>
                <li><a href="#">Buzon</a></li>
                <li><a href="#">Contáctanos</a></li>
                <li><a href="#">Ayuda</a></li>
            </ul>
        </div>
        <div id="sub-navigation">
            <div id="search">
                <form action="#" method="get" accept-charset="utf-8">
                    <p>BUSQUEDAS</p>
                    <input type="text" id="campo_busqueda" placeholder="Ingresa tu búsqueda">
                    <a href="#" class="register-button" onclick="buscar(); return false;">Buscar</a>
                </form>
            </div>
        </div>
    </div>
    <div id="main">
        <div id="content">
            <div class="box">
                <div class="head">
                    <h2>TRAILERS</h2>
                    <p class="text-right"><a href="#">VER MÁS</a></p>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">ANNABELLE</span></span>
                        <a href="https://www.youtube.com/watch?v=8kmLHwKH31M"><img src="css/images/movie1.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">LA MONJA</span></span>
                        <a href="https://www.youtube.com/watch?v=eqVjGwYFVqQ"><img src="css/images/movie2.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">DON'T BREATHE</span></span>
                        <a href="https://www.youtube.com/watch?v=76yBTNDB6vU"><img src="css/images/movie3.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">SINISTER</span></span>
                        <a href="https://www.youtube.com/watch?v=_kbQAJR9YWQ"><img src="css/images/movie4.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="cl">&nbsp;</div>
            </div>

            <div class="box">
                <div class="head">
                    <h2>TOP RATED</h2>
                    <p class="text-right"><a href="#">VER MÁS</a></p>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">MEN</span></span>
                        <a href="https://www.youtube.com/watch?v=pt81CJcWZy8"><img src="css/images/movie5.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">EXPEDIENTE WARREN</span></span>
                        <a href="https://www.youtube.com/watch?v=1kOlrEwTfco"><img src="css/images/movie6.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">EL EXORCISTA</span></span>
                        <a href="#"><img src="css/images/movie7.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">MAGNETO</span></span>
                        <a href="#"><img src="css/images/movie8.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>

                </div>

                <div class="cl">&nbsp;</div>
            </div>
        </div>
        <div class="box">
                <div class="head">
                    <h2>TOP RATED</h2>
                    <p class="text-right"><a href="#">VER MÁS</a></p>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">LA INLUENCIA</span></span>
                        <a href="#"><img src="css/images/movie9.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">NO RESPIRES</span></span>
                        <a href="#"><img src="css/images/movie10.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">LA MALASANA 32</span></span>
                        <a href="#"><img src="css/images/movie11.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">ANGELS AND DEMONS</span></span>
                        <a href="#"><img src="css/images/movie12.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="cl">&nbsp;</div>
            </div>
            <div class="box">
                <div class="head">
                    <h2>TOP RATED</h2>
                    <p class="text-right"><a href="#">VER MÁS</a></p>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">HOUSE</span></span>
                        <a href="#"><img src="css/images/movie13.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">INSIDIOUS</span></span>
                        <a href="#"><img src="css/images/movie14.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">LA POSESION DE VERONICA</span></span>
                        <a href="#"><img src="css/images/movie15.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="movie">
                    <div class="movie-image">
                        <span class="play"><span class="name">TALK TO ME</span></span>
                        <a href="#"><img src="css/images/movie16.jpg" alt="" /></a>
                    </div>
                    <div class="rating">
                        <p>RATING</p>
                        <div class="stars">
                            <div class="stars-in"></div>
                        </div>
                        <span class="comments">12</span>
                    </div>
                </div>

                <div class="cl">&nbsp;</div>
            </div>

        <div id="footer">
            <p>&copy; 2024 MoviesGE. Todos los derechos reservados. | <a href="#">Política de Privacidad</a> | <a href="#">Términos de Uso</a></p>
        </div>
    </div>
</div>
<script>
    // Función asincrónica para buscar
    async function buscar() {
        try {
            // Obtener el valor del campo de búsqueda
            var busqueda = document.getElementById('campo_busqueda').value;
            // Redirigir a la página PHP con la consulta de búsqueda como parámetro
            window.location.href = 'error.php?query=' + encodeURIComponent(busqueda);
        } catch (error) {
            console.error('Error:', error);
        }
    }

    // Eventos del mouse
    $(document).ready(function() {
        $('.movie-image img').hover(function() {
            $(this).css('cursor', 'pointer');
        });
        
        $('.movie-image').click(function() {
            var movieName = $(this).find('.name').text();
            alert('Has seleccionado: ' + movieName);
        });
    });
</script>

<script>
    async function buscar() {
        let busqueda = document.getElementById('campo_busqueda').value;
        alert('Has buscado: ' + busqueda);
        // Simula una operación asíncrona como una llamada a un servidor
        await new Promise(resolve => setTimeout(resolve, 1000));
        alert('Resultados para: ' + busqueda);
        // Aquí puedes agregar más lógica para la búsqueda, como redirigir a otra página o filtrar resultados en la misma página.
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Eventos del mouse
        document.querySelectorAll('.movie-image').forEach(function(element) {
            element.addEventListener('mouseenter', function() {
                this.querySelector('img').style.transform = 'scale(1.1)';
                this.querySelector('.play').style.opacity = '1';
            });
            element.addEventListener('mouseleave', function() {
                this.querySelector('img').style.transform = 'scale(1)';
                this.querySelector('.play').style.opacity = '0';
            });
        });
    });
</script>

</body>
</html>
