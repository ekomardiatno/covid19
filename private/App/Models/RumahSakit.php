<?php

class RumahSakit extends Model
{

  public function insert($post, $fetch = null)
  {

    $this->_db->table('rumah_sakit');
    return $this->_db->insert($post, $fetch);

  }

  public function read($attr = null, $where = null, $fetch = 'ARRAY')
  {

    $this->_db->table('rumah_sakit');
    return $this->_db->select($attr, $where, $fetch);

  }

  public function join($join, $attr, $index, $where = null, $fetch = 'ARRAY')
  {

    $this->_db->table('rumah_sakit');
    return $this->_db->join($join, $attr, $index, $where, $fetch);

  }

  public function update($data, $where, $fetch = null)
  {

    $this->_db->table('rumah_sakit');
    return $this->_db->update($data, $where, $fetch);

  }

  public function delete($where, $fetch = null)
  {

    $this->_db->table('rumah_sakit');
    return $this->_db->delete($where, $fetch);

  }

}