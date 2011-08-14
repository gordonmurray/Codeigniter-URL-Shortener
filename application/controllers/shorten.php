<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shorten extends CI_Controller
{

    /**
     * Show a form to shorten a URL
     */
    public function index()
    {
	$this->load->helper('form');

	$this->load->view('form');
    }

    /**
     * Take in a URL from the form and shorten it
     */
    public function create()
    {
	$short_url = "";

	$url = prep_url($this->input->post('url'));

	$link_length = $this->config->item('link_length');

	// Check to see if this URL has an Alias
	$existing_alias = $this->alias_from_url($url);

	// Generate a new alias if needed
	if ($existing_alias == "")
	{
	    $this->load->helper('string');

	    $alias = random_string('alnum', $link_length);

	    while ($this->does_alias_exist($alias))
	    {
		$alias = random_string('alnum', $link_length);
	    }

	    $this->save_new_alias($url, $alias);

	    $short_url = $alias;
	}
	else
	{
	    $short_url = $existing_alias;
	}

	// display the short url
	echo base_url() . $short_url;
    }

    /**
     * Method to see if a generated Alias already exists in the table
     * @param type $alias String to check to see if it exists
     * @return Bool True or False
     */
    function does_alias_exist($alias)
    {
	$this->db->select('id');

	$query = $this->db->get_where('links', array('alias' => $alias), 1, 0);

	if ($query->num_rows() > 0)
	{
	    return true;
	}
	else
	{
	    return false;
	}
    }

    /**
     * Save a new Alias to the table
     * @param type $url URL to shorten
     * @param type $alias  The new Alias for this URL
     */
    function save_new_alias($url, $alias)
    {
	$data = array(
	    'alias' => $alias,
	    'url' => $url,
	    'created' => date("Y-m-d H:i:s")
	);

	$this->db->insert('links', $data);
    }

    /**
     * Return an existing Alias, if any
     * @param type $url String, the URL to check
     * @return type $lias String, the alias, if any
     */
    function alias_from_url($url)
    {
	$alias = "";

	$this->db->select('alias');

	$query = $this->db->get_where('links', array('url' => $url), 1, 0);

	if ($query->num_rows() > 0)
	{
	    foreach ($query->result() as $row)
	    {
		$alias = $row->alias;
	    }
	}

	return $alias;
    }

}

/* End of file Shorten.php */
    /* Location: ./application/controllers/Shorten.php */