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
              "risk_detections_id" => 4,
              "created" => date("Y-m-d H:i:s", strtotime("+1 year {$datetime}")),
              "users_id" => 1,
              "message" => "ssssssssssssssssss",
              "reference" => "aaaaaaaaaaa"
            ],
            [
              "risk_detections_id" => 4,
              "created" => date("Y-m-d H:i:s", strtotime("+1 year +30 min {$datetime}")),
              "users_id" => 1,
              "message" => "llllllllllllllllll",
              "reference" => ""
            ],
            [
              "risk_detections_id" => 4,
              "created" => date("Y-m-d H:i:s", strtotime("+1 year +1 hour {$datetime}")),
              "users_id" => 1,
              "message" => "asfdasdf",
              "reference" => ""
            ],
            [
              "risk_detections_id" => 5,
              "created" => date("Y-m-d H:i:s", strtotime("+2 year +1 mouth {$datetime}")),
              "users_id" => 1,
              "message" => "対処開始",
              "reference" => "アイウエオ"
            ],
            [
              "risk_detections_id" => 6,
              "created" => date("Y-m-d H:i:s", strtotime("+3 year +4 month {$datetime}")),
              "users_id" => 1,
              "message" => "kkkjlkjsdf",
              "reference" => ";;;;;;;;;;;;;;;;;;;;"
            ],
            [
              "risk_detections_id" => 6,
              "created" => date("Y-m-d H:i:s", strtotime("+3 year +4 month +10 min {$datetime}")),
              "users_id" => 1,
              "message" => "終わり",
              "reference" => ";;;;;;"
            ],
            [
              "risk_detections_id" => 7,
              "created" => date("Y-m-d H:i:s", strtotime("+6 month {$datetime}")),
              "users_id" => 1,
              "message" => "終わりsadfk",
              "reference" => "lsdkfjsldkfjsdlf"
            ],
            [
              "risk_detections_id" => 7,
              "created" => date("Y-m-d H:i:s", strtotime("+6 month + 15 min {$datetime}")),
              "users_id" => 1,
              "message" => "",
              "reference" => ""
            ],
            [
              "risk_detections_id" => 7,
              "created" => date("Y-m-d H:i:s", strtotime("+6 month + 20 min {$datetime}")),
              "users_id" => 1,
              "message" => "00000000000000000",
              "reference" => "1111111111111111111"
            ],
            [
              "risk_detections_id" => 8,
              "created" => date("Y-m-d H:i:s", strtotime("-1 year +9 month {$datetime}")),
              "users_id" => 1,
              "message" => "d",
              "reference" => "@"
            ],
            [
              "risk_detections_id" => 10,
              "created" => date("Y-m-d H:i:s", strtotime("-3 year -4 month {$datetime}")),
              "users_id" => 1,
              "message" => "0909090909090",
              "reference" => "@pppppppppppppppppppppppp"
            ],
            [
              "risk_detections_id" => 12,
              "created" => date("Y-m-d H:i:s", strtotime("+10 month {$datetime}")),
              "users_id" => 1,
              "message" => "lkssss",
              "reference" => "222222229999999"
            ],
            [
              "risk_detections_id" => 12,
              "created" => date("Y-m-d H:i:s", strtotime("+10 month +50 min {$datetime}")),
              "users_id" => 1,
              "message" => "",
              "reference" => ""
            ],
            [
              "risk_detections_id" => 13,
              "created" => date("Y-m-d H:i:s", strtotime("+2 year +1 month {$datetime}")),
              "users_id" => 1,
              "message" => "lkssss",
              "reference" => "222222229999999"
            ],
            [
              "risk_detections_id" => 13,
              "created" => date("Y-m-d H:i:s", strtotime("+2 year +1 month +1 min {$datetime}")),
              "users_id" => 1,
              "message" => "dddeeeeeeeeeee",
              "reference" => "00000000000000000000"
            ],
            [
              "risk_detections_id" => 14,
              "created" => date("Y-m-d H:i:s", strtotime("+3 year -2 month {$datetime}")),
              "users_id" => 1,
              "message" => "dddeeee",
              "reference" => "00000000"
            ],
            [
              "risk_detections_id" => 15,
              "created" => date("Y-m-d H:i:s", strtotime("+3 year +7 month {$datetime}")),
              "users_id" => 1,
              "message" => "lkdsjafiewoieurowu39r83woe",
              "reference" => ""
            ],
            [
              "risk_detections_id" => 15,
              "created" => date("Y-m-d H:i:s", strtotime("+3 year +7 month +30 min {$datetime}")),
              "users_id" => 1,
              "message" => "",
              "reference" => "7777777777777777777"
            ],
            [
              "risk_detections_id" => 16,
              "created" => date("Y-m-d H:i:s", strtotime("+5 month {$datetime}")),
              "users_id" => 1,
              "message" => "ddeee",
              "reference" => "000000"
            ],
            [
              "risk_detections_id" => 16,
              "created" => date("Y-m-d H:i:s", strtotime("+5 month +1 min {$datetime}")),
              "users_id" => 1,
              "message" => "lllllllllllllllllll",
              "reference" => "ppppppppppppppeeeeeeeeeeeeeeeeeeeeeeee"
            ],
            [
              "risk_detections_id" => 16,
              "created" => date("Y-m-d H:i:s", strtotime("+5 month +5 min {$datetime}")),
              "users_id" => 1,
              "message" => "",
              "reference" => ""
            ]
        ];

        $table = $this->table('incident_chronologies');
        $table->insert($data)->save();
    }
}
