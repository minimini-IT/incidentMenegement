<?php
use Migrations\AbstractSeed;

/**
 * SuspiciousSenderAddresses seed.
 */
class SuspiciousSenderAddressesSeed extends AbstractSeed
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
                "risk_detections_id" => 3,
                "sender_address" => "aaa@malmail1.com"
            ],
            [
                "risk_detections_id" => 4,
                "sender_address" => "bbb@malmail2.com"
            ],
            [
                "risk_detections_id" => 5,
                "sender_address" => "ccc@malmail3.com"
            ],
            [
                "risk_detections_id" => 6,
                "sender_address" => "ddd@malmail4.com"
            ],
            [
                "risk_detections_id" => 7,
                "sender_address" => "aaa@malmail1.com"
            ],
            [
                "risk_detections_id" => 8,
                "sender_address" => "fff@malmail2.com"
            ],
            [
                "risk_detections_id" => 9,
                "sender_address" => "iii@malmail3.com"
            ],
            [
                "risk_detections_id" => 10,
                "sender_address" => "ccc@malmail3.com"
            ],
            [
                "risk_detections_id" => 11,
                "sender_address" => "zzz@malmail4.com"
            ],
            [
                "risk_detections_id" => 12,
                "sender_address" => "bbb@malmail2.com"
            ],
            [
                "risk_detections_id" => 13,
                "sender_address" => "bbb@malmail2.com"
            ],
            [
                "risk_detections_id" => 14,
                "sender_address" => "lll@malmail6.com"
            ],
            [
                "risk_detections_id" => 15,
                "sender_address" => "asdf@malmail4.com"
            ],
            [
                "risk_detections_id" => 16,
                "sender_address" => "ddd@malmail4.com"
            ]
        ];

        $table = $this->table('suspicious_sender_addresses');
        $table->insert($data)->save();
    }
}
