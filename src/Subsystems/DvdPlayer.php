<?php

namespace App\Subsystems;

class DvdPlayer
{
    private bool $isOn = false;
    private bool $isPaused = false;
    private ?string $currentMovie = null;

    public function on(): void
    {
        $this->isOn = true;
        echo "✓ Reproductor DVD encendido\n";
    }

    public function off(): void
    {
        $this->isOn = false;
        echo "✓ Reproductor DVD apagado\n";
    }

    public function play(string $movie): void
    {
        $this->currentMovie = $movie;
        $this->isPaused = false;
        echo "✓ Reproduciendo: '{$movie}'\n";
    }

    public function togglePause(): void
    {
        if (!$this->currentMovie) {
            echo "⚠ No hay ninguna película en reproducción para pausar\n";
            return;
        }

        $this->isPaused = !$this->isPaused;
        $status = $this->isPaused ? "PAUSADA" : "REANUDADA";
        echo "✓ Película '{$this->currentMovie}' {$status}\n";
    }

    public function stop(): void
    {
        echo "✓ Película detenida\n";
        $this->currentMovie = null;
        $this->isPaused = false;
    }

    public function eject(): void
    {
        if ($this->currentMovie) {
            echo "✓ Expulsando: '{$this->currentMovie}'\n";
        } else {
            echo "✓ DVD expulsado\n";
        }
        $this->currentMovie = null;
        $this->isPaused = false;
    }
}