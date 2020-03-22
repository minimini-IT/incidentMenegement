<?php
use Migrations\AbstractSeed;

/**
 * Systems seed.
 */
class SystemsSeed extends AbstractSeed
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
                "system" => "事務共通",
                "abb_system" => "oaci",
                "system_sort_number" => 1,
            ],
            [
                "system" => "空自インターネット",
                "abb_system" => "inet",
                "system_sort_number" => 2,
            ],
            [
                "system" => "自衛隊指揮システム",
                "abb_system" => "jacs",
                "system_sort_number" => 3,
            ],
            [
                "system" => "部隊LAN",
                "abb_system" => "LAN",
                "system_sort_number" => 4,
            ],
        ];

        $table = $this->table('systems');
        $table->insert($data)->save();
    }
}
