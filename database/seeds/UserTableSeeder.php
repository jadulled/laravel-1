<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modules\Users\User::class)->create([
           'name'       => 'Frank Sepulveda',
           'email'      => 'admin@admin.com',
           'password'   => bcrypt('admin'),
           'type'       => 'admin',
           'slug'       => 'admin'
        ]);
    }
}
