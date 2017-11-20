<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/17
 * Time: 16:56
 */
class View
{
    protected $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;

    }
    //�������
    function assign($name, $value)
    {
        $this->variables[$name] = $value;
    }

//    ��Ⱦ��ʾ
    function render(){
        extract($this->variables);// �������н��������뵽��ǰ�ķ��ű�
        $defaultHeader = APP_PATH . 'application/views/header.php';
        $defaultFooter = APP_PATH . 'application/views/footer.php';
        $controllerHeader = APP_PATH . 'application/views/' . $this->_controller . '/header.php';
        $controllerFooter = APP_PATH . 'application/views/' . $this->_controller . '/footer.php';
        //ҳͷ�ļ�
        if(file_exists($controllerHeader)){
            include ($controllerHeader);
        }else{
            include($defaultHeader);
        }
        //ҳ�����ļ�
        include (APP_PATH . 'application/views/' .$this->_controller . '/' .$this->_action . '.php');


        //ҳ���ļ�
        if(file_exists($controllerFooter)){
            include ($controllerFooter);
        }else{
            include($defaultFooter);
        }




    }


}