<?php

class Comment extends CI_Model{

 public function __construct(){
     $this->load->database();
 }

   function add_Comment($data)
  {
    $this->db->insert('comments',$data);
  }

  function get_comments($postID){
    $this->db->select('comments.*,users.username')->from('comments')->join('users','users.userID=comments.userID')
    ->where('postID', $postID)->order_by('comments.date_added','DESC');
    $query = $this->db->get();
    return $query->result_array();
  }


    function delete_comment($commentID){
        $this->db->where('commentID',$commentID);
        $this->db->delete('comments');
    }
}
