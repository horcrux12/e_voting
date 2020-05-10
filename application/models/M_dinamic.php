<?php 
	/**
	 * 
	 */
	class M_dinamic extends CI_Model
	{
		
		function getData ($table)
		{
			$this->db->select('*');
			$this->db->from($table);
			$query = $this->db->get();
			return $query;
        }
        
		function getDataDESC ($table,$by)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($by,'DESC');
			$query = $this->db->get();
			return $query->result();
		}

		function getDataLimit ($table,$lim,$by)
		{
			$this->db->select('*');
			$this->db->from($table);
			$this->db->order_by($by,'DESC');
			$this->db->limit($lim);
			$query = $this->db->get();
			return $query->result();
		}

		function getWhere ($table,$field,$where){
			$this->db->where($field,$where);
			$query = $this->db->get($table);
			return $query;
		}

		function input_data($data,$table){
            $this->db->insert($table, $data);
    	}

    	function update_data($field,$where,$data,$table){
            $this->db->where($field,$where);
            return $this->db->update($table,$data);
    	}
			
    	function delete_data($table,$field,$where) // menghapus data guru
		{
			$this->db->where($field,$where);
			return $this->db->delete($table);
		}

	}
?>