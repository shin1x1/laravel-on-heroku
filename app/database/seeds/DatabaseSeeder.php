<?php

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createUserSeeds();
        $this->createUserImageSeeds();
    }

    protected function createUserSeeds()
    {
        User::create([
            'name' => 'demo',
            'email' => 'demo@example.com',
            'password' => Hash::make('demo'),
        ]);
    }

    protected function createUserImageSeeds()
    {
        UserImage::create([
            'user_id' => '1',
        ]);
        UserImage::create([
            'user_id' => '1',
        ]);
    }
}
