<?php
use Migrations\AbstractSeed;

/**
 * IncedentCases seed.
 */
class IncedentCasesSeed extends AbstractSeed
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
                "incident_case" => "不審メール"
            ],
            [
                "incident_case" => "ウイルス検知"
            ],
            [
                "incident_case" => "ソフトウェア不正利用"
            ]
        ];

        $table = $this->table('incident_cases');
        $table->insert($data)->save();
    }
}
