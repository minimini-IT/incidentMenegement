<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RiskDetectionsFixture
 */
class RiskDetectionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'risk_detections_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'incident_managements_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'occurrence_datetime' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'response_start_time' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'response_end_time' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'systems_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bases_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'units_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'statuses_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'reports_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positives_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sec_levels_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'incident_cases_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'infection_routes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '4', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sim_live_flag' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'samari_flag' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'attachment' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'comment' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'incident_managements_id' => ['type' => 'index', 'columns' => ['incident_managements_id'], 'length' => []],
            'systems_id' => ['type' => 'index', 'columns' => ['systems_id'], 'length' => []],
            'bases_id' => ['type' => 'index', 'columns' => ['bases_id'], 'length' => []],
            'units_id' => ['type' => 'index', 'columns' => ['units_id'], 'length' => []],
            'statuses_id' => ['type' => 'index', 'columns' => ['statuses_id'], 'length' => []],
            'reports_id' => ['type' => 'index', 'columns' => ['reports_id'], 'length' => []],
            'positives_id' => ['type' => 'index', 'columns' => ['positives_id'], 'length' => []],
            'infection_routes_id' => ['type' => 'index', 'columns' => ['infection_routes_id'], 'length' => []],
            'sec_levels_id' => ['type' => 'index', 'columns' => ['sec_levels_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['risk_detections_id'], 'length' => []],
            'risk_detections_ibfk_1' => ['type' => 'foreign', 'columns' => ['incident_managements_id'], 'references' => ['incident_managements', 'incident_managements_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_2' => ['type' => 'foreign', 'columns' => ['systems_id'], 'references' => ['systems', 'systems_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_3' => ['type' => 'foreign', 'columns' => ['bases_id'], 'references' => ['bases', 'bases_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_4' => ['type' => 'foreign', 'columns' => ['units_id'], 'references' => ['units', 'units_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_5' => ['type' => 'foreign', 'columns' => ['statuses_id'], 'references' => ['statuses', 'statuses_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_6' => ['type' => 'foreign', 'columns' => ['reports_id'], 'references' => ['reports', 'reports_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_7' => ['type' => 'foreign', 'columns' => ['positives_id'], 'references' => ['positives', 'positives_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_8' => ['type' => 'foreign', 'columns' => ['infection_routes_id'], 'references' => ['infection_routes', 'infection_routes_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'risk_detections_ibfk_9' => ['type' => 'foreign', 'columns' => ['sec_levels_id'], 'references' => ['sec_levels', 'sec_levels_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'risk_detections_id' => 1,
                'incident_managements_id' => 1,
                'occurrence_datetime' => '2020-03-19 13:33:16',
                'response_start_time' => '2020-03-19 13:33:16',
                'response_end_time' => '2020-03-19 13:33:16',
                'systems_id' => 1,
                'bases_id' => 1,
                'units_id' => 1,
                'statuses_id' => 1,
                'reports_id' => 1,
                'positives_id' => 1,
                'sec_levels_id' => 1,
                'incident_cases_id' => 1,
                'infection_routes_id' => 1,
                'sim_live_flag' => 1,
                'samari_flag' => 1,
                'attachment' => 1,
                'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
            ],
        ];
        parent::init();
    }
}
