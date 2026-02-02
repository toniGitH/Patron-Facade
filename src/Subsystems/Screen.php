<?php

namespace App\Subsystems;

class Screen
{
    private bool $isDown = false;

    public function down(): void
    {
        $this->isDown = true;
        echo "✓ Pantalla bajada\n";
    }

    public function up(): void
    {
        $this->isDown = false;
        echo "✓ Pantalla subida\n";
    }
}