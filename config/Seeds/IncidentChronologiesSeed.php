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
              "risk_detections_id" => 1,
              "created" => $datetime,
              "users_id" => 1,
              "message" => "ログ収集依頼",
              "reference" => "PCの操作が慣れていない様子なので、時間がかかりそう"
            ],
            [
              "risk_detections_id" => 1,
              "created" => date("Y-m-d H:i", strtotime("+1 hour")),
              "users_id" => 1,
              "message" => "ログ受領。",
              "reference" => null
            ],
            [
              "risk_detections_id" => 1,
              "created" => date("Y-m-d H:i", strtotime("+2 hour +10 min")),
              "users_id" => 1,
              "message" => "解析結果：脅威なし",
              "reference" => null
            ],
            [
              "risk_detections_id" => 2,
              "created" => $datetime,
              "users_id" => 3,
              "message" => "ログ収集依頼",
              "reference" => null
            ],
            [
              "risk_detections_id" => 2,
              "created" => date("Y-m-d H:i", strtotime("+1 hour +15 min")),
              "users_id" => 3,
              "message" => "ログ受領",
              "reference" => null
            ],
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
            ],
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
