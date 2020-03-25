<?php
use Migrations\AbstractSeed;

/**
 * IncidentManagements seed.
 */
class IncidentManagementsSeed extends AbstractSeed
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
                "management_prefixes_id" => 4,
                "created" => $datetime,
                "number" => 1,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 1,
                "created" => $datetime,
                "number" => 2,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 3,
                "created" => $datetime,
                "number" => 3,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 2,
                "created" => $datetime,
                "number" => 4,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 1,
                "created" => $datetime,
                "number" => 5,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 5,
                "created" => $datetime,
                "number" => 6,
                "modified" => $datetime
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d H:i", strtotime("+1 hour")),
                "number" => 7,
                "modified" => date("Y-m-d H:i", strtotime("+1 hour"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+1 year {$datetime}")),
                "number" => 8,
                "modified" => date("Y-m-d H:i:s", strtotime("+1 year {$datetime}"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+2 year +1 mouth {$datetime}")),
                "number" => 9,
                "modified" => date("Y-m-d H:i:s", strtotime("+2 year +1 month {$datetime}"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year +4 month {$datetime}")),
                "number" => 10,
                "modified" => date("Y-m-d H:i:s", strtotime("+3 year +4 month {$datetime}"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+6 month {$datetime}")),
                "number" => 11,
                "modified" => date("Y-m-d H:i:s", strtotime("+6 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-1 year +9 month {$datetime}")),
                "number" => 12,
                "modified" => date("Y-m-d H:i:s", strtotime("-1 year +9 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-2 year +4 month {$datetime}")),
                "number" => 13,
                "modified" => date("Y-m-d H:i:s", strtotime("-2 year +4 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-3 year -4 month {$datetime}")),
                "number" => 14,
                "modified" => date("Y-m-d H:i:s", strtotime("-3 year -4 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-2 month {$datetime}")),
                "number" => 15,
                "modified" => date("Y-m-d H:i:s", strtotime("-2 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+10 month {$datetime}")),
                "number" => 16,
                "modified" => date("Y-m-d H:i:s", strtotime("+10 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+2 year +1 month {$datetime}")),
                "number" => 17,
                "modified" => date("Y-m-d H:i:s", strtotime("+2 year +1 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year -2 month {$datetime}")),
                "number" => 18,
                "modified" => date("Y-m-d H:i:s", strtotime("+3 year -2 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year +7 month {$datetime}")),
                "number" => 19,
                "modified" => date("Y-m-d H:i:s", strtotime("+3 year +7 month {$datetime}")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+5 month {$datetime}")),
                "number" => 20,
                "modified" => date("Y-m-d H:i:s", strtotime("+5 month {$datetime}")),
            ]
        ];

        $table = $this->table('incident_managements');
        $table->insert($data)->save();
    }
}
