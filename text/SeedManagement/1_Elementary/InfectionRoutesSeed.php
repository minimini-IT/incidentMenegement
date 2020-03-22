<?php
use Migrations\AbstractSeed;

/**
 * InfectionRoutes seed.
 */
class InfectionRoutesSeed extends AbstractSeed
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
                "infection_route" => "WEB"
            ],
            [
                "infection_route" => "MAIL"
            ],
            [
                "infection_route" => "USB"
            ],
            [
                "infection_route" => "その他"
            ]
        ];

        $table = $this->table('infection_routes');
        $table->insert($data)->save();
    }
}
