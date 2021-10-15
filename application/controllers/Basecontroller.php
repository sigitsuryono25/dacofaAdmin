<?php

/** 
 * extends ke class ini untuk menggunakan function yang sudah ada disini
 * 
 * extends controller lain (untuk laman web admin bukan API) ke class ini agar hanya melakukan
 * pengecekan user login hanya sekali saja
 * 
 * jangan extends controller untuk login ke class ini. 
 * nanti akan terjadi never ending looping (Too Many Redirect).
*/

class Basecontroller extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();

		//check if user logged in or not
		if(!$this->session->has_userdata('userid')){
			redirect(site_url());
		}
	}
}
