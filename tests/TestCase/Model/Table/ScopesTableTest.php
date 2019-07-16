<?php
namespace OauthServer2\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use OauthServer2\Model\Table\ScopesTable;

/**
 * OauthServer2\Model\Table\ScopesTable Test Case
 */
class ScopesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OauthServer2\Model\Table\ScopesTable
     */
    public $ScopesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.OauthServer2.Scopes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Scopes') ? [] : ['className' => ScopesTable::class];
        $this->ScopesTable = TableRegistry::getTableLocator()->get('Scopes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ScopesTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
