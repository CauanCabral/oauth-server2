<?php
namespace OauthServer2\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SessionScopesFixture
 */
class SessionScopesFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'oauth_session_scopes';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'session_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'scope_id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'oauth_session_scopes_scope_id_fkey' => ['type' => 'foreign', 'columns' => ['scope_id'], 'references' => ['oauth_scopes', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'oauth_session_scopes_session_id_fkey' => ['type' => 'foreign', 'columns' => ['session_id'], 'references' => ['oauth_sessions', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
                'session_id' => 1,
                'scope_id' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
