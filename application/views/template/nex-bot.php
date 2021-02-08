<div class="row">
	<div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"> Lets Start A Conversation </h3>
            </div>
            <div class="panel-body np">
                <!--Chat widget-->
                <!--===================================================-->
                <!--Widget body-->
                <div id="demo-chat-body" class="collapse in">
                    <div class="nano height-md has-scrollbar">
                        <div class="nano-content pad-all" tabindex="0" style="right: -17px;" id="dataChat">
                            <ul class="list-unstyled media-block content" >
                                <li class="mar-btm">
                                    <div class="media-left">
                                        <img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture">
                                                                            </div>
                                    <div class="media-body pad-hor speech-left">
                                        <div class="speech">
                                            <a href="#" class="media-heading">Nex-Bot</a>
                                            <p> Hi , can i help you ?. </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    <div class="nano-pane"><div class="nano-slider" style="height: 160px; transform: translate(0px, 46.7839px);"></div></div></div>
                    <!--Widget footer-->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-9">
                                <input type="text" placeholder="Enter your text" id="chatTextarea" name="chatTextarea" class="form-control chat-input">
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-primary btn-block" type="submit" id="sendData">Send</button>
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


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 -->

<script type="text/javascript">
    $(document).ready(function (){
        $("#sendData").click(function(){

            var chatTextarea = $("#chatTextarea").val();

            if(chatTextarea){

                // var waiting = '<div class="chat-message-group" id="waiting"><div class="typing">Typing</div> <div class="spinner"><div class="bounce1"></div> <div class="bounce2"></div> <div class="bounce3"></div></div></div>';

                // $(".content").append('<div class="chat-message-group writer-user"><div class="chat-messages"><div class="message">'+chatTextarea+'</div></div></div>'+waiting);

                // chatbot();


                var name = '<?= $this->session->userdata('first_name')?>';

                if(name==''){
                    name='Anonymous';
                }
                

                var user = '<li class="mar-btm"><div class="media-right"><img src="<?= myprofile()?>" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-right"><div class="speech"><a href="#" class="media-heading">'+name+'</a><p> '+chatTextarea+' </p></div></div></li>';

                $(".content").append(user);

                var waiting = '<li class="mar-btm" id="waiting"><div class="media-left"><img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">Nex-Bot</a><p> Typing... </p></div></div></li>';

                $(".content").append(waiting);

                chatbot();

                
                



            }



            function chatbot()
            {
                var msg = $("#chatTextarea").val();
                var trigger_to = $("#trigger_to").val();

                var check = msg.toLowerCase();

                if((trigger_to !='') && (check=='sure') || (check=='ok') || (check=='confirm') || (check=='k') || (check=='of course'))
                {
                    trigger_to_answer(trigger_to);
                } else if((trigger_to !='') && (check=='no')){

                    var bot = '<li class="mar-btm"><div class="media-left"><img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">Nex-Bot</a><p> Thanks for asking.. </p></div></div></li>';

                    $("#chatTextarea").val('');
                    $("#waiting").remove();
                    $(".content").append(bot);

                    var element = document.getElementById("dataChat");
                    element.scrollTop = element.scrollHeight;

                } else {
                    
                    if(msg) 
                    {
                        intents = '';

                        var http = new XMLHttpRequest();
                        var url = 'http://127.0.0.1:5000/add_message?msg='+msg+'&intents='+intents;
                        var params = 'msg='+msg+'&intents='+intents;
                        http.open('GET', url, true);

                        //Send the proper header information along with the request
                        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                        http.onreadystatechange = function() {//Call a function when the state changes.
                            if(http.readyState == 4 && http.status == 200) {
                                //alert(http.responseText);
                                var botResp = JSON.parse(this.responseText);


                                var bot = '<li class="mar-btm"><div class="media-left"><img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">Nex-Bot</a><p> '+botResp.message+' </p></div></div></li>';

                                $("#waiting").remove();
                                $(".content").append(bot);

                                var element = document.getElementById("dataChat");
                                element.scrollTop = element.scrollHeight;

                                $("#chatTextarea").val('');

                                var intents = botResp.intents;
                                $("#old_msg").val(intents);

                                send_param();
                            }
                        }
                        http.send(params);
                    }
                }
            }



            function send_param()
            {
                var msg = $("#old_msg").val();

                var http = new XMLHttpRequest();
                var url = 'http://127.0.0.1:5000/send_param?orem='+msg;
                var params = 'orem='+msg;
                http.open('GET', url, true);

                //Send the proper header information along with the request
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                http.onreadystatechange = function() {//Call a function when the state changes.
                    if(http.readyState == 4 && http.status == 200) {
                        //alert(http.responseText);
                        var botResp = JSON.parse(this.responseText);

                        if(botResp.helper != 'No Trigger'){
                            

                            var bot = '<li class="mar-btm"><div class="media-left"><img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">Nex-Bot</a><p> '+botResp.helper+' </p></div></div></li>';

                            $("#chatTextarea").val('');
                            $("#waiting").remove();
                            $(".content").append(bot);

                            $("#trigger_to").val(botResp.trigger_to);
                        }
                    }
                }
                http.send(params);
            }


            function trigger_to_answer(trigger_to)
            {
                var http = new XMLHttpRequest();
                var url = 'http://127.0.0.1:5000/trigger_to_answer?intent='+trigger_to;
                var params = 'intent='+trigger_to;
                http.open('GET', url, true);

                //Send the proper header information along with the request
                http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                http.onreadystatechange = function() {//Call a function when the state changes.
                    if(http.readyState == 4 && http.status == 200) {
                        //alert(http.responseText);
                        var botResp = JSON.parse(this.responseText);

                        if(botResp.msg != 'No Trigger'){
                           

                            var bot = '<li class="mar-btm"><div class="media-left"><img src="<?=base_url()?>chatbot.png" class="img-circle img-sm" alt="Profile Picture"></div><div class="media-body pad-hor speech-left"><div class="speech"><a href="#" class="media-heading">Nex-Bot</a><p> '+botResp.msg+' </p></div></div></li>';

                            $("#chatTextarea").val('');
                            $("#waiting").remove();
                            $(".content").append(bot);

                            //$("#trigger_to").val('');
                        }
                    }
                }
                http.send(params);
            }

            
            
        });
    })

</script>