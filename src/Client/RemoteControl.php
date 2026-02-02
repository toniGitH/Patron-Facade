<?php

namespace App\Client;

use App\Facade\HomeCinemaFacade;

/**
 * Clase Client: Representa el mando de control o interfaz de usuario.
 * Su único trabajo es enviar órdenes de alto nivel a la Fachada.
 */
class RemoteControl
{
    private HomeCinemaFacade $facade;

    public function __construct(HomeCinemaFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * El botón de "Cine en casa"
     */
    public function watchMovie(string $movie): void
    {
        $this->facade->watchMovie($movie);
    }

    /**
     * El botón de "Apagar todo"
     */
    public function stopMovie(): void
    {
        $this->facade->endMovie();
    }

    /**
     * El botón de "Surround"
     */
    public function pressSurroundButton(): void
    {
        echo "🎮 Mando: Pulsando botón Surround...\n";
        $this->facade->toggleSurround();
    }

    /**
     * El botón de "Pausa"
     */
    public function pressPauseButton(): void
    {
        echo "🎮 Mando: Pulsando botón Pausa...\n";
        $this->facade->togglePause();
    }
}
