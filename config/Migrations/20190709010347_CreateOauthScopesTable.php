<?php
use Migrations\AbstractMigration;

class CreateOauthScopesTable extends AbstractMigration
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
        $table = $this->table('oauth_scopes', [
            'id' => false,
            'primary_key' => ['id']
        ]);

        $table
            ->addColumn('id', 'string', ['default' => null, 'limit' => 40])
            ->addColumn('description', 'string', ['default' => null, 'limit' => 200])
            ->create();
    }
}
