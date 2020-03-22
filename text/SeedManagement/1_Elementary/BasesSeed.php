<?php
use Migrations\AbstractSeed;

/**
 * Bases seed.
 */
class BasesSeed extends AbstractSeed
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
                "base" => "市ヶ谷",
                "base_sort_number" => "1",
            ],
            [
                "base" => "十条",
                "base_sort_number" => "2",
            ],
            [
                "base" => "千歳",
                "base_sort_number" => "3",
            ],
            [
                "base" => "三沢",
                "base_sort_number" => "4",
            ]
        ];

        $table = $this->table('bases');
        $table->insert($data)->save();
    }
}
