<?php

require_once MODEL_PATH . 'ModelUser.php';

class ControllerMain extends Controller
{
	public function __construct()
    {
        $this->_model = new ModelUser();
        parent::__construct();
    }

    public function actionIndex()
    {
        if ($_GET['action'] == 'delete') {
            $this->actionDelete();
        }

        if (!empty($_GET['id'])) {
            $this->_view->user = $this->_model->find($_GET['id']);
        }

        $this->_view->generate('mainView.php');
    }

    public function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $this->_model->delete($_GET['id']);
        }
    }
}