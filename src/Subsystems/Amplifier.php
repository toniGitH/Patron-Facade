<?php

namespace App\Subsystems;

class Amplifier
{
    private bool $isOn = false;
    private int $volume = 0;

    private bool $surroundIsActive = false;

    public function on(): void
    {
        $this->isOn = true;
        echo "✓ Amplificador encendido\n";
    }

    public function off(): void
    {
        $this->isOn = false;
        echo "✓ Amplificador apagado\n";
    }

    public function setVolume(int $level): void
    {
        $this->volume = $level;
        echo "✓ Volumen ajustado a: {$level}\n";
    }

    public function toggleSurround(): void
    {
        $this->surroundIsActive = !$this->surroundIsActive;
        $status = $this->surroundIsActive ? "ACTIVADO" : "DESACTIVADO";
        echo "✓ Sonido envolvente 5.1 {$status}\n";
    }

    public function getSurroundStatus(): bool
    {
        return $this->surroundIsActive;
    }
}