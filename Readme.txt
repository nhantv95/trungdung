We are using CMS Wordpress framework to develop website of Trung Dung Restaurant.
Installation:
Import file trungdung.sql to database host.

Configuration:
After load database trungdung.sql, go to wp_options table, change the value of option_value 
in row option_name are siteurl and home to the host and port of your host, with the end is the name of folder source code. 
For example: we use localhost and port of my host is 8012, so we change option_value to localhost:8012/trungdung.

Open file wp-config.php in folder source code, change the name of database to the name 
which used in the database system in line define ('DB_NAME', 'database_name’);.
In our case, we set the name of database is trungdung, so we will change “database_name” to “trungdung”.

Change the information of the web host if needed:
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', 'localhost');
