<?php
use Migrations\AbstractSeed;

/**
 * MessageChoices seed.
 */
class MessageChoicesSeed extends AbstractSeed
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
          "content" => "選択肢１"
        ],
        [
          "message_bords_id" => 1,
          "content" => "選択肢２"
        ],
        [
          "message_bords_id" => 2,
          "content" => "確認済"
        ]
      ];

        $table = $this->table('message_choices');
        $table->insert($data)->save();
    }
}
