<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MstUserPolicy Entity
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $rank
 * @property int $is_deleted
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class MstUserPolicy extends Entity
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
        '*' => true
    ];
}
