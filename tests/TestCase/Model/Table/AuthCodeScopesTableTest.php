<?php
namespace OauthServer2\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use OauthServer2\Model\Table\AuthCodeScopesTable;

/**
 * OauthServer2\Model\Table\AuthCodeScopesTable Test Case
 */
class AuthCodeScopesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OauthServer2\Model\Table\AuthCodeScopesTable
     */
    public $AuthCodeScopesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.OauthServer2.AuthCodeScopes',
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
        $config = TableRegistry::getTableLocator()->exists('AuthCodeScopes') ? [] : ['className' => AuthCodeScopesTable::class];
        $this->AuthCodeScopesTable = TableRegistry::getTableLocator()->get('AuthCodeScopes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthCodeScopesTable);

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
