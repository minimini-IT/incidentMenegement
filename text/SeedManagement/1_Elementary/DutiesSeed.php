<?php
use Migrations\AbstractSeed;

/**
 * Duties seed.
 */
class DutiesSeed extends AbstractSeed
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
          "duty" => "当直",
          "duty_sort_number" => 1
        ],
        [
          "duty" => "警衛",
          "duty_sort_number" => 2
        ],
        [
          "duty" => "不測事態対処",
          "duty_sort_number" => 3
        ],
        [
          "duty" => "旗衛隊",
          "duty_sort_number" => 4
        ],
      ];

        $table = $this->table('duties');
        $table->insert($data)->save();
    }
}
