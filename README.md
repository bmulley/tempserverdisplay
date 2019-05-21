# tempserverdisplay

This project is designed to receive and display temperature, humidity, sensor name, and write a timestamp for remote sensors defined by my other project, https://github.com/bmulley/TempSensor.  My current code is running on Azure as an App Service, but could presumably be run on a standalone server as well. 

index.php
This page is the display page which will read out the most recent record for each of the unique sensor names and print them in a well-formatted Bootstrap container. 

temppost.php
This page recieves the data from the remote sensors and writes them to a mySQL database. 
