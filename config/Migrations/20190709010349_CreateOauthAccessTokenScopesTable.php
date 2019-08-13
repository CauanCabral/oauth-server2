<?php
use Migrations\AbstractMigration;

class CreateOauthAccessTokenScopesTable extends AbstractMigration
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
        $table = $this->table('oauth_access_token_scopes');

        $table
            ->addColumn('access_token_id', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('scope_id', 'string', ['length' => 40])
            ->addForeignKey('access_token_id', 'oauth_access_tokens', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('scope_id', 'oauth_scopes', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
