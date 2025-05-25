<?php
	function cekLogin(){
		$ci = get_instance();
		if(!$ci->session->userdata('email')){
			redirect('Auth');
		}
		else{
			$role_id = $ci->session->userdata('role_id');
			$menu = $ci->uri->segment(1); 

			$queryMenu = $ci->db->get_where('user_menu',['menu' => $menu])->row_array();
			$menu_id = $queryMenu['id'];

			$userAccess = $ci->db->get_where('user_access_menu',[
				'role_id' => $role_id,
				'menu_id' => $menu_id,
			]);

			if($userAccess->num_rows()<1){
				redirect('Auth/login');
			}
		}
	}

	function cekLoginAuth(){
		$ci = get_instance();
		if($ci->session->userdata('email')){
			redirect('user');
		}
	}
?>
