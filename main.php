<?php

/**
 * 1. CARGA AUTOMÁTICA DE COMPONENTES (PSR-4)
 */
require_once __DIR__ . '/vendor/autoload.php';

use App\Facade\HomeCinemaFacade;
use App\Subsystems\Projector;
use App\Subsystems\Screen;
use App\Subsystems\Amplifier;
use App\Subsystems\DvdPlayer;
use App\Client\RemoteControl; // El nuevo Cliente explícito

// ============================================================
// [1] USO CON PATRÓN FACADE (Mando de Control -> Fachada)
// ============================================================

// La Fachada coordina los subsistemas.
$homeCinema = new HomeCinemaFacade();

// El CLiente (Mando) utiliza la Fachada.
$remote = new RemoteControl($homeCinema);

/**
 * EXPLICACIÓN DE ob_start():
 * ob_start() inicia el "Output Buffering". Permite capturar lo que se imprime
 * en pantalla y guardarlo en una variable en lugar de mostrarlo inmediatamente.
 */
ob_start();
echo "✅ MODO CON FACADE (RemoteControl -> Fachada):\n";
echo "----------------------------------------------\n";

// El cliente (usuario) solo pulsa un botón en su mando
$remote->watchMovie('Inception');
echo "... [Viendo la película] ...\n";
$remote->pressPauseButton();    // Pausar
$remote->pressPauseButton();    // Reanudar
$remote->pressSurroundButton(); // Alternar Surround
$remote->stopMovie();

$logConFacade = ob_get_clean();


// ============================================================
// [2] USO SIN PATRÓN FACADE (Manual y complejo)
// ============================================================

// NOTA: En este modo, el "RemoteControl" NO TIENE SENTIDO ni puede usarse,
// ya que el mando depende directamente de la existencia de la Fachada.
// El cliente (usuario) debe operar cada componente de forma manual.

// Aquí el cliente tiene que crearlo y manejarlo todo él mismo
$projector = new Projector();
$screen = new Screen();
$amplifier = new Amplifier();
$dvdPlayer = new DvdPlayer();
$movie = 'Inception';

ob_start();
echo "❌ MODO SIN FACADE (El Mando no funciona sin Fachada):\n";
echo "------------------------------------------------------\n\n";

echo "🎬 Preparando para ver: '{$movie}'...\n";
echo "=====================================\n";

// Coordinación manual obligatoria
$screen->down();
$projector->on();
$projector->setInput('DVD');
$projector->wideScreenMode();
$amplifier->on();
$amplifier->setVolume(5);
if (!$amplifier->getSurroundStatus()) {
    $amplifier->toggleSurround();
}
$dvdPlayer->on();
$dvdPlayer->play('Inception');

echo "=====================================\n";
echo "✅ ¡Todo listo! Disfruta de la película\n";

echo "\n... [Viendo la película] ...\n\n";

// Gestión manual de estados intermedios
$dvdPlayer->togglePause();    // Pausar
$dvdPlayer->togglePause();    // Reanudar
$amplifier->toggleSurround(); // Alternar Surround

echo "\n\n\n";

// Apagado manual
echo "🛑 Finalizando película (Manual):\n";
echo "=================================\n";
$dvdPlayer->stop();
$dvdPlayer->eject();
$dvdPlayer->off();
$amplifier->off();
$projector->off();
$screen->up();
echo "=====================================\n";
echo "✅ Sistema apagado correctamente\n\n";

$logSinFacade = ob_get_clean();


/**
 * Lógica de visualización por terminal (CLI)
 */
if (php_sapi_name() === 'cli' && count(debug_backtrace()) === 0) {
    echo "============================================================\n";
    echo "       EJEMPLO DEL PATRÓN FACADE: HOME CINEMA PRO          \n";
    echo "============================================================\n";

    echo $logConFacade;
    echo "\n\n";
    echo $logSinFacade;

    echo "============================================================\n";
    echo "VENTAJAS DEL PATRÓN FACADE (visto desde el RemoteControl):\n";
    echo "============================================================\n";
    $ventajas = [
        "El cliente (RemoteControl) no sabe cuántas clases hay debajo.",
        "Si cambiamos el proyector por una TV, el RemoteControl no cambia.",
        "El código del cliente es ridículamente simple y legible.",
        "Encapsulación total de la complejidad del hardware."
    ];
    foreach ($ventajas as $ventaja) {
        echo " ✓ " . $ventaja . "\n";
    }
    echo "\n";
}
