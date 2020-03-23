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
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d H:i:s", strtotime("+1 year {$datetime}")),
                "number" => 8,
                "modified" => date("Y-m-d", strtotime("+1 year"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+2 year +1 mouth")),
                "number" => 9,
                "modified" => date("Y-m-d", strtotime("+2 year +1 month"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year +4 month")),
                "number" => 10,
                "modified" => date("Y-m-d", strtotime("+3 year +4 month"))
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+6 month")),
                "number" => 11,
                "modified" => date("Y-m-d", strtotime("+6 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-1 year +9 month")),
                "number" => 12,
                "modified" => date("Y-m-d", strtotime("-1 year +9 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-2 year +4 month")),
                "number" => 13,
                "modified" => date("Y-m-d", strtotime("-2 year +4 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("-3 year -4 month")),
                "number" => 14,
                "modified" => date("Y-m-d", strtotime("-3 year -4 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "modified" => date("Y-m-d", strtotime("-2 month")),
                "number" => 15,
                "modified" => date("Y-m-d", strtotime("-2 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+10 month")),
                "number" => 16,
                "modified" => date("Y-m-d", strtotime("+10 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+2 year +1 month")),
                "number" => 17,
                "modified" => date("Y-m-d", strtotime("+2 year +1 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year -2 month")),
                "number" => 18,
                "modified" => date("Y-m-d", strtotime("+3 year -2 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+3 year +7 month")),
                "number" => 19,
                "modified" => date("Y-m-d", strtotime("+3 year +7 month")),
            ],
            [
                "management_prefixes_id" => 5,
                "created" => date("Y-m-d", strtotime("+5 month")),
                "number" => 20,
                "modified" => date("Y-m-d", strtotime("+5 month")),
            ]
        ];

        $table = $this->table('incident_managements');
        $table->insert($data)->save();
    }
}
