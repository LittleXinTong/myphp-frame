<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/11/17
 * Time: 17:43
 */

class ItemController extends Controller
{
    // ��ҳ���������Կ���Զ���DB��ѯ
    public function index()
    {
        $items = (new ItemModel)->selectAll();

        $this->assign('title', 'ȫ����Ŀ');
        $this->assign('items', $items);
    }
    // ��Ӽ�¼�����Կ��DB��¼������Create��
    public function add()
    {
        $data['item_name'] = $_POST['value'];
        $count = (new ItemModel)->add($data);

        $this->assign('title', '��ӳɹ�');
        $this->assign('count', $count);
    }
    // �鿴��¼�����Կ��DB��¼��ȡ��Read��
    public function view($id = null)
    {
        $item = (new ItemModel)->select($id);

        $this->assign('title', '���ڲ鿴' . $item['item_name']);
        $this->assign('item', $item);
    }
    // ���¼�¼�����Կ��DB��¼���£�Update��
    public function update()
    {
        $data = array('id' => $_POST['id'], 'item_name' => $_POST['value']);
        $count = (new ItemModel)->update($data['id'], $data);

        $this->assign('title', '�޸ĳɹ�');
        $this->assign('count', $count);
    }

    // ɾ����¼�����Կ��DB��¼ɾ����Delete��
    public function delete($id = null)
    {
        $count = (new ItemModel)->delete($id);

        $this->assign('title', 'ɾ���ɹ�');
        $this->assign('count', $count);
    }

}