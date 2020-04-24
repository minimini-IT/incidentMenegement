<?php
use Migrations\AbstractSeed;

/**
 * Repeats seed.
 */
class RepeatsSeed extends AbstractSeed
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
                "repeat" => "日曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "月曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "火曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "水曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "木曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "金曜日",
                "repeat_sort_number" => 1
            ],
            [
                "repeat" => "土曜日",
                "repeat_sort_number" => 1
            ],
        ];

        $table = $this->table('repeats');
        $table->insert($data)->save();
    }
}
