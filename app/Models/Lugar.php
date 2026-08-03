<?php

namespace App\Models;

class Lugar
{
    protected static ?array $lugares = null;

    protected static function cargarDatos(): array
    {
        if (static::$lugares === null) {
            $json = file_get_contents(resource_path('data/lugares.json'));
            static::$lugares = json_decode($json, true) ?? [];
        }

        return static::$lugares;
    }

    public static function all(): array
    {
        return static::cargarDatos();
    }

    public static function find(int $id): ?array
    {
        foreach (static::cargarDatos() as $lugar) {
            if ((int) $lugar['id'] === $id) {
                return $lugar;
            }
        }

        return null;
    }
}
