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
          "belongs_id" => 1,
          "ranks_id" => 1,
          "roles_id" => 4,
          "username" => 989898,
          "first_name" => "全",
          "last_name" => "ユーザ",
          "password" => $this->_setPassword(123456),
          "user_sort_number" => 999,
          "delete_flag" => 0
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
