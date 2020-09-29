# PHP MVC Template PHP OOP && mySQL Database

This is a <b>simple MVC project template based on OOP and written in PHP</b>. It also contains <b>Database class</b> which helps connecting to <b>mySQL database</b>.  

I decided to write it because I needed to have fully working MVC template without using any framework.  

With finishing this project everyone who doesn't want to use frameworks will not waste time in creating from scratch the MVC template.

## How does it work?

<b>index.html</b> file is opened by default. <b>All Important files and scripts are loaded.</b>  
It is created an instance of a <b>class Application</b> which processes the URLs, checks if controller or view exists and executes them.  

If there are no controller and view set in the URL then the default controller and view are set.  

If you request <b>controller or action that not exist</b> then the <b>Page Not Found view</b> is returned.  

Every custom defined controller <b>extends the base Controller class</b>.  

In the base Controller class the view and model are set.  

<b>View class</b> implements the View logic and it is responsible for rendering the view. And the <b>model</b> will initialize and map your data whether you read it from file or database.  

Let's say we have <b>homeController</b> and <b>index View</b>. 

<b>Firstly</b> we need to create homeController class in the Controller folder. homeController will extend the Controller class in order to inherit its properties and functions. 
<b>Secondly</b> we need to create our view <b>index.phtml</b> file in the view folder. <b>Put your HTML code here</b>. 
<b>Then</b> we need to write index function in <b>homeController</b> class, which will <b>load the index.phtml file from view folder</b>. We need to initialize the view name and pass parameters with data if there are. If there are no parameters to pass, just pass empty array. 
<b>If data needs to be read</b>, then you need to create a model where you need to create function to initialize instance of a<b>Database class</b> with your credentials and write your logic to execute your query or stored procedure. <b>You can find out how in the carController</b>.
<b>Finally</b> we need to call the render function. <b>If the index.phtml file exists</b>, then the file is loaded, filled with the data and returned to the client. 


## Project Structure

The project is separated in two main folders - <b>app and public</b>.

- The app folder contains <b>all the server logic</b> like Controller class, View class, all models, etc.  
- The public folder contains all the <b>client logic</b> - like base index.html file, js files, css styles, etc.

- <b>App folder</b>
    - <b>config</b> 
        - This folder contains file with <b>configuration values</b> such as database name, database user, etc.
    - <b>controller</b> 
        - This folder will contain all the <b>custom defined Controllers</b> which will process the methods.
    - <b>core</b> 
        - This folder contains the base <b>Application class</b> which prepares the URL, checks if required controller or view exist and executes them.
        - There is also the <b>Base Controller</b> class which implements the Controller logic. It sets the View and the Model.
        - There is also the <b>Base View</b> class which implements the View logic. It is responsible for rendering the view.
    - <b>data</b> 
        - This folder contains the <b>TXT file with cars data</b>. It is used to show how to read data from file in compare to how to read data from Database.
        - There is also <b>carsDB.txt file</b> which contains definition of tables and procedures used for demo. You can execute the script in your phpMyAdmin in order to create the database and tables and procedures. You can set your own credentials for database connection in config.php file.
    - <b>Helper</b> 
        - This folder contains the <b>base Database</b> class which opens the connection to the mySQL database, closes the conection, as well as creates an instance of mysqli.
    - <b>model</b> 
        - This folder will contain <b>all custom defined models</b> from the developer. They are responsible for reading and mapping the data in order to pass it to the view and show it to the client.
    - <b>and view folder</b> 
        - This folder will contain <b>all custom defined views</b> or in other words all html webpages which the client will see.

- <b>Public folder</b>
    - <b>index.html</b>
        - This is the <b>init page of the Web Application</b>. This is the first page to load. Application instance is created here in order to start the work of the Application. All required scripts and files are loaded.
    - <b>.htaccess</b>
        - Website configuration.
    - <b>style.css</b>
        - All common <b>styles.</b>
    - <b>js folder</b>
        - This folder will contain <b>all JavaScript files</b>.
        
## Enjoy!    