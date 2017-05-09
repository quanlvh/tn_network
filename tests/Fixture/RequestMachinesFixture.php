<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestMachinesFixture
 *
 */
class RequestMachinesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'request_no' => ['type' => 'string', 'fixed' => true, 'length' => 12, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'oxygen_enricher_type1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：３Lタイプ、2：５Lタイプ、3：7Lタイプ', 'precision' => null],
        'is_humidifier1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：加湿器あり、0：加湿器なし', 'precision' => null],
        'oxygen_enricher_specification1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '2：他メーカー、1：大陽日酸機器、0:指定なし', 'precision' => null],
        'oxygen_enricher_name1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'oxygen_enricher_type2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：３Lタイプ、2：５Lタイプ、3：7Lタイプ', 'precision' => null],
        'is_humidifier2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：加湿器あり、0：加湿器なし', 'precision' => null],
        'oxygen_enricher_specification2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '2：他メーカー、1：大陽日酸機器、0:指定なし', 'precision' => null],
        'oxygen_enricher_name2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'liquid_oxygen_parent_device_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：加湿器あり(フローコントローラーバルブ付き)、2：加湿器あり(フローコントローラーバルブ・コネクタ付)、3：親機からの吸入なし(フローコントローラーバルブなし)', 'precision' => null],
        'is_child_device' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：必要、0：不要', 'precision' => null],
        'child_device_type1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：ヘリオスH300、2：ほたる、0：特定機種なし', 'precision' => null],
        'child_device_type2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：ヘリオスH300、2：ほたる、0：特定機種なし', 'precision' => null],
        'unnecessary_reason' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：ヘリオスH300持参、2：ほたる持参、3：子機を使用しない', 'precision' => null],
        'accessories' => ['type' => 'string', 'fixed' => true, 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：ローラーベース、2：デュアルカニューラ(小児)、3：デュアルカニューラ(標準)、4：ソルターラボカニューラ(小児)、5：ソルターラボカニューラ(標準)、6：ほたる用着脱ユニット、7：ほたる用タッチワンデュオ　　必要なものをカンマ区切りでつなげる', 'precision' => null],
        'bomb_number' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'filling_pressure' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：14.7MPa、2：19.6MPa', 'precision' => null],
        'bomb_capacity' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：1L、2：2L、3：2.8L', 'precision' => null],
        'valve_type1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'valve_type2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'valve_type3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_flow_controller' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：必要、0：不要', 'precision' => null],
        'flow_controller_type1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：機種指定、0：機種指定なし', 'precision' => null],
        'flow_controller_name1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'flow_controller_type2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：機種指定、0：機種指定なし', 'precision' => null],
        'flow_controller_name2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'flow_controller_unnecessary_reason' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：持参、2：ボンベ一体型・同調器一体型のため、0：使用しない', 'precision' => null],
        'flow_controller_bringing_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_respiration_tuner' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：必要、0：不要', 'precision' => null],
        'respiration_tuner_type1' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：機種指定、0：機種指定なし', 'precision' => null],
        'respiration_tuner_name1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'respiration_tuner_type2' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：機種指定、0：機種指定なし', 'precision' => null],
        'respiration_tuner_name2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'respiration_tuner_unnecessary_reason' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：持参、0：使用しない', 'precision' => null],
        'respiration_tuner_bringing_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_ventilator' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：併用する、0：併用しない', 'precision' => null],
        'ventilator_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_ventilator_joint' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：あり、0：なし', 'precision' => null],
        'extention_hose_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：3m、2：5m、3：7m、0：なし', 'precision' => null],
        'cannula_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：S、2：M、3：L、0：なし', 'precision' => null],
        'is_deleted' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'deleted_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updated_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updated_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'request_no' => 'Lorem ipsu',
            'oxygen_enricher_type1' => 'Lorem ipsum dolor sit ame',
            'is_humidifier1' => 'Lorem ipsum dolor sit ame',
            'oxygen_enricher_specification1' => 'Lorem ipsum dolor sit ame',
            'oxygen_enricher_name1' => 'Lorem ipsum dolor sit amet',
            'oxygen_enricher_type2' => 'Lorem ipsum dolor sit ame',
            'is_humidifier2' => 'Lorem ipsum dolor sit ame',
            'oxygen_enricher_specification2' => 'Lorem ipsum dolor sit ame',
            'oxygen_enricher_name2' => 'Lorem ipsum dolor sit amet',
            'liquid_oxygen_parent_device_type' => 'Lorem ipsum dolor sit ame',
            'is_child_device' => 'Lorem ipsum dolor sit ame',
            'child_device_type1' => 'Lorem ipsum dolor sit ame',
            'child_device_type2' => 'Lorem ipsum dolor sit ame',
            'unnecessary_reason' => 'Lorem ipsum dolor sit ame',
            'accessories' => 'Lorem ipsum d',
            'bomb_number' => 1,
            'filling_pressure' => 'Lorem ipsum dolor sit ame',
            'bomb_capacity' => 'Lorem ipsum dolor sit ame',
            'valve_type1' => 'Lorem ipsum dolor sit amet',
            'valve_type2' => 'Lorem ipsum dolor sit amet',
            'valve_type3' => 'Lorem ipsum dolor sit amet',
            'is_flow_controller' => 'Lorem ipsum dolor sit ame',
            'flow_controller_type1' => 'Lorem ipsum dolor sit ame',
            'flow_controller_name1' => 'Lorem ipsum dolor sit amet',
            'flow_controller_type2' => 'Lorem ipsum dolor sit ame',
            'flow_controller_name2' => 'Lorem ipsum dolor sit amet',
            'flow_controller_unnecessary_reason' => 'Lorem ipsum dolor sit ame',
            'flow_controller_bringing_name' => 'Lorem ipsum dolor sit amet',
            'is_respiration_tuner' => 'Lorem ipsum dolor sit ame',
            'respiration_tuner_type1' => 'Lorem ipsum dolor sit ame',
            'respiration_tuner_name1' => 'Lorem ipsum dolor sit amet',
            'respiration_tuner_type2' => 'Lorem ipsum dolor sit ame',
            'respiration_tuner_name2' => 'Lorem ipsum dolor sit amet',
            'respiration_tuner_unnecessary_reason' => 'Lorem ipsum dolor sit ame',
            'respiration_tuner_bringing_name' => 'Lorem ipsum dolor sit amet',
            'is_ventilator' => 'Lorem ipsum dolor sit ame',
            'ventilator_name' => 'Lorem ipsum dolor sit amet',
            'is_ventilator_joint' => 'Lorem ipsum dolor sit ame',
            'extention_hose_type' => 'Lorem ipsum dolor sit ame',
            'cannula_type' => 'Lorem ipsum dolor sit ame',
            'is_deleted' => 1,
            'deleted_at' => '2017-01-24 12:40:14',
            'deleted_by' => '655b3d72-ab0e-4c69-8748-69162d24c117',
            'updated_at' => '2017-01-24 12:40:14',
            'updated_by' => '8357311f-58c4-4e16-bc9c-7707d48cfd0c',
            'created_at' => '2017-01-24 12:40:14',
            'created_by' => '99751734-7a66-4cb8-a27c-00085643b08e'
        ],
    ];
}
