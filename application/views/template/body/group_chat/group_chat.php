<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-weight: 700;"> Topic To Discuss : <?= topic_chat($this->uri->segment(3))?> 
                    <?php if($this->uri->segment(5)==$this->session->userdata('userid')){ ?>
                    <span style="float: right"><a onclick="close_room();">Close Room</a></span>
                    <?php } ?>
                </h3>

            </div>
            <div class="panel-body np">
                <!--Chat widget-->
                <!--===================================================-->
                <!--Widget body-->
                <div id="demo-chat-body" class="collapse in">
                    <div class="nano height-md has-scrollbar">
                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;" id="dataChat">
                            <ul class="list-unstyled media-block content" id="stream"></ul>

                        </div>
                    <div class="nano-pane"><div class="nano-slider" style="height: 160px; transform: translate(0px, 46.7839px);"></div></div></div>
                    <!--Widget footer-->
                    <div class="panel-footer">
                        <div id="post" class="row">

                            <div id="controls" style="display: none">
                                <input id="room1_check" type="checkbox" value="<?= $this->uri->segment(3)?>" checked /><label for="room1_check"><?= $this->uri->segment(3)?></label><br/><br/>
                            </div>

                            <select id="postToRoom" style="display: none">
                                <option value="<?= $this->uri->segment(3)?>"><?= $this->uri->segment(3)?></option>
                            </select>
                            <br/><br/>
                            <select id="postBy"  style="display: none">
                                <option value="<?= $this->session->userdata('first_name')?>"><?= $this->session->userdata('first_name')?></option>
                            </select>


                            <div class="col-xs-9">
                                <input type="text" placeholder="Write something about this topic.." id="postMessage" name="postMessage" class="form-control chat-input">
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-primary btn-block" type="submit" id="postBtn">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--Chat widget-->
            </div>
        </div>
    </div>
</div>      




<input type="hidden" name="" id="old_msg">
<input type="hidden" name="" id="trigger_to">


<?php 
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $timeReg =date("h:i:s");
    $dateReg =date("Y-m-d");//$dateReg =date("d/m/Y");

    $dateReg = $dateReg.' '.$timeReg;
?>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 -->
<script src="http://127.0.0.1:8080/socket.io/socket.io.js"></script>
<script>
    var socket = io.connect('http://127.0.0.1:8080');

    var checkedRooms = [];
    $('#controls :checked').each(function() {
        checkedRooms.push($(this).val());
        //alert(checkedRooms);
    });


    socket.emit('join', checkedRooms);

    socket.on('publish', function (post) {
        //console.log(data);

        

        


        if(post.img==''){
            img = '<?= base_url()?>profile.png';
        } else {
            img = post.img;
        }


        if(post.by=='<?= $this->session->userdata('first_name')?>'){
            var data_ = '<li class="mar-btm"><div class="media-right"><img src="'+img+'" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-right"><div class="speech"><a href="#" class="media-heading">'+post.username+'</a><p> '+ unescape(post.message) +' </p></div></div></li>';
        } else {
            var data_ = '<li class="mar-btm"><div class="media-left"><img src="'+img+'" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">'+post.username+'</a><p> '+ unescape(post.message) +' </p></div></div></li>';
        }


        

        $("#stream").append(data_);


        var element = document.getElementById("dataChat");
        element.scrollTop = element.scrollHeight;

        $("#postMessage").val('');

    });

    

    $('#controls :checkbox').change(function () {
        socket.emit(this.checked ? 'join' : 'leave', $(this).val());
     });

    $("#postBtn").click(function() {
        save_data();
        socket.emit('post', {room: $("#postToRoom").val(), message: escape($("#postMessage").val()), by: $("#postBy").val(), on: ('<?php echo $dateReg; ?>' + ""), img:('<?= myprofile()?>'),username:('<?= $this->session->userdata('first_name')?>') });
    });


    function save_data()
    {
        var data =  {
                     room: $("#postToRoom").val(),
                     message: $("#postMessage").val(),
                     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    
                    }

        $.ajax({
                url: "<?= base_url() ?>Admin/group_chat_activities",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    //alert('Success update incident');
                    //location.reload();

                }
        });
    }


    $(document).ready(function (){
        var data =  {
                     userid:'<?= $this->uri->segment(4)?>',
                     room: $("#postToRoom").val(),
                     '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    
                    }

        $.ajax({
                url: "<?= base_url() ?>Admin/group_chat_activities_list",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    //alert('Success update incident');
                    //location.reload();
                    $("#stream").append(response);

                    var element = document.getElementById("dataChat");
                    element.scrollTop = element.scrollHeight;
                }
        });
    });



    

</script>


<?php if($this->uri->segment(5)==$this->session->userdata('userid')){ ?>
<script type="text/javascript">
    function close_room()
    {
        var r = confirm("Are you sure to close this room ?");
        if (r == true) {
          close_room_now();
        } else {
          
        }
    }


    function close_room_now()
    {
        var data =  {
                         id_chat:'<?= $this->uri->segment(3)?>',
                         '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    
                    }

        $.ajax({
                url: "<?= base_url() ?>Admin/close_room_now",
                type: "POST",
                dataType: "html",
                data: data,
                beforeSend: function() {

                },
                success: function(response){
                    window.location.href="<?=base_url()?>admin/group_chat";
                }
        });
    }
</script>
<?php } ?>