<?php

namespace App\Subsystems;

class Projector
{
    private bool $isOn = false;
    private string $input = '';

    public function on(): void
    {
        $this->isOn = true;
        echo "✓ Proyector encendido\n";
    }

    public function off(): void
    {
        $this->isOn = false;
        echo "✓ Proyector apagado\n";
    }

    public function setInput(string $input): void
    {
        $this->input = $input;
        echo "✓ Entrada del proyector configurada a: {$input}\n";
    }

    public function wideScreenMode(): void
    {
        echo "✓ Modo panorámico activado\n";
    }
}