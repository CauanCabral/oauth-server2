<?php
use Migrations\AbstractMigration;

class CreateOauthClientsTable extends AbstractMigration
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
        $table = $this->table('oauth_clients', [
            'id' => false,
            'primary_key' => ['id']
        ]);

        $table
            ->addColumn('id', 'string', ['default' => null, 'limit' => 20,  'null' => false])
            ->addColumn('secret', 'string', ['default' => null, 'limit' => 40,  'null' => false])
            ->addColumn('name', 'string', ['default' => null, 'limit' => 200, 'null' => false])
            ->addColumn('redirect_uri', 'string', ['default' => null, 'limit' => 255, 'null' => false])
            ->addColumn('parent_model', 'string', ['default' => null, 'limit' => 200, 'null' => true])
            ->addColumn('parent_id', 'integer', ['default' => null, 'limit' => 11,  'null' => true])
            ->addColumn('revoked', 'boolean', ['default' => false, 'null' => false])
            ->create();
    }
}
