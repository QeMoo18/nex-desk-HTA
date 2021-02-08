<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GT-Socket</title>
        <style>
            #zone_chat strong {
                color: white;
                background-color: black;
                padding: 2px;
            }
        </style>
    </head>
 
    <body>

        <section id="chat_zone">
            
        </section>



        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
        <script>

            // Connecting to socket.io
            var socket = io.connect('http://localhost:8787');
            // io.set('transports', ['xhr-polling']);

            // The username is requested, sent to the server and displayed in the title
            //var username = prompt('What\'s your username?');
            var username = 'User';
            socket.emit('new_client', username);
            document.title = username + ' - ' + document.title;

            // // When a message is received it's inserted in the page
            socket.on('message', function(data) {
                insertMessage(data.username, data.message)
            })

            // // When a new client connects, the information is displayed
            // socket.on('new_client', function(username) {
            //     $('#chat_zone').prepend('<p><em>' + username + ' has joined the chat!</em></p>');
            // })

            // // When the form is sent, the message is sent and displayed on the page
            // $('#chat_form').submit(function () {
            //     var message = $('#message').val();
            //     socket.emit('message', message); // Sends the message to the others
            //     insertMessage(username, message); // Also displays the message on our page
            //     $('#message').val('').focus(); // Empties the chat form and puts the focus back on it
            //     return false; // Blocks 'classic' sending of the form
            // });
            
            // Adds a message to the page
            function insertMessage(username, message) {
                $('#chat_zone').prepend('<p><strong>' + username + '</strong> ' + message + '</p>');

                //alert(message);
            }
        </script>
    </body>
</html>