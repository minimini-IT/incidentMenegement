<?php
use Migrations\AbstractSeed;

/**
 * SuspiciousLinks seed.
 */
class SuspiciousLinksSeed extends AbstractSeed
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
                "risk_detections_id" => 2,
                "link" => "http://aaa.jp"
            ],
            [
                "risk_detections_id" => 3,
                "link" => "http://bbb.jp"
            ],
            [
                "risk_detections_id" => 3,
                "link" => "http://ccc.jp"
            ],
            [
                "risk_detections_id" => 4,
                "link" => "http://ddd.jp"
            ],
            [
                "risk_detections_id" => 4,
                "link" => "http://eee.jp"
            ],
            [
                "risk_detections_id" => 4,
                "link" => "http://fff.jp"
            ],
            [
                "risk_detections_id" => 5,
                "link" => "http://ggg.jp"
            ],
            [
                "risk_detections_id" => 6,
                "link" => "http://hhh.jp"
            ],
            [
                "risk_detections_id" => 8,
                "link" => "http://iii.jp"
            ],
            [
                "risk_detections_id" => 8,
                "link" => "http://jjj.jp"
            ],
            [
                "risk_detections_id" => 9,
                "link" => "http://kkk.jp"
            ],
            [
                "risk_detections_id" => 11,
                "link" => "http://lll.jp"
            ],
            [
                "risk_detections_id" => 11,
                "link" => "http://mmm.jp"
            ],
            [
                "risk_detections_id" => 12,
                "link" => "http://nnn.jp"
            ],
            [
                "risk_detections_id" => 14,
                "link" => "http://ooo.jp"
            ],
            [
                "risk_detections_id" => 15,
                "link" => "http://ppp.jp"
            ],
            [
                "risk_detections_id" => 15,
                "link" => "http://qqq.jp"
            ],
        ];

        $table = $this->table('suspicious_links');
        $table->insert($data)->save();
    }
}
