<?php
use Migrations\AbstractSeed;

/**
 * CrewSends seed.
 */
class CrewSendsSeed extends AbstractSeed
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
      $datetime = date("Y-m-d H:i:s");
      $data = [
        [
          "categories_id" => 1,
          "statuses_id" => 1,
          "users_id" => 1,
          "incident_managements_id" => 1,
          "title" => "test",
          "comment" => "test",
          "period" => date("Y-m-d H:i:s", strtotime("+1 day 12:00:00")),
          "created" => $datetime,
          "modified" => $datetime
        ],
        [
          "categories_id" => 2,
          "statuses_id" => 2,
          "users_id" => 2,
          "incident_managements_id" => 2,
          "title" => "test2",
          "comment" => "test2",
          "period" => date("Y-m-d H:i:s", strtotime("+3 day 15:00:00")),
          "created" => $datetime,
          "modified" => $datetime
        ],
      ];

        $table = $this->table('crew_sends');
        $table->insert($data)->save();
    }
}
