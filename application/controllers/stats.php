<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stats extends CI_Controller
{

    public function index()
    {
        
    }

    /**
     * Load some recent redirect stats
     * @param int $limit Limit the number of records to show
     */
    public function view($limit = 100)
    {
        $this->load->library('table');

        $redirects = array();

        $redirects[] = array('ID', 'Date', 'IP Address', 'Agent', 'Short URL');

        $this->db->select('id, datetime, ip_address, browser_agent,url_string');

        $this->db->limit($limit);

        $this->db->order_by('id', 'desc');

        $query = $this->db->get('redirects');

        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $redirects[] = $row;
            }
        }

        echo $this->table->generate($redirects);
    }

}

/* End of file Stats.php */
    /* Location: ./application/controllers/Stats.php */