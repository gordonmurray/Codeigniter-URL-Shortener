<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Redirect extends CI_Controller
{

    /**
     * Method to redirect from an alias to a full URL
     */
    public function index()
    {
	$this->log_redirect();

	$alias = $this->uri->segment(1);

	$this->db->select('url');

	$query = $this->db->get_where('links', array('alias' => $alias), 1, 0);

	if ($query->num_rows() > 0)
	{
	    foreach ($query->result() as $row)
	    {
		$this->load->helper('url');

		redirect($row->url, 'refresh', 301);
	    }
	}
	else
	{
	    echo "Sorry, alias '$alias' not found";
	}
    }

    /**
     * Method to log a redirect
     */
    function log_redirect()
    {
	$data = array(
	    'datetime' => date("Y-m-d H:i:s"),
	    'ip_address' => $this->input->ip_address(),
	    'browser_agent' => $this->input->user_agent(),
	    'url_string' => $this->uri->uri_string()
	);

	$this->db->insert('redirects', $data);
    }

}

/* End of file redirect.php */
    /* Location: ./application/controllers/redirect.php */