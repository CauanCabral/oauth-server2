<?php
use Migrations\AbstractMigration;

class CreateOauthRefreshTokensTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('oauth_refresh_tokens', [
            'id' => false,
            'primary_key' => ['refresh_token']
        ]);

        $table
            ->addColumn('refresh_token', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('access_token_id', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('expires', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->addForeignKey('access_token_id', 'oauth_access_tokens', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
