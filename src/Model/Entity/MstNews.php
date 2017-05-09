<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MstNews Entity
 *
 * @property int $id
 * @property int $news_code
 * @property string $news_title
 * @property string $news_detail
 * @property \Cake\I18n\Time $news_update_date
 * @property string $for_member_flg
 * @property \Cake\I18n\Time $viewing_start_date
 * @property \Cake\I18n\Time $viewing_end_date
 * @property int $is_deleted
 * @property \Cake\I18n\Time $deleted_at
 * @property string $deleted_by
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class MstNews extends Entity
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
        '*' => true,
        'id' => false
    ];
}
