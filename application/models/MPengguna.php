<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MPengguna extends CI_model {
	var $table = 'pengguna';
	var $column_order = array('username','email',NULL); //set column field database for datatable orderable
	var $column_search = array('username','email'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc');


	public function save($data)
	{
		$this->db->insert('pengguna',$data);
	}
	public function get_data(){
		$this->db->select('*')
		->from('pengguna');

        $query = $this->db->get();
	    return $query->result();
    }
    	public function check_telp($no_telp)
	{
		$this->db->select('*')
		->from('penduduk')
		->where('nomor_telepon',$no_telp);
		return $this->db->count_all_results();
	}

	public function last_id(){
  
	$query = $this->db->query('SELECT max(ID) AS ID FROM pengguna' );

		return $query->result_array();
	}

	public function check_nomor($no_telp)
	{
		$this->db->select('*')
		->from('pengguna')
		->where('USERNAME',$no_telp);
		return $this->db->count_all_results();
	}

	public function check_nomor_ojek($no_telp)
	{	
		$this->db->select('*')
		->from('pengguna')
		->where('NO_TELP',$no_telp)
		->where('STATUS_USER','Ojek');
		return $this->db->count_all_results();
	}
	
    private function _get_datatables_query()
	{
			$this->db->select('*')
					 ->from('pengguna');

		$i = 0;
		foreach ($this->column_search as $item) 
		{
			if($_POST['search']['value']) 
			{
				if($i===0) 
				{
					$this->db->group_start(); 
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end();
			}
			$i++;
		}
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
    
    public function delete_by_id($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete($this->table);
    }

    public function delete_by_no_telp($no_telp)
	{
		$this->db->where('username', $no_telp);
		$this->db->delete($this->table);
    }


    public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
    }
       public function get_by_($id)
	{
		$this->db->from($this->table);
		$this->db->where('ID',$id);
		$query = $this->db->get();
		return $query->row_array();
    }
    public function update($where, $data)
	{
		$this->db->update('pengguna', $data, $where);
		return $this->db->affected_rows();
	}

	public function check_password_from_id($id)
	{
		$query = $this->db->select('PASSWORD')
		->from('pengguna')
		->where('ID',$id);
		return $query->get()->row_array()['PASSWORD'];
	}

		public function get_parent_users($id_pengguna)
	{
		$query = $this->db->select('parent_user')
		->from('pengguna')
		->where('id',$id_pengguna);
		return $query->get()->row_array();
	}

	public function get_firebase($id)
	{
		$query = $this->db->select('id_firebase')
		->from('pengguna')
		->where('ID',$id);
		return $query->get()->row_array();
	}
}