<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/17
 * Time: 16:10
 */

class Model extends Sql
{
    protected $_model;
    protected $_table;
    function __construct()
    {
        // �������ݿ�
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // ��ȡģ������
        $this->_model = get_class($this);
        $this->_model = rtrim($this->_model, 'Model');
        // ���ݿ����������һ��
        $this->_table = strtolower($this->_model);
    }
    function __destruct()
    {
    }
}