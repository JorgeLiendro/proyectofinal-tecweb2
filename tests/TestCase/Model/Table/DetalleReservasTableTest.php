<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleReservasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleReservasTable Test Case
 */
class DetalleReservasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleReservasTable
     */
    protected $DetalleReservas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DetalleReservas',
        'app.Reservas',
        'app.Recursos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetalleReservas') ? [] : ['className' => DetalleReservasTable::class];
        $this->DetalleReservas = $this->getTableLocator()->get('DetalleReservas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetalleReservas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DetalleReservasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\DetalleReservasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
