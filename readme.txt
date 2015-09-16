= Wordpress form integration with RD Station ===
This plugin creates a shortcode to create a form that will send the information to the RD Station API directly.

== Description ==
When installed this plugin provides a shortcode that can be add to a post or a page on wordpress and send the information to the RD Station API.

Form's fields are listed below:
Nome
Email
Empresa
Cargo
Telefone
Celular
Website
Twitter

The fields "Nome", "Email", "Telefone" and "Celular" can not be empty.

In addition to the plugin that provides communication of WP with RD Station, this repository contains a complete installation of Wordpress 4.3.1 and the following plugins:
- Advanced TyneMCE
- Redux Framework
- WordPress Twitter Bootstrap CSS

== Installation ==
To install all the features on this repository, follow the instructions:
1 - Download this repository content
2 - Create a database and upload the content of the sql file under the path "sql";
3 - Go to the file wp-config.php and change the "DB_NAME", "DB_USER" and "DB_PASSWORD" to the information of your database server;
4 - On the wp-config.php change "WP_HOME" and "WP_SITEURL" to the information about your server, like "www.example.com/wordpress";
5 - The user to access the WP Admin Panel is "admin" and the password is "rdt3stf0rmplugin"

The steps above will install the wordpress on your server, then you will be able to follow the instructions below regarding the installation of the RD Station form plugin.

To install this plugin, follow the instructions:
1 - Go to the Plugins option on the WP Admin Menu;
2 - Activate the RD Station Form Plugin.

== Configuration ==
To use this plugin you need to provide some information about your RD Station account and then add the shortcode of the plugin to your post or page.
1 - Go to the Settings option on the WP Admin Menu, click on "RD Station Form" option;
2 - Provide your "Token RD Station" and the "Identificador" of the form that you want send to the API. If you don't provide this information, the form can not not be send to the API;
3 - Go to your post or page and insert the shortcode "rdform-plugin" to see the form.

If you have any problem, please send an email to alvesrod15@gmail.com