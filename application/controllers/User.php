<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $this->login();
    }

    /*
     * Loads Messages_model, runs getMessagesByPoster() passing the specified name, and displays output in the
     * ViewMessages view
     * if logged in then allows the user to make posts and eventually follow in if not following.
     */

    public function view($name = null)
    {
        if ($name == null) {
            echo "Error !! You haven't provided any name: ";
        } else {
            $this->load->model('Messages_model');
            $result['Messages'] = $this->Messages_model->getMessagesByPoster($name);
            $data = $result;

            if (isset($_SESSION['username'])) {
                $user['username'] = $_SESSION['username'];
                $data += $user;
                $follower = $_SESSION['username'];
                $followed = $name;

                if ($follower != $followed) {
                    $this->load->model('Users_model');
                    $fandf['follow'] = $this->Users_model->isFollowing($follower, $followed);
                    $data += $fandf;
                }

            }

            $this->load->view('ViewMessages', $data);
        }
    }


    //loads the Login view

    public function login()
    {
        $this->load->view('Login');
    }

    //log the user out and destorys sessions

    public function logout()
    {
        session_start();
        session_destroy();
        redirect(site_url('user/login'));

    }


    /*
     * Loads the Users_model, calls checkLogin() passing
     * POSTed user/pass & either re-displays Login view with error message, or redirects to the user/view/{username}
     * controller to view their messages. If login is successful,
     * if the user logged in successfully a session variable is created.
     */

    public function doLogin()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->load->model('Users_model');

        $error['error'] = "Incorrect username or password";

        $loggedIn = $this->Users_model->checkLogin($username, $pass);
        if ($loggedIn) {
            session_start();
            $_SESSION['username'] = $username;
            redirect(site_url('user/view/' . $username));
        } else {
            $this->load->view('Login', $error);
        }
    }

    /*
     * loads the Messages_model and checks for the followed users
     * and display their posts in the ViewMessages view.
     */

    public function feed($name)
    {
        $this->load->model('Messages_model');
        $result ['Messages'] = $this->Messages_model->getFollowedMessages($name);
        $data = $result;
        if (isset($_SESSION['username'])) {
            $user['username'] = $_SESSION['username'];
            $data += $user;
        }
        $this->load->view('ViewMessages', $data);
    }


    /*
     * loads the Users_model
     * pass the $followed from parameter
     * and redirect.
     */

    public function follow($followed)
    {
        $this->load->model('Users_model');
        $this->Users_model->follow($followed);
        redirect(site_url('user/view/' . $followed));

    }

}

