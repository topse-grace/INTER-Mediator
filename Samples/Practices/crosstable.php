<?php
//todo ## Set the valid path to the file 'INTER-Mediator.php'
require_once(dirname(__FILE__) . '/../../INTER-Mediator.php');

IM_Entry(
    array(
        array(
            'name' => 'item',
            'table' => 'dummy',
            'view' => 'item_master',
            'records' => 100000,
            'maxrecords' => 100000,
            'key' => 'id',
            'query' => array(
                array('field' => 'id', 'value' => 25, 'operator' => '>='),
                array('field' => 'id', 'value' => 35, 'operator' => '<='),
            ),
            'sort' => array(array('field' => 'id', 'direction' => 'asc')),
        ),
        array(
            'name' => 'customer',
            'table' => 'dummy',
            'view' => 'customer',
            'records' => 100000,
            'maxrecords' => 100000,
            'key' => 'id',
            'query' => array(
                array('field' => 'id', 'value' => 250, 'operator' => '>='),
                array('field' => 'id', 'value' => 259, 'operator' => '<='),
            ),
            'sort' => array(array('field' => 'id', 'direction' => 'asc')),
        ),
        array(
            'name' => 'salessummary',
            'table' => 'dummy',
            'view' => 'saleslog',
            'records' => 100000,
            'key' => 'id',
            'relation' => array(
                array('foreign-key' => 'item_id', 'join-field' => 'id', 'operator' => '=',),
                array('foreign-key' => 'customer_id', 'join-field' => 'id', 'operator' => '=',),
            ),
        ),
    ),
    array(),
    array(
        'db-class' => 'PDO',
    ),
    false
);
