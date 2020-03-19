<?php
use Migrations\AbstractSeed;

/**
 * Reports seed.
 */
class ReportsSeed extends AbstractSeed
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
                "report" => "未確定"
            ],
            [
                "report" => "報告無し"
            ],
            [
                "report" => "報告有り"
            ]
        ];

        $table = $this->table('reports');
        $table->insert($data)->save();
    }
}
