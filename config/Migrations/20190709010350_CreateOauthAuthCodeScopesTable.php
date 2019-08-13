<?php
use Migrations\AbstractMigration;

class CreateOauthAuthCodeScopesTable extends AbstractMigration
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
        $table = $this->table('oauth_auth_code_scopes');

        $table
            ->addColumn('auth_code_id', 'string', ['length' => 40])
            ->addColumn('scope_id', 'string', ['length' => 40])
            ->addForeignKey('scope_id', 'oauth_scopes', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
