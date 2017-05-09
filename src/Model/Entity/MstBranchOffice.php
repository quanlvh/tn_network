<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MstBranchOffice Entity
 *
 * @property string $id
 * @property int $company_code
 * @property int $branch_code
 * @property string $branch_name
 * @property string $zip_code
 * @property string $branch_addr
 * @property string $branch_tel
 * @property string $branch_fax
 * @property string $branch_mail
 * @property string $paid
 * @property string $responsible
 * @property \Cake\I18n\Time $availability_area_update
 * @property string $is_receive_fax
 * @property string $bank_code
 * @property string $bank_name
 * @property string $bank_branch_code
 * @property string $bank_branch_name
 * @property string $deposit_type
 * @property string $account_number
 * @property string $recipient_name
 * @property \Cake\I18n\Time $delete_at
 * @property string $delete_by
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class MstBranchOffice extends Entity
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
