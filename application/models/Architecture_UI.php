<?php 
class Architecture_UI extends CI_Model
{
	function check_register_module($controller)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_module WHERE name_register='$controller'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}
	function register_module($controller)
	{
		$data = array("name_register"=>$controller);
		$this->db->insert('register_module',$data);
	}
	function check_name_function($controller,$nama_function)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_function_in_module WHERE nama_module='$controller' AND nama_function='$nama_function'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	return $data->TOTAL;
		    }
		} else {
			return '0';
		}
	}
	function register_name_function($controller,$nama_function)
	{
		$data = array("nama_module"=>$controller,"nama_function"=>$nama_function);
		$this->db->insert('register_function_in_module',$data);
	}
	function check_id_field($id)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM list_formfield WHERE id_field='$id'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}
	function check_name_field($name)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM list_formfield WHERE name_field='$name'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}

	function addfieldview($data)
	{
		$this->db->insert("list_formfield",$data);
	}

	function listadded($id_view)
	{
		$where = "SELECT * FROM list_formfield WHERE id_view='$id_view'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
			echo '
					<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Label</th>
					        <th>Type</th>
					        <th>ID</th>
					        <th>Name</th>
					        <th>Delete</th>
					      </tr>
					    </thead>
					    <tbody>
				 ';
		    foreach ($query->result() as $data) {
		    	echo '
		    			<tr>
		    				<td>'.$data->label.'</td>
		    		 		<td>'.$data->type.'</td>
		    		 		<td>'.$data->id_field.'</td>
		    		 		<td>'.$data->name_field.'</td>
		    		 		<td><i class="fa fa-trash" aria-hidden="true" onclick="delete_field('.$data->id.');"></i></td>
		    		 	</tr>
		    		 ';	
		    }
		    echo '
		    			</tbody>
  					</table>
		    	 ';

		} else {
			
		}
	}

	function deleteadded($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('list_formfield'); 
	}

	function check_namefunction($name_controller,$name_function)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_view WHERE controller='$name_controller' AND function='$name_function'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}

	function check_nameview($name_view)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_view WHERE view='$name_view'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}

	function register_view($data)
	{
		$this->db->insert('register_view',$data);
	}

	

	function getform($id_view)
	{
		$where = "SELECT * FROM list_formfield WHERE id_view='$id_view'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
    		foreach ($query->result() as $data){
    			$result[] = $data;
    			//$status = $data->STATUS;	
    		     		
    		}
    		return $result;
		}
	}

	function getcolumn($id_view)
	{
		$where = "SELECT * FROM list_fielddatables WHERE id_view='$id_view'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
    		foreach ($query->result() as $data){
    			$result[] = $data;
    			//$status = $data->STATUS;	
    		     		
    		}
    		return $result;
		}
	}

	function add_column_fielddtables($data)
	{
		$this->db->insert('list_fielddatables',$data);
	}

	function listadded_column($id_view)
	{
		$where = "SELECT * FROM list_fielddatables WHERE id_view='$id_view'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
			echo '
					<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Name Column</th>
					        <th>Delete</th>
					      </tr>
					    </thead>
					    <tbody>
				 ';
		    foreach ($query->result() as $data) {
		    	echo '
		    			<tr>
		    		 		<td>'.$data->column_name.'</td>
		    		 		<td><i class="fa fa-trash" aria-hidden="true" onclick="delete_field('.$data->id.');"></i></td>
		    		 	</tr>
		    		 ';	
		    }
		    echo '
		    			</tbody>
  					</table>
		    	 ';

		} else {
			
		}
	}

	function deleteadded_column($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('list_fielddatables'); 
	}

	function check_name_controller($name_controller)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_module WHERE name_register='$name_controller'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}

	function check_name_model($name_model)
	{
		$where = "SELECT COUNT(*) AS TOTAL FROM register_module WHERE name_model='$name_model'";
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
		    foreach ($query->result() as $data) {
		    	
		    }
		    echo $data->TOTAL;
		} else {
			echo '0';
		}
	}

	function add_module($data)
	{
		$this->db->insert('register_module',$data);
	}

	function parent_menu()
	{
		$idModule = $this->session->userdata('idModule');

        if(!empty($idModule)&& in_array('Admin',$idModule)){
          $admin = '
          				<li class="">
						    <a href="'.base_url().'menu/overview/admin">
					            <i class="fa fa-user-circle"></i> <span>Admin</span>
					        </a>
					    </li>
          		   ';
        } else {
          $admin = "";
        }

        if(!empty($idModule)&& in_array('Customer',$idModule)){
          $cust = '
          				<li class="">
						    <a href="'.base_url().'menu/overview/customer">
					            <i class="fa fa-users"></i> <span>Customer</span>
					        </a>
					    </li>
          		  ';
        } else {
          $cust = "";
        }


        if(!empty($idModule)&& in_array('Ticket',$idModule)){
          $ticket = '
          				<li class="">
						    <a href="'.base_url().'menu/overview/ticket">
					            <i class="fa fa-ticket"></i> <span>Ticket</span>
					        </a>
					    </li>
          			';
        } else {
          $ticket = "";
        }

        if(!empty($idModule)&& in_array('Service',$idModule)){
          $service = '
          				<li class="">
						    <a href="'.base_url().'menu/overview/service">
					            <i class="fa fa-tasks"></i> <span>Service</span>
					        </a>
					    </li>

          			 ';
        } else {
          $service = "";
        }

        if(!empty($idModule)&& in_array('CMDB',$idModule)){
          $cmdb = '
          				<li class="">
						    <a href="'.base_url().'menu/overview/cmdb">
					            <i class="fa fa-sliders"></i> <span>Asset / Inventory</span>
					        </a>
					    </li>
				  '
          		  ;
        } else {
          $cmdb = "";
        }

        if(!empty($idModule)&& in_array('Report',$idModule)){
          $report = '

          				<li class="">
						    <a href="'.base_url().'menu/overview/report">
					            <i class="fa fa-bar-chart"></i> <span>Report</span>
					        </a>
					    </li>
          			';
        } else {
          $report = "";
        }

		echo '
			    <li class="">
				    <a href="'.base_url().'dashboard">
			            <i class="fa fa-tv"></i> <span>Dashboard</span>
			        </a>
			    </li>

			    '.$cust.'

			    '.$service.'

			    '.$ticket.'
			    
			    '.$cmdb.'

			    '.$report.'

			    '.$admin.'


			    <li class="">
				    <a href="'.base_url().'login/logout">
			            <i class="fa fa-sign-out"></i> <span>Logout</span>
			        </a>
			    </li>



			 ';
	}

	function parent_menu_v2()
	{
		$idModule = $this->session->userdata('idModule');

		echo '
					<li>
                        <a href="'.base_url().'dashboard" data-original-title="" title=""  style="padding-left: 13px;">
                        <i class="fa fa-desktop"></i>
                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
                           Dashboard
                        </span>
                        <i class="arrow"></i>
                        </a>
                    </li>
              ';

       	if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Ticket',$idModule)))
        { 
	        echo '
						<li onclick="ticket_tab();">
	                        <a data-original-title="" title="" style="padding-left: 13px;">
	                        <i class="fa fa-ticket"></i>
	                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
	                           Ticket
	                        </span>
	                        <i class="arrow"></i>
	                        </a>
	                        
	                        <div id="ticket_tab_data" style="display:none;">  
								<ul class="collapse in" aria-expanded="true">

								    <li><a href="'.base_url().'Ticket/Ticket_Search" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Search Ticket </a></li>

								    <li><a href="'.base_url().'Ticket/CreateTicket_Phone" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Add Ticket : Phone </a></li>

								    <li><a href="'.base_url().'Ticket/CreateTicket_Email" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Add Ticket : Email </a></li>

								    <li><a href="'.base_url().'Ticket/Ticket_StatusView" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Ticket Status View </a></li>


								    <li><a href="'.base_url().'Ticket/Ticket_QueuView" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Queue by View Ticket </a></li>

								    <li><a href="'.base_url().'Ticket/MS_Overview_Open" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Master Ticket </a></li>

								    
								</ul>
							</div>
	                    </li>
	                ';
	    }

	    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Customer',$idModule)))
        { 
	        echo '
	                    <li onclick="customer_tab();">
	                        <a data-original-title="" title=""  style="padding-left: 13px;">
	                        <i class="fa fa-users"></i>
	                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
	                           Customer
	                        </span>
	                        <i class="arrow"></i>
	                        </a>
	                        
	                        <div id="customer_tab_data" style="display:none;">  
								<ul class="collapse in" aria-expanded="true">
									<li class="list-header" style="padding-left: 13px; font-size: 11px;font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">Customer Information Center</li>
								    <li><a href="'.base_url().'Customer/CMC_Customer" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Search Customer </a></li>

								    <li><a href="'.base_url().'Customer/CMC_Customer" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Search Customer User </a></li>

								    
								</ul>
								<hr>
								<ul class="collapse in" aria-expanded="true">
									<li class="list-header" style="padding-left: 13px; font-size: 11px;font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">Customer User Adminstrator</li>
								    <li><a href="'.base_url().'Customer/CUA_ViewList" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> View Customer User </a></li>

								    <li><a href="'.base_url().'Customer/CUA_FormCustomer" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Add Customer User </a></li>
								</ul>
								<hr>
								<ul class="collapse in" aria-expanded="true">
								    <li><a href="'.base_url().'Customer/CU_Link_Location" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Link User Location </a></li>

								    <li><a href="'.base_url().'Customer/CMC_Link_Service" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Manage Customer Services </a></li>
								</ul>
							</div>
	                    </li>
	            ';
	    }


	    if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Report',$idModule)))
        { 
          	echo '
                    <li>
                        <a href="'.base_url().'report/report_v3" data-original-title="" title=""  style="padding-left: 13px;">
                        <i class="fa fa-laptop"></i>
                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
                           Report
                        </span>
                        <i class="arrow"></i>
                        </a>
                    </li>
                 ';
        }


        if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Service',$idModule)))
        { 
            echo '
                    <li onclick="services_tab();">
                        <a data-original-title="" title=""  style="padding-left: 13px;">
                        <i class="fa fa-tasks"></i>
                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
                           Services
                        </span>
                        <i class="arrow"></i>
                        </a>
                        
                        <div id="services_tab_data" style="display:none;">  
							<ul class="collapse in" aria-expanded="true">
							    <li><a href="'.base_url().'Service/Service_ListView" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> Services </a></li>

							    <li><a href="'.base_url().'Service/SLA_ListView" style="padding-left: 13px;font-size: 13px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;"><i class="fa fa-caret-right"></i> SLA </a></li>

							    
							</ul>
						</div>
                    </li>
                ';
        }


        if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        { 
            echo '
                    <li>
                        <a href="'.base_url().'menu/overview/admin" data-original-title="" title=""  style="padding-left: 13px;">
                        <i class="fa fa-user"></i>
                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
                           Administrator
                        </span>
                        <i class="arrow"></i>
                        </a>
                    </li>
                 ';
        }


        if((!empty($this->session->userdata('logged_in'))) && (!empty($idModule)&& in_array('Admin',$idModule)))
        { 
            echo '
                    <li>
                        <a href="'.base_url().'desktop_management" data-original-title="" title=""  style="padding-left: 13px;">
                        <i class="fa fa-laptop"></i>
                        <span class="menu-title" style="font-size: 14px; font-family: Roboto Slab, "Open Sans", Arial, sans-serif;">
                           Desktop Central
                        </span>
                        <i class="arrow"></i>
                        </a>
                    </li>
                    
			 ';
		}
	}

	// function parent_menu_v2()
	// {
	// 	$idModule = $this->session->userdata('idModule');

 //        if(!empty($idModule)&& in_array('Admin',$idModule)){
 //          $admin = '
 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/admin">
	// 				            <i class="fa fa-user"><span class="menu-title"> Admin</span></i> 
	// 				        </a>
	// 				    </li>


 //          		   ';
 //        } else {
 //          $admin = "";
 //        }

 //        if(!empty($idModule)&& in_array('Customer',$idModule)){
 //          $cust = '
 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/customer">
	// 				            <i class="fa fa-users"><span class="menu-title"> Customer</span></i>
	// 				        </a>
	// 				    </li>
 //          		  ';
 //        } else {
 //          $cust = "";
 //        }


 //        if(!empty($idModule)&& in_array('Ticket',$idModule)){
 //          $ticket = '
 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/ticket">
	// 				            <i class="fa fa-ticket"><span class="menu-title"> Ticket</span></i> 
	// 				        </a>
	// 				    </li>
 //          			';
 //        } else {
 //          $ticket = "";
 //        }

 //        if(!empty($idModule)&& in_array('Service',$idModule)){
 //          $service = '
 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/service">
	// 				            <i class="fa fa-tasks"><span class="menu-title"> Service</span></i> 
	// 				        </a>
	// 				    </li>

 //          			 ';
 //        } else {
 //          $service = "";
 //        }

 //        if(!empty($idModule)&& in_array('CMDB',$idModule)){
 //          $cmdb = '
 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/cmdb">
	// 				            <i class="fa fa-sliders"><span class="menu-title"> Asset / Inventory</span></i> 
	// 				        </a>
	// 				    </li>
	// 			  '
 //          		  ;
 //        } else {
 //          $cmdb = "";
 //        }

 //        if(!empty($idModule)&& in_array('Report',$idModule)){
 //          $report = '

 //          				<li class="">
	// 					    <a href="'.base_url().'menu/overview/report">
	// 				            <i class="fa fa-bar-chart"><span class="menu-title"> Report</span></i> 
	// 				        </a>
	// 				    </li>
 //          			';
 //        } else {
 //          $report = "";
 //        }

	// 	echo '
	// 		    <li class="">
	// 			    <a href="'.base_url().'dashboard">
	// 		            <i class="fa fa-desktop"><span class="menu-title"> Dashboard</span></i> 
	// 		        </a>
	// 		    </li>

	// 		    '.$cust.'

	// 		    '.$service.'

	// 		    '.$ticket.'
			    
	// 		    '.$cmdb.'

	// 		    '.$report.'

	// 		    '.$admin.'

	// 		    <li class="">
	// 			    <a href="'.base_url().'admin/nex_bot">
	// 		            <i class="fa fa-comment"><span class="menu-title"> Chat</span></i> 
	// 		        </a>
	// 		    </li>


	// 		    <li class="">
	// 			    <a href="'.base_url().'login/logout">
	// 		            <i class="fa fa-sign-out"><span class="menu-title"> Logout</span></i> 
	// 		        </a>
	// 		    </li>



	// 		 ';
	// }


	//for dev 
	// function parent_menu()
	// {
	// 	$where = "SELECT * FROM register_module ";
	// 	$result = array();
	// 	$query = $this->db->query($where);
	// 	if ($query->num_rows() >0){ 
 //    		foreach ($query->result() as $data){
 //    			//$result[] = $data;
 //    			//$status = $data->STATUS;	
 //    		  	$parent = $data->name_register;
 //    		  	$icon = $data->fa_fa_icon;


 //    		  	$where = "SELECT * FROM register_view Where controller='$parent'";
	// 			$result = array();
	// 			$query = $this->db->query($where);
	// 			if ($query->num_rows() >0){ 

	// 				echo '
	// 						<li class="treeview">
	// 							<a href="#">
	// 								<i class="'.$icon.'"></i> <span>'.$parent.'</span>
	// 					            <span class="pull-right-container">
	// 					              <i class="fa fa-angle-left pull-right"></i>
	// 					            </span>
	// 					        </a>
	// 					        <ul class="treeview-menu">
	// 					 ';
	// 	    		foreach ($query->result() as $data){
	// 	    			$view = $data->function;
	// 	    			$title = $data->title_form;
	// 	    			$status_show = $data->status_show;
	// 	    			if($status_show=='1'){
	// 	    				echo '<li><a href="'.base_url().$parent.'/'.$view.'"><i class="fa fa-circle-o"></i>'.$title.'</a></li>';
	// 	    			} else {

	// 	    			}
		    			

	// 	    		}
	// 	    		echo '</ul>';

	// 	    	} else {
	// 	    		echo '<li class=""><a href="'.base_url().$parent.'"><i class="'.$icon.'"></i> <span>'.$title.'</span></a></li>';
	// 	    	}

 //    		}
 //    		//return $result;
	// 	} 	
	// }

	function gettitle($id_view)
	{
		$where = "SELECT * FROM register_view WHERE id_view='$id_view'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
    		foreach ($query->result() as $data){
    		  	$title = $data->title_form;
    		}
    		return $title;
    	}
	}
}
