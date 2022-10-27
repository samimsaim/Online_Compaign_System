<?php
/**
* 
*/
class UsersModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function getUser(){
		$this->db->from("admin");
		return $this->db->get()->result();
	}
    function kanPro($id){
    	$this->db->where('kan_id',$id);
    	$this->db->from('kandid');
    	return $this->db->get()->result();
    }
	public function getPrivilege(){
		$this->db->from('pervilage');
		return $this->db->get()->result();
	}
	function kandidAcount($id){
		$this->db->where('kan_id',$id);
		$this->db->from('kandid');
		return $this->db->get()->result();
	}
	function insertKan($data){
		$this->db->insert('kandid',$data);
		return $this->db->insert_id();
	}
	public function insertUser($data){
        $this->db->insert("admin",$data);
        return $this->db->insert_id();
	}
	function insertUsers($data){
		return $this->db->insert('users',$data);
	}

    function search_user($userId){
        $query = $this->db->query("SELECT * FROM admin WHERE id=$userId");
        return $query->result();
    }

	function getAdminData($id){
		$this->db->where('id',$id);
		$this->db->from('admin');
		return $this->db->get()->result();
	}
	function DeletePeople($id){
		$this->db->where('po_id',$id);
		return $this->db->delete('poeple');
	}
	function getUsersData($id){
		$this->db->where('person_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}

	public function get_user($id){
		$this->db->where('user_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}
	function getAdminDetail($id){
		$this->db->where('id',$id);
		$this->db->from('admin');
		return $this->db->get()->result();
	}
	function getUserDetail($id){
		$this->db->where('person_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}
	 function UpdateAdmin($data,$id){
		$this->db->where('id',$id);
		return $this->db->update('admin',$data);
	}
	function UpdateUser($data,$id){
		$this->db->where('person_id',$id);
		return $this->db->update('users',$data);
	}

	public function delete_user($id){
		$this->db->where('person_id', $id);
		 return $this->db->delete('users');
	}

	public function get_privelage($id){
		$this->db->where('privilege_id',$id);
		$this->db->from('pervilage');
		return $this->db->get()->result();
	}
	function deleteUserData($id){
		$this->db->where('person_id',$id);
		return $this->db->delete('users');
	}
	function deleteKandid($id){
		$this->db->where('kan_id',$id);
		return $this->db->delete('kandid');
	}
	function DeleteUser($id){
		$this->db->where('id',$id);
		$this->db->from('admin');
        return $this->db->delete();
	}
	function kandid(){
		$this->db->from('kandid');
		return $this->db->get()->result();
	}
	function people(){
		$this->db->from('poeple');
		return $this->db->get()->result();
	}
	function insertPeople($data){
	return $this->db->insert("poeple",$data);
        
	}
	function getPeopleData($id){
		$this->db->where('po_id',$id);
		$this->db->from('poeple');
		return $this->db->get()->result();
	}
	function UpdatePeople($data,$id){
		$this->db->where('po_id',$id);
		return $this->db->update('poeple',$data);
	}
	function getKandidDetail($id){
		$this->db->where('kan_id',$id);
		$this->db->from('kandid');
		return $this->db->get()->result();
	}
	function EditKan($id){
		$this->db->where('kan_id',$id);
		$this->db->from('kandid');
		return $this->db->get()->result();
	}
	function editUs($id){
		$this->db->where('person_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}
	function getUsers($id){
		$this->db->where('person_id',$id);
		$this->db->from('users');
		return $this->db->get()->result();
	}
	function getKandid($id){
		$this->db->where('kan_id',$id);
		$this->db->from('kandid');
		return $this->db->get()->result();
	}
	function updateUsers($data,$id){
		$this->db->where('person_id',$id);
		return $this->db->update('users',$data);
	}
}
?>