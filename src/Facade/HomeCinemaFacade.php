<?php

namespace App\Facade;

use App\Subsystems\Projector;
use App\Subsystems\Screen;
use App\Subsystems\Amplifier;
use App\Subsystems\DvdPlayer;

class HomeCinemaFacade
{
    private Projector $projector;
    private Screen $screen;
    private Amplifier $amplifier;
    private DvdPlayer $dvdPlayer;

    public function __construct(
        ?Projector $projector = null,
        ?Screen $screen = null,
        ?Amplifier $amplifier = null,
        ?DvdPlayer $dvdPlayer = null
    ) {
        $this->projector = $projector ?: new Projector();
        $this->screen = $screen ?: new Screen();
        $this->amplifier = $amplifier ?: new Amplifier();
        $this->dvdPlayer = $dvdPlayer ?: new DvdPlayer();
    }

    /**
     * Método simplificado para ver una película
     * Coordina todos los subsistemas necesarios
     */
    public function watchMovie(string $movie): void
    {
        echo "\n🎬 Preparando para ver: '{$movie}'...\n";
        echo "=====================================\n";
        
        $this->screen->down();
        $this->projector->on();
        $this->projector->setInput('DVD');
        $this->projector->wideScreenMode();
        $this->amplifier->on();
        $this->amplifier->setVolume(5);
        if (!$this->amplifier->getSurroundStatus()) {
            $this->amplifier->toggleSurround();
        }
        $this->dvdPlayer->on();
        $this->dvdPlayer->play($movie);
        
        echo "=====================================\n";
        echo "✅ ¡Todo listo! Disfruta de la película\n\n";
    }

    /**
     * Alternar el estado del sonido envolvente
     */
    public function toggleSurround(): void
    {
        $this->amplifier->toggleSurround();
    }

    /**
     * Alternar pausa/reanudación de la película
     */
    public function togglePause(): void
    {
        $this->dvdPlayer->togglePause();
    }

    /**
     * Método simplificado para terminar la película
     */
    public function endMovie(): void
    {
        echo "\n🛑 Finalizando película...\n";
        echo "=====================================\n";
        
        $this->dvdPlayer->stop();
        $this->dvdPlayer->eject();
        $this->dvdPlayer->off();
        $this->amplifier->off();
        $this->projector->off();
        $this->screen->up();
        
        echo "=====================================\n";
        echo "✅ Sistema apagado correctamente\n\n";
    }
}