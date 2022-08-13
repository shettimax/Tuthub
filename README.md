# Tuthub
topnotch howto's
-----
web based tutorial sharing system with dependencies
---------------------------------------------------
---key pages explained---

--
functions and stuffs used:
Get the element with the specified ID: example Document.getElementById("dropdown-menu").innerHTML =  data.notification; 
OOP
ASSOCIATIVE ARRAYS
bunch of if's
xMLHttpRequest Example was crafted with help of https://www.w3schools.com/xml/xml_http.asp
and lots more
----

BEL0W ARE DETAILS OF HOW THE PAGES W0RK YOU CAN PICK AL0T OF POINT AND ADD TO YOUR PROJECT NOTES
---
#offers.php
happen to be landing page detailing offers/fields we offer tutorials on
as you can see from line 30 to line 49
query fetch from db directly with mysqli_fetch_array
and variables named respectively echoed
---

#index.php
basically call offers.php with the iclude 'offers.php'; function
such is  set to avoid replication
---
#reg.php
the registration page
is entwined to regi.php
reg.php dependantly require/include regi.php
as you see regi.php line 1 to line 36 basically runs and serve as the backbone containing d algorithm
while reg.php line 61 to 90 uses session & vars of reg.php to detail users of their registration progress (using sweet alert library than ordinary javascript pop up these are engineered modal like)
---
#log.php
the login page
is entwined to logi.php
log.php dependantly require/include logi.php
to fetch / parse written functions
the page is strict on session to proceed to the dashboard (dash.php) for dependencies.
 it's intriguing that the dash.php might bounce user back  to login page on load as bunch of if statements are blend to insure role split (moderator/normal user) 
----

#fetch.php
the intriguing backbone of the whole app alongside connect.php(db connector) lol
logic done with 49 optimized lines of php&sql
line 16 to 26
select a course from the account where label = $var
<detail1>
$walletid=$_SESSION['id'];// our global var / authenticated session we depend on

$query = "SELECT * FROM account WHERE label='$walletid'";
select course from the account where label = $var(dats $walletid coz label is a column name storing php autogen alphanum id )
meaning we fetching base on what we collect/retrieve from  database for the user session

what next?
$select_query = "SELECT * FROM `notification` WHERE `dismiss` = 0 AND `courseid` = '$course' ORDER BY `notification`.`date` 
as you can see the second query use data from 1st query(where we fetched only course of d session )to carry on

line 37 starts with;
for ($i=0;$i<$resultCount ;$i++)

"for-loop" function which iterate through a collection, for example an array
and the arrays start from line 36 to 47
-------
                          
#connect.php
config file linking the web app to database
$host = "server here"; 
$user = "db user here"; 
$pass = "db user password here"; 
$db = " db name web app is too work  with here";

$conn = mysqli_connect //is the function for php database connection
($host, $user, $pass); //
mysqli_select_db($conn,$db); is the database selection function that returns either true or false
------------
#execute.php
is entwined with coonnect.php and fetch.php
------------

#dismiss.php
a function created to reduce the notifications in user dashboard by dismissing it
on dismiss button click an sql query is passed to update (table.column) and set notification.dismiss to 1 meaning it won't show the user itself referencing to fetch.php query($select_query = "SELECT * FROM `notification` WHERE `dismiss` = 0 AND `courseid` = '$course' ORDER BY `notification`.`date`) thr where clause says dismiss must be = 0
---------------
#ajax.php 
not really the ajax logic as the script is named but it manipulates date having it contain date and time functions

#changepassword.php
a module to update admin password it requires a session to distinguish administrators as there are many in the admin table


--------------forget d below it only detail file sharing via google drive--------------
pdfs
nameofdrivefolder

create group

export mail column where paid =1 as csv from db
import csv to created group in google contacts of mazangizo

------------
pdf in pathwaytutors folder
click share 
the group all users can access it if paid


#shettimax /M4XD3V 2021 & beyond
