<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property string $request_no
 * @property \Cake\I18n\Time $offer_date
 * @property int $status
 * @property string $user_kana
 * @property string $user_name
 * @property string $user_addr
 * @property string $user_tel
 * @property string $user_mobile
 * @property string $lodging_place_name
 * @property string $lodging_place_addr
 * @property string $lodging_place_tel
 * @property string $lodging_place_staff_name
 * @property string $contractor_receive_addr
 * @property string $travel_agent_name
 * @property string $subscriber_name
 * @property string $is_acceptable
 * @property string $is_past_setting
 * @property string $past_setting_year
 * @property string $past_setting_month
 * @property \Cake\I18n\Time $stay_from_date
 * @property \Cake\I18n\Time $stay_to_date
 * @property \Cake\I18n\Time $pre_instalation_date
 * @property string $pre_instalation_time
 * @property \Cake\I18n\Time $pick_up_date
 * @property string $pick_up_time
 * @property string $person_in_charge
 * @property \Cake\I18n\Time $request_for_setting_date
 * @property string $is_before_setting
 * @property string $is_after_collectable
 * @property string $request_branch_code
 * @property string $request_branch_staff_name
 * @property string $request_company_code
 * @property string $request_company_staff_name
 * @property bool $is_approval
 * @property string $hospital_name
 * @property string $doctor_name
 * @property string $is_ventilator
 * @property string $ventilator_name
 * @property string $is_ventilator_joint
 * @property string $at_rest
 * @property string $rest_hour
 * @property string $during_exercise
 * @property string $exercise_hour
 * @property string $at_bedtime
 * @property string $bedtime_hour
 * @property string $request_message
 * @property string $temporary_saving_flg
 * @property string $cancel_flg
 * @property string $machine_type
 * @property string $contractor_branch_code
 * @property string $contractor_branch_staff_name
 * @property string $contractor_company_code
 * @property float $request_charge
 * @property float $request_charge_tax
 * @property float $contractor_charge
 * @property float $contractor_charge_tax
 * @property float $contractor_payment
 * @property float $contractor_payment_tax
 * @property float $executive_commission
 * @property float $executive_commission_tax
 * @property string $is_charge_completed
 * @property string $is_payment_completed
 * @property string $is_bill_received
 * @property string $is_bill_receive_completed
 * @property \Cake\I18n\Time $bill_receive_date
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class Request extends Entity
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
