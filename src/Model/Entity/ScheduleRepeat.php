<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ScheduleRepeat Entity
 *
 * @property int $schedule_repeats_id
 * @property int|null $repeats_id
 * @property int|null $schedules_id
 *
 * @property \App\Model\Entity\Repeat $repeat
 * @property \App\Model\Entity\Schedule $schedule
 */
class ScheduleRepeat extends Entity
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
        'repeats_id' => true,
        'schedules_id' => true,
        'repeat' => true,
        'schedule' => true
    ];
}
