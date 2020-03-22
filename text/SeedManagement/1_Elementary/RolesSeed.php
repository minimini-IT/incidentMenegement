<?php
use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
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
          "role_jp" => "管理者",
          "role_en" => "admin",
          "role_level" => "1"
        ],
        [
          "role_jp" => "隊長",
          "role_en" => "captain",
          "role_level" => "2"
        ],
        [
          "role_jp" => "班長",
          "role_en" => "leader",
          "role_level" => "3"
        ],
        [
          "role_jp" => "ユーザ",
          "role_en" => "user",
          "role_level" => "4"
        ]
      ];

        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
