<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'nome' => 'Cryto',
            ],
            [
                'nome' => 'Stock',
            ],
            [
                'nome' => 'Liquidità',
            ],
        ];

        foreach ($groups as $group) {
            $newGroup = new Group();
            $newGroup->nome = $group['nome'];
            $newGroup->save();
        }
    }
}
