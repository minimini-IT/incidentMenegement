<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property int $class_id
 * @property int $belong_id
 * @property string $password
 * @property int $user_sort_number
 *
 * @property \App\Model\Entity\Class $class
 * @property \App\Model\Entity\Belong $belong
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'class_id' => true,
        'belong_id' => true,
        'password' => true,
        'user_sort_number' => true,
        'class' => true,
        'belong' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
