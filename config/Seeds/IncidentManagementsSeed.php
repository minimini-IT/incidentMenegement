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
        $data = [
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
