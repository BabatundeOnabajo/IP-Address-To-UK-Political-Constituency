<?php
# Name: IP Address to UK Political Constituency 
# Author: Babatunde Valentine Onabajo
# Copyright: © 2021 Babatunde Valentine Onabajo (N.B.: That this script is copyrighted does not negate its open source status)
# Github link: https://github.com/BabatundeOnabajo/IP-Address-To-UK-Political-Constituency

# Description: This is the main PHP file that you should use once you have configured your server and databases correctly. Note that some places here require you to enter your own credentials.
# Comments will be provided throughout this code to assist you, together with an explanation.

# As with all PHP/MySQL scripts, you first need to use the correct credentials to access the database. On local/development servers, the username is usually "root" and the password is left blank. Please edit this according to your own circumstances.
$servername = "localhost"; #USE YOUR OWN CREDENTIALS HERE.
$username = "root"; #USE YOUR OWN CREDENTIALS HERE.
$password = ""; #USE YOUR OWN CREDENTIALS HERE.

$conn = mysqli_connect($servername, $username, $password); #USE YOUR OWN CREDENTIALS HERE.



# We create the session variable $_SESSION['ukPoliticalConstituency'], which stores the visitor's likely constituency, as an array because it is possible in rare instances that more than 
# one constituency is returned. We will use this later to store the user's constituency information in an array.

$_SESSION['ukPoliticalConstituency'] = array(); #This creates the array for the purposes set out above.

# According to IP2Location, whose data underpins one of the databases, if we would like to convert an IP address to an IP number (which is what we want to do), we need to do the following:

# If the IP address 161.132.13.1, then the IP number is 2709785857. 

# IP Number, X = 161 * (256*256*256) + 132 * (256 * 256) + 13 * (256) + 1 = 2709785857

# In general, this is the formula to convert an IP address to an IP number.

# Let us assume the IP address is A.B.C.D.

# IP Number, X = A * (256*256*256) + B * (256 * 256) + C * 256 + D

if(isset($_SERVER['REMOTE_ADDR'])){ #This checks the user's IP address. Note that this is not exhaustive because it might not include proxy servers, but so as to not bloat this code,
  # this has been omitted. Please speak to a programmer if you would like to adopt this.

$ipAddress = $_SERVER['REMOTE_ADDR']; #We store the user's IP address from $_SERVER['REMOTE_ADDR'] to a variable we call $ipAddress.

if(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){ #This checks the IP address of the user if it conforms to IPV4 standard.

$ipNumberToCheckAgainstDatabase = explode('.', $_SERVER['REMOTE_ADDR'])[0] * (256*256*256) + explode('.', $_SERVER['REMOTE_ADDR'])[1] * (256*256) + explode('.', $_SERVER['REMOTE_ADDR'])[2] * (256) + explode('.', $_SERVER['REMOTE_ADDR'])[3]; #This line of code converts the IP address to an IP number.

$result = mysqli_query($conn, "CALL GETCOUNTRYFROMIPADDRESSV4TABLE('$ipNumberToCheckAgainstDatabase')"); #We begin the query here.
  
mysqli_next_result($conn); #We use this method because we are using a stored procedure. Otherwise we get strange behaviour. Please ensure you create this stored procedure before using this code.

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    if($row['country_name'] == "-" || mysqli_num_rows($result) == 0 || mysqli_num_rows($result) > 1){ #We check to see whether the row returned has a value of "-" for countryLONG or 0 or the number of rows returned is greater than 1 (which would indicate something wrong.)

$_SESSION['countryOfUser'] = ''; #In the table on the database, where a country can't be determined, we set the value of $_SESSION['countryOfUser'] to empty.

}elseif(mysqli_num_rows($result) == 1){ #In the table, if we do in fact find a value (and it should technically return one value), then we set $_SESSION['countryOfUser'] to the full name of the country. 
    $_SESSION['countryOfUser'] = $row['country_name'];
    $_SESSION['sessionIPAddress'] = $ipAddress;
$postcode = $row['zip_code']; #This stores the postcode into the variable $postcode. We will use this in the code later down below to access the constituency. 

}
  
}
}
elseif(filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){ #This checks the IP address of the user if it conforms to the IPV6 standard. 
  
$ipNumberToCheckAgainstDatabase = explode('.', $_SERVER['REMOTE_ADDR'])[0] * (256*256*256) + explode('.', $_SERVER['REMOTE_ADDR'])[1] * (256*256) + explode('.', $_SERVER['REMOTE_ADDR'])[2] * (256) + explode('.', $_SERVER['REMOTE_ADDR'])[3]; #This line of code converts the IP address to an IP number.

$result = mysqli_query($conn, "CALL GETCOUNTRYFROMIPADDRESSV6TABLE('$ipNumberToCheckAgainstDatabase')");
mysqli_next_result($conn);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    if($row['country_name'] == "-" || mysqli_num_rows($result) == 0 || mysqli_num_rows($result) > 1){ #We check to see whether the row returned has a value of "-" for country_name or 0 or the number of rows returned is greater than 1 (which would indicate something wrong.)

$_SESSION['countryOfUser'] = ''; #In the table on the database, where a country can't be determined, we set the value of $_SESSION['countryOfUser'] to empty.

}elseif(mysqli_num_rows($result) == 1){ #In the table, if we do in fact find a value (and it should technically return one value), then we set $_SESSION['countryOfUser'] to the full name of the country.
$_SESSION['countryOfUser'] = $row['country_name'];
$_SESSION['sessionIPAddress'] = $ipAddress;
$postcode = $row['zip_code']; #This stores the postcode into the variable $postcode. We will use this in the code later down below to access the constituency.    
}
  
}    
}

} #This ends checking the IP address against $_SERVER['REMOTE_ADDR']

?>
