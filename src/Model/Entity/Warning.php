<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Warning Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $source
 * @property bool $telegram
 * @property string $email_list
 * @property \Cake\I18n\FrozenTime $time
 */
class Warning extends Entity
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
        'name' => true,
        'description' => true,
        'source' => true,
        'telegram' => true,
        'email_list' => true,
        'time' => true,
    ];
}
