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
            ->addColumn('oauth_token', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('expires', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->create();
    }
}
