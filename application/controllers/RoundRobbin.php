<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class RoundRobbin extends CI_Controller {

	function __construct(){
        /* Session Checking Start*/
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('common_model');
        $this->load->model('callback_model');
        $this->load->library('session');
    }
    public function index($value='')
    {

    	$data = array('saved'=>0);
		$un_saved = $this->common_model->get_where_groupby($data,'online_leads','project_id'); 
		//print_r($un_saved);die;
		foreach ($un_saved as $us) { 
			//echo $us->id;die;
			$lead_data = array('id'=>$us->project_id);
			$project_data = $this->common_model->get_where_groupby($lead_data,'project','id');
			$o_l_id= $us->id; 
			foreach ($project_data as $p_data) {
				echo $o_l_id."onlline lead id <br>";
				$city_id = array('city_id'=>$p_data->city_id);
				if($p_data->city_id)
			 	{
			 		$user_data = array('city_id'=>$p_data->city_id,'type'=>1,'active'=>1,'date(last_update)'=>date('Y-m-d')); 
			 		$user = $this->common_model->get_users_for_assign($user_data,'user'); 
			 		$this->common_model->userCountplus($user[0]->id); 
			 		$this->save_online_leads($user[0]->id,$o_l_id);
			 		$this->index();
			 	}
			} 
		   		
		   	}   	 
    }
    public function save_online_leads($user='',$online_lead_id='',$project_id=''){
    	//echo "this funciton calling";die;
		$error=0;
		$ext=''; 
			$dept=1;
			$callback_type=1; 
			$broker=1;
			$status=1;
			$due_date=date('Y-m-d');
			$due_time=date('h:m'); 
 
				$lead_data = $this->common_model->getFromId($online_lead_id, 'id', 'online_leads');
				 if($project_id)
				 {
				 $p_id['id'] =$project_id;
				}
				else
				{
				if($lead_data->source=='99acres')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,1);
				if($p_id['id']=='')
					$p_id['id']=88;
				}
				elseif($lead_data->source=='Magicbricks')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,2);
				if($p_id=='')
					$p_id['id']=88;
				}
				elseif($lead_data->source=='Commonfloor')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,3);
				if($p_id=='')
					$p_id['id']=88;
				}
				elseif($lead_data->source=='GOOGLE PPC')
				{
				$p_id=$this->common_model->get_project_id_by_name($lead_data->project,3);
				if($p_id=='')
					$p_id['id']=88;
				}
				else
				{
					//$p_id=703;
				}
			} 
				$data=$this->common_model->getsourceId($lead_data->source);

				$data=array(
					'dept_id'=>1,
					'name'=>$lead_data->name,
					'contact_no1'=>$lead_data->phone,
					'callback_type_id'=>1,
					'email1'=>$lead_data->email,
					'project_id'=>$p_id['id'],
					'lead_source_id'=>$data['id'],
					'leadid'=>$lead_data->leadid,
					'user_id'=>$user,
					'due_date'=>$due_date,
					'broker_id'=>$broker,
					'status_id'=>1,
					'notes'=>$lead_data->notes,
					'date_added'=>date('Y-m-d H:i:s'),
				);
				$this->callback_model->add_callbacks($data);
				$data = $this->common_model->updateWhere(array('id'=>$lead_data->id));
				if($data)
					echo "success";
				else
					echo "fails"; 
	}
	public function make_count_zero($value='')
	{
	$bool =	$this->common_model->make_count_zero();
	if($bool)
		echo "truncated";
	else
		echo "truncation Failed";
	}
}