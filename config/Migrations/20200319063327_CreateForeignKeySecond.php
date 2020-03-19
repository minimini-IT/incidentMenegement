<?php
use Migrations\AbstractMigration;

class CreateForeignKeySecond extends AbstractMigration
{
    public function up()
    {
        //incident_chronology作成
        $this->table('incident_chronologies', ['id' => false, 'primary_key' => ['incident_chronologies_id']])
            ->addColumn('incident_chronologies_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('risk_detections_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('reference', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->create();

        $this->table('incident_chronologies')
            ->addForeignKey(
                'risk_detections_id',
                'risk_detections',
                'risk_detections_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'users_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();
    }

    public function down()
    {
        //incident_chronologies削除
        $this->table('incident_chronologies')
            ->dropForeignKey('risk_detections_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('incident_chronologies')->drop()->save();
    }
}
