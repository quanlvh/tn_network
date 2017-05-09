<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LoanRequestMachine Entity
 *
 * @property int $id
 * @property string $request_no
 * @property string $request_company_code
 * @property string $request_branch_code
 * @property string $oxygen_enricher_type
 * @property string $is_humidifier
 * @property string $oxygen_enricher_specification
 * @property string $oxygen_enricher_name
 * @property string $liquid_oxygen_parent_device_type
 * @property string $is_child_device
 * @property string $child_device_type
 * @property string $unnecessary_reason
 * @property string $accessories
 * @property bool $bomb_number
 * @property string $filling_pressure
 * @property string $bomb_capacity
 * @property string $valve_type
 * @property string $is_flow_controller
 * @property string $flow_controller_type
 * @property string $flow_controller_name
 * @property string $is_respiration_tuner
 * @property string $respiration_tuner_type
 * @property string $respiration_tuner_name
 * @property string $is_ventilator
 * @property string $ventilator_name
 * @property string $is_ventilator_joint
 * @property string $extention_hose_type
 * @property string $cannula_type
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class LoanRequestMachine extends Entity
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
