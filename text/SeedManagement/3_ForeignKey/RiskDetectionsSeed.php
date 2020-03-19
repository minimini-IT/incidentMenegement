<?php
use Migrations\AbstractSeed;

/**
 * RiskDetections seed.
 */
class RiskDetectionsSeed extends AbstractSeed
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
                "incident_managements_id" => 5,
                "occurrence_datetime" => $datetime,
                "response_start_time" => $datetime,
                "response_end_time" => $datetime,
                "systems_id" => 2,
                "bases_id" => 2,
                "units_id" => 2,
                "statuses_id" => 2,
                "reports_id" => 2,
                "positives_id" => 2,
                "sec_levels_id" => 2, 
                "incident_cases_id" => 2,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 1,
                "attachment" => 0,
                "comment" => "事案2"
            ],
            [
                "incident_managements_id" => 6,
                "occurrence_datetime" => $datetime,
                "response_start_time" => $datetime,
                "response_end_time" => $datetime,
                "systems_id" => 2,
                "bases_id" => 1,
                "units_id" => 1,
                "statuses_id" => 1,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 2,
                "infection_routes_id" => 2,
                "sim_live_flag" => 0,
                "samari_flag" => 0,
                "attachment" => 0,
                "comment" => "事案1"
            ]
        ];

        $table = $this->table('risk_detections');
        $table->insert($data)->save();
    }
}
