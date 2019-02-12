<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentCategories = ['Ar e Ventilação','Automotivo','Bebê','Brinquedos','Câmeras e Filmadoras','Casa e Jardim',
            'Cama, Mesa e Banho','Beleza e Saúde','Áudio','Eletrodomésticos','Eletroportáteis','Esporte e Lazer',
            'TV e Vídeo','Ferramentas e Segurança','Games','Informática e Acessórios','Instrumentos Musicais',
            'Informática','Livros','Móveis e Decoração','Perfumaria','Relógios','Suplementos Alimentares','Tablets',
            'Celulares e Telefones','Telefonia Fixa','Utilidades Domésticas','Garantia','Linha Industrial',
            'Colchões','Pet Shop','Mercado','Bebidas e Alimentos','Papelaria','Armarinhos','Natal','Serviços'];
        foreach ($parentCategories as $name)
        {
            try {
                $attrs = [
                    'name'=>$name,
                    'slug'=>\Illuminate\Support\Str::slug($name),
                    'created_at'=>'2018-12-01 00:00:00',
                    'updated_at'=>'2018-12-01 00:00:00'
                ];
                \Illuminate\Support\Facades\DB::table('categories')->insert($attrs);
            } catch (\Exception $e) {
                print("Error: {$name} - {$e->getMessage()}\n");
            }
        }
    }
}
