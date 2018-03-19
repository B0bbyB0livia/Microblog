<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this -> load -> library('session');
    }


    /*
     * loads the post view with the session variable $username
     * if failed redirects back to user/login
     */
    public function index()
    {

        if (isset($_SESSION['username']))
        {
            $username ['username'] = $_SESSION ['username'];
            $this -> load -> view('post', $username);

        }
        else
        {
            redirect(site_url('user/login'));
        }
    }

    /*
     * checks if the user was logged in
     * if not logged in redirects to login page
     * if logged in then proceeds with the post.
     */

    public function doPost()
    {
       if (!isset($_SESSION['username']))
       {
           redirect(site_url('user/login'));
       }
       else
       {
           $this -> load -> model('Messages_model');
           $poster = $_SESSION['username'];
           $string = $this->input->post('text');
           $this ->  Messages_model -> insertMessage($poster,$string);
           redirect(site_url('user/view/'.$poster));
       }
    }

}
