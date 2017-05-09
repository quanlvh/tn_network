<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MstNewsFixture
 *
 */
class MstNewsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'news_code' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'news_title' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'news_detail' => ['type' => 'string', 'length' => 4000, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'news_update_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'for_member_flg' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'null' => true, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => '1:会員、0:非会員', 'precision' => null],
        'viewing_start_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'viewing_end_date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'is_deleted' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'deleted_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'deleted_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updated_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'updated_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_at' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'news_code' => ['type' => 'unique', 'columns' => ['news_code'], 'length' => []],
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
            'news_code' => 1,
            'news_title' => 'Lorem ipsum dolor sit amet',
            'news_detail' => 'Lorem ipsum dolor sit amet',
            'news_update_date' => '2017-03-24 19:58:50',
            'for_member_flg' => 'Lorem ipsum dolor sit ame',
            'viewing_start_date' => '2017-03-24 19:58:50',
            'viewing_end_date' => '2017-03-24 19:58:50',
            'is_deleted' => 1,
            'deleted_at' => '2017-03-24 19:58:50',
            'deleted_by' => '29e221aa-78ee-49cb-8eb5-f36eb7c6fbd6',
            'updated_at' => '2017-03-24 19:58:50',
            'updated_by' => '776f5a81-9616-462e-8399-e8d3efd3a763',
            'created_at' => '2017-03-24 19:58:50',
            'created_by' => 'f55c5002-f3c2-46a4-a5cb-9a12d189687f'
        ],
    ];
}
