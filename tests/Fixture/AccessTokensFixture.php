<?php
namespace OauthServer2\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccessTokensFixture
 */
class AccessTokensFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'oauth_access_tokens';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'session_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'expires' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'oauth_access_tokens_session_id_fkey' => ['type' => 'foreign', 'columns' => ['session_id'], 'references' => ['oauth_sessions', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
                'id' => '719d01a6-0c38-481e-8d05-f906daab5a98',
                'session_id' => 1,
                'expires' => 1
            ],
        ];
        parent::init();
    }
}
