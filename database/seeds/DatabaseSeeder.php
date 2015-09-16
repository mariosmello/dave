<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder
{
    public function run() {

        DB::table('users')->delete();

        \App\User::create([
            'name' => 'Mário Mello',
            'email' => 'mario@dindigital.com',
            'password' => bcrypt('123'),
        ]);

    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run() {

        DB::table('categorias')->delete();

        $faker = Faker\Factory::create();

        $i = 0;
        while($i < 15)
        {
            \App\Categoria::create([
                'nome' => $faker->name,
                'slug' => $faker->slug,
            ]);

            $i++;
        }
    }
}
