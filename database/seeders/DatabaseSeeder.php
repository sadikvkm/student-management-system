<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            $this->command->call('migrate:reset');
            $this->command->call('migrate');

            $this->createAdminUser();// To create admin user
            $this->initSubjects();// To create subjects
            $this->finalMessage();

            \App\Models\Teachers::factory()->count(30)->create();
            \App\Models\Students::factory()->count(30)->create();
        }
    }

    public function initSubjects()
    {
        $data = ['Maths', 'Science', 'History'];
        $label= "";
        foreach ($data as $item) {
            $subject = new \App\Models\Subjects();
            $subject->name = $item;
            $subject->created_by = 1;
            $subject->save();
            $label = $label . ' ' . $subject->name . ",";
        }
        $this->command->info('Subjects table seeded!');
        $this->command->info('Subject: ' . rtrim($label, ','));
    }

    public function createAdminUser()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret')
        ];

        User::create($data);
        $this->command->info('Add admin user successfully!');
    }

    public function finalMessage()
    {
        $this->command->warn("");
        $this->command->warn("********** Application admin login details **********");
        $this->command->warn("");
        $this->command->info('Email: admin@admin.com');
        $this->command->info('Password: secret');
        $this->command->warn("");
        $this->command->warn("********************************************************");
        $this->command->warn("");
    }
}
