<?php
use Migrations\AbstractSeed;

/**
 * SuspiciousDestinationAddresses seed.
 */
class SuspiciousDestinationAddressesSeed extends AbstractSeed
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
                "destination_address" => "aaa@asdf.com"
            ],
            [
                "risk_detections_id" => 4,
                "destination_address" => "bbb@asdf.com"
            ],
            [
                "risk_detections_id" => 4,
                "destination_address" => "ccc@asdf.com"
            ],
            [
                "risk_detections_id" => 5,
                "destination_address" => "aaa@asdf.com"
            ],
            [
                "risk_detections_id" => 5,
                "destination_address" => "bbb@asdf.com"
            ],
            [
                "risk_detections_id" => 5,
                "destination_address" => "fff@asdf.com"
            ],
            [
                "risk_detections_id" => 6,
                "destination_address" => "ggg@asdf.com"
            ],
            [
                "risk_detections_id" => 7,
                "destination_address" => "eee@asdf.com"
            ],
            [
                "risk_detections_id" => 7,
                "destination_address" => "aaa@asdf.com"
            ],
            [
                "risk_detections_id" => 8,
                "destination_address" => "jjj@asdf.com"
            ],
            [
                "risk_detections_id" => 8,
                "destination_address" => "ccc@asdf.com"
            ],
            [
                "risk_detections_id" => 8,
                "destination_address" => "lll@asdf.com"
            ],
            [
                "risk_detections_id" => 9,
                "destination_address" => "eee@asdf.com"
            ],
            [
                "risk_detections_id" => 10,
                "destination_address" => "nnn@asdf.com"
            ],
            [
                "risk_detections_id" => 11,
                "destination_address" => "nnn@asdf.com"
            ],
            [
                "risk_detections_id" => 11,
                "destination_address" => "bbb@asdf.com"
            ],
            [
                "risk_detections_id" => 12,
                "destination_address" => "aaa@asdf.com"
            ],
            [
                "risk_detections_id" => 12,
                "destination_address" => "rrr@asdf.com"
            ],
            [
                "risk_detections_id" => 13,
                "destination_address" => "lll@asdf.com"
            ],
            [
                "risk_detections_id" => 13,
                "destination_address" => "eee@asdf.com"
            ],
            [
                "risk_detections_id" => 14,
                "destination_address" => "aaa@asdf.com"
            ],
            [
                "risk_detections_id" => 15,
                "destination_address" => "vvv@asdf.com"
            ],
            [
                "risk_detections_id" => 15,
                "destination_address" => "bbb@asdf.com"
            ],
            [
                "risk_detections_id" => 15,
                "destination_address" => "eee@asdf.com"
            ],
            [
                "risk_detections_id" => 16,
                "destination_address" => "yyy@asdf.com"
            ]
        ];

        $table = $this->table('suspicious_destination_addresses');
        $table->insert($data)->save();
    }
}
