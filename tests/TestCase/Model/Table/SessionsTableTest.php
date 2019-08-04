<?php
namespace OauthServer2\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use OauthServer2\Model\Table\SessionsTable;

/**
 * OauthServer2\Model\Table\SessionsTable Test Case
 */
class SessionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OauthServer2\Model\Table\SessionsTable
     */
    public $SessionsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.OauthServer2.Sessions',
        'plugin.OauthServer2.Clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sessions') ? [] : ['className' => SessionsTable::class];
        $this->SessionsTable = TableRegistry::getTableLocator()->get('Sessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SessionsTable);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
