<?php
use Migrations\AbstractSeed;

/**
 * Belongs seed.
 */
class BelongsSeed extends AbstractSeed
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
          "belong" => "総括班",
          "belong_sort_number" => 1
        ],
        [
          "belong" => "研究・教育班",
          "belong_sort_number" => 2
        ],
        [
          "belong" => "システム監査班",
          "belong_sort_number" => 3
        ],
        [
          "belong" => "緊急対処班",
          "belong_sort_number" => 4
        ]
    ];

        $table = $this->table('belongs');
        $table->insert($data)->save();
    }
}
