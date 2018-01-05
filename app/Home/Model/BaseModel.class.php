<?php

namespace Home\Model;

use Think\Model;

// use Think\Model\AdvModel;
class BaseModel extends Model {
	protected $tablePrefix = '';
	
	/**
	 * 增
	 *
	 * @param type $data
	 *        	return boolean
	 */
	public function add_data($data = array()) {
		if (empty ( $data )) {
			return FALSE;
		}
		return $this->add ( $data );
	}
	/**
	 * 删
	 *
	 * @param type $where
	 *        	return boolean
	 */
	public function delete_where($where = '') {
		if (empty ( $where )) {
			return FALSE;
		}
		return $this->where ( $where )->delete ();
	}
	public function save_data($data = array()) {
		return $this->save_where_data ( $data );
	}
	/**
	 * 改
	 *
	 * @param type $data
	 *        	传入数据
	 * @param type $where
	 *        	传入条件
	 *        	return boolean 影响的行数
	 */
	public function save_where_data($data = array(), $where = '') {
		if (empty ( $data )) {
			return FALSE;
		}
		if (empty ( $where )) {
			return $this->save ( $data );
		} else {
			return $this->where ( $where )->save ( $data );
		}
	}
}
?>