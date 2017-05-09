<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MstCompany Entity
 *
 * @property string $id
 * @property string $company_code
 * @property string $branch_code
 * @property string $branch_name
 * @property string $branch_addr
 * @property string $branch_tel
 * @property string $branch_mail
 */
class MstBranch extends Entity
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
