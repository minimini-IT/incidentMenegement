<?php
use Migrations\AbstractSeed;

/**
 * SecLevels seed.
 */
class SecLevelsSeed extends AbstractSeed
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
                "sec_level" => 1
            ],
            [
                "sec_level" => 2
            ],
            [
                "sec_level" => 3
            ],
            [
                "sec_level" => 4
            ]
        ];

        $table = $this->table('sec_levels');
        $table->insert($data)->save();
    }
}
