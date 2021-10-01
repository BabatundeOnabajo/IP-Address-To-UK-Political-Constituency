## IP Address To UK Political Constituency
This is a script that converts the IP address of a visitor to the UK political constituency they are currently based in. 

# Applications
Civic participation is an important part of being in society. Yet figures relating to knowledge essential to civic participation is low. For example, a study conducted in 2013 by the Hansard Society consisting of 1,128 people found that more than 75% or three in four people cannot name their local MP [1]. This is problematic because MPs cannot represent the views of their constituents if their constituents do not know who to speak to. Many organisations and political groups have sought to leverage technology in order to increase civic participation, such as voting in elections or addressing concerns to one's local MP. Currently, a number of websites such as that of Parliament or *TheyWorkForYou* aim to inform visitors of who their MP is by requesting the visitor enter either their name, location or postcode. This is problematic because the attention span of the average website visitor is very low - estimates range at around 10 seconds [2]. If the attention span of the website visitor is not grabbed in those 10 seconds, the user leaves the website to a different website or activity. This is what is known as the "bounce rate". Converting a user's IP address to their politial constituency has the advantage of ensuring that as soon as a visitor visits the website, their MP can be shown because their constituency is shown. There is no hard work or effort on the part of the visitor, minimising their bounce rate. 

# Instructions
In order to use this script, your server must be capable of running PHP and MySQL. Instructions on how to get your devices up to scratch with these two tools won't be provided here but can be obtained at https://www.php.net and https://www.mysql.com/ respectively.

In order to use this script, please do the following:
1. - Please create the database that you will need to use this script from the file **createukpoliticalconstituencydatabaseandtables.sql**. This can be done via the command line or via a GUI tool such as *phpMyAdmin*. You can simply copy the text in **createukpoliticalconstituencydatabaseandtables.sql** and paste it into the text area if you are using phpMyAdmin. Although the file extension is ".sql", you can read the contents of this file with simple tools such as Notepad. The name of the database is **uk_political_constituencies_and_ip_addresses**. 
2. Once the database has been created, please access the file **createstoredproceduresforukpoliticalconstituencies.sql**. This file contains the stored procedures that **main.php** will use; a stored procedure is effectively a small program in a database that performs a particular task, with or without parameters passed to it. You can install this file by the command line or using phpMyAdmin and copying the contents of the file into the text area. Like 1. above, this file can also be read with simple tools such as Notepad. 
3. Names: Please select the table **westminster_parliamentary_constituency_by_name_and_code**. If you are using phpMyAdmin, you can import the relevant values from the file here called **Westminster Parliamentary Constituency names and codes UK as at 12_14 as CSV.csv** with a click of a button: simply click "Import" at the top of the screen. Then click "Choose File" or whatever the case may be depending on your browser. Then select the .csv file Westminster Parliamentary Constituency names and codes UK as at 12_14 as CSV.csv. Alternatively, you can insert the information by hand if you have the time. This contains a list of all the constituencies in the United Kingdom together with the special reference used by various statistical agencies and governmental departments.
4. Once you have successfully imported the values into westminster_parliamentary_constituency_by_name_and_code, please click the table **list_of_postcodes_in_the_united_kingdom_together_with_reference**. This table contains a list of all, or almost all, the postcodes in the United Kingdom together with the reference used for them by government departments and statistical agencies. Then download the file in this repository with the filename **list_of_postcodes_in_the_united_kingdom_together_with_government_reference_data.csv**. Admittedly, this part is actually the most **challenging**. The process is the same as step number 3: if you are using phpMyAdmin, you can simply click "Import". However, it is possible - indeed, likely - you may run into issues because of the size of the file. There are some possible solutions to this, though it is recommended you speak to a programmer to assist you. The first potential approach is to try to break up the .csv file into several parts. Or you might consider not using all the postcodes in the United Kingdom but only those of your region. The second approach is to try to change the various parameters of your server temporarily so that there is no limit on execution size or memory limit; a programmer can guide you on this. The other option is if you are using phpMyAdmin you can uncheck the box to "Partial Import" - this will allow you import at least some of the .csv file, if not everything; this might be desirable if you just want to trial out this code.
5. Somewhat obviously, but please ensure the tables to ipcountry_ipv4 and ipcountry_ipv6 are filled with the IP addresses. For this script to work, you must have at least DB11 from IP2Location/IP2Location-LITE, that is, you must have a table containing **at least** the following columns: first IP address in netblock, last IP address in netblock, two-letter country code, name of country, region name, city name, latitude, longitude, zip_code. 
6. Once this is done, please access main.php and enter your own server credentials for **servername**, **username** and **password**. On local servers, servername is usually "localhost", username is usually "root" and password is usually left blank.
7. Once that is done, that's it! You can either copy main.php into very part of your website, though I would recommend you use the **include()**, **require()** or **require_once()** functions and pass the path of this file into any of those respective methods.
  
# Technical Details
This script uses PHP and MySQL. PHP is a popular web development language that interacts seamlessly with MySQL. MySQL is a dialect of SQL, which stands for Structured Query Language, and it relates to how databases are accessed and maintained. This script obtains the user's IP address and then looks it up in the database and then saves the information to a session variable called $_SESSION['ukPoliticalConstituency']. A session variable enables a website to remember information on subsequent pages; this is needed because, by default, the protocol that powers web pages is memoryless. 

# Potential Extensions
There are many potential extensions that can be applied to converting a user's IP address to their political constituency. For example, news outlets that seek to provide more personalised information can use the information from this script to give politically relevant content to their readers: a website visitor from Tower Hamlets is more likely to be interested in left-leaning news compared to someone from Tunbridge Wells (in the recommendation system literature, this is sometimes referred to as *user-specific locality*[3]). Developers working for MPs can also use this script to ensure that MPs only receive e-mails from their constituents (by convention, MPs only respond to their constituents; they do not engage in the concerns of people from other constituencies). This is possible with PHP's imapping feature. Academics can use this information to understand why people in certain political constituencies visit or access certain information online: for example, are voters from constituencies with marginal seats more likely to avoid tabloids on the internet? 

This list is not exhaustive but provides some food for thought. I have suggesed to IP2Location/Hexasoft to consider expanding their databases to include political constituencies around the world. 

# Ethics
Always be sure to provide in your privacy policy what you intend to use a user's IP address for. This is not just an ethical obligation, but is a legal requirement in many jurisdictions around the world, particularly Europe. Always give the user the power to control the information they provide.

# Disclaimer
This script is licenced under the MIT licence. It should not be taken as an official item or service of Parliament, the House of Commons, the House of Lords or any government agency or department. This script should not be taken as an endorsement of any political organisation or individual. This script should not be taken to be representative of either my past, present or future employer.

# Credits

The database of postcodes and other geographical information fall mostly under the Open Government Licence and UK Government Licensing Framework as well as a small number of other organisations such as the Office for National Statistics (ONS). Further information may be sought at this link (operational as of 1st October 2021): https://geoportal.statistics.gov.uk/datasets/ons-postcode-directory-august-2021/about

"This site or product includes IP2Location LITE data available from http://www.ip2location.com."

IP2Location is a registered trademark of Hexasoft Development Sdn Bhd. All other trademarks are the property of their respective owners.

# Sources
