<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/17
 * Time: 16:19
 */
class Sql
{
    protected $_dbHandle;
    protected $_result;

    public function connect($host, $user, $pass, $dbname)
    {


        try{
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
echo $dsn;



            $this->_dbHandle = new PDO($dsn, $user, $pass);
            print_r($this->_dbHandle);
            die;
        }catch (PDOException $e){
            exit("错误:" . $e->getMessage());
        }
    }

    public function selectAll()
    {
        $sql = sprintf("select *from %s", $this->_table);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetcAll();

    }

    public function select($id)
    {
        $sql = sprintf("select * from %s where id = '%s'", $this->_table,$id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();

    }

    public function delete($id)
    {
        $sql = sprintf("delete from %s where id = '%s'", $this->_table,
            $id);
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    public function query($sql){
        $sth = $this->_dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }

    public function add($data)
    {
        $sql = sprintf("insert %s", $this->_table, $this->formatInsert($data));
        return $this->query($sql);

    }
    public function update($id, $data)
    {
        $sql = sprintf("update %s set %s where id = '%s'", $this->_table, $this->formatUpdate($data), $id);

        return $this->query($sql);

    }


    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value){
            $fields[] = sprintf("%s", $key);
            $values[] = sprintf("%s", $value);
        }

        $field = implode(',', $fields);
        $value = implode(',', $values);
        return sprintf("(%s) values (%s)", $field, $value);

    }

    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("%s = '%s'", $key, $value);
        }
        return implode(',', $fields);
    }



}


















