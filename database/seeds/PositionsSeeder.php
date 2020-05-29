<?php

use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = array('Penyerang','Gelandang', 'Bertahan','Penjaga Gawang');

        for ($i = 0; $i <= count($positions)-1; $i++) {
            DB::table('positions')->insert([
                'position' => $positions[$i]
            ]);
        }
    }
}
