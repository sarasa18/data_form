<?php

use Illuminate\Database\Seeder;
//必ずモデルを持ってくる
use App\Models\DataForm;

class DataFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(DataForm::class, 200)->create(); //２００個のデータを作る
    }
}
