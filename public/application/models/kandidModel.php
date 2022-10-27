<?php 

class kandidModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

    function getKandidInfo($id){
        $this->db->select("*");
        $this->db->from("kandid");
        $this->db->where("kan_id",$id);
        return $this->db->get()->result();
    }

    function getPosts($kan_id){
        $this->db->where('kan_id',$kan_id);
        $this->db->from('post');
        $this->db->order_by('create_at','DESC');
        return $this->db->get()->result();
    }

    function getListOfKandidProvince($province){
        $this->db->where('kan_province',$province);
        $this->db->from('kandid');
        return $this->db->get()->result();
    }

    function getAllPosts(){
        $this->db->from('post');
        $this->db->order_by('create_at','DESC');
        return $this->db->get()->result();
    }

    function insertPeople($data){
       return $this->db->insert("poeple",$data);
    }

    function follow($data){
        return $this->db->insert("follower",$data);
    }

    function getFollow($kan_id,$po_id){
        $this->db->from('follower');
        $this->db->where('kan_id',$kan_id);
        $this->db->where('people_id',$po_id);
        return $this->db->count_all_results();
    }

    function deleteFollow($kan_id,$people_id){
        $this->db->where('kan_id',$kan_id);
        $this->db->where('people_id',$people_id);
        return $this->db->delete('follower');
    }

    function getListOfKandid(){
        $this->db->from('kandid');
        return $this->db->get()->result();
    }

    function searchKandid($key){
        $this->db->like("kan_number",$key);
        $this->db->or_like("kan_page_number",$key);
        $this->db->or_like("kan_name",$key);
        $this->db->or_like("kan_last_name",$key);
        $this->db->or_like("kan_province",$key);
        $this->db->or_like("kan_slogon",$key);
        $this->db->from("kandid");
        return $this->db->get()->result();
    }

    function contactUs($data){
        return $this->db->insert('contact',$data);
    }

}
?>