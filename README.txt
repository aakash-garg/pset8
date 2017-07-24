PSET-8 OF CS50

In this project I used HTML, CSS, JS, PHP, SQL, technique of AJAX
In this pset.. I made a web application that retrieves data from google news and elements such as markers from google maps.
There is a MySQL database which stores all the gps coordinates, postal codes, etc. These all are mashed up together to form a web app.


Features:
Searching of places through text box.
Drag somewhere else to load another content on the page through ajax.
On clicking the news icon on the map, it will load all the local news from Google News in which titles and links are loaded through ajax as JSON.



Implementation:

i) import: In this file, I wrote a command-line script written in PHP which loads the file and iterates over the file line by line and insert it into the places table in MySQL database.
            The parameter(command-line argument) is the file path. It is optional. If not given it will load US.txt
            
ii) search.php: In this file, a parameter, geo, is passed as GET parameter and the places table is searched row by row, that matches the entered word, the value of geo can be postal code, city, state.
                At last the JSON array is printed row by row.

iii) script.js: 
    addMarker: It adds a marker for the place on the map. On clicking that icon, it loads the content in list form in a google maps infoWindow.
    configure: This function containes event listeners, this function is called as soon as the map is loaded. I added a suggestion value in typeahead configuration.
    hideInfo: It hides the infoWindow.
    removeMarkers: It removes all the markers from the map. It get called when there is a change in bounds of the map, i.e. in update function.
    update: It gets the new bounds of the map, removes previous markers and add new markers.
    
    

To run on IDE, First run the servers.
run 'apache50 start ~/workspace/pset8/public' in termial to serve the web page.
Next run 'mysql50 start' to run the MySQL db server
Next go to 'https://ide50-aakashgarg98.cs50.io' to see the content.

Thats it.. :)