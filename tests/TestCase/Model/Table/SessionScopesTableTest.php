<?php
namespace OauthServer2\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use OauthServer2\Model\Table\SessionScopesTable;

/**
 * OauthServer2\Model\Table\SessionScopesTable Test Case
 */
class SessionScopesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OauthServer2\Model\Table\SessionScopesTable
     */
    public $SessionScopesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.OauthServer2.SessionScopes',
        'plugin.OauthServer2.Sessions',
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
        $config = TableRegistry::getTableLocator()->exists('SessionScopes') ? [] : ['className' => SessionScopesTable::class];
        $this->SessionScopesTable = TableRegistry::getTableLocator()->get('SessionScopes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SessionScopesTable);

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
