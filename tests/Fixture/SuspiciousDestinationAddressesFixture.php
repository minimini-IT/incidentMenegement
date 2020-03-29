<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SuspiciousDestinationAddressesFixture
 */
class SuspiciousDestinationAddressesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'suspicious_destination_addresses_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'risk_detections_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'destination_address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'risk_detections_id' => ['type' => 'index', 'columns' => ['risk_detections_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['suspicious_destination_addresses_id'], 'length' => []],
            'suspicious_destination_addresses_ibfk_1' => ['type' => 'foreign', 'columns' => ['risk_detections_id'], 'references' => ['risk_detections', 'risk_detections_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'suspicious_destination_addresses_id' => 1,
                'risk_detections_id' => 1,
                'destination_address' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
