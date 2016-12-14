# CS3620FinalProject

Jonathan Mirabile

Final Project for CS3620. RESTful PHP chat application using Ratchet.

####Usage:
 
 At this point in time the program only works when connected to the WSU network. 
 This can be done by using the proxy provided at https://www.weber.edu/softwaredownloads/vpn.html
 
 To run the program you need to 
 navigate to the /bin folder and run the command &lt;PHP chat-server.php&gt; to start the chat service, 
 then connect to the chat room at http://icarus.cs.weber.edu/~jm47892/chatApplication/
 
 **Note:** You can use &lt;netstat -tulpn&gt; to verify that the connection is running on the desired port. 
 The program runs on port 8081 as the shared web server I'm using occupies port 8080. 
 Please modify this in the code to suit your needs. 
 I will be changing this when I move the code to a production web server.
