<?php

class User extends Model
{

  public function __construct()
  {
    parent::__construct();
    $this->_db->table('users');
  }

  public function insert($post, $fetch = null)
  {

    return $this->_db->insert($post, $fetch);

  }

  public function read($fields, $where, $fetch = 'ARRAY')
  {

    return $this->_db->select($fields, $where, $fetch);

  }

  public function join($join, $fields, $index, $where, $fetch = 'ARRAY')
  {

    return $this->_db->join($join, $fields, $index, $where, $fetch);

  }

  public function update($data, $where, $fetch = null)
  {

    return $this->_db->update($data, $where, $fetch);

  }

  public function delete($where, $fetch = null)
  {

    return $this->_db->delete($where, $fetch);

  }

}