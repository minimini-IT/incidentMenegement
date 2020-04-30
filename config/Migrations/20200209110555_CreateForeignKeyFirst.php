<?php
use Migrations\AbstractMigration;

class CreateForeignKeyFirst extends AbstractMigration
{
    public function up()
    {
        //incident_managements作成
        $this->table('incident_managements', ['id' => false, "primary_key" => ["incident_managements_id"]])
            ->addColumn('incident_managements_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('management_prefixes_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('incident_managements')
            ->addForeignKey(
                'management_prefixes_id',
                'management_prefixes',
                'management_prefixes_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //schedules作成
        $this->table('schedules', ['id' => false, 'primary_key' => ['schedules_id']])
            ->addColumn('schedules_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_managements_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('schedule_start_date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('schedule_end_date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('schedule_start_time', 'time', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('repe_flag', 'boolean', [
                'default' => false,
                'null' => false,
            ])
            ->addColumn('schedule', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('schedules')
            ->addForeignKey(
                'incident_managements_id',
                'incident_managements',
                'incident_managements_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //users作成
        $this->table('users', ['id' => false, 'primary_key' => ['users_id']])
            ->addColumn('users_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('belongs_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ranks_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('roles_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('username', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('user_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('delete_flag', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])->create();

        $this->table('users')
            ->addForeignKey(
                'belongs_id',
                'belongs',
                'belongs_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'ranks_id',
                'ranks',
                'ranks_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'roles_id',
                'roles',
                'roles_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //order_news作成
        $this->table('order_news', ['id' => false, 'primary_key' => ['order_news_id']])
            ->addColumn('order_news_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_managements_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('order_news_date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('order_news')
            ->addForeignKey(
                'incident_managements_id',
                'incident_managements',
                'incident_managements_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //workers作成
        //$this->table('workers', ['id' => false, 'primary_key' => ['date', 'users_id']])
        $this->table('workers', ['id' => false, 'primary_key' => ['workers_id']])
            ->addColumn('workers_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('date', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('positions_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('shifts_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('duties_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])->create();

        $this->table('workers')
            ->addForeignKey(
                'duties_id',
                'duties',
                'duties_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'positions_id',
                'positions',
                'positions_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'shifts_id',
                'shifts',
                'shifts_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
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

        //crew_sends作成
        $this->table('crew_sends', ['id' => false, 'primary_key' => ['crew_sends_id']])
            ->addColumn('crew_sends_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('categories_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_managements_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('statuses_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('period', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('crew_sends')
            ->addForeignKey(
                'incident_managements_id',
                'incident_managements',
                'incident_managements_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'categories_id',
                'categories',
                'categories_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'statuses_id',
                'statuses',
                'statuses_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
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

        //crew_send_comments作成
        $this->table('crew_send_comments', ['id' => false, 'primary_key' => ['crew_send_comments_id']])
            ->addColumn('crew_send_comments_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('crew_sends_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('crew_send_comments')
            ->addForeignKey(
                'crew_sends_id',
                'crew_sends',
                'crew_sends_id',
                [
                    'update' => 'CASCADE',
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

        //files作成
        $this->table('files', ['id' => false, 'primary_key' => ['files_id']])
            ->addColumn('files_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('crew_sends_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('file_size', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('unique_file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('files')
            ->addForeignKey(
                'crew_sends_id',
                'crew_sends',
                'crew_sends_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //comment_files作成
        $this->table('comment_files', ['id' => false, 'primary_key' => ['comment_files_id']])
            ->addColumn('comment_files_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('crew_send_comments_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('file_size', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('unique_file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('comment_files')
            ->addForeignKey(
                'crew_send_comments_id',
                'crew_send_comments',
                'crew_send_comments_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //message_bords作成
        $this->table('message_bords', ['id' => false, 'primary_key' => ['message_bords_id']])
            ->addColumn('message_bords_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_managements_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_statuses_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('choice', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('period', 'date', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('chronology_flag', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('private_message_flag', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('message_bords')
            ->addForeignKey(
                'incident_managements_id',
                'incident_managements',
                'incident_managements_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
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
            )
            ->addForeignKey(
                'message_statuses_id',
                'message_statuses',
                'message_statuses_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //message_destinations作成
        $this->table('message_destinations', ['id' => false, 'primary_key' => ['message_destinations_id']])
            ->addColumn('message_destinations_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_bords_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('users_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])->create();

        $this->table('message_destinations')
            ->addForeignKey(
                'message_bords_id',
                'message_bords',
                'message_bords_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'users_id',
                'users',
                'users_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //message_choices作成
        $this->table('message_choices', ['id' => false, 'primary_key' => ['message_choices_id']])
            ->addColumn('message_choices_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_bords_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('content', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('message_choices')
            ->addForeignKey(
                'message_bords_id',
                'message_bords',
                'message_bords_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //message_files作成
        $this->table('message_files', ['id' => false, 'primary_key' => ['message_files_id']])
            ->addColumn('message_files_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_bords_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('file_size', 'string', [
                'default' => null,
                'limit' => 16,
                'null' => false,
            ])
            ->addColumn('unique_file_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('message_files')
            ->addForeignKey(
                'message_bords_id',
                'message_bords',
                'message_bords_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //message_answers作成
        $this->table('message_answers', ['id' => false, 'primary_key' => ['message_answers_id']])
            ->addColumn('message_answers_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_destinations_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message_choices_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('message_answers')
            ->addForeignKey(
                'message_destinations_id',
                'message_destinations',
                'message_destinations_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'message_choices_id',
                'message_choices',
                'message_choices_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //units作成
        $this->table('units', ['id' => false, 'primary_key' => ['units_id']])
            ->addColumn('units_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bases_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('unit', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('unit_sort_number', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])->create();

        $this->table('units')
            ->addForeignKey(
                'bases_id',
                'bases',
                'bases_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //risk_detections作成
        $this->table('risk_detections', ['id' => false, 'primary_key' => ['risk_detections_id']])
            ->addColumn('risk_detections_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_managements_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('occurrence_datetime', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('response_start_time', 'datetime', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('response_end_time', 'datetime', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('systems_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bases_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('units_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('statuses_id', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('reports_id', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('positives_id', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sec_levels_id', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('incident_cases_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('infection_routes_id', 'integer', [
                'default' => 4,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sim_live_flag', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('samari_flag', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('attachment', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('link', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'null' => true,
            ])->create();

        $this->table('risk_detections')
            ->addForeignKey(
                'incident_managements_id',
                'incident_managements',
                'incident_managements_id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'systems_id',
                'systems',
                'systems_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'bases_id',
                'bases',
                'bases_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'units_id',
                'units',
                'units_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'statuses_id',
                'statuses',
                'statuses_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'reports_id',
                'reports',
                'reports_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'positives_id',
                'positives',
                'positives_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'infection_routes_id',
                'infection_routes',
                'infection_routes_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'sec_levels_id',
                'sec_levels',
                'sec_levels_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //suspicious_links作成
        $this->table('suspicious_links', ['id' => false, 'primary_key' => ['suspicious_links_id']])
            ->addColumn('suspicious_links_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('risk_detections_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('link', 'text', [
                'default' => null,
                'null' => false,
            ])->create();

        $this->table('suspicious_links')
            ->addForeignKey(
                'risk_detections_id',
                'risk_detections',
                'risk_detections_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )->update();

        //suspicious_destination_addresses作成
        $this->table('suspicious_destination_addresses', ['id' => false, 'primary_key' => ['suspicious_destination_addresses_id']])
            ->addColumn('suspicious_destination_addresses_id', 'integer', [
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
            ->addColumn('destination_address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('suspicious_destination_addresses')
            ->addForeignKey(
                'risk_detections_id',
                'risk_detections',
                'risk_detections_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();

        //suspicious_sender_addresses作成
        $this->table('suspicious_sender_addresses', ['id' => false, 'primary_key' => ['suspicious_sender_addresses_id']])
            ->addColumn('suspicious_sender_addresses_id', 'integer', [
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
            ->addColumn('sender_address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])->create();

        $this->table('suspicious_sender_addresses')
            ->addForeignKey(
                'risk_detections_id',
                'risk_detections',
                'risk_detections_id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )->update();
    }

    //downはupの逆順で削除していく
    public function down()
    {
        //suspicious_sender_addresses削除
        $this->table('suspicious_sender_addresses')
            ->dropForeignKey('risk_detections_id')
            ->save();
        $this->table('suspicious_sender_addresses')->drop()->save();

        //suspicious_destination_addresses削除
        $this->table('suspicious_destination_addresses')
            ->dropForeignKey('risk_detections_id')
            ->save();
        $this->table('suspicious_destination_addresses')->drop()->save();

        //suspicious_links削除
        $this->table('suspicious_links')
            ->dropForeignKey('risk_detections_id')
            ->save();
        $this->table('suspicious_links')->drop()->save();

        //risk_detections削除
        $this->table('risk_detections')
            ->dropForeignKey('incident_managements_id')
            ->dropForeignKey('systems_id')
            ->dropForeignKey('bases_id')
            ->dropForeignKey('units_id')
            ->dropForeignKey('statuses_id')
            ->dropForeignKey('reports_id')
            ->dropForeignKey('positives_id')
            ->dropForeignKey('sec_levels_id')
            ->save();
        $this->table('risk_detections')->drop()->save();

        //units削除
        $this->table('units')
            ->dropForeignKey('bases_id')
            ->save();
        $this->table('units')->drop()->save();

        //message_answers削除
        $this->table('message_answers')
            ->dropForeignKey('message_destinations_id')
            ->dropForeignKey('message_choices_id')
            ->save();
        $this->table('message_answers')->drop()->save();

        //message_files
        $this->table('message_files')
            ->dropForeignKey('message_bords_id')
            ->save();
        $this->table('message_files')->drop()->save();

        //message_chices削除
        $this->table('message_choices')
            ->dropForeignKey('message_bords_id')
            ->save();
        $this->table('message_choices')->drop()->save();

        //message_destinations削除
        $this->table('message_destinations')
            ->dropForeignKey('message_bords_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('message_destinations')->drop()->save();

        //message_bords削除
        $this->table('message_bords')
            ->dropForeignKey('incident_managements_id')
            ->dropForeignKey('message_statuses_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('message_bords')->drop()->save();

        //comment_files削除
        $this->table('comment_files')
            ->dropForeignKey('crew_send_comments_id')
            ->save();
        $this->table('comment_files')->drop()->save();

        //files削除
        $this->table('files')
            ->dropForeignKey('crew_sends_id')
            ->save();
        $this->table('files')->drop()->save();

        //crew_send_comments削除
        $this->table('crew_send_comments')
            ->dropForeignKey('crew_sends_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('crew_send_comments')->drop()->save();

        //crew_sends削除
        $this->table('crew_sends')
            ->dropForeignKey('incident_managements_id')
            ->dropForeignKey('categories_id')
            ->dropForeignKey('statuses_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('crew_sends')->drop()->save();

        //workers削除
        $this->table('workers')
            ->dropForeignKey('duties_id')
            ->dropForeignKey('positions_id')
            ->dropForeignKey('shifts_id')
            ->dropForeignKey('users_id')
            ->save();
        $this->table('workers')->drop()->save();

        //order_news削除
        $this->table('order_news')
            ->dropForeignKey('incident_managements_id')
            ->save();
        $this->table('order_news')->drop()->save();

        //users削除
        $this->table('users')
            ->dropForeignKey('belongs_id')
            ->dropForeignKey('ranks_id')
            ->dropForeignKey('roles_id')
            ->save();
        $this->table('users')->drop()->save();

        //schedules削除
        $this->table('schedules')
            ->dropForeignKey('incident_managements_id')
            ->save();
        $this->table('schedules')->drop()->save();

        //incident_managements削除
        $this->table('incident_managements')
            ->dropForeignKey('management_prefixes_id')
            ->save();
        $this->table('incident_managements')->drop()->save();
    }
}
