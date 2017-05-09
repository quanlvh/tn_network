<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StatusFlow Entity
 *
 * @property int $id
 * @property string $request_no
 * @property int $sequence_no
 * @property int $status_code
 * @property \Cake\I18n\Time $expected_date
 * @property \Cake\I18n\Time $completion_date
 * @property string $remarks
 * @property string $delivery_company_name
 * @property string $inquiry_slip_no
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class StatusFlow extends Entity
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
    ];
}
