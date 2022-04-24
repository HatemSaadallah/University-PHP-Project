<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    // Add users
    public function run(): void
    {
        $data = [
            [
                'full_name' => 'Hatem Saadallah',
                'gender' => "Male",
                'birth_date' => date("d-m-Y", strtotime("2000-07-01")),
                'nationality' => "Palestinian",
                'place_of_birth' => "Gaza",
                'job_title' => "Software Engineer",
                'years_of_experience' => 5,
                'personal_image_url' => "https://via.placeholder.com/300x300",
                "updated_at" => date("Y-m-d H:i:s"),
                "created_at" => date("Y-m-d H:i:s")
            ]
        ];
        $users = $this->table('users');
        $users->insert($data)
              ->saveData();
    }   
}
