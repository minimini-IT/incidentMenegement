<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MessageChronologyFile Entity
 *
 * @property int $message_chronology_files_id
 * @property int $message_bord_chronologies_id
 * @property string $file_name
 * @property string $file_size
 * @property string $unique_file_name
 *
 * @property \App\Model\Entity\MessageBordChronology $message_bord_chronology
 */
class MessageChronologyFile extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'message_bord_chronologies_id' => true,
        'file_name' => true,
        'file_size' => true,
        'unique_file_name' => true,
        'message_bord_chronology' => true
    ];
}
