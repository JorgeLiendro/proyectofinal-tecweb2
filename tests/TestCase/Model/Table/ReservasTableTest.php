<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservasTable Test Case
 */
class ReservasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ReservasTable
     */
    protected $Reservas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Reservas',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Reservas') ? [] : ['className' => ReservasTable::class];
        $this->Reservas = $this->getTableLocator()->get('Reservas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Reservas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ReservasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ReservasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
