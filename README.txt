# codeigniter-post-a-news
A user login, logout, register with emial confirmation, write a news article, delete news, dowload pdf of a articles, resgister to rss feed  for Codeigniter 3

## Installation
1. Open /application/config/database.php and edit with your database settings the following lines:
   $db['default']['hostname'] = 'localhost';
   $db['default']['username'] = 'your username';
   $db['default']['password'] = 'your password';
   $db['default']['database'] = 'urls';
2. Open /application/libraries/PHPMailer/PHPMailer_sent.php and edit with you Gmail account the following line:
	    #Username to use for SMTP authentication - use full email address for gmail
		$mail->Username = "Username@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "gmailpassword";

3. Create mynews database, open a SQL terminal paste or upload the file locate at  db/mynews.sql :
Go to http://localhost/postanews/register and create a user

## Usage
It is just a  login, logout, register with emial confirmation, write a news article, delete news, dowload pdf of a articles, resgister to rss feed functionalities.

Extend this application by adding search for news in the  controller or keep it as it is .

#Note: you must have a Gmail account and with the setting of allow non secure app feature turn on to work.
Note any feedback replay to rogergui30000@yahoo.com.

#happy coding
