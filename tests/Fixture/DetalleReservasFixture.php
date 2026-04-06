<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleReservasFixture
 */
class DetalleReservasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'reserva_id' => 1,
                'recurso_id' => 1,
            ],
        ];
        parent::init();
    }
}
