<?php
use Migrations\AbstractMigration;

class CreateFoundations extends AbstractMigration
{
    public function up()
    {
        //belongs作成
        $this->table('belongs', ['id' => false, 'primary_key' => ['belongs_id']])
            ->addColumn('belongs_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('belong', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('belong_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->create();

        //categories作成
        $this->table('categories', ['id' => false, 'primary_key' => ['categories_id']])
            ->addColumn('categories_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('category', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('category_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //duties作成
        $this->table('duties', ['id' => false, 'primary_key' => ['duties_id']])
            ->addColumn('duties_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('duty', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('duty_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //positions作成
        $this->table('positions', ['id' => false, 'primary_key' => ['positions_id']])
            ->addColumn('positions_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('position', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('position_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //ranks作成
        $this->table('ranks', ['id' => false, 'primary_key' => ['ranks_id']])
            ->addColumn('ranks_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('rank', 'string', [
                'default' => null,
                'limit' => 24,
                'null' => false,
            ])
            ->addColumn('abb_rank', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('rank_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //shifts作成
        $this->table('shifts', ['id' => false, 'primary_key' => ['shifts_id']])
            ->addColumn('shifts_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('shift', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('shift_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //statuses作成
        $this->table('statuses', ['id' => false, 'primary_key' => ['statuses_id']])
            ->addColumn('statuses_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 64,
                'null' => false,
            ])
            ->addColumn('status_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //roles作成
        $this->table('roles', ['id' => false, 'primary_key' => ['roles_id']])
            ->addColumn('roles_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn("role_jp", "string",[
                "default" => null,
                "limit" => 30,
                "null" => false,
            ])
            ->addColumn("role_en", "string",[
                "default" => null,
                "limit" => 30,
                "null" => false,
            ])
            ->addColumn("role_level", "integer",[
                "default" => null,
                "limit" => 11,
                "null" => false,
            ])
            ->create();

        //management_prefixes作成
        $this->table('management_prefixes', ["id" => false, "primary_key" => ["management_prefixes_id"]])
            ->addColumn('management_prefixes_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('management_prefix', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //message_statuses作成
        $this->table('message_statuses', ['id' => false, 'primary_key' => ['message_statuses_id']])
            ->addColumn('message_statuses_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status_sort_number', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        //systems作成
        $this->table('systems', ['id' => false, 'primary_key' => ['systems_id']])
            ->addColumn('systems_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('system', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('abb_system', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('system_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //bases作成
        $this->table('bases', ['id' => false, 'primary_key' => ['bases_id']])
            ->addColumn('bases_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('base', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('base_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        //reports作成
        $this->table('reports', ['id' => false, 'primary_key' => ['reports_id']])
            ->addColumn('reports_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('report', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        //positives作成
        $this->table('positives', ['id' => false, 'primary_key' => ['positives_id']])
            ->addColumn('positives_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('positive', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        //sec_levels作成
        $this->table('sec_levels', ['id' => false, 'primary_key' => ['sec_levels_id']])
            ->addColumn('sec_levels_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sec_level', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->create();

        //infection_routes作成
        $this->table('infection_routes', ['id' => false, 'primary_key' => ['infection_routes_id']])
            ->addColumn('infection_routes_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('infection_route', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        //incident_cases作成
        $this->table('incident_cases', ['id' => false, 'primary_key' => ['incident_cases_id']])
            ->addColumn('incident_cases_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_case', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->create();

        //threat_names作成
        $this->table('threat_names', ['id' => false, 'primary_key' => ['threat_names_id']])
            ->addColumn('threat_names_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('threat_name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('threat_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        //テーブル削除
        $this->table('belongs')->drop()->save();
        $this->table('categories')->drop()->save();
        $this->table('duties')->drop()->save();
        $this->table('positions')->drop()->save();
        $this->table('ranks')->drop()->save();
        $this->table('shifts')->drop()->save();
        $this->table('statuses')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('management_prefixes')->drop()->save();
        $this->table('message_statuses')->drop()->save();
        $this->table('systems')->drop()->save();
        $this->table('bases')->drop()->save();
        $this->table('reports')->drop()->save();
        $this->table('positives')->drop()->save();
        $this->table('sec_levels')->drop()->save();
        $this->table('infection_routes')->drop()->save();
        $this->table('incident_cases')->drop()->save();
        $this->table('threat_names')->drop()->save();
    }
}
