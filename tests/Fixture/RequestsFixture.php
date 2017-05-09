<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestsFixture
 *
 */
class RequestsFixture extends TestFixture
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
        'offer_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_kana' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_addr' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_tel' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'user_mobile' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lodging_place_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lodging_place_addr' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lodging_place_tel' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lodging_place_staff_name' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'travel_agent_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'subscriber_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_acceptable' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：済、0：未', 'precision' => null],
        'is_past_setting' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：有、0：無', 'precision' => null],
        'past_setting_year' => ['type' => 'string', 'fixed' => true, 'length' => 4, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'past_setting_month' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'stay_from_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'stay_to_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'is_before_setting' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：可、0：否、2:可(フロント預かり)', 'precision' => null],
        'is_after_collectable' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：可、0：否、2:可(フロント預かり)', 'precision' => null],
        'request_branch_code' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'request_branch_staff_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'request_company_code' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'request_company_staff_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'is_approval' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '1：済、0：未', 'precision' => null],
        'hospital_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'doctor_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'request_message' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'temporary_saving_flg' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1:一時保存中、0:登録完了', 'precision' => null],
        'cancel_flg' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1:キャンセル、0:', 'precision' => null],
        'machine_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：酸素濃縮器、2：液体酸素、3：ボンベ、4：酸素濃縮器+ボンベ、5：液体酸素+ボンベ', 'precision' => null],
        'contractor_branch_code' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'contractor_branch_staff_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'contractor_company_code' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'request_charge' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'contractor_charge' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'contractor_payment' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'executive_commission' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'is_charge_completed' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'is_payment_completed' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'is_bill_received' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'is_bill_receive_completed' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bill_receive_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
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
            'offer_date' => '2017-02-14 03:19:24',
            'status' => 1,
            'user_kana' => 'Lorem ipsum dolor sit amet',
            'user_name' => 'Lorem ipsum dolor sit amet',
            'user_addr' => 'Lorem ipsum dolor sit amet',
            'user_tel' => 'Lorem ipsum ',
            'user_mobile' => 'Lorem ipsum ',
            'lodging_place_name' => 'Lorem ipsum dolor sit amet',
            'lodging_place_addr' => 'Lorem ipsum dolor sit amet',
            'lodging_place_tel' => 'Lorem ipsum ',
            'lodging_place_staff_name' => 'Lorem ipsum ',
            'travel_agent_name' => 'Lorem ipsum dolor sit amet',
            'subscriber_name' => 'Lorem ipsum dolor sit amet',
            'is_acceptable' => 'Lorem ipsum dolor sit ame',
            'is_past_setting' => 'Lorem ipsum dolor sit ame',
            'past_setting_year' => 'Lo',
            'past_setting_month' => '',
            'stay_from_date' => '2017-02-14',
            'stay_to_date' => '2017-02-14',
            'is_before_setting' => 'Lorem ipsum dolor sit ame',
            'is_after_collectable' => 'Lorem ipsum dolor sit ame',
            'request_branch_code' => 'Lorem ip',
            'request_branch_staff_name' => 'Lorem ipsum dolor sit amet',
            'request_company_code' => 'Lorem ip',
            'request_company_staff_name' => 'Lorem ipsum dolor sit amet',
            'is_approval' => 1,
            'hospital_name' => 'Lorem ipsum dolor sit amet',
            'doctor_name' => 'Lorem ipsum dolor sit amet',
            'request_message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'temporary_saving_flg' => 'Lorem ipsum dolor sit ame',
            'cancel_flg' => 'Lorem ipsum dolor sit ame',
            'machine_type' => 'Lorem ipsum dolor sit ame',
            'contractor_branch_code' => 'Lorem ip',
            'contractor_branch_staff_name' => 'Lorem ipsum dolor sit amet',
            'contractor_company_code' => 'Lorem ip',
            'request_charge' => 1.5,
            'contractor_charge' => 1.5,
            'contractor_payment' => 1.5,
            'executive_commission' => 1.5,
            'is_charge_completed' => 'Lorem ipsum dolor sit ame',
            'is_payment_completed' => 'Lorem ipsum dolor sit ame',
            'is_bill_received' => 'Lorem ipsum dolor sit ame',
            'is_bill_receive_completed' => 'Lorem ipsum dolor sit ame',
            'bill_receive_date' => '2017-02-14 03:19:24'
        ],
    ];
}
