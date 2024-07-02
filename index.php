<?php
session_start();

// Incluir archivos necesarios
include_once 'Conexion.php';
include_once 'user.php';

// Obtener conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Inicializar objeto Usuario
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $user_captcha = $_POST['captcha'];

    // Verificar CAPTCHA
    if ($user_captcha === $_SESSION['captcha']) {
        // Intentar iniciar sesión
        if ($user->login($correo, $contraseña)) {
            $_SESSION['nombre'] = $user->nombre;
            $_SESSION['apellido'] = $user->apellido;
            header("Location: contenido.php");
            exit();
        } else {
            echo "
                 <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error de autenticación',
                        text: 'Correo o contraseña incorrectos.'
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                </script>
            ";
        }
    } else {
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error de CAPTCHA',
                    text: 'El CAPTCHA ingresado es incorrecto.'
                }).then(() => {
                    window.location.href = 'index.php';
                });
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('css/images/fondo.jpg'); 
            background-size: cover; 
            background-position: center; 
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login-box {
            width: 300px;
            padding: 60px;
            background: rgba(255, 255, 255, 0.7); 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .login-box:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .login-box h2 {
            text-align: center;
        }

        .login-box input[type="email"],
        .login-box input[type="password"],
        .login-box input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            transition: box-shadow 0.3s ease;
        }

        .login-box input[type="email"]:hover,
        .login-box input[type="password"]:hover,
        .login-box input[type="text"]:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #A22929;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-box input[type="submit"]:hover {
            background-color: #b33939;
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .captcha {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .captcha:hover {
            color: #A22929;
            transform: scale(1.1);
        }

        .floating-animations {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-animations div {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float 5s infinite;
            pointer-events: none;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px);
                opacity: 0;
            }
        }

        @keyframes float2 {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-800px);
                opacity: 0;
            }
        }

        @keyframes float3 {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(-600px);
                opacity: 0;
            }
        }

        .cursor-follower {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: rgba(162, 41, 41, 0.8);
            position: absolute;
            pointer-events: none;
            transition: transform 0.1s ease;
            transform: translate(-50%, -50%);
        }

    </style>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                const formData = new FormData(form);
                const response = await fetch('index.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.text();
                document.body.innerHTML = result;
            });

            const loginButton = document.querySelector('.login-box input[type="submit"]');
            loginButton.addEventListener('mouseover', () => {
                loginButton.style.backgroundColor = '#b33939';
                loginButton.style.transform = 'scale(1.05)';
            });

            loginButton.addEventListener('mouseout', () => {
                loginButton.style.backgroundColor = '#A22929';
                loginButton.style.transform = 'scale(1)';
            });

            const inputs = document.querySelectorAll('.login-box input[type="email"], .login-box input[type="password"], .login-box input[type="text"]');
            inputs.forEach(input => {
                input.addEventListener('mouseover', () => {
                    input.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.3)';
                });
                input.addEventListener('mouseout', () => {
                    input.style.boxShadow = 'none';
                });
            });

            const captcha = document.querySelector('.captcha');
            captcha.addEventListener('mouseover', () => {
                captcha.style.color = '#A22929';
                captcha.style.transform = 'scale(1.1)';
            });
            captcha.addEventListener('mouseout', () => {
                captcha.style.color = 'black';
                captcha.style.transform = 'scale(1)';
            });

            // Floating animations
            const floatingContainer = document.createElement('div');
            floatingContainer.className = 'floating-animations';
            document.body.appendChild(floatingContainer);

            for (let i = 0; i < 30; i++) {
                const bubble = document.createElement('div');
                const size = Math.random() * 10 + 5 + 'px';
                bubble.style.width = size;
                bubble.style.height = size;
                bubble.style.left = Math.random() * 100 + '%';
                bubble.style.top = Math.random() * 100 + '%';
                bubble.style.animationDuration = (Math.random() * 3 + 3) + 's';
                bubble.style.animationDelay = (Math.random() * 2) + 's';
                floatingContainer.appendChild(bubble);
            }

            // Cursor follower
            const cursorFollower = document.createElement('div');
            cursorFollower.className = 'cursor-follower';
            document.body.appendChild(cursorFollower);

            document.addEventListener('mousemove', (e) => {
                cursorFollower.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
            });

            // Crear más burbujas con diferentes tamaños y velocidades
            for (let i = 0; i < 30; i++) {
                const bubble = document.createElement('div');
                const size = Math.random() * 10 + 5 + 'px';
                bubble.style.width = size;
                bubble.style.height = size;
                bubble.style.left = Math.random() * 100 + '%';
                bubble.style.top = Math.random() * 100 + '%';
                bubble.style.animationDuration = (Math.random() * 3 + 3) + 's';
                bubble.style.animationDelay = (Math.random() * 2) + 's';
                bubble.style.animationName = 'float' + (Math.floor(Math.random() * 3) + 1);
                floatingContainer.appendChild(bubble);
            }
        });
    </script>
</head>
<body>
    <div class="login-box">
        <h2>Iniciar Sesión</h2>
        <form id="loginForm" action="index.php" method="post">
            <input type="email" id="correo" name="correo" placeholder="Correo" required>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
            <div class="captcha">
                <?php echo $_SESSION['captcha']; ?>
            </div>
            <input type="text" id="captcha" name="captcha" placeholder="Ingrese el CAPTCHA" required>
            <input type="submit" value="Iniciar Sesión">
            <input type="submit" class="active" href="contraseña.php" value="Olvide mi contraseña">
        </form>
    </div>
</body>
</html>
