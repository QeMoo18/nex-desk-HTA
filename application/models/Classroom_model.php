<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Classroom_model extends CI_Model
{
	function __construct()
	{
	// Call the Model constructor
	parent::__construct();
	}

	function register_topic($data)
	{
		$this->db->insert("classroom_create_topic",$data);
	}

	function add_topic($data)
	{
		$this->db->insert("classroom_listsubject",$data);
	}

	function list_subject($id_topic)
	{
		$where = "SELECT * FROM classroom_listsubject WHERE id_topic='$id_topic'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 

			echo '
						<table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>Name Subject </th>
						        <th>Type File</th>
						        <th>Cancel</th>
						      </tr>
						    </thead>
						    <tbody>
				 ';

			foreach ($query->result() as $data){
			  	$title = $data->title_subject;
			  	$type = $data->type_file;
			  	$id = $data->id;
			  	echo '
			  				<tr>
						        <td>'.$title.'</td>
						        <td>'.$title.'</td>
						        <td><a onclick="delete_topic('.$id.');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
						    </tr>
			  		 ';
			}

			echo '
							</tbody>
						</table>
				 ';
			
		}
	}

	function delete_topic($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('classroom_listsubject');
	}

	function update_status_topic($id_topic,$data)
	{
		$this->db->where('id_topic', $id_topic);
		$this->db->update('classroom_create_topic',$data);
	}

	function listdata()
	{
		$where = "SELECT * FROM classroom_create_topic WHERE status='1' ORDER BY id DESC";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 

			foreach ($query->result() as $data){
			  	$pic = $data->name_file;
			  	$title = $data->title_topic;
			  	$id_topic = $data->id_topic;
			  	echo '
			  				<div class="col-md-4 col-sm-6">
					    		<span class="thumbnail">
					      			<img class="img" src="'.base_url().'uploads/'.$pic.'">
					      			<h4><b><center>'.$title.'</center></b></h4>
					      			<hr class="line">
					      			<div class="row">
					      				<div class="col-md-6 col-sm-6">
					      					
					      				</div>
					      				<div class="col-md-6 col-sm-6">
					      					<button class="btn btn-success btn-block" onclick="readmore('.$id_topic.');"> READ MORE</button>
					      				</div>
					      				
					      			</div>
					    		</span>
					  		</div>
			  		 ';
			}
		}
	}


	function listdata_byparam($lookup_list)
	{
		$where = "SELECT * FROM classroom_create_topic WHERE status='1' AND id_topic='$lookup_list'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 

			foreach ($query->result() as $data){
			  	$pic = $data->name_file;
			  	$title = $data->title_topic;
			  	$id_topic = $data->id_topic;
			  	echo '
			  				<div class="col-md-4 col-sm-6">
					    		<span class="thumbnail">
					      			<img class="img" src="'.base_url().'uploads/'.$pic.'">
					      			<h4><b><center>'.$title.'</center></b></h4>
					      			<hr class="line">
					      			<div class="row">
					      				<div class="col-md-6 col-sm-6">
					      					
					      				</div>
					      				<div class="col-md-6 col-sm-6">
					      					<button class="btn btn-success btn-block" onclick="readmore('.$id_topic.');"> READ MORE</button>
					      				</div>
					      				
					      			</div>
					    		</span>
					  		</div>
			  		 ';
			}
		}
	}


	function gettitle($id)
	{
		$where = "SELECT * FROM classroom_create_topic WHERE status='1' AND id_topic='$id'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 

			foreach ($query->result() as $data){
			  	echo $title = $data->title_topic;
			}
		}
	}

	function detailtopic($id)
	{
		$where = "SELECT * FROM classroom_listsubject WHERE id_topic='$id'";
		$result = array();
		$query = $this->db->query($where);
		if ($query->num_rows() >0){ 
			$i=1;
			foreach ($query->result() as $data){
				$id = $data->id;
			  	$title = $data->title_subject;
			  	$type = $data->type_file;
			  	$desc = $data->describe_subject;

			  	echo '
			  				<div class="panel-group">
				                <div class="panel panel-default">
				                  <div class="panel-heading">
				                    <h4 class="panel-title">
				                      <a data-toggle="collapse" href="#'.$id.'" class="collapsed" aria-expanded="false">'.$i.') '.$type.' : '.$title.'</a>
				                    </h4>
				                  </div>
				                  <div id="'.$id.'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
				                    <div class="panel-body">
				                    	'.$desc.'
				                    </div>
				                    <div class="panel-footer"></div>
				                  </div>
				                </div>
				            </div>
			  		 ';
			  	$i++;
			}
		}
	}
}
  

								    
								      
								    