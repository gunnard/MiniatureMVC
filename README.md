MiniatureMVC
============

Intro
-----

Most PHP frameworks come with a lot of functionality, are very flexible and extensible and can be configured to behave in tons of ways. However, all this flexibility comes at a price, these frameworks become hard to configure, they are bloated with functions that only very few people need and they slow down the page loads because of all the functionality they need to include.

The truth is, 90% of the time, these goodies really aren't necessary and all they do is distract us from our actual goal; adding usable functionality to our application.

MiniatureMVC attempts to simplify the development process by ensuring you avoid configuration hell, useless bloat and unnecessary performance issues. This way, you can focus on 

Features and benefits
---------------------

* Promotes proper file architecture, code organisation and reusability
* Autoloads classes for you (no need to include those files anymore)
* Very simple and standardized URL rewriting : /section/subsection/action/value1/etc -> /sales/vendor/view/1
* Simple template system (page header and footer)
* Flexible (you could change the database type just by adding a driver file in /classes/drivers
* Basic error handling (404 errors redirect to a custom page)
* Easy config management (all controllers and models have access to a pre-defined config object)

Installation
------------

* Download MiniatureMVC
* Extract it in your www folder
* That's it!

Configuration
-------------

Change the database information in /classes/models/common/config_model.php.

If you wish to try the test page for the framework, you will need to run the init.sql file on your database.

Also, if you change the project's folder name, don't forget to : 
* Replace the ErrorDocument path in the .htaccess file with the new path
* Replace the ROOT_URL in index.php with the new path

How to use
----------

Once it's setup and you've ran the init.sql file, go to the following URL : http://localhost/MiniatureMVC/sales/vendor/view/1

This URL will call the "view" method in the /controllers/sales/vendor_controller.php file.

This method is simple, it does the following things : 
* Retrieves the first parameter (1) which in this case, is the vendor id
* Obtains the vendor information from the database using the vendor_model
* Obtains the view file and passes the vendor information to it
* Displays the view within the default template

For a page that would modify vendors, you could simply create an "edit" method in the same controller and create a different view for it.

For a new module, you can duplicate the vendor_controller file and modify it accordingly. Note that the name of the file is related to the URL (/finance/wages_controller.php -> MiniatureMVC/finance/wages/). You may also need to create new models for the module.

If you want certain variables, such as paths or constants, to be known globally, you can use the config object. In /models/common/config_model.php, add variables in the setVariables() method and they will be accessible inside every controller and model's config object.
