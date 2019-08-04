<?php
namespace OauthServer2\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RefreshTokensFixture
 */
class RefreshTokensFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'oauth_refresh_tokens';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'refresh_token' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'oauth_token' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'expires' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['refresh_token'], 'length' => []],
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
                'refresh_token' => 'b8bad873-134b-4c91-9741-4a6a756926ac',
                'oauth_token' => 'Lorem ipsum dolor sit amet',
                'expires' => 1
            ],
        ];
        parent::init();
    }
}
