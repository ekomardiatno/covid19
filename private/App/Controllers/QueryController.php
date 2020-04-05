<?php

class QueryController extends Controller
{

  public function join()
  {

    $model = $this->model('User');

    $attr = [
      'users' => ['username', 'name'],
      'role' => ['type']
    ];

    $index = [
      'role' => ['index_table' => 'users', 'index_id' => 'id_users']
    ];

    $where = [
      'params' => [
        [
          'column' => 'users.username',
          'value' => 'admin',
          'operator' => 'LIKE'
        ]
      ],
        'order_by' => ['users.name', 'ASC'],
        'limit' => [0, 10]
    ];

    echo $model->join('LEFT JOIN', $attr, $index, $where, 'SQL');

  }

  public function select()
  {

    $model = $this->model('User');

    $attr = [
      'username',
      'email',
      'name',
      'role'
    ];

    $where = [
      'params' => [
        [
          'column' => 'username',
          'value' => 'adm',
          'operator' => 'LIKE',
          'conjunction' => 'OR'
        ],
        [
          'column' => 'name',
          'value' => 'mardiatno',
          'operator'=> 'LIKE'
        ]
      ],
      'order_by' => ['name', 'ASC'],
      'limit' => [0, 10]
    ];

    echo $model->read($attr, $where, 'SQL');

  }

  public function insert()
  {

    $model = $this->model('User');

    $data = [
      'username' => 'admin',
      'name' => 'Eko Mardiatno',
      'email' => 'ekomardiatno@gmail.com'
    ];

    echo $model->insert($data, 'SQL');

  }

  public function update()
  {

    $model = $this->model('User');

    $data = [
      'username' => 'admin',
      'name' => 'Eko Mardiatno',
      'email' => 'ekomardiatno@gmail.com'
    ];

    $where = [
      'data_id' => '1'
    ];

    echo $model->update($data, $where, 'SQL');
  }

  public function delete()
  {

    $model = $this->model('User');

    $where = [
      'data_id' => '1'
    ];

    echo $model->delete($where, 'SQL');

  }

}