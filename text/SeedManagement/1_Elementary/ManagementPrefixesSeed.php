<?php
use Migrations\AbstractSeed;

/**
 * ManagementPrefixes seed.
 */
class ManagementPrefixesSeed extends AbstractSeed
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
                "management_prefix" => "tsubaki",
                "sort_number" => 1
            ],
            [
                "management_prefix" => "hydrangea",
                "sort_number" => 2
            ],
            [
                "management_prefix" => "lilybell",
                "sort_number" => 3
            ],
            [
                "management_prefix" => "sasanqua",
                "sort_number" => 4
            ],
            [
                "management_prefix" => "cyber",
                "sort_number" => 5
            ]
        ];

        $table = $this->table('management_prefixes');
        $table->insert($data)->save();
    }
}
