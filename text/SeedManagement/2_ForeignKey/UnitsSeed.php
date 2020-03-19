<?php
use Migrations\AbstractSeed;

/**
 * Units seed.
 */
class UnitsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "bases_id" => "1",
                "unit" => "航空システム通信隊",
                "unit_sort_number" => "1"
            ],
            [
                "bases_id" => "2",
                "unit" => "補給本部",
                "unit_sort_number" => "2"
            ],
            [
                "bases_id" => "3",
                "unit" => "第２航空団",
                "unit_sort_number" => "3"
            ],
            [
                "bases_id" => "4",
                "unit" => "北部航空警戒管制団",
                "unit_sort_number" => "4"
            ],
        ];

        $table = $this->table('units');
        $table->insert($data)->save();
    }
}
