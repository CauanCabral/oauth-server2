<?php
use Migrations\AbstractMigration;

class CreateOauthAccessTokensTable extends AbstractMigration
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
        $table = $this->table('oauth_access_tokens', [
            'id' => false,
            'primary_key' => ['id']
        ]);

        $table
            ->addColumn('id', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('session_id', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->addColumn('revoked', 'boolean', ['default' => false, 'null' => false])
            ->addColumn('expires', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->addForeignKey('session_id', 'oauth_sessions', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
