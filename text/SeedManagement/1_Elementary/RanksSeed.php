<?php
use Migrations\AbstractSeed;

/**
 * Ranks seed.
 */
class RanksSeed extends AbstractSeed
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
          "rank" => "１等空佐",
          "abb_rank" => "１佐",
          "rank_sort_number" => "1"
        ],
        [
          "rank" => "２等空尉",
          "abb_rank" => "２尉",
          "rank_sort_number" => "5"
        ],
        [
          "rank" => "３等空曹",
          "abb_rank" => "３曹",
          "rank_sort_number" => "10"
        ],
        [
          "rank" => "空士長",
          "abb_rank" => "士長",
          "rank_sort_number" => "11"
        ]
      ];

        $table = $this->table('ranks');
        $table->insert($data)->save();
    }
}
