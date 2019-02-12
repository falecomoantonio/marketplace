<?php

use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            print("Carregando, aguarde....\n");
            factory(\App\Entities\Offer::class, 30)->create();
            print("Terminou!\n");
        } catch (\Exception $e) {
            print("Exception: {$e->getMessage()}\n\n");
        }
    }
}
