<?php
use Migrations\AbstractSeed;

/**
 * IncidentChronologies seed.
 */
class IncidentChronologiesSeed extends AbstractSeed
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
              "risk_detections_id" => 3,
              "created" => date("Y-m-d H:i", strtotime("+1 hour +30 min")),
              "users_id" => 3,
              "message" => "c4より通報あり。\n受信者に通報。",
              "reference" => null
            ],
            [
              "risk_detections_id" => 3,
              "created" => date("Y-m-d H:i", strtotime("+1 hour +45 min")),
              "users_id" => 3,
              "message" => "削除完了",
              "reference" => null
            ]
        ];

        $table = $this->table('incident_chronologies');
        $table->insert($data)->save();
    }
}
