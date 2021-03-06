<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MstUnitPrice Entity
 *
 * @property int $id
 * @property string $unit_price_type_code
 * @property string $unit_price_detail_code
 * @property string $unit_price_detail_name
 * @property float $unit_price
 * @property string $is_request_charge
 * @property string $is_contractor_payment
 * @property string $is_contractor_charge
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class MstUnitPrice extends Entity
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
