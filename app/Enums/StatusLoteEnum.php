<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Fechado()
 * @method static static Aberto()
 */
final class StatusLoteEnum extends Enum
{
    const FECHADO = 0; // Fechado
    const ABERTO = 1; // Aberto
}
