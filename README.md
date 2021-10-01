## IP Address To UK Political Constituency
This is a script that converts the IP address of a visitor to the UK political constituency they are currently based in. 

# Applications
Civic participation is an important part of being in society. Yet figures relating to knowledge essential to civic participation is low. For example, a study conducted in 2013 by the Hansard Society consisting of 1,128 people found that more than 75% or three in four people cannot name their local MP [1]. This is problematic because MPs cannot represent the views of their constituents if their constituents do not know who to speak to. Many organisations and political groups have sought to leverage technology in order to increase civic participation, such as voting in elections or addressing concerns to one's local MP. Currently, a number of websites such as that of Parliament or *TheyWorkForYou* aim to inform visitors of who their MP is by requesting the visitor enter either their name, location or postcode. This is problematic because the attention span of the average website visitor is very low - estimates range at around 10 seconds [2]. If the attention span of the website visitor is not grabbed in those 10 seconds, the user leaves the website to a different website or activity. This is what is known as the "bounce rate". Converting a user's IP address to their politial constituency has the advantage of ensuring that as soon as a visitor visits the website, their MP can be shown because their constituency is shown. There is no hard work or effort on the part of the visitor, minimising their bounce rate. 

# Instructions


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
