<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MstBranchOfficesFixture
 *
 */
class MstBranchOfficesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'company_code' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'branch_code' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'branch_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'zip_code' => ['type' => 'string', 'length' => 8, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'branch_addr' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'branch_tel' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'branch_fax' => ['type' => 'string', 'length' => 14, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'branch_mail' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'paid' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '1: 登録、0:未登録', 'precision' => null],
        'responsible' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'availability_area_update' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'is_receive_fax' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_code' => ['type' => 'string', 'fixed' => true, 'length' => 4, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_name' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bank_branch_code' => ['type' => 'string', 'fixed' => true, 'length' => 3, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_branch_name' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'deposit_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'account_number' => ['type' => 'string', 'fixed' => true, 'length' => 7, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'recipient_name' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'delete_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'delete_by' => ['type' => 'string', 'length' => 36, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'updated_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updated_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'branch_code' => ['type' => 'unique', 'columns' => ['branch_code'], 'length' => []],
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
            'id' => 'cb7d3313-759c-49f7-b8e8-2259bc5c9e33',
            'company_code' => 1,
            'branch_code' => 1,
            'branch_name' => 'Lorem ipsum dolor sit amet',
            'zip_code' => 'Lorem ',
            'branch_addr' => 'Lorem ipsum dolor sit amet',
            'branch_tel' => 'Lorem ipsum ',
            'branch_fax' => 'Lorem ipsum ',
            'branch_mail' => 'Lorem ipsum dolor sit amet',
            'paid' => 'Lorem ipsum dolor sit ame',
            'responsible' => 'Lorem ipsum dolor sit amet',
            'availability_area_update' => '2017-03-08 19:35:43',
            'is_receive_fax' => 'Lorem ipsum dolor sit ame',
            'bank_code' => 'Lo',
            'bank_name' => 'Lorem ipsum d',
            'bank_branch_code' => 'L',
            'bank_branch_name' => 'Lorem ipsum d',
            'deposit_type' => 'Lorem ipsum dolor sit ame',
            'account_number' => 'Lorem',
            'recipient_name' => 'Lorem ipsum dolor sit amet',
            'delete_at' => '2017-03-08 19:35:43',
            'delete_by' => 'Lorem ipsum dolor sit amet',
            'updated_at' => '2017-03-08 19:35:43',
            'updated_by' => '0fd047ee-2a0a-4c95-9d42-89afeed50d16',
            'created_at' => '2017-03-08 19:35:43',
            'created_by' => '85963298-06d2-4e3f-8647-42ec57da0d80'
        ],
    ];
}
