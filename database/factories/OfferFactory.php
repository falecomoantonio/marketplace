<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Offer::class, function (Faker $faker) {
    $preco   = rand(20,5000);
    $qtdParcela = rand(4,12);
    $parcela = $preco/$qtdParcela;
    $code = rand(4000000,9000000);
    return [
        'title'=>$faker->name . ' [Hoje]',
        'code'=>$code,
        'url'=>$faker->url,
        'story_id'=>1,
        'image'=>$faker->imageUrl(),
        'gallery'=>'[image,imagem,imagem,imagem]',
        'total_price'=>$preco,
        'plots'=>$qtdParcela,
        'plots_price'=>$parcela,
        'available'=>'y',
        'available_to'=>\Illuminate\Support\Carbon::now(),
        'created_at'=>\Illuminate\Support\Carbon::now(),
        'updated_at'=>\Illuminate\Support\Carbon::now(),
        'deleted_at'=>null
    ];
});
