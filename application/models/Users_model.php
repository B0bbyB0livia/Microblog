<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function __construct()
    {

        $this->load->database();

    }


    /*
     * Returns TRUE if a user exists in the database   with the specified username and password,
     * and FALSE if not.
     * the sha1() method encrypts the 'password'since the password are hashed on the database.
     */

    public function checkLogin($username, $pass)
    {
        $sha_password = sha1($pass);
        $query = $this->db->query("SELECT username, password
                                   FROM Users
                                   WHERE username
                                   = '$username'
                                   AND password
                                   = '$sha_password'");

        if ($query -> num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /*
     * checks if the logged in user is following the other user
     * if detabase contains it returns true otherwise false.
     */

    public function isFollowing($follower,$followed)
    {
        $query = $this -> db -> query("SELECT follower_username, followed_username 
                                       FROM User_Follows
                                       WHERE follower_username = '$follower' 
                                       AND followed_username = '$followed'");

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    /*
     * inserts a row in detabase
     * by setting the logged in user as follower
     * and takes $followed user from parameter.
     */

    public function follow($followed)
    {
        if (isset($_SESSION['username']))
        {
            $follower = $_SESSION['username'];
            $this -> db -> set('follower_username ', $follower);
            $this -> db -> set('followed_username', $followed);
            $this -> db -> insert('User_Follows');
        }
    }
}