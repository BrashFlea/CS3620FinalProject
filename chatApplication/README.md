# CS3620FinalProject

Jonathan Mirabile

Final Project for CS3620. RESTful PHP chat application using Ratchet.

####Usage:
 
 At this point in time the program only works as a telnet chat application. 
 I've created a functional front end but the Icarus web server doesn't play nice with web-sockets.
 
 To run the program you need at least three Putty sessions. 
 Navigate to the /bin folder and run the command &lt;PHP chat-server.php&gt; to start the chat service, 
 then on the two other sessions run the command &lt;telnet 127.0.0.1 8081&gt;. 
 The chat application will run until the chat-server.php process is terminated.
 
 **Note:** You can use &lt;netstat -tulpn&gt; to verify that the connection is running on the desired port. 
 At this point in time the program runs on localhost (127.0.0.1) port 8081 as the shared web server I'm using occupies port 8080. 
 Please modify this in the code to suit your needs. 
 I will be changing this when I move the code to a production web server.
