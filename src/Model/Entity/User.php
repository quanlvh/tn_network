<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $user_id
 * @property string $password
 * @property \Cake\I18n\Time $password_update_date
 * @property string $is_lock
 * @property string $user_role
 * @property string $mail_addr_1
 * @property string $mail_addr_2
 * @property string $company_code
 * @property string $company_name
 * @property string $branch_code
 * @property string $branch_name
 * @property string $position_of_user
 * @property string $user_name
 * @property string $applying
 * @property string $affiliation
 * @property string $position
 * @property string $handle
 * @property int $user_policy_ver
 * @property int $approval_pending
 * @property int $is_deleted
 * @property \Cake\I18n\Time $deleted_at
 * @property string $deleted_by
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 *
 * @property \App\Model\Entity\User[] $users
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
        '*' => true,
        'id' => false
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
