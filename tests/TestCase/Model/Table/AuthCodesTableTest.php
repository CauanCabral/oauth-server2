<?php
namespace OauthServer2\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use OauthServer2\Model\Table\AuthCodesTable;

/**
 * OauthServer2\Model\Table\AuthCodesTable Test Case
 */
class AuthCodesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \OauthServer2\Model\Table\AuthCodesTable
     */
    public $AuthCodesTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.OauthServer2.AuthCodes',
        'plugin.OauthServer2.Sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AuthCodes') ? [] : ['className' => AuthCodesTable::class];
        $this->AuthCodesTable = TableRegistry::getTableLocator()->get('AuthCodes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthCodesTable);

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
