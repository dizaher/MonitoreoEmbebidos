<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
 	{   
    	parent::__construct();    
    	$this->load->helper('url');   
    	$this->load->database('default');       
  	}
	public function index()
	{
		$query = $this->db->select('date, count')->get('user_logins');
	    foreach($query->result_array() as $row)
		{
	     // [x (date), y (count)]
	    	$dataset1[] = array(strtotime($row['date']) * 1000, $row['count']);
		}
	 
		$data['dataset1'] = $dataset1;

		$this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */