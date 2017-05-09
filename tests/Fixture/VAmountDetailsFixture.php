<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VAmountDetailsFixture
 *
 */
class VAmountDetailsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'request_no' => ['type' => 'string', 'fixed' => true, 'length' => 12, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'data_kbn' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bank_code' => ['type' => 'string', 'fixed' => true, 'length' => 4, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_name' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bank_branch_code' => ['type' => 'string', 'fixed' => true, 'length' => 3, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'bank_branch_name' => ['type' => 'string', 'length' => 15, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'deposit_type' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'account_number' => ['type' => 'string', 'fixed' => true, 'length' => 7, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'recipient_name' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'amount' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'dummy_code' => ['type' => 'string', 'fixed' => true, 'length' => 0, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'dummy_notes' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dummy_notes2' => ['type' => 'string', 'fixed' => true, 'length' => 0, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'transfer_kbn' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'edi' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_options' => [
            'engine' => null,
            'collation' => null
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
            'request_no' => 'Lorem ipsu',
            'data_kbn' => 'Lorem ipsum dolor sit ame',
            'bank_code' => 'Lo',
            'bank_name' => 'Lorem ipsum d',
            'bank_branch_code' => 'L',
            'bank_branch_name' => 'Lorem ipsum d',
            'deposit_type' => 'Lorem ipsum dolor sit ame',
            'account_number' => 'Lorem',
            'recipient_name' => 'Lorem ipsum dolor sit amet',
            'amount' => 1.5,
            'dummy_code' => 'Lorem ipsum dolor sit amet',
            'dummy_notes' => 'Lorem i',
            'dummy_notes2' => 'Lorem ipsum dolor sit amet',
            'transfer_kbn' => 'Lorem ipsum dolor sit ame',
            'edi' => 'Lorem ipsum dolor sit ame'
        ],
    ];
}
