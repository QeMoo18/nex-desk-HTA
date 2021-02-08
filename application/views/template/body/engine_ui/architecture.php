

<div class="content-wrapper">

	<section class="content">
		
    <!-- NAV HEADER -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">NEXT</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Customer</a></li>
            <li><a href="#">Ticket</a></li>
            <li><a href="#">Service</a></li>
            <li><a href="#">CMDB</a></li>
            <li><a href="#">Report</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Create Module</a></li>
                <li><a href="#">Customer View Form</a></li>
                <li><a href="#">Create View Datatables</a></li>
                <li><a href="#">Add Sub Module (Left)</a></li>
              </ul>
            </li>
          </ul>
       
          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul> -->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- END -->
		

    <!-- GRID -->
    <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Different Width</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
              <input type="text" class="form-control" placeholder=".col-xs-3">
            </div>
            <div class="col-xs-4">
              <input type="text" class="form-control" placeholder=".col-xs-4">
            </div>
            <div class="col-xs-5">
              <input type="text" class="form-control" placeholder=".col-xs-5">
            </div>
          </div>
        </div>
    </div>
    <!-- END -->
		
    <!-- 2 Box In 1 Row -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Box 1 : Alert Memo </h3>
          </div>
          <div class="box-body">
            <div class="alert alert-success" role="alert"><b> Well Done ! </b> This is Alert Success.. </div>
            <div class="alert alert-danger" role="alert"><b> Oh Snap ! </b> This is Alert Danger..</div>
            <div class="alert alert-warning" role="alert"><b> Warning ! </b>This is Alert Warning..</div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Box 2 : Collapse</h3>
          </div>
          <div class="box-body">

            <!-- FIRST -->
              <p>1) Collapsible Panel</p>
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse1">Listen My Story..</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Panel Body</div>
                    <div class="panel-footer">Panel Footer</div>
                  </div>
                </div>
              </div>
            <!-- END -->

            <!-- SECOND-->
              <p>2) Collapsible By Button</p>
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
              <div id="demo" class="collapse">
                This is my story... 
              </div>
            <!-- END -->

            <!-- THIRD -->
              <p>3) Collapsible By List</p>
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapse_list">Collapsible list group</a>
                    </h4>
                  </div>
                  <div id="collapse_list" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item">One ! <a href=""> Read More.. </a></li>
                      <li class="list-group-item">Two ! <a href=""> Read More.. </a></li>
                      <li class="list-group-item">Three ! <a href=""> Read More.. </a></li>
                    </ul>
                    <div class="panel-footer">Footer</div>
                  </div>
                </div>
              </div>
            <!--END -->

          </div>
        </div>
      </div>
    </div>
    <!-- END -->

    <!-- FORM --> 
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Template Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Input Text</label>
                  <input type="text" class="form-control" placeholder="Enter input">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Input By Icon</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                
                <div class="form-group">
                  <label>Select Dropdown</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Dropdown By Icon</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Checkbox 1
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Checkbox 1
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">
                          Checkbox 1
                        </label>
                      </div>
                    </div>

                  
                  </div>
                </div>


                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                      Radio 1
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                      Radio 2
                    </label>
                  </div>
                </div>


                <div class="form-group">
                  <label>Textarea</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
    </div>
    <!-- END -->


    <!-- FORM DATE -->
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
    </div>
    <!-- END -->



    </section>
</div>



<!-- Modal -->
<div id="modalViewProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cubes"></i> Modal </h4>
      </div>
      <div class="modal-body" id="list_details">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




 