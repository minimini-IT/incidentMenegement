<?php
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
          "category" => "不審メール",
          "category_sort_number" => 1
        ],
        [
          "category" => "事案",
          "category_sort_number" => 2
        ],
        [
          "category" => "フリーソフト申請",
          "category_sort_number" => 3
        ],
        [
          "category" => "問い合わせ",
          "category_sort_number" => 4
        ],
      ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
