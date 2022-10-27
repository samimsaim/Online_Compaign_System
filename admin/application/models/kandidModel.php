<?php
class KandidModel extends CI_Model{


	function GetData(){
		$this->db->from('kandid');
        return $this->db->get()->result();
	}

   function insertKan($data){
    return $this->db->insert('kandid',$data);
   }
   function GetKanData($id){
   	$this->db->where('kan_id',$id);
   	$this->db->from('kandid');
   	return $this->db->get()->result();
   }
   function DeleteKanPosts($id){
    $this->db->where('kan_id',$id);
    return $this->db->from('post');
   }
   function DeleteKanBio($id){
    $this->db->where('kan_id',$id);
    return $this->db->delete('boigraphy');
   }
   function DeletKanData($id){
   	$this->db->where('kan_id',$id);
   	return $this->db->delete('kandid');
   }
   function KanDetail($id){
   	$this->db->where('kan_id',$id);
   	$this->db->from('kandid');
   	return $this->db->get()->result();
   	
   }
   function addBio($data){
    $this->db->insert('boigraphy',$data);
   }
   function UpdateKan($data,$id){
    $this->db->where('kan_id',$id);
    return $this->db->update('kandid',$data);
   }
   function GetBio(){
    $this->db->from('boigraphy');
    return $this->db->get()->result();
   }
   function UpdateBio($id){
    $this->db->where('kan_id',$id);
    $this->db->from('boigraphy');
    return $this->db->get()->result();
   }
   function editBio($data,$id){
    $this->db->where('kan_id',$id);
    return $this->db->update('boigraphy',$data);
   }
   function Posts($id){
    $this->db->where('kan_id',$id);
    $this->db->from('post');
    return $this->db->get()->result();
   }
   function AddPost($data){
    $this->db->insert('post',$data);
    return $this->db->insert_id();
   }
   function insertKanImage($data){
    return $this->db->insert('post_image',$data);
   }
  function insertKanVideo($data){
    return $this->db->insert('post_video',$data);
  }

   function getImage($id){
    $this->db->where('post_id',$id);
    $this->db->from('post_image');
    return $this->db->get()->result();
   }
   function GetPost($id){
    $this->db->where('post_id',$id);
    $this->db->from('post');
    return $this->db->get()->result();
   }
   function DeletePost($id){
    $this->db->where('post_id',$id);
    return $this->db->delete('post');
   }
   function deleteImage($id){
    $this->db->where('post_id',$id);
    return $this->db->delete('post_image');
   }
   function deleteVideo($id){
    $this->db->where('post_id',$id);
    return $this->db->delete('post_video');
   }
   function GetPostById($id){
    $this->db->where('post_id',$id);
    $this->db->from('post');
    return $this->db->get()->result();
   }
   function UpdatePost($data,$id){
    $this->db->where('post_id',$id);
    return $this->db->update('post',$data);
   }
   function updateKanImage($data,$id){
    $this->db->where('post_id',$id);
    return $this->db->update('post_image',$data);
   }
   function comment($id){
    $this->db->where('post_id',$id);
    $this->db->from('comment');
    return $this->db->get()->result();
   }
   function deleteComment($id){
    $this->db->where('com_id',$id);
    return $this->db->delete('comment');
   }
} 
?>
