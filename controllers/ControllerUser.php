<?php

require_once registry::get('views') . "/usersView.php";

class ControllerUser extends Controller
{
    protected $_id;
    protected $_firstName;
    protected $_lastName;
    protected $_email;
    protected $_type;

    public function __construct()
    {
        $this->_model = new ModelUser();
        $this->_view  = new UsersView();
    }

    public function actionCheck()
    {
        $this->_id        = $_POST['id'];
        $this->_firstName = $_POST['firstName'];
        $this->_lastName  = $_POST['lastName'];
        $this->_email     = $_POST['email'];
        $this->_type      = $_POST['type'];

        if (!empty($this->_id)) {
            $this->_model->edit($this->_id, $this->_firstName, $this->_lastName, $this->_email, $this->_type);
        } else {
            $this->_model->add($this->_firstName, $this->_lastName, $this->_email, $this->_type);
        }

        header("Location: http://{$_SERVER['HTTP_HOST']}/main/index");
    }

    public function actionOutput()
    {
        $this->_model->all();
        $this->_view->render('outputView.php', $this->_model->_users);
    }
}