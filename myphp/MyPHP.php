<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/17
 * Time: 14:23
 *
 * FRAME_PATH			D:\wwwroot\www.test.com\myphp-frame\myphp/
	 APP_PATH			D:\wwwroot\www.test.com\myphp-frame/
 */
//��ʼ������
defined('FRAME_PATH') or define('FRAME_PATH',__DIR__ . '/');

defined('APP_PATH') or define('APP_PATH',dirname($_SERVER['SCRIPT_FILENAME']) . '/');

defined('APP_DEBUG') or define('APP_DEBUG', false);
defined('CONFIG_PATH') or define('CONFIG_PATH',APP_PATH . 'config/');
defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH . 'runtime/');

//���������ļ�
require APP_PATH . 'config/config.php';
//�������Ŀ����
require FRAME_PATH . 'Core.php';


//ʵ����������
$fast = new Core();
$fast->run();

