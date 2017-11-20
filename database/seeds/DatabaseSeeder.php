<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Societe::class,1000)->create()
        //                               ->each(function($c){
        //                                 $c->marches()->save(factory(App\Marche::class)->make());
        //                               });
        // factory(App\Responsable::class,1000)->create();
        // factory(App\Operation::class,1000)->create();
        // factory(App\Encaissement::class,1000)->create();
        // factory(App\Decaissement::class,1000)->create();
        // factory(App\Alimentation::class,1000)->create();

        factory(App\Typecharge::class,1000)->create()
                                      ->each(function($c){
                                        $c->charges()->save(factory(App\Charge::class)->make());
                                      });
    }
}
