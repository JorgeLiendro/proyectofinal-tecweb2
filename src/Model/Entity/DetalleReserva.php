<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleReserva Entity
 *
 * @property int $id
 * @property int $reserva_id
 * @property int $recurso_id
 *
 * @property \App\Model\Entity\Reserva $reserva
 * @property \App\Model\Entity\Recurso $recurso
 */
class DetalleReserva extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'reserva_id' => true,
        'recurso_id' => true,
        'reserva' => true,
        'recurso' => true,
    ];
}
