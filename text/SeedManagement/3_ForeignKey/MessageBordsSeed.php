<?php
use Migrations\AbstractSeed;

/**
 * MessageBords seed.
 */
class MessageBordsSeed extends AbstractSeed
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
            "title" => "test title 1",
            "users_id" => 1,
            "incident_managements_id" => 3,
            "message_statuses_id" => 1,
            "choice" => 2,
            "message" => "test message 1",
            "period" => date("Y-m-d", strtotime("+2 day")),
            "created" => $datetime,
            "modified" => $datetime
          ],
          [
            "title" => "test title 2",
            "users_id" => 4,
            "incident_managements_id" => 4,
            "message_statuses_id" => 2,
            "choice" => 1,
            "message" => "test message 2",
            "period" => date("Y-m-d", strtotime("+4 day")),
            "created" => $datetime,
            "modified" => $datetime
          ],
        ];

        $table = $this->table('message_bords');
        $table->insert($data)->save();
    }
}
