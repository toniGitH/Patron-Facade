<?php
/**
 * INCLUSIÓN DE LA LÓGICA
 * El archivo main.php ya incluye el autoload y realiza las operaciones
 */
require_once __DIR__ . '/main.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrón Facade - Home Cinema Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-theater-masks"></i> Patrón Estructural: Facade</h1>
            <p border-secondary class="subtitle">Simplificando sistemas complejos con una interfaz unificada</p>
        </header>

        <main>
            <div class="grid-execution">
                <div class="card">
                    <h2><i class="fas fa-terminal success-icon"></i> Ejecución Con Facade</h2>
                    <pre><?php echo htmlspecialchars($logConFacade); ?></pre>
                </div>

                <div class="card">
                    <h2><i class="fas fa-terminal error-icon"></i> Ejecución Sin Facade</h2>
                    <pre><?php echo htmlspecialchars($logSinFacade); ?></pre>
                </div>
            </div>

            <div class="card">
                <h2><i class="fas fa-lightbulb" style="color: #fbbf24;"></i> Ventajas del Patrón</h2>
                <ul class="advantage-list">
                    <li class="advantage-item">
                        <strong>Simplicidad</strong>
                        Proporciona una interfaz simple para un sistema complejo de subsistemas.
                    </li>
                    <li class="advantage-item">
                        <strong>Desacoplamiento</strong>
                        Reduce el número de objetos con los que el cliente necesita tratar.
                    </li>
                    <li class="advantage-item">
                        <strong>Encapsulamiento</strong>
                        Oculta la lógica interna de los subsistemas y sus interacciones.
                    </li>
                    <li class="advantage-item">
                        <strong>Estructuración</strong>
                        Ayuda a definir puntos de entrada para cada nivel de abstracción.
                    </li>
                </ul>
            </div>
        </main>

        <footer>
            <p>Ejemplo de Patrones de Diseño &copy; <?php echo date('Y'); ?> - Implementación Premium</p>
        </footer>
    </div>
</body>
</html>