<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MstUnitPricesFixture
 *
 */
class MstUnitPricesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'unit_price_type_code' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1：旅行申し込み、2：事務局手数料、3：追加手配、4：機器手配', 'precision' => null],
        'unit_price_detail_code' => ['type' => 'string', 'fixed' => true, 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'unit_price_detail_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'unit_price' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '単価'],
        'is_request_charge' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '0：該当しない、1：該当する', 'precision' => null],
        'is_contractor_payment' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '0：該当しない、1：該当する', 'precision' => null],
        'is_contractor_charge' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '0：該当しない、1：該当する', 'precision' => null],
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
            'unit_price_type_code' => 'Lorem ipsum dolor sit ame',
            'unit_price_detail_code' => '',
            'unit_price_detail_name' => 'Lorem ipsum dolor sit amet',
            'unit_price' => 1.5,
            'is_request_charge' => 'Lorem ipsum dolor sit ame',
            'is_contractor_payment' => 'Lorem ipsum dolor sit ame',
            'is_contractor_charge' => 'Lorem ipsum dolor sit ame',
            'updated_at' => '2017-02-20 18:26:48',
            'updated_by' => 'ffc0ea95-b718-4c70-a915-9c2ac5946bfc',
            'created_at' => '2017-02-20 18:26:48',
            'created_by' => 'f4c19528-d86c-409b-9cd1-77f244ac932a'
        ],
    ];
}
