<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'nome' => 'Acquisto',
            ],
            [
                'nome' => 'Vendita',
            ],
        ];

        foreach ($types as $type) {
            $newType = new  Type();
            $newType->nome = $type['nome'];
            $newType->save();
        }
    }
}
