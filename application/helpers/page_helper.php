<?php

function pages($page,$data){

	$CI =& get_instance();

	if(!empty($page)){
		 
		$CI->load->view('include/head',$data);
		$CI->load->view('include/sidenav');
        $CI->load->view($page);
		$CI->load->view('include/footer');
	}
}



?>