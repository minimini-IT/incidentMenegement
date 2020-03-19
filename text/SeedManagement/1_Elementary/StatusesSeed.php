<?php
use Migrations\AbstractSeed;

/**
 * Statuses seed.
 */
class StatusesSeed extends AbstractSeed
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
          "status" => "対処中",
          "status_sort_number" => 1
        ],
        [
          "status" => "対処完了",
          "status_sort_number" => 2
        ],
        [
          "status" => "収束",
          "status_sort_number" => 3
        ],
        [
          "status" => "経過観察",
          "status_sort_number" => 4
        ]
      ];

        $table = $this->table('statuses');
        $table->insert($data)->save();
    }
}
