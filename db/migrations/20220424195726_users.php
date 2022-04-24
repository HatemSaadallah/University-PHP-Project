<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Users extends AbstractMigration
{
    // Create user table
    public function up(): void
    {
        $this->table('users')
            ->addColumn('full_name', 'string', ['limit' => 255])
            ->addColumn('gender', 'string', ['limit' => 255])
            ->addColumn('birth_date', 'datetime')
            ->addColumn('nationality', 'string', ['limit' => 255])
            ->addColumn('place_of_birth', 'string', ['limit' => 255])
            ->addColumn('job_title', 'datetime','string', ['limit' => 255])
            ->addColumn('years_of_experience', 'integer')
            ->addColumn('personal_image_url', 'string', ['limit' => 255])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
    public function down()
    {   
        $this->dropTable('users');
    }
}
