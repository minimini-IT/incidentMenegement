<?php
use Migrations\AbstractSeed;

/**
 * Positives seed.
 */
class PositivesSeed extends AbstractSeed
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
                "positive" => "未確定"
            ],
            [
                "positive" => "誤検知"
            ],
            [
                "positive" => "正検知"
            ]
        ];

        $table = $this->table('positives');
        $table->insert($data)->save();
    }
}
