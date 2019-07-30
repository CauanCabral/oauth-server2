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
            ->addColumn('oauth_token', 'string', ['length' => 40])
            ->addColumn('scope_id', 'string', ['length' => 40])
            ->addForeignKey('scope_id', 'oauth_scopes', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
