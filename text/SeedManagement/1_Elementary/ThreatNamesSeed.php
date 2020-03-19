<?php
use Migrations\AbstractSeed;

/**
 * ThreatNames seed.
 */
class ThreatNamesSeed extends AbstractSeed
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
                "threat_name" => "McAfee検知",
                "threat_sort_number" => 1
            ],
            [
                "threat_name" => "不審メール通過",
                "threat_sort_number" => 2
            ],
            [
                "threat_name" => "不正通信",
                "threat_sort_number" => 3
            ],
        ];

        $table = $this->table('threat_names');
        $table->insert($data)->save();
    }
}
