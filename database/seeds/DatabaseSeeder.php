<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 2)->create()->each(function ($user) {
            $user->assignRole('admin');
        });
    }
}
