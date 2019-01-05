<?php

class ModelUser extends Model
{
    protected $_filename = 'users.txt';
    protected $_types = array(
        'guest'    => 'Гость',
        'customer' => 'Покупатель'
    );
    public $_users = array();

    public function __construct()
    {
        if (file_exists($this->_filename)) {
            $users = file_get_contents($this->_filename);
            $this->_users = json_decode($users, true);
        }
    }

    public function add($firstName, $lastName, $email, $type)
    {
        $id = end(array_keys($this->_users)) + 1;
        $this->_users[$id] = array(
            'id'        => $id,
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'email'     => $email,
            'type'      => $type,
        );
        $this->store();
    }

    public function edit($id, $firstName, $lastName, $email, $type)
    {
        if ($this->find($id)) {
            $this->_users[$id]['firstName'] = $firstName;
            $this->_users[$id]['lastName']  = $lastName;
            $this->_users[$id]['email']     = $email;
            $this->_users[$id]['type']      = $type;
            $this->store();
        }
    }

    public function find($id)
    {
        return $this->_users[$id];
    }

    public function delete($id)
    {
        $this->find($id);
        unset($this->_users[$id]);
        $this->store();
    }

    protected function store()
    {
        file_put_contents($this->_filename, json_encode($this->_users));
    }

    public function all()
    {
        return $this->_users;
    }
}