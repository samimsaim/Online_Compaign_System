<?php
Class PeopleModel extends CI_Model{
	function GetData(){
		$this->db->from('poeple');
		return $this->db->get()->result();
	}
	function DeletePeople($id){
		$this->db->where('po_id',$id);
		return $this->db->delete('poeple');
	}
	function insertPeople($data){
		return $this->db->insert('poeple',$data);
	}
	function GetDetail($id){
	$this->db->where('po_id',$id);
	$this->db->from('poeple');
	return $this->db->get()->result();
}   
	function GetPepl($id){
		$this->db->where('po_id',$id);
		$this->db->from('poeple');
		return $this->db->get()->result();
	}
	function UpdatePeople($data,$id){
		$this->db->where('po_id',$id);
		return $this->db->update('poeple',$data);
	}



}?>