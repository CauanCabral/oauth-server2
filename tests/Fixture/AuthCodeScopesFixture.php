<?php
namespace OauthServer2\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuthCodeScopesFixture
 */
class AuthCodeScopesFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'oauth_auth_code_scopes';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'auth_code' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'scope_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'oauth_auth_code_scopes_scope_id_fkey' => ['type' => 'foreign', 'columns' => ['scope_id'], 'references' => ['oauth_scopes', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'auth_code' => 'Lorem ipsum dolor sit amet',
                'scope_id' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
