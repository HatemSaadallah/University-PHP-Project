<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',
        'development' => [
            'adapter' => 'sqlite',
            'name' => '%%PHINX_CONFIG_DIR%%/db/phpsqlite'
        ]
    ]
        ];