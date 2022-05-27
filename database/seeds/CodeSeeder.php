<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Code;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codes = [
            [
                'code' => 'ETH',
            ],
            [
                'code' => 'stETH',
            ],
            [
                'code' => 'ATOM',
            ],
            [
                'code' => 'stATOM',
            ],
            [
                'code' => 'CRO',
            ],
            [
                'code' => 'CRE',
            ],
            [
                'code' => 'MEX',
            ],
            [
                'code' => 'EGLD',
            ],
            [
                'code' => 'CSPR',
            ],
            [
                'code' => 'NOM',
            ],
            [
                'code' => 'MEME',
            ],
            [
                'code' => 'IWDA-ETF-IE',
            ],
            [
                'code' => 'CSPX-ETF-IE',
            ],
            [
                'code' => 'IWMO-ETF-US',
            ],
        ];

        foreach ($codes as $code) {
            $newCode = new  Code();
            $newCode->code = $code['code'];
            $newCode->save();
        }
    }
}
