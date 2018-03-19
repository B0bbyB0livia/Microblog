<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function index()
    {
        $this->load->view('search');
    }

    /*
     *Loads Messages_model, retrieves search string from GET
     *parameters, runs searchMessages() and displays the
     *output in the ViewMessages view
     */

    public function doSearch()
    {
        $this->load->model('Messages_model');
        $result ['Messages'] = $this->Messages_model->searchMessages($this->input->get('keyword'));
        $data = $result;
        if (isset($_SESSION['username'])) {
            $user['username'] = $_SESSION['username'];
            $data += $user;
        }
        $this->load->view('ViewMessages', $data);
    }
}

