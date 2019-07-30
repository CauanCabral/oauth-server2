<?php
use Migrations\AbstractMigration;

class CreateOauthSessionsTable extends AbstractMigration
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
        $table = $this->table('oauth_sessions');

        $table
            ->addColumn('owner_model', 'string', ['limit' => 200])
            ->addColumn('owner_id', 'string', ['limit' => 20])
            ->addColumn('client_id', 'string', ['limit' => 20])
            ->addColumn('client_redirect_uri', 'string', ['default' => null, 'limit' => 200, 'null' => true])
            ->addForeignKey('client_id', 'oauth_clients', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
