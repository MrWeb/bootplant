<?php
namespace Futurelabs\Bootplant\Database\Seeds;

use Futurelabs\Bootplant\Utils\ImportFileSeeding;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MetaDefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows  = [];
        $metas = ImportFileSeeding::read(__DIR__ . "/import/meta.csv");
        foreach ($metas as $meta) {
            $rows[] = [
                'label'          => $meta[0],
                'group'          => $meta[1],
                'codice_interno' => $meta[2],
                'locked'         => null,
            ];
        }
        DB::table('meta_default')->insert($rows);
    }
}
