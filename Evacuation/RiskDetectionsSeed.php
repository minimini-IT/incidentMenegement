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
                "incident_managements_id" => 7,
                "occurrence_datetime" => $datetime,
                "response_start_time" => $datetime,
                "response_end_time" => $datetime,
                "systems_id" => 3,
                "bases_id" => 4,
                "units_id" => 1,
                "statuses_id" => 3,
                "reports_id" => 1,
                "positives_id" => 3,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 1,
                "sim_live_flag" => 1,
                "samari_flag" => 1,
                "attachment" => 0,
                "comment" => "不審メール"
            ],
        ];

        $table = $this->table('risk_detections');
        $table->insert($data)->save();
    }
}
