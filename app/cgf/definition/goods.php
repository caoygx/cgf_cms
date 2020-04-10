<?php 
 return array (
  'base' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'type' => 'text',
      'size' => 10,
      'zh' => 'ID',
    ),
    'name' => 
    array (
      'name' => 'name',
      'type' => 'text',
      'size' => 30,
      'zh' => '商品名',
    ),
    'price' => 
    array (
      'name' => 'price',
      'type' => 'text',
      'size' => 10,
      'zh' => '市场价',
    ),
    'orgial_price' => 
    array (
      'name' => 'orgial_price',
      'type' => 'text',
      'size' => 10,
      'zh' => '原价',
    ),
    'pur_price' => 
    array (
      'name' => 'pur_price',
      'type' => 'text',
      'size' => 10,
      'zh' => '成本',
    ),
    'thumb' => 
    array (
      'name' => 'thumb',
      'type' => 'image',
      'size' => 30,
      'function' => 'tpl_function=show_img()',
      'zh' => '缩略图',
    ),
    'status' => 
    array (
      'name' => 'status',
      'type' => 'select',
      'size' => 10,
      'rawOption' => '0:上架,1:下架',
      'options' => 
      array (
        0 => '上架',
        1 => '下架',
      ),
      'zh' => '状态',
      'show_text' => 'status_text',
    ),
    'sort' => 
    array (
      'name' => 'sort',
      'type' => 'text',
      'size' => 10,
      'zh' => '商品排序',
    ),
    'user_id' => 
    array (
      'name' => 'user_id',
      'type' => 'text',
      'size' => 10,
      'zh' => '用户id',
    ),
    'weight' => 
    array (
      'name' => 'weight',
      'type' => 'text',
      'size' => 10,
      'zh' => '重量',
    ),
    'type' => 
    array (
      'name' => 'type',
      'type' => 'select',
      'size' => 10,
      'rawOption' => '0:普通商品,1:会员充值,2:话费充值',
      'options' => 
      array (
        0 => '普通商品',
        1 => '会员充值',
        2 => '话费充值',
      ),
      'zh' => '类型',
      'show_text' => 'type_text',
    ),
    'category_id' => 
    array (
      'name' => 'category_id',
      'type' => 'text',
      'size' => 10,
      'zh' => '商品分类',
    ),
    'intro' => 
    array (
      'name' => 'intro',
      'type' => 'editor',
      'row' => 10,
      'zh' => '商品介绍',
    ),
    'create_t' => 
    array (
      'name' => 'create_t',
      'type' => 'text',
      'size' => 10,
      'function' => 'date("y-m-d h:i:s",###)',
      'zh' => '创建时间',
    ),
    'modify_t' => 
    array (
      'name' => 'modify_t',
      'type' => 'text',
      'size' => 10,
      'function' => 'date("y-m-d h:i:s",###)',
      'zh' => '修改时间',
    ),
  ),
  'add' => 
  array (
    'thumb' => 
    array (
    ),
    'status' => 
    array (
    ),
    'sort' => 
    array (
    ),
    'user_id' => 
    array (
    ),
    'weight' => 
    array (
    ),
    'type' => 
    array (
    ),
    'category_id' => 
    array (
    ),
    'intro' => 
    array (
    ),
  ),
  'edit' => 
  array (
    'thumb' => 
    array (
    ),
    'status' => 
    array (
    ),
    'sort' => 
    array (
    ),
    'user_id' => 
    array (
    ),
    'weight' => 
    array (
    ),
    'type' => 
    array (
    ),
    'category_id' => 
    array (
    ),
    'intro' => 
    array (
    ),
  ),
  'list' => 
  array (
    'thumb' => 
    array (
    ),
    'status' => 
    array (
    ),
    'sort' => 
    array (
    ),
    'user_id' => 
    array (
    ),
    'weight' => 
    array (
    ),
    'type' => 
    array (
    ),
    'category_id' => 
    array (
    ),
    'modify_t' => 
    array (
    ),
  ),
  'search' => 
  array (
    'status' => 
    array (
    ),
    'sort' => 
    array (
    ),
    'user_id' => 
    array (
    ),
    'weight' => 
    array (
    ),
    'type' => 
    array (
    ),
    'category_id' => 
    array (
    ),
  ),
  'tableInfo' => 
  array (
    'function' => NULL,
    'pageButton' => 
    array (
      0 => 'export',
      1 => 'showMenu',
    ),
    'sort' => 
    array (
      0 => 'create_time',
      1 => 'desc',
    ),
    'action' => 'edit:编辑:id,del:删除:id',
    'property' => '',
    'title' => '商品表',
    'name' => 'goods',
  ),
);