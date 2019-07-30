<?php
use Migrations\AbstractMigration;

class CreateOauthAuthCodesTable extends AbstractMigration
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
        $table = $this->table('oauth_auth_codes', [
            'id' => false,
            'primary_key' => ['code']
        ]);

        $table
            ->addColumn('code', 'string', ['default' => null, 'limit' => 40, 'null' => false])
            ->addColumn('session_id', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->addColumn('redirect_uri', 'string', ['default' => null, 'limit' => 200, 'null' => false])
            ->addColumn('expires', 'integer', ['default' => null, 'limit' => 11, 'null' => false])
            ->addForeignKey('session_id', 'oauth_sessions', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
            ->create();
    }
}
