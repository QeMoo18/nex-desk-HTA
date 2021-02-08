<script type="text/javascript" src="<?=base_url()?>asset_admin/bower_components/ckeditor/ckeditor.js"></script>

<div class="pageheader hidden-xs">
    <h3><i class="fa fa-ticket"></i> Ticket Information</h3>
    <div class="breadcrumb-wrapper">
        <span class="label" style="padding-right: 0px;"><i class="fa fa-cog" aria-hidden="true" style="border: 2px solid #f2f7f8;padding-right: 0px;"></i></span>
        <ol class="breadcrumb">
            <li> <a href="<?=base_url()?>Ticket/CreateTicket_Phone"> Create Ticket </a> </li>
            <li> <a href="<?=base_url()?>Ticket/Ticket_StatusView"> Ticket Status </a> </li>
            <li> <a href="<?=base_url()?>Ticket/MS_Overview_Open"> Master Status </a> </li>
        </ol>
    </div>
</div>





<div class="row">

  <div class="col-md-12">
      <!--Default Tabs (Right Aligned)-->
      <!--===================================================-->
      <div class="tab-base">
              <!--Nav tabs-->
              <ul class="nav nav-tabs tabs-right">

                  <span class="font-small" style="float: left; padding-top: 15px; padding-left: 10px;color: #fff;">Ticket Activities</span>

                  <li class="active">


                      <a data-toggle="tab" href="#demo-righticon-tab-1" aria-expanded="true">
                        <i class="fa fa-home fa-lg"></i> 
                      </a>
                  </li>
                  <li id="btn_itsm">
                      <a data-toggle="tab" href="#demo-righticon-tab-2">
                        <i class="fa fa-sitemap fa-lg"></i> <span style="color: #66ddc7;">Edit ITSM</span>
                      </a>
                  </li>
                  <li id="btn_com">
                      <a data-toggle="tab" href="#demo-righticon-tab-3">
                        <i class="fa fa-group fa-lg"></i> <span style="color: #66ddc7;">Communication</span>
                      </a>
                  </li>
                  <li class="" id="btn_people">
                      <a data-toggle="tab" href="#demo-righticon-tab-4" aria-expanded="false">
                        <i class="fa fa-user fa-lg"></i> <span style="color: #66ddc7;">People</span>
                      </a>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-print fa-lg"></i> <span style="color: #66ddc7;">Print</span>

                        <ul class="dropdown-menu" style="background: #ffffff;padding: 0px;padding-top: 0px;">
                          <li onclick="print_ticket_single_word();"><a> <i class="fa fa-file-word-o" aria-hidden="true"></i> Word</a></li>
                          <li onclick="print_ticket_single_pdf();"><a><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf</a></li>
                        </ul>

                      </a>
                  </li>
                  <li class="" id="btn_close">
                      <a onclick="redirect_close_ticket();" aria-expanded="false">
                        <i class="fa fa-history fa-lg"></i> <span style="color: #66ddc7;">Close</span>
                      </a>
                  </li>
              </ul>
              <!--Tabs Content-->
              <div class="tab-content">
                  <div id="demo-righticon-tab-1" class="tab-pane fade active in">
                      
                      
                      <div class="row">

                        <div class="col-md-6">
                          <div class="panel">
                                <!--Panel heading-->
                                <div class="panel-heading">
                                    <h3 class="panel-title" style="background-color: whitesmoke; font-size: 17px;"><b>Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></b> <span class="pull-right hidden-xs"><a onclick="group_chat();"><i class="fa fa-comments" aria-hidden="true"></i> Group Chat</a> | <a href="<?=base_url()?>Ticket/Ticket_ViewActivities/<?= $this->uri->segment(3)?>" target="_blank"><i class="fa fa-folder-open-o" aria-hidden="true"></i> View Case</a>  </span></h3>
                                </div>
                                <!--Panel body-->
                                <div class="panel-body" style="overflow-y:scroll; padding-right: 30px; max-height: 300px;padding-top: 80px;">
                                    <div class="timeline" >

                                        <?= lookup_list_note_activities($this->uri->segment(3))?>
                                        
                                    </div>
                                </div>
                          </div>
                        </div>

                        <div class="col-md-6">


                          <?php $id = $this->uri->segment(3)?>
                          <div class="panel">
                              <div class="panel-body pad-ver-5">
                                  <?= lock_by($id)?>
                                  <span class="pull-right font-smaller" id="lock" style="display: none"><a onclick="active_lock();" ><i class="fa fa-key" aria-hidden="true"></i> Unlock Ticket</a></span>

                                  <ul class="nav nav-section nav-justified">
                                      <li>
                                          <div class="section">
                                              <h5 class="text-left font-small"> Ticket Open <i class="fa fa-caret-down text-success"></i></h5>
                                              <p class="text-left font-small start_ticket"> <?= time_start_ticket($id)?> </p>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="section">
                                              <h5 class="text-left font-small"> Total Time <i class="fa fa-caret-down text-success"></i></h5>
                                              <p class="text-left font-small total_time"> <?= time_ticket_total($id)?> </p>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="section">
                                              <h5 class="text-left font-small"> Pending Time <i class="fa fa-caret-down text-danger"></i></h5>
                                              <p class="text-left font-small pending_date"> <?= time_pending_total($id)?> </p>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="section">
                                              <h5 class="text-left font-small"> Working Hour <i class="fa fa-caret-down text-success"></i></h5>
                                              <p class="text-left font-small working_date"> <?= time_working_total($id)?> </p>
                                          </div>
                                      </li>
                                      <li id="maso_tutup_ticket_div">
                                          <div class="section">
                                              <h5 class="text-left font-small"> Close Date <i class="fa fa-caret-down text-success"></i></h5>
                                              <p class="text-left font-small closed_date"> <?= time_close_total($id)?> </p>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </div>



                          <div class="tab-base tab-stacked-left">
                              <!--Nav tabs-->
                              <ul class="nav nav-tabs" style="border: 0;background: #fcfcfc;">
                                  <li class="active ">
                                      <a data-toggle="tab" href="#demo-stk-lft-tab-1" aria-expanded="true" class="font-small">Ticket</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#demo-stk-lft-tab-2" aria-expanded="false" class="font-small">Customer</a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#demo-stk-lft-tab-3" class="font-small">Asset</a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#demo-stk-lft-tab-4" class="font-small">Agent</a>
                                  </li>
                              </ul>
                              <!--Tabs Content-->
                              <div class="tab-content">
                                  <div id="demo-stk-lft-tab-1" class="tab-pane fade active in">
                                      <h4 class="text-thin font-small">Ticket Information</h4>
                                      <?= data_ticket($this->uri->segment(3))?>
                                  </div>
                                  <div id="demo-stk-lft-tab-2" class="tab-pane fade">
                                      <h4 class="text-thin font-small">Customer Information</h4>
                                      <?= data_customer($this->uri->segment(3))?>
                                  </div>
                                  <div id="demo-stk-lft-tab-3" class="tab-pane fade">
                                      <h4 class="text-thin font-small">Asset / Inventory Information</h4>
                                      <?= data_asset($this->uri->segment(3))?>
                                  </div>
                                  <div id="demo-stk-lft-tab-4" class="tab-pane fade">
                                      <h4 class="text-thin font-small">Agent Information</h4>
                                      <?= data_agent($this->uri->segment(3))?>
                                  </div>
                              </div>
                          </div>



                        </div>


                      </div>

                  </div>
                  <div id="demo-righticon-tab-2" class="tab-pane fade">
                    <form id="idForm" action="<?=base_url()?>ticket/add_itsm" method="post" enctype="multipart/form-data">
                      <div class="panel">
                          <!--Panel heading-->
                          <div class="panel-heading ui-sortable-handle" style="background: #0d406305;">
                              <h3 class="panel-title font-small">Edit ITSM : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h3>
                          </div>
                          <!--Panel body-->
                          <div class="panel-body">

                              <?php $id = $this->uri->segment(3)?>

                              <input type="hidden" name="type_module" value="email">
                              <input type="hidden" name="type_dothis" value="manual">
                              <input type="hidden" name="" id="other_id">
                              <input type="hidden" name="id_ticket" value="<?= $id ?>">

                              

                              <div class="row" style="padding-bottom: 30px;">
                                <div class="col-md-12">
                                  <p class="font-small">Ticket Information</p>
                                </div>
                                <div class="row" style="padding-left: 10px;">
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">* Subject/Title</p>
                                    <input class="form-control" name="itsm_subject_title" id="itsm_subject_title" value="<?= subject_note($id); ?>" required="">
                                  </div>
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">* To Queue</p>
                                    <select class="form-control" name="itsm_to_queu" id="itsm_to_queu">
                                      <?= pull_data_itsm_to_queu($id) ?>
                                    </select>
                                  </div>
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">Problem Description</p>
                                    <select class="form-control" name="problem_desc_itsm" id="problem_desc_itsm">
                                      <?= pull_problem_desc($id); ?>
                                    </select>
                                  </div>  

                                  <div class="form-group col-md-2" id="div_ml_status">
                                     <p class="font-smaller">* Main Line Status</p>
                                      <select class='form-control' name='itsm_main_line' id='itsm_main_line' >
                                        <?= pull_data_status_note($id) ?>
                                      </select>
                                  </div>

                                    
                                  <div class="form-group col-md-2" id="div_backup_type">
                                     <p class="font-smaller">* Backup Type</p>
                                      <select class='form-control' name='itsm_backup_type' id='itsm_backup_type' >
                                        <?= pull_data_bs_note($id) ?>
                                      </select>
                                  </div>
                                </div>
                                

                                <div class="row" style="padding-left: 10px;">                  
                                  <div class="form-group col-md-2" id="div_backup_status">
                                     <p class="font-smaller">* Backup Status</p>
                                      <select class='form-control' name='itsm_backup_status' id='itsm_backup_status' >
                                        <?= pull_data_bstatus_note($id) ?>
                                      </select>
                                  </div>
                              
                                  <div class="form-group col-md-2" id="div_pending_date">
                                       <p class="font-smaller">Pending Date</p>
                                        <input type='text' class='datepicker form-control' name='itsm_pending_date' id='itsm_pending_date' value="<?= pull_data_pendingdate_note($id) ?>"> 
                                  </div>
                              
                                  <div class="form-group col-md-2" id="div_impact">
                                     <p class="font-smaller">Impact</p>
                                      <select class='form-control' name='itsm_impact' id='itsm_impact'><?= pull_data_impact_note($id) ?>
                                      </select>
                                  </div>
                              
                                  <div class="form-group col-md-2" id="div_priority">
                                     <p class="font-smaller">Priority</p>
                                      <select class='form-control' name='itsm_priority' id='itsm_priority'>
                                      <?= pull_data_priority_note($id) ?>
                                      </select>
                                  </div>

                                  <?php $id = $this->uri->segment('3'); ?>
                                  <div class="form-group col-md-2" id="provider_div">
                                     <p class="font-smaller">Provider Reference</p>
                                      <input type="text" name="provider_ref" id="provider_ref" class="form-control" value="<?=  pull_data_provider_ref($id) ?>">
                                  </div>
                                </div>



                                <div class="col-md-12" style="padding-top: 10px;">
                                  <hr>
                                  <p class="font-small">Customer Information</p>
                                </div>
                                <div class="row" style="padding-left: 10px;">
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">* Reference No</p>
                                    <input type="text" class="form-control" name="tp_ReferenceNo" id="tp_ReferenceNo" onkeyup="ref_no();" list="list_ref" required="required">
                                  </div>
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">Service</p>
                                    <input type="text" class="form-control" name="tp_service" id="tp_service">
                                  </div>
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">Fault ITSM Category</p>
                                    <select class="form-control" name="fault_itsm_cat" id="fault_itsm_cat">
                                      <option value="">--Please Select --</option>
                                      <?= lookup_fault_itsm_category(); ?>  
                                    </select>
                                    <span id="alert_fault_itsm_cat"></span> 
                                  </div>
                                  <div class="col-md-2"> 
                                    <p class="font-smaller">* Service Level Agreement</p>
                                    <select class="form-control" name="tp_sla" id="tp_sla" required="required">
                                      <option value="">--Please Select --</option>
                                      <?= lookup_sla_by_name()?>
                                    </select>
                                  </div>
                                </div>

                                <div class="row" style="padding-left: 10px;">
                                  <?php 
                                  $env = $this->session->userdata('env');
                                  if($env=='noc'){

                                  } else {
                                  ?>
                                  <div class="form-group col-md-2" id="div_severity" style="display: none;">
                                    <p class="font-smaller">* Severity</p>
                                    <select class='form-control' name='tp_severity' id='tp_severity' required="required">
                                      <?= lookup_severity(); ?>
                                      
                                    </select>
                                  </div>
                                  <?php } ?>

                                  <div class="col-md-2"> 
                                    <p class="font-smaller">Location</p>
                                    <input type="text" class="form-control" name="tp_loc" id="tp_loc">
                                  </div>

                                  <div class="col-md-2"> 
                                    <p class="font-smaller">* ITSM Category</p>
                                    <input type="text" class="form-control" name="tp_itsm" id="tp_itsm" required="required">
                                    <span id="alert_tp_itsm"></span>
                                  </div>


                                  <div class="col-md-2"> 
                                    <p class="font-smaller">Customer ID</p>
                                    <input type="text" class="form-control" name="tp_cuID" id="tp_cuID">
                                  </div>


                                  <input type="hidden" name="ticket_customer_id">
                                </div>

                              </div>

                              <!-- LIST DATA -->
                              <div class="row" style="padding-left: 0px; padding-top: 0px;">
                                <hr>
                                <div class="form-group col-md-8" style="padding-top: 10px;">
                                  <p class="font-small"> List Of Customer User | <a onclick="show_cu();" id="add_cust_user_div"> <i class="fa fa-plus-circle" aria-hidden="true" ></i> Add Customer User </a></p>
                                  <table class="table table-striped font-smaller">
                                    <tr>
                                      <th> Customer User </th>
                                      <th> Delete </th>
                                    </tr>
                                    <tbody id="list_data" class="font-smaller"> 
                                      
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <!-- END -->


                              <div class="row" style="padding-bottom: 30px;">
                                  <button class="btn btn-primary pull-right">Update</button>
                              </div>


                          </div>
                      </div>
                    </form>

                  </div>
                  <div id="demo-righticon-tab-3" class="tab-pane fade">
                      
                      <div class="panel">
                                    <!--Panel heading-->
                        <div class="panel-heading ui-sortable-handle" style="background: #0d406305;">
                            <div class="panel-control">
                                <div class="btn-group open">
                                    <button class="btn btn-danger font-small" style="background-color: #dd4b3900;"><font color="#000;">Communication</font></button>
                                    <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button" aria-expanded="true">
                                    <i class="dropdown-caret fa fa-caret-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">

                                        <?php if(check_fl($this->uri->segment(3))>0) { ?>
                                          <li class="font-small"><a onclick="note_page();">Note</a></li>
                                          <li class="divider"></li>
                                          <li class="font-small"><a onclick="pending_page();">Pending</a></li>
                                        <?php } else { ?>

                                          <li class="font-small"><a onclick="first_level_page();">First Level</a></li>
                                          <li class="divider"></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="panel-title font-small">Communication : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h3>
                        </div>
                        <!--Panel body-->
                        <div class="panel-body">
                          <?php if(check_fl($this->uri->segment(3))>0) { ?>
                            
                            <div class="row" id="note_page">
                              <form id="idForm" action="<?=base_url()?>ticket/add_note_btnnote" method="post" enctype="multipart/form-data">

                                  <div class="form-group col-md-3">
                                      <p class="font-smaller">Responsible</p>
                                      <select class='form-control' name='tp_r' id='tp_r'>
                                        
                                        <?= pull_data_responsible_note($id); ?> 
                                      </select>
                                      <span id="alert_tp_r"></span>
                                  </div>

                                  <div class="form-group col-md-3">
                                      <p class="font-smaller">* State</p>
                                      <select class='form-control' name='tp_state' id='tp_state_note' required="required">
                                        <option value="">--Select State --</option>
                                        <?= pull_data_state_note($id)?>

                                      </select>
                                      <span id="alert_tp_r"></span>
                                  </div>


                                  <div class="form-group col-md-3" style="display: none">
                                    <p class="font-smaller">Pending Date</p>
                                    <input type='Date' class='form-control' name='tp_calendar' id='tp_calendar' value="<?= pull_data_pendingdate_note($id)?>" > 
                                  </div>

                                  <input type="hidden" name="id_ticket" value="<?= $id ?>">
                                  <div class="col-md-10">
                                    <p class="font-smaller">Note : </p>
                                    <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
                                  </div>

                                  <div class="col-md-12" style="padding-bottom: 10px; padding-top: 10px;">
                                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                  </div>
                              </form> 
                            </div>
                            <div class="row" id="pending_page" style="display: none">
                              <form id="idForm" action="<?=base_url()?>ticket/add_note_pendingresume" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id_ticket" value="<?= $id ?>">

                                  <div class="form-group col-md-2">
                                      <p class="font-smaller">Status</p>
                                      <input type='text' class='form-control' name='type_ticket2' id='type_ticket2' disabled="disabled"> 
                                  </div>

                                    <input type="hidden" name="type_ticket" id="type_ticket" value="pending">

                                  <div class="form-group col-md-3">
                                      <p class="font-smaller">* Subject/ Title</p>
                                      <input type='text' class='form-control' name='tp_title' id='tp_title' required="required" value="<?= subject_note($id); ?>">
                                      <span id="alert_tp_title"></span>  
                                  </div>

                                  <div class="form-group col-md-3">
                                    <p class="font-smaller">Attachment</p>
                                    <input type='file' class='form-control' name='userfile' id='userfile'> 
                                  </div>

                                  <div class="form-group col-md-2">
                                    <p class="font-smaller">* State</p>
                                    <select class='form-control' name='tp_state' id='tp_state' required="required">
                                      <?= pull_data_state_note($id)?>

                                    </select>
                                    <span id="alert_tp_r"></span>
                                  </div>

                                  <div class="form-group col-md-2" style="display: none">
                                    <p class="font-smaller">Pending Date</p>
                                    <input type='Date' class='form-control' name='tp_calendar' id='tp_calendar' value="<?= pull_data_pendingdate_note($id)?>"> 
                                  </div>

                                  <div class="col-md-10">
                                    <p class="font-smaller">Pending Note : </p>
                                    <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
                                  </div>


                                  <div class="col-md-12" style="padding-bottom: 10px; padding-top: 10px;">
                                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                  </div>

                              </form> 
                            </div>
                          <?php } else { ?>
                            <div class="row" id="first_level_page">
                              <form id="idForm" action="<?=base_url()?>ticket/add_note_firstlevel" method="post" enctype="multipart/form-data">
                                  <input type="hidden" name="id_ticket" value="<?= $id ?>">
                                  <div class="col-md-10">
                                    <p class="font-smaller">First Level : </p>
                                    <textarea class="ckeditor" name="html_link_content" id="ckedtor"></textarea>
                                  </div>
                                  <div class="col-md-12" style="padding-bottom: 10px; padding-top: 10px;">
                                    <button class="btn btn-primary pull-right" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                                  </div>
                              </form> 
                            </div>
                          <?php } ?>
                        </div>
                      </div>


                  </div>
                  <div id="demo-righticon-tab-4" class="tab-pane fade">
                    <div class="tab-base tab-stacked-left">
                          <!--Nav tabs-->
                          <ul class="nav nav-tabs">
                              <li class="active">
                                  <a data-toggle="tab" href="#demo-stk-lft-tab-people1">Owner</a>
                              </li>
                              <li>
                                  <a data-toggle="tab" href="#demo-stk-lft-tab-people2">Responsible</a>
                              </li>
                              <li>
                                  <a data-toggle="tab" href="#demo-stk-lft-tab-people3">Customer</a>
                              </li>
                          </ul>
                          <!--Tabs Content-->
                          <div class="tab-content">
                              <div id="demo-stk-lft-tab-people1" class="tab-pane fade active in">
                                  <h4 class="text-thin">Owner : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h4>
                                  <form id="idForm" action="<?=base_url()?>ticket/update_note_owner" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                      <input type="hidden" name="id_ticket" value="<?= $id ?>">

                                      <div class="row">
                                        <div class="form-group col-md-8">
                                                  <p class="font-small">Change Ticket Owner</p>
                                                  <select class="form-control" name="owner">
                                                    <?= note_owner($id)?>
                                                  </select> 
                                                </div>
                                        <div class="col-md-4" style="padding-top: 30px;"><button class="btn btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Sure</button> </div>
                                      </div>

                                    </div>
                                  </form>
                              </div>
                              <div id="demo-stk-lft-tab-people2" class="tab-pane fade">
                                  <h4 class="text-thin">Responsible : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h4>
                                  
                                  <form id="idForm" action="<?=base_url()?>ticket/update_note_responsible" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                      <input type="hidden" name="id_ticket" value="<?= $id ?>">
                  
                                      <div class="form-group col-md-3">
                                        <p class="font-small">* Ticket</p>
                                        <input type='text' class='form-control' name='Title' id='Title' value="<?= subject_note($id); ?>"> 
                                      </div>

                                      <div class="form-group col-md-3">
                                        <p class="font-small">New Responsible</p>
                                        <select class='form-control' name='Ticket_Btn_Responsible_Responsible'>
                                        <?= note_responsible($id) ?>
                                        </select> 
                                      </div>

                                      <div class="col-md-4" style="padding-top: 30px;"><button class="btn btn-primary" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Sure</button> </div>
                                    </div>
                                  </form>

                              </div>
                              <div id="demo-stk-lft-tab-people3" class="tab-pane fade">
                                  <h4 class="text-thin">Owner : Ticket#<?= $this->uri->segment(3)?> - <?= subject_note($this->uri->segment(3)) ?></h4>

                                  <form id="idForm" action="<?=base_url()?>ticket/add_custUser" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                      <input type="hidden" name="id_ticket" value="<?= $id ?>">

                                      <div class="form-group col-md-3">
                                        <p class="font-small">* Customer ID</p>
                                        <input type='text' class='form-control' name='ticket_customer_id' id='ticket_customer_id' value="<?= note_custID($id); ?>"> 

                                      </div>

                                      <div class="form-group col-md-3">
                                        <p class="font-small">* Customer User</p>
                                        <select class="form-control" name="tp_cu" id="tp_cu_form" required> </select>
                                      </div>

                                      <div class="col-md-4" style="padding-top: 30px;"><button class="btn btn-primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add</button> </div>
                                    </div>
                                  </form>


                                  <div class="row" style="padding-left: 10px;padding-right: 10px;">

                                    <div class="" id="data_list_form" style="display: none">
                                      <table class="table table-striped">
                                        <tr>
                                          <th> Customer User </th>
                                          <th> Delete </th>
                                        </tr>
                                        <tbody id="list_data_form"> 
                                          
                                        </tbody>
                                      </table>
                                    </div>

                                  </div>
                              </div>
                          </div>
                      </div>    
                  </div>

                  </div>



              </div>
      </div>
      <!--===================================================-->
      <!--End Default Tabs (Right Aligned)-->
  </div>

</div>




<style type="text/css">

    .pageheader {
        padding: 13px;
        position: relative;
        /* background: #ffffff; */
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(31, 114, 162) 100%);
        background: -moz-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: -webkit-linear-gradient(to right, rgb(0, 213, 230) 10%, rgb(31, 114, 162) 100%);
        background: linear-gradient(to right, rgb(242, 247, 248) 10%, rgb(242, 247, 248) 100%);
        margin: -20px -5px 24px -5px;
        /* padding: 35px 15px 100px 20px; */
        color: #353535;
        box-shadow: 0 1px 2px 0 rgb(234, 234, 234);
        padding-left: 30p;
    }

    .pageheader .fa, .pageheader .glyphicon {
        font-size: 12px;
        margin-right: 5px;
        padding: 6px 7px;
        border: 2px solid #124f76;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    .pageheader h3 {
        font-size: 15px;
        color: #165a84;
        letter-spacing: -.5px;
        margin: 0;
    }

    .pageheader .breadcrumb-wrapper .label {
        color: #165a84;
        text-transform: uppercase;
        font-weight: 400;
        display: inline-block;
    }


    .pageheader .breadcrumb li a {
        color: #165983;
    }

    .pageheader .breadcrumb li.active {
        color: #175b86;
    }

    .pageheader .breadcrumb-wrapper {
        position: absolute;
        top: 15px;
        right: 25px;
    }


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}


.tab-base .nav-tabs {
    border: 0;
    background: #0d4063;
}


.btn-success {
    background-color: #ffffff;
    border-color: #ffffff;
}



.nav-section>li>.section, .nav-section>li>a {
    position: relative;
    margin: 0;
    text-align: center;
    padding-right: 0px; 
    padding-left: 5px; 
    padding-top: 0px; 
    padding-bottom: 0px; 
}





</style>




<script type="text/javascript">
  $("#tp_sla").change(function (){
    var sla = $("#tp_sla").val();
    var id_ticket = "<?= $this->uri->segment(3)?>";
    get_sla_generated_id(sla,id_ticket);
    get_lookup_severity_by_gen_id(id_ticket);
  });

  function get_sla_generated_id(sla,id_ticket)
  {
    var sla = $("#tp_sla").val();
    var data = 
            {
              'sla':sla,
              'id_ticket':id_ticket,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }

            
            $.ajax({
                    url: '<?= base_url() ?>Ticket/get_sla_generated_id',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                       // alert('Sila Tunggu');

                    },
                    success: function(response){
                       
                       get_all_severity_onchange(response,id_ticket);
                    }
            });
  }


  function get_all_severity_onchange(id,id_ticket)
  {
    //var id = $("#tp_sla").val();
    var data = 
            {
              'id':id,
              'id_ticket':id_ticket,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }

            
            $.ajax({
                    url: '<?= base_url() ?>Ticket/get_all_severity_onchange',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                       // alert('Sila Tunggu');

                    },
                    success: function(response){
                      // alert(response);
                      $("#tp_severity").html(response);
                      //get_lookup_severity_by_gen_id(id_ticket);
                    }
            });
  }


  function get_lookup_severity_by_gen_id(id_ticket)
  {
    var data = 
            {
              'id_ticket':id_ticket,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }

            
            $.ajax({
                    url: '<?= base_url() ?>Ticket/get_lookup_severity_by_gen_id',
                    type: 'POST',
                    dataType: 'html',
                    data: data,
                    beforeSend: function() {
                       // alert('Sila Tunggu');

                    },
                    success: function(response){
                      //alert(response);
                      if(response){
                        $("#tp_severity").val(response);
                      }
                      //$("#tp_severity").val(response);
                      //$("#tp_severity").html(response);
                    }
            });
  }
</script>


<script type="text/javascript">
                        
                        
                        
  $(document).ready(function (){
      get_ref_num();
    //var tp_ReferenceNo = '123123';
    //$("#tp_ReferenceNo").val(tp_ReferenceNo);
    // var tp_ReferenceNo = $("#tp_ReferenceNo").val();
    // var load = setTimeout(function() {
    //     get_other_id(tp_ReferenceNo);
    // }, 1000);
  });
  
  function get_ref_num()
  {
      var get_ref_num = "<?= $this->uri->segment(3) ?>";

      

      get_enviroment(get_ref_num);

      get_location_user(get_ref_num);
      get_sla_user(get_ref_num);
      get_service_user(get_ref_num);
      get_fault_itsm_cat(get_ref_num);

    var data = 
                    {
                      'get_ref_num':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_ref_num',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                //alert(response)  
                                $("#tp_ReferenceNo").val(response);

                                var tp_ReferenceNo = response;
                get_other_id(tp_ReferenceNo);
                            }
                    });
  }
  

  function get_fault_itsm_cat(get_ref_num)
  {
    var data = 
                    {
                      'get_ref_num':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
              $.ajax({
                      url: '<?= base_url() ?>Ticket/get_fault_itsm_cat',
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {
                         // alert('Sila Tunggu');

                      },
                      success: function(response){
                        $("#fault_itsm_cat").val(response);
                      }
                    });
  }
  

  function ref_no()
  {
    var tp_ReferenceNo = $("#tp_ReferenceNo").val();
    var load = setTimeout(function() {
        get_other_id(tp_ReferenceNo);
    }, 1000);

    
  }


  function get_enviroment(get_ref_num)
  {

    get_severity(get_ref_num);

    var data = 
                    {
                      'get_ref_num':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_enviroment',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              
                              if(response==='hospital'){
                                //alert('x');
                                $("#div_ml_status").hide();
                                $("#div_backup_type").hide();
                                $("#div_backup_status").hide();
                                $("#div_pending_date").hide();
                                $("#div_severity").show();
                                $("#problem_desc_itsm_div").show();

                                $("#add_cust_user_div").hide();

                                $("#div_impact").hide();
                                $("#div_priority").hide();

                                $("#provider_div").hide();
                                

                              } else {
                                //alert('you');
                                $("#div_ml_status").show();
                                $("#div_backup_type").show();
                                $("#div_backup_status").show();
                                $("#div_pending_date").show();
                                $("#div_severity").hide();
                                $("#problem_desc_itsm_div").hide();

                                $("#add_cust_user_div").show();

                                $("#div_impact").show();
                                $("#div_priority").show();

                                $("#provider_div").show();

                              }
                               
                            }
                    });
  }


  function get_other_id(tp_ReferenceNo)
  {
      var tp_ReferenceNo = $("#tp_ReferenceNo").val();
    var data = 
                    {
                      'tp_ReferenceNo':tp_ReferenceNo,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_other_id',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                $("#other_id").val(response);
                                get_the_key();
                              }
                               
                            }
                    });
  }

  function get_the_key()
  {
    
    var id = $("#other_id").val();
    id = id.replace(/&/g, '')
         .replace(/>/g, '')
         .replace(/</g, '')
         .replace(/\n/g, '');


    var data = 
                    {
                      'Location_ID':id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_the_key',
                            type: 'POST',
                            dataType: 'json',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              $("#tp_itsm").val(response.CAT); 

                              var cat = response.CAT;
                              var other_id = response.Location_ID;
                              var service = response.Service;
                              var sla = response.SLA;
                              var customerID = response.CustomerID;

                              var env = "<?= $this->session->userdata('env')?>";

                              if(env=='noc'){
                                get_location(cat,other_id);
                                get_service(service);
                                get_sla(sla);
                              }

                              
                              get_customer(customerID);
                              

                            }
                    });
  }


  function get_location(cat,other_id)
  {
    var data = 
                    {
                      'cat':cat,
                      'other_id':other_id,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_location',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_loc").val(id);

                              }
                               
                            }
                    });
  }

  function get_service(service)
  {
    var data = 
                    {
                      'service':service,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_service',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_service").val(id);
                              }
                               
                            }
                    });
  }

  function get_sla(sla)
  {
    var data = 
                    {
                      'sla':sla,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_sla',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_sla").val(id);

                  
                              }
                               
                            }
                    });
  }


  // latest 

  function get_location_user(get_ref_num)
  {
    var data = 
                    {
                      'ticket_id':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_location_user',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_loc").val(id);

                              }
                               
                            }
                    });
  }

  function get_service_user(get_ref_num)
  {
    var data = 
                    {
                      'ticket_id':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_service_user',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_service").val(id);
                              }
                               
                            }
                    });
  }

  function get_sla_user(get_ref_num)
  {
    var data = 
                    {
                      'ticket_id':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_sla_user',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');

                  $("#tp_sla").val(id);
                  var id_ticket = "<?= $this->uri->segment(3)?>";
                  //get_sla_generated_id(id,id_ticket);

                  
                              }
                               
                            }
                    });
  }

  // end 

  function get_severity(get_ref_num)
  {
    var data = 
                    {
                      'id':get_ref_num,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_severity',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if(response){
                                $("#div_severity").html(response);
                              }

                              //alert(response);
                              
                            }
                    });
  }

  function get_customer(customerID)
  {
    var data = 
                    {
                      'customerID':customerID,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customer',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                

                                var id = response;
                  id = id.replace(/&/g, '')
                       .replace(/>/g, '')
                       .replace(/</g, '')
                       .replace(/\n/g, '');
                  $("#tp_cuID").val(id);
                  $("#ticket_customer_id").val(id);
                  get_customerID();
                  
                              }
                               
                            }
                    });
  }

  function get_customerID()
  {
    var customerID = $("#tp_cuID").val();

    var customerID = $.trim(customerID); //trim 

    var data = 
                    {
                      'customerID':customerID,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customerID',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  var id = $.trim(id); //trim 

                  $("#tp_cu").html('<option value=""> -- Select Customer User -- </option>'+id);
                              }
                               
                            }
                    });
  }
</script>


<script type="text/javascript">

  function cancel2()
    {
        var id = "<?= $this->uri->segment(3)?>";
        window.location.href="<?= base_url()?>Ticket/Ticket_DetailTicket/"+id;
    }

    
  function submit()
  {
    
  }


  // start code location
  $(document).ready(function (){

                var data = 
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>CMDB/getAllLoc',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                                if(response!=''){
                                    $('#list_loc').html(response);
                                }
                               
                            }
                    });
            });
  //end

</script>


<script type="text/javascript">
  $(document).ready(function (){
    var data = 
                {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                }

                
                $.ajax({
                        url: '<?= base_url() ?>Ticket/List_ref_no',
                        type: 'POST',
                        dataType: 'html',
                        data: data,
                        beforeSend: function() {
                           // alert('Sila Tunggu');

                        },
                        success: function(response){
                            if(response!=''){
                                $('#list_ref').html(response);
                            }
                           
                        }
                });
    });
</script>


<script type="text/javascript">
  $(document).ready(function (){
    //var customerID = $("#ticket_customer_id").val();
    //get_customerID(customerID);
    var id_ticket = "<?= $id ?>";
    list_custUser(id_ticket);
  });

  function list_custUser(id_ticket)
  {
    var id_ticket = $.trim(id_ticket); //trim 

    var data = 
                    {
                      'id_ticket':id_ticket,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/list_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                $("#data_list").show();
                                $("#list_data").html(response);
                              }
                               
                            }
                    });
  }

  function delete_custUser(id)
  {
    var r = confirm("Are you sure to delete ?");
    if (r == true) {
      var data = 
                      {
                        'id':id,
                          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                      }

                      
                      $.ajax({
                              url: '<?= base_url() ?>Ticket/delete_custUser',
                              type: 'POST',
                              dataType: 'html',
                              data: data,
                              beforeSend: function() {
                                 // alert('Sila Tunggu');

                              },
                              success: function(response){
                                var id_ticket = "<?= $id ?>";
                                list_custUser(id_ticket);

                                list_custUser_form(id_ticket);
                                 
                              }
                      }); 
    }
  }

  function show_cu()
  {
    $("#show_cu").show();
  }

  function first_level_page()
  {
    $("div#first_level_page").show();
    $("div#note_page").hide();
    $("div#pending_page").hide();
  }

  function note_page()
  {
    $("div#first_level_page").hide();
    $("div#note_page").show();
    $("div#pending_page").hide();
  }

  function pending_page()
  {
    $("div#first_level_page").hide();
    $("div#note_page").hide();
    $("div#pending_page").show();
  }
</script>


<script type="text/javascript">
  function check_status()
  {
    var status_lock = "<?= status_lock_ticket($this->uri->segment(3))?>";
    if(status_lock=='0'){
      //$("#lock").html('<a onclick="active_lock();" ><i class="fa fa-key" aria-hidden="true"></i> Unlock Ticket</a>');
    } else {
      //$(".btn").remove();

      var lock_by = "<?= lock_ticket_by($this->uri->segment(3))?>";
      var first_name = "<?= $this->session->userdata('first_name')?>";
      
      if(lock_by==first_name){
        
      } else {
        // $(".btn").remove();
      }

    }
  }

  $(document).ready(function (){
    var xoxo = "<?= $this->uri->segment('4')?>";
    if(xoxo==='fl'){
      alert('You need created final level first !');
      //$("#content_text").html('You need created first level !');
      //$("#myModal2").modal('show');
    }

    if(xoxo==='lf'){
      alert('Final level already !');
      // $("#content_text").html('first level already !');
      // $("#myModal2").modal('show');
    }

    check_status();
    pull_state_note();
  });   


  function pull_state_note()
  {
    var id = "<?= $this->uri->segment(3)?>";
    var data =  {
            "id" : id,
            
          }

    $.ajax({
                url: "<?= base_url() ?>Ticket/pull_state",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  $("#tp_state_note").html(response);
                }
        });

  }
</script>


<script type="text/javascript">

  $(document).ready(function (){
    var type = 'Pending';
    var id = "<?= $this->uri->segment('3') ?>";
    ;


    var data =  {
            "id_ticket" : id,
          
          }

    var x = '';

    $.ajax({
                url: "<?= base_url() ?>Ticket/status_pendingresume",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  if(response)
                  {
                    response = response.replace(/^\s+|\s+$/gm,'');
                    //alert(response);

                     
                    switch (response) 
                    {
                    case 'pending':
                        x = "Resume";
                        y = "resume";
                        break;
                    case 'open':
                      x = "Pending";
                        y = "pending";
                        break;
                    default : 
                      x = "Pending";
                        y = "pending";
                        break;
                                  
              } 

                    $("#type_ticket2").val(x);
                    $("#type_ticket").val(y);

                    pull_state_pending(y);

                    //alert(x);
                  } 

                  //alert(response);
                }
        });

  });

  function cancel()
  {
    location.reload();
  }
</script>


<script type="text/javascript">

  $(document).ready(function (){
    check_status_pending();
  });

  function pull_state_pending()
  {
    var id = $("#type_ticket2").val();
    //alert(id);
    if(id=='Pending'){
      id='pending';
    } else {
      id='open';
    }
    var data =  {
            "id" : id,
            
          }

    $.ajax({
                url: "<?= base_url() ?>Ticket/pull_state_parameter",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                  $("#tp_state").html(response);
                }
        });

  }




  function cancel()
  {
    location.reload();
  }


  function check_status_pending()
  {
    var status_lock = "<?= status_lock_ticket($this->uri->segment(3))?>";
    if(status_lock=='0'){

    } else {
      //$(".btn").remove();

      var lock_by = "<?= lock_ticket_by($this->uri->segment(3))?>";
      var first_name = "<?= $this->session->userdata('first_name')?>";
      
      if(lock_by==first_name){
        
      } else {
        //$(".btn").remove();
      }

    }
  }
</script>


<style type="text/css">
  .font-smaller{
    color: #000;
  }

  #footer {
      background: #edf1f2;
      border-top: rgba(0,0,0,0.07);
      position: relative;
      padding-top: 15px;
      bottom: 0;
      z-index: 2;
      left: 0;
      right: 0;
      height: 50px;
  }
</style>



<script type="text/javascript">

  // function delete_custUser(id)
  // {
  //   var data = 
  //                   {
  //                     'id':id,
  //                       '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
  //                   }

                    
  //                   $.ajax({
  //                           url: '<?= base_url() ?>Ticket/delete_custUser',
  //                           type: 'POST',
  //                           dataType: 'html',
  //                           data: data,
  //                           beforeSend: function() {
  //                              // alert('Sila Tunggu');

  //                           },
  //                           success: function(response){
  //                             var id_ticket = "<?= $id ?>";
  //               list_custUser(id_ticket);
                               
  //                           }
  //                   }); 
  // }

  $(document).ready(function (){
    var customerID = $("#ticket_customer_id").val();
    get_customerID_form(customerID);
    var id_ticket = "<?= $id ?>";
    list_custUser_form(id_ticket);
  });

  function list_custUser_form(id_ticket)
  {
    var id_ticket = $.trim(id_ticket); //trim 

    var data = 
                    {
                      'id_ticket':id_ticket,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/list_custUser',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                $("#data_list_form").show();
                                $("#list_data_form").html(response);
                              }
                               
                            }
                    });
  }

  function get_customerID_form(customerID)
  {
    var customerID = customerID;

    var customerID = $.trim(customerID); //trim 

    var data = 
                    {
                      'customerID':customerID,
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    }

                    
                    $.ajax({
                            url: '<?= base_url() ?>Ticket/get_customerID',
                            type: 'POST',
                            dataType: 'html',
                            data: data,
                            beforeSend: function() {
                               // alert('Sila Tunggu');

                            },
                            success: function(response){
                              if (!$.trim(response)){ 

                              } else {
                                var id = response;
                  var id = $.trim(id); //trim 

                  $("#tp_cu_form").html('<option value=""> -- Select Customer User -- </option>'+id);
                              }
                               
                            }
                    });
  }


  function redirect_close_ticket()
  {
    var r = confirm("Are you sure to redirect to close ticket ?");
    if (r == true) {
      window.location.href="<?=base_url()?>Ticket/Ticket_Btn_Closed/<?= $this->uri->segment(3) ?>";
    }
  }

  function group_chat()
  {
    $("#group_name").val('<?= subject_note($this->uri->segment(3)) ?>');
    $("#create_group_modal").modal('show');
  }
</script>



<!-- Modal -->
<div id="create_group_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?= base_url()?>admin/create_my_group" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Your Group Chat</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="group_name" id="group_name" required placeholder="Enter Your Group Name" name="">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="group_key" required placeholder="Enter Your Group Key" name="">
                </div>
                <div class="col-md-6" style="padding-top: 10px;">
                    <span style="font-size: 11px; color: #06881b;"><input type="checkbox" name="public_key" value="1"> Public Your Key </span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
    </form>

  </div>
</div>







<script type="text/javascript">
  $(document).ready(function (){
    var status_lock = "<?= status_lock_ticket($this->uri->segment(3))?>";
    var lock_by = "<?= lock_ticket_by($this->uri->segment(3))?>";
    var my_name = "<?= $this->session->userdata('first_name')?>";

    if(my_name==lock_by){


      
    } else {
      $("#lock").show();
      $(".btn").remove();
      $("#btn_itsm").remove();
      $("#btn_com").remove();
      $("#btn_people").remove();
      $("#btn_close").remove();

    }

    

  });


  function active_lock()
  {
    var id_ticket = "<?= $this->uri->segment(3) ?>";
    var r = confirm("Are you sure to unlock this ticket ?");
    if (r == true) {
          var data =  {       
                                  'id_ticket':id_ticket,
                                  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                              }

          $.ajax({
                      url: '<?= base_url() ?>Admin/active_lock', //create nama function delete controller
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        location.reload();
                      }
                })
    }
  }




  function inactive_lock()
  {
      var id_ticket = "<?= $this->uri->segment(3) ?>";
      var r = confirm("Are you sure to lock this ticket ?");
      if (r == true) {
          var data =  {       
                                  'id_ticket':id_ticket,
                                  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                              }

          $.ajax({
                      url: '<?= base_url() ?>Admin/inactive_lock', //create nama function delete controller
                      type: 'POST',
                      dataType: 'html',
                      data: data,
                      beforeSend: function() {

                      },
                      success: function(response){
                        location.reload();
                      }
                })
    }
  }
  

  
</script>



<!-- LOADING -->
<!-- 
<script type="text/javascript">
  $(document).ready(function (){

    var body = document.body;
    body.classList.add("overlay");

  });

  setTimeout(function(){ closeLoading(); }, 5000);

  function closeLoading()
  {
    document.body.className = document.body.className.replace("overlay","");
    $("#loading_text").remove();
  }
</script>

<div id="loading_text">
   <p><img src="https://maine.aoa.org/events-register/images/Loading.gif" width="100px;" /></p>
</div>

<style type="text/css">
  #loading_text {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      margin-top: -10px;
      line-height: 20px;
      text-align: center;
  }

  .overlay {
      background-color:#333;
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: 1000;
      top: 0px;
      left: 0px;
      opacity: .5; /* in FireFox */ 
      filter: alpha(opacity=50); /* in IE */
  }
</style> -->

<!-- END -->


<style type="text/css">
  .panel-heading {
        height: 100px;
  }

  .panel-control {
    padding-bottom: 30px;
  }
</style>