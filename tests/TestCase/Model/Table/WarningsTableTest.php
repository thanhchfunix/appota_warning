<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WarningsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WarningsTable Test Case
 */
class WarningsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WarningsTable
     */
    protected $Warnings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Warnings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Warnings') ? [] : ['className' => WarningsTable::class];
        $this->Warnings = TableRegistry::getTableLocator()->get('Warnings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Warnings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
