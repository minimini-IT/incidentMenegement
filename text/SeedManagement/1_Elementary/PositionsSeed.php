<?php
use Migrations\AbstractSeed;

/**
 * Positions seed.
 */
class PositionsSeed extends AbstractSeed
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
          "position" => "常日勤",
          "position_sort_number" => "1"
        ],
        [
          "position" => "対処係",
          "position_sort_number" => "2"
        ],
        [
          "position" => "監視係",
          "position_sort_number" => "3"
        ]
      ];

        $table = $this->table('positions');
        $table->insert($data)->save();
    }
}
