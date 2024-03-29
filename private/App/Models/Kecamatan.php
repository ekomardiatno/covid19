<?php

class Kecamatan extends Model
{

  public function insert($post, $fetch = null)
  {

    $this->_db->table('kecamatan');
    return $this->_db->insert($post, $fetch);

  }

  public function read($fields = null, $where = null, $fetch = 'ARRAY')
  {

    $this->_db->table('kecamatan');
    return $this->_db->select($fields, $where, $fetch);

  }

  public function join($join, $fields, $index, $where = null, $fetch = 'ARRAY')
  {

    $this->_db->table('kecamatan');
    return $this->_db->join($join, $fields, $index, $where, $fetch);

  }

  public function update($data, $where, $fetch = null)
  {

    $this->_db->table('kecamatan');
    return $this->_db->update($data, $where, $fetch);

  }

  public function delete($where, $fetch = null)
  {

    $this->_db->table('kecamatan');
    return $this->_db->delete($where, $fetch);

  }

}