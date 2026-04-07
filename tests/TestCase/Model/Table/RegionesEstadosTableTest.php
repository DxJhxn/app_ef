<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegionesEstadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegionesEstadosTable Test Case
 */
class RegionesEstadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegionesEstadosTable
     */
    protected $RegionesEstados;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.RegionesEstados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RegionesEstados') ? [] : ['className' => RegionesEstadosTable::class];
        $this->RegionesEstados = $this->getTableLocator()->get('RegionesEstados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RegionesEstados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\RegionesEstadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
