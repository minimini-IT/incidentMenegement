<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
          "belongs_id" => 4,
          "ranks_id" => 4,
          "roles_id" => 1,
          "username" => "ito",
          "first_name" => "伊藤",
          "last_name" => "肇亮",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 10,
          "delete_flag" => 0
        ],
        [
          "belongs_id" => 1,
          "ranks_id" => 3,
          "roles_id" => 2,
          "username" => "saito",
          "first_name" => "斎藤",
          "last_name" => "隆",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 2,
          "delete_flag" => 0
        ],
        [
          "belongs_id" => 2,
          "ranks_id" => 2,
          "roles_id" => 3,
          "username" => "nakamura",
          "first_name" => "中村",
          "last_name" => "弘明",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 8,
          "delete_flag" => 0
        ],
        [
          "belongs_id" => 3,
          "ranks_id" => 1,
          "roles_id" => 4,
          "username" => "nagano",
          "first_name" => "永野",
          "last_name" => "芽郁",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 1,
          "delete_flag" => 0
        ],
        [
          "belongs_id" => 3,
          "ranks_id" => 1,
          "roles_id" => 4,
          "username" => "user",
          "first_name" => "システム",
          "last_name" => "太郎",
          "password" => $this->_setPassword(0000),
          "user_sort_number" => 5,
          "delete_flag" => 0
        ],
        [
          "belongs_id" => 2,
          "ranks_id" => 2,
          "roles_id" => 3,
          "username" => "hashimoto",
          "first_name" => "橋本",
          "last_name" => "環奈",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 2,
          "delete_flag" => 1
        ],
      ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    protected function _setPassword($value){
      $hasher = new DefaultPasswordHasher();
      return $hasher->hash($value);
    }
}
