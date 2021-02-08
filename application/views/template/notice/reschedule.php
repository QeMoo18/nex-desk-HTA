<script src="http://10.0.20.81/nex-desk/asset/asset_socket/jquery-1.10.1.min.js"></script>
<script src="http://10.0.20.81/nex-desk/asset/asset_socket/socket.io.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function (){
    load_Data();
});


function load_Data()
{
      var socket = io.connect('http://10.0.20.81:3000');
      var data = {'productID':''}
      $.ajax({
                url: '<?= base_url() ?>Test/json_data',
                type: 'POST',
                dataType: 'json',
                data: data,
                beforeSend: function() {

                },
                success: function(response){

                    if(response==''){

                    } else {
                        var no = 1;
                        var count = response.length;
                        console.log(count);
                        $.each(response, function(k, v) {

                            if(count>1){
                                var loop = 'Pengumuman '+no+' : ';
                            } else {
                                var loop = '';
                            }
                            

                            console.log(v.title);
                            title = v.title;
                            title = title.replace("<br>","\n");

                            note = v.note;
                            note = note.replace("<br>","\n");

                            $("#data_hold").append(loop+title+'\n'+note+'\n\n');
                            //socket.emit('message', v.title);
                            no++;
                        })

                        data_bags();
                        closeWindow();
                    }
                        
                }
            })
}


function data_bags()
{
    var data_bags = $("#data_hold").val();
    var socket = io.connect('http://10.0.20.81:3000');
    socket.emit('message', data_bags);
}

function closeWindow() {
    setTimeout(function() {
        window.open('', '_self', ''); //bug fix
        window.close();
    }, 3000);
}

</script>


<textarea style="display: none" id="data_hold"></textarea>


<input type="button" value="Close this window" onclick="self.close()">