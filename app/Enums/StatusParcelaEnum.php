<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Aberto()
 * @method static static Fechado()
 */
final class StatusParcelaEnum extends Enum
{
    const ABERTO = 0; // Em aberto
    const FECHADO = 1; // Fechado
}
