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
                "incident_managements_id" => 8,
                "occurrence_datetime" => date("Y-m-d", strtotime("+1 year")),
                "response_start_time" => date("Y-m-d", strtotime("+1 year")),
                "response_end_time" => date("Y-m-d", strtotime("+1 year")),
                "systems_id" => 1,
                "bases_id" => 2,
                "units_id" => 3,
                "statuses_id" => 1,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 1,
                "attachment" => 0,
                "comment" => "事案2"
            ],
            [
                "incident_managements_id" => 9,
                "occurrence_datetime" => date("Y-m-d", strtotime("+2 year +1 mouth")),
                "response_start_time" => date("Y-m-d", strtotime("+2 year +1 mouth")),
                "response_end_time" => date("Y-m-d", strtotime("+2 year +1 mouth")),
                "systems_id" => 2,
                "bases_id" => 3,
                "units_id" => 3,
                "statuses_id" => 2,
                "reports_id" => 2,
                "positives_id" => 2,
                "sec_levels_id" => 2, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 2,
                "attachment" => 1,
                "comment" => "asdf"
            ],
            [
                "incident_managements_id" => 10,
                "occurrence_datetime" => date("Y-m-d", strtotime("+3 year +4 month")),
                "response_start_time" => date("Y-m-d", strtotime("+3 year +4 month")),
                "response_end_time" => date("Y-m-d", strtotime("+3 year +4 month")),
                "systems_id" => 3,
                "bases_id" => 4,
                "units_id" => 4,
                "statuses_id" => 3,
                "reports_id" => 3,
                "positives_id" => 3,
                "sec_levels_id" => 3, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 1,
                "attachment" => 1,
                "comment"=> ";lkj"
            ],
            [
                "incident_managements_id" => 11,
                "occurrence_datetime" => date("Y-m-d", strtotime("+6 month")),
                "response_start_time" => date("Y-m-d", strtotime("+6 month")),
                "response_end_time" => date("Y-m-d", strtotime("+6 month")),
                "systems_id" => 4,
                "bases_id" => 1,
                "units_id" => 1,
                "statuses_id" => 1,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 4, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 2,
                "attachment" => 0,
                "comment" => "kd;fsdkjfo;aiwejf;iahrgsa"
            ],
            [
                "incident_managements_id" => 12,
                "occurrence_datetime" => date("Y-m-d", strtotime("-1 year +9 month")),
                "response_start_time" => date("Y-m-d", strtotime("-1 year +9 month")),
                "response_end_time" => date("Y-m-d", strtotime("-1 year +9 month")),
                "systems_id" => 1,
                "bases_id" => 2,
                "units_id" => 2,
                "statuses_id" => 2,
                "reports_id" => 2,
                "positives_id" => 2,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 1,
                "attachment" => 1,
                "comment" => "dknvkfdhgiurhgehrfg"
            ],
            [
                "incident_managements_id" => 13,
                "occurrence_datetime" => date("Y-m-d", strtotime("-2 year +4 month")),
                "response_start_time" => date("Y-m-d", strtotime("-2 year +4 month")),
                "response_end_time" => date("Y-m-d", strtotime("-2 year +4 month")),
                "systems_id" => 2,
                "bases_id" => 3,
                "units_id" => 3,
                "statuses_id" => 3,
                "reports_id" => 3,
                "positives_id" => 3,
                "sec_levels_id" => 2, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 1,
                "samari_flag" => 2,
                "attachment" => 1,
                "comment" => "ssssssssssssssssssss"
            ],
            [
                "incident_managements_id" => 14,
                "occurrence_datetime" => date("Y-m-d", strtotime("-3 year -4 month")),
                "response_start_time" => date("Y-m-d", strtotime("-3 year -4 month")),
                "response_end_time" => date("Y-m-d", strtotime("-3 year -4 month")),
                "systems_id" => 3,
                "bases_id" => 4,
                "units_id" => 4,
                "statuses_id" => 4,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 3, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 1,
                "attachment" => 0,
                "comment" => "lllllllllliiiiiiiiiilllllllliiiiiiiiiiiii"
            ],
            [
                "incident_managements_id" => 15,
                "occurrence_datetime" => date("Y-m-d", strtotime("-2 month")),
                "response_start_time" => date("Y-m-d", strtotime("-2 month")),
                "response_end_time" => date("Y-m-d", strtotime("-2 month")),
                "systems_id" => 4,
                "bases_id" => 1,
                "units_id" => 1,
                "statuses_id" => 1,
                "reports_id" => 2,
                "positives_id" => 2,
                "sec_levels_id" => 4, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 2,
                "attachment" => 1,
                "comment" => "-------------------------------------------"
            ],
            [
                "incident_managements_id" => 16,
                "occurrence_datetime" => date("Y-m-d", strtotime("+10 month")),
                "response_start_time" => date("Y-m-d", strtotime("+10 month")),
                "response_end_time" => date("Y-m-d", strtotime("+10 month")),
                "systems_id" => 1,
                "bases_id" => 2,
                "units_id" => 2,
                "statuses_id" => 2,
                "reports_id" => 3,
                "positives_id" => 3,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 1,
                "attachment" => 1,
                "comment" => "444444444483929298732983"
            ],
            [
                "incident_managements_id" => 17,
                "occurrence_datetime" => date("Y-m-d", strtotime("+2 year +1 month")),
                "response_start_time" => date("Y-m-d", strtotime("+2 year +1 month")),
                "response_end_time" => date("Y-m-d", strtotime("+2 year +1 month")),
                "systems_id" => 2,
                "bases_id" => 3,
                "units_id" => 3,
                "statuses_id" => 3,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 2, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 2,
                "attachment" => 0,
                "comment" => "kkkksdfasdkfjsa;ovihavheao;"
            ],
            [
                "incident_managements_id" => 18,
                "occurrence_datetime" => date("Y-m-d", strtotime("+3 year -2 month")),
                "response_start_time" => date("Y-m-d", strtotime("+3 year -2 month")),
                "response_end_time" => date("Y-m-d", strtotime("+3 year -2 month")),
                "systems_id" => 3,
                "bases_id" => 4,
                "units_id" => 4,
                "statuses_id" => 1,
                "reports_id" => 2,
                "positives_id" => 2,
                "sec_levels_id" => 3, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 1,
                "attachment" => 1,
                "comment" => "0000000000000000000000000000000000000000000000000000000000"
            ],
            [
                "incident_managements_id" => 19,
                "occurrence_datetime" => date("Y-m-d", strtotime("+3 year +7 month")),
                "response_start_time" => date("Y-m-d", strtotime("+3 year +7 month")),
                "response_end_time" => date("Y-m-d", strtotime("+3 year +7 month")),
                "systems_id" => 4,
                "bases_id" => 1,
                "units_id" => 2,
                "statuses_id" => 2,
                "reports_id" => 3,
                "positives_id" => 3,
                "sec_levels_id" => 4, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 2,
                "attachment" => 1,
                "comment" => "s"
            ],
            [
                "incident_managements_id" => 20,
                "occurrence_datetime" => date("Y-m-d", strtotime("+5 month")),
                "response_start_time" => date("Y-m-d", strtotime("+5 month")),
                "response_end_time" => date("Y-m-d", strtotime("+5 month")),
                "systems_id" => 1,
                "bases_id" => 2,
                "units_id" => 2,
                "statuses_id" => 3,
                "reports_id" => 1,
                "positives_id" => 1,
                "sec_levels_id" => 1, 
                "incident_cases_id" => 1,
                "infection_routes_id" => 2,
                "sim_live_flag" => 2,
                "samari_flag" => 1,
                "attachment" => 0,
                "comment" => "test"
            ]
        ];

        $table = $this->table('risk_detections');
        $table->insert($data)->save();
    }
}
