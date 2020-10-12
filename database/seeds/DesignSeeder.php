<?php


use Illuminate\Database\Seeder;
use App\Design;


class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Design::class, 1)->create([
            'name'=>'basic',
            'link'=>'layout.layout',
        ]);
    }
}
