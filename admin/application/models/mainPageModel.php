<?php
class MainPageModel extends CI_Model{

    function getLastAttInfo($door){
        $finalData = '';
        $this->db->select("person_id,person_type,att_time");
        $this->db->from("attendance");
        $this->db->where("door",$door);
        $this->db->order_by("id","DESC");
        $this->db->limit(1);
        $data = $this->db->get()->result();
        foreach($data as $row){
            if($row->person_type == "students"){
                $this->db->select("student_id,name,father_name,stu_photo");
                $this->db->from("students");
                $this->db->where("stu_id",$row->person_id);
                $result = $this->db->get()->result();

                $this->db->select("block_no,room_no");
                $this->db->from("dormitory_address");
                $this->db->where("stu_id",$row->person_id);
                $dorm = $this->db->get()->result();

                foreach($result as $res){}
                foreach($dorm as $dom){}
                $jDate = new jDateTime(true,true,"asia/kabul");
                $date = preg_split("/[- ]+/", $row->att_time);
                $jalaliDate = $jDate->toJalali($date[0],$date[1],$date[2]);
                $jalaliDate[3] = $date[3];
                $jalaliDate[1] = $jDate->getMonthNames($jalaliDate[1]);
                $jalaliDate[0] = $jDate->convertNumbers($jalaliDate[0]);
                $jalaliDate[2] = $jDate->convertNumbers($jalaliDate[2]);
                $jalaliDate[3] = $jDate->convertNumbers($jalaliDate[3]);
                krsort($jalaliDate);
                // ------------- print date -------------
                $att_time = implode(' - ', $jalaliDate);



                $wing = array("A","B","C","D");
                    $finalData = array(
                        "student_id"=>$res->student_id,
                        "name"=>$res->name,
                        "father_name"=>$res->father_name,
                        "photo"=>base_url()."../".$res->stu_photo,
                        "block_no"=>$wing[$dom->block_no-1],
                        "room_no"=>$dom->room_no,
                        "att_time"=>$att_time
                    );
            }
            if($row->person_type == "employee"){
//                $tblId = $row->person_id;
            }
        }
        return $finalData;
    }
    function getKandid(){
        
        $this->db->select('kan_id')->from('kandid');
        return $this->db->get()->num_rows();
    }
} 
?>
