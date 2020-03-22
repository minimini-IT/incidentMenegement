<?php
use Migrations\AbstractSeed;

/**
 * MessageDestinations seed.
 */
class MessageDestinationsSeed extends AbstractSeed
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
          "message_bords_id" => 1,
          "users_id" => 1
        ],
        [
          "message_bords_id" => 1,
          "users_id" => 2
        ],
        [
          "message_bords_id" => 1,
          "users_id" => 3
        ],
        [
          "message_bords_id" => 2,
          "users_id" => 2
        ],
        [
          "message_bords_id" => 2,
          "users_id" => 3
        ],
        [
          "message_bords_id" => 2,
          "users_id" => 4
        ]
      ];

        $table = $this->table('message_destinations');
        $table->insert($data)->save();
    }
}
