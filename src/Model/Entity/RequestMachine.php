<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use PhpParser\PrettyPrinter\Standard;

/**
 * RequestMachine Entity
 *
 * @property int $id
 * @property string $request_no
 * @property string $entrypaln
 * @property string $oxygen_enricher_type1
 * @property string $is_humidifier1
 * @property string $oxygen_enricher_specification1
 * @property string $oxygen_enricher1
 * @property string $oxygen_enricher_name1
 * @property string $oxygen_enricher_type2
 * @property string $is_humidifier2
 * @property string $oxygen_enricher2
 * @property string $oxygen_enricher_specification2
 * @property string $oxygen_enricher_name2
 * @property string $liquid_oxygen_parent_device_type
 * @property string $is_child_device
 * @property string $child_device_type1
 * @property string $child_device_type2
 * @property string $unnecessary_reason
 * @property string $accessories
 * @property string $bomb_number
 * @property string $filling_pressure1
 * @property string $filling_pressure2
 * @property string $bomb_capacity1
 * @property string $bomb_capacity2
 * @property string $valve_type1
 * @property string $valve_type2
 * @property string $valve_type3
 * @property string $is_flow_controller
 * @property string $flow_controller_type1
 * @property string $flow_controller_name1
 * @property string $flow_controller_type2
 * @property string $flow_controller_name2
 * @property string $flow_controller_unnecessary_reason
 * @property string $flow_controller_bringing_name
 * @property string $is_respiration_tuner
 * @property string $respiration_tuner_type1
 * @property string $respiration_tuner_name1
 * @property string $respiration_tuner_type2
 * @property string $respiration_tuner_name2
 * @property string $respiration_tuner_unnecessary_reason
 * @property string $respiration_tuner_bringing_name
 * @property string $is_ventilator
 * @property string $ventilator_name
 * @property string $is_ventilator_joint
 * @property string $extention_hose_type
 * @property string $cannula_type
 * @property int $is_deleted
 * @property \Cake\I18n\Time $deleted_at
 * @property string $deleted_by
 * @property \Cake\I18n\Time $updated_at
 * @property string $updated_by
 * @property \Cake\I18n\Time $created_at
 * @property string $created_by
 */
class RequestMachine extends Entity
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
