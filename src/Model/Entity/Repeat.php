<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Repeat Entity
 *
 * @property int $repeats_id
 * @property string $repeat
 * @property int|null $repeat_sort_number
 */
class Repeat extends Entity
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
        'repeat' => true,
        'repeat_sort_number' => true
    ];
}
