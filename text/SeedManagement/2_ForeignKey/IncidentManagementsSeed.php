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
            ]
        ];

        $table = $this->table('incident_managements');
        $table->insert($data)->save();
    }
}
