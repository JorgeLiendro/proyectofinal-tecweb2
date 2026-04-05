<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecursosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecursosTable Test Case
 */
class RecursosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecursosTable
     */
    protected $Recursos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Recursos',
        'app.Reservas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Recursos') ? [] : ['className' => RecursosTable::class];
        $this->Recursos = $this->getTableLocator()->get('Recursos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Recursos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\RecursosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
