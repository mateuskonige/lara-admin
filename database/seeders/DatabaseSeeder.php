<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Permissions
         */
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'write posts']);

        /**
         * Roles
         */
        $admin = Role::create(['name' => 'admin']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('edit posts');

        $publisher = Role::create(['name' => 'publisher']);
        $publisher->givePermissionTo('publish posts');

        Role::create(['name' => 'user']);

        $writer = Role::create(['name' => 'writer']);
        $writer->givePermissionTo('write posts');

        /** 
         * Users
         */
        $admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('testando'),
        ]);
        $admin->assignRole('admin');

        $editor = \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('testando'),
        ]);
        $editor->assignRole('editor');

        $publisher = \App\Models\User::factory()->create([
            'name' => 'publisher',
            'email' => 'publisher@publisher.com',
            'password' => bcrypt('testando'),
        ]);
        $publisher->assignRole('publisher');

        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('testando'),
        ]);
        $user->assignRole('user');

        $writer = \App\Models\User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('testando'),
        ]);
        $writer->assignRole('writer');

        /**
         * Posts
         */
        Post::factory(10)->create();
    }
}
