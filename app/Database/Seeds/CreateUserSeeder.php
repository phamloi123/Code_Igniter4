<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'admin@gmail.com',
                'password' => password_hash('123123', PASSWORD_BCRYPT),
                'name' => 'admin',
                'loai' => 1
            ],
            [
                'email' => 'user@gmail.com',
                'password' => password_hash('123123', PASSWORD_BCRYPT),
                'name' => 'user',
                'loai' => 3
            ]
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
