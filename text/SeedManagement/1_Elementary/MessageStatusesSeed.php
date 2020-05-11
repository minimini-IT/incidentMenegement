<?php
use Migrations\AbstractSeed;

/**
 * MessageStatuses seed.
 */
class MessageStatusesSeed extends AbstractSeed
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
                "status" => "調整中",
                "status_sort_number" => 1
            ],
            [
                "status" => "完了",
                "status_sort_number" => 2
            ]
        ];

        $table = $this->table('message_statuses');
        $table->insert($data)->save();
    }
}
