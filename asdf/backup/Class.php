<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Class Entity
 *
 * @property int $classes_id
 * @property string $class
 * @property int $class_sort_number
 *
 * @property \App\Model\Entity\User[] $users
 */
class Class extends Entity
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
        'class' => true,
        'class_sort_number' => true,
        'users' => true
    ];
}
