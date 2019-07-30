<?php
use Migrations\AbstractMigration;

class CreateOauthSessionScopesTable extends AbstractMigration
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
        $table = $this->table('oauth_session_scopes');

        $table
            ->addColumn('session_id', 'integer', ['length' => 11])
            ->addColumn('scope_id', 'string', ['length' => 40])
            ->addForeignKey('session_id', 'oauth_sessions', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->addForeignKey('scope_id', 'oauth_scopes', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
