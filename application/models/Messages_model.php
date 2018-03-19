<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //  it Returns all messages posted by the user with the specified $name, most recent first

    public function getMessagesByPoster($name)
    {
        $query = $this->db->query("SELECT user_username, text, posted_at 
                                   FROM Messages 
                                   WHERE user_username 
                                   LIKE '%$name%' 
                                   ORDER BY posted_at 
                                   DESC");
        return $query->result_array();
    }

    //Returns all messages containing the specified   search string, most recent first

    public function searchMessages($string)
    {
        $query = $this->db->query("SELECT user_username, text, posted_at 
                                   FROM Messages 
                                   WHERE text 
                                   LIKE '%$string%' 
                                   ORDER BY posted_at 
                                   DESC");
        return $query->result_array();
    }

    //Adds the supplied message to the messages   table in the database

    public function insertMessage($poster, $string)
    {
        $this->db->set('user_username', $poster);
        $this->db->set('text', $string);
        $this->db->set('posted_at', date('Y-m-d H:i:s'));
        $this->db->insert('Messages');
    }

    /*
     * returns all of the messages from all those followed by specified user
     */

    public function getFollowedMessages($name)
    {
        $query = $this->db->query("SELECT Messages.user_username, Messages.text, Messages.posted_at
                                   FROM Messages
                                   INNER JOIN User_Follows
                                   ON User_Follows.followed_username=Messages.user_username
                                   WHERE User_Follows.follower_username = '$name' 
                                   ORDER BY Messages.posted_at 
                                   DESC");
        return $query->result_array();
    }
}