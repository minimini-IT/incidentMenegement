<?php
use Migrations\AbstractSeed;

/**
 * MessageAnswers seed.
 */
class MessageAnswersSeed extends AbstractSeed
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
        $datetime = date("Y-m-d H:i:s");
        $data = [
            [
              "message_destinations_id" => 1,
              "message_choices_id" => 1,
              "message" => "選択肢1を選択",
              "created" => $datetime,
              "modified" => $datetime
            ],
            [
              "message_destinations_id" => 2,
              "message_choices_id" => 1,
              "message" => "選択肢1を選択した",
              "created" => $datetime,
              "modified" => $datetime
            ],
            [
              "message_destinations_id" => 3,
              "message_choices_id" => 2,
              "message" => "選択肢2を選択しました",
              "created" => $datetime,
              "modified" => $datetime
            ],
            [
              "message_destinations_id" => 4,
              "message_choices_id" => 3,
              "message" => "確認しました",
              "created" => $datetime,
              "modified" => $datetime
            ],
            [
              "message_destinations_id" => 5,
              "message_choices_id" => 3,
              "message" => "",
              "created" => $datetime,
              "modified" => $datetime
            ]
        ];

        $table = $this->table('message_answers');
        $table->insert($data)->save();
    }
}
