<?php
use Migrations\AbstractSeed;

/**
 * Workers seed.
 */
class WorkersSeed extends AbstractSeed
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
        $date = date("Y-m-d");
        $data = [
            [
                "date" => $date,
                "users_id" => 1,
                "positions_id" => 1,
                "shifts_id" => null,
                "duties_id" => null
            ],
            [
                "date" => $date,
                "users_id" => 2,
                "positions_id" => 2,
                "shifts_id" => 1,
                "duties_id" => 1
            ],
            [
                "date" => $date,
                "users_id" => 3,
                "positions_id" => 3,
                "shifts_id" => 2,
                "duties_id" => null
            ],
            [
                "date" => date("Y-m-d", strtotime("+1 day")),
                "users_id" => 4,
                "positions_id" => 1,
                "shifts_id" => null,
                "duties_id" => null
            ],
            [
                "date" => date("Y-m-d", strtotime("+1 day")),
                "users_id" => 5,
                "positions_id" => 2,
                "shifts_id" => 1,
                "duties_id" => 2
            ],
            [
                "date" => date("Y-m-d", strtotime("+1 day")),
                "users_id" => 6,
                "positions_id" => 3,
                "shifts_id" => 2,
                "duties_id" => null
            ]
        ];

        $table = $this->table('workers');
        $table->insert($data)->save();
    }
}
