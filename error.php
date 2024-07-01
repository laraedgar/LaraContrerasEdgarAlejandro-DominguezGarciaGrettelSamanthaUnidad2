<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
        .error-container {
            text-align: center;
            animation: slideInDown 1s ease-in-out;
        }
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1 {
            font-size: 3em;
            margin-bottom: 10px;
            animation: bounceIn 1s ease-in-out;
        }
        @keyframes bounceIn {
            0%, 20%, 40%, 60%, 80%, 100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
            50% {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px);
            }
        }
        p {
            font-size: 1.2em;
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
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        a:hover {
            text-decoration: underline;
            color: #0056b3;
            transform: scale(1.1);
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .button:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error 404</h1>
        <p>Lo sentimos, la página que estás buscando no pudo ser encontrada.</p>
        <p><a href="http://localhost/movie/" class="button">Volver a la página de inicio</a></p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.querySelector('.button');
            
            // Función síncrona para mostrar alerta al hacer clic
            button.addEventListener('click', (event) => {
                event.preventDefault();
                alert('Redirigiendo a la página de inicio...');
                // Simular redirección después de la alerta
                setTimeout(() => {
                    window.location.href = 'http://localhost/netflix/';
                }, 1000);
            });

            // Función asíncrona para una animación de fondo
            async function animateBackground() {
                const colors = ['#f4f4f4', '#eaeaea', '#e0e0e0', '#d6d6d6', '#cccccc'];
                for (let color of colors) {
                    await new Promise(resolve => setTimeout(resolve, 500));
                    document.body.style.backgroundColor = color;
                }
            }

            animateBackground();
        });
    </script>
</body>
</html>
