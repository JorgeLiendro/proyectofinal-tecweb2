<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserva Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $recurso_id
 * @property \Cake\I18n\Date $fechareserva
 * @property string|null $estado
 * @property \Cake\I18n\DateTime|null $fechacreacion
 * @property string|null $observaciones
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Recurso $recurso
 */
class Reserva extends Entity
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
        'user_id' => true,
        'recurso_id' => true,
        'fechareserva' => true,
        'estado' => true,
        'fechacreacion' => true,
        'observaciones' => true,
        'user' => true,
        'recurso' => true,
    ];
}
