<?php

#This is an Example of simple Controller to show how the project is working

# These are custom defined values for the menu and title of the page - only for car Class
define('READ_DATA_FROM_FILE', 'Read data from TXT file');
define('READ_DATA_FROM_DB_QUERY', 'Read data from mySQL Database - Simple Query');
define('READ_DATA_FROM_DB_STORED_PROCEDURE', 'Read data from mySQL Database - Stored Procedure');
define('READ_DATA_FROM_DB_STORED_PROCEDURE_PARAMETERS', 'Read data from mySQL Database - Stored Procedure with parameters');
define('NOT_FOUND', 'Check the Not Found Page');


class carController extends Controller
{
    #region Read Data from TXT file

    #reads data from txt file
    public function car_index($id = '', $name = '')
    {
            $this->model('car');

            // cars is associative array. It can be accessed then in the view.
            $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__ , [ 'cars' => $this->model->getCars_txt('car') ]); 

            $this->view->setPageTitle(READ_DATA_FROM_FILE . PROJECT_NAME);   

            $this->view->render();
    }

    #endregion

    
    #region Read Data from Database

    #execute simple query
    public function database_list()
    {
        $this->model('car');

        $query = 'SELECT `id`, `brand`, `model`, `year` FROM `cars`.`vehicle`';

        $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, [ 'cars' => $this->model->DB_ExecuteQuery($query) ]);
        
        $this->view->setPageTitle(READ_DATA_FROM_DB_QUERY . PROJECT_NAME);

        $this->view->render();
    }

    #execute simple stored procedure
    public function database_stored_procedure()
    {
        $this->model('car');
        
        $query = 'CALL GetVehicles()';
        
        $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, [ 'cars' => $this->model->DB_ExecuteQuery($query) ]); 

        $this->view->setPageTitle(READ_DATA_FROM_DB_STORED_PROCEDURE . PROJECT_NAME);

        $this->view->render();
    }

    #execute simple stored procedure with parameters
    public function database_stored_procedure_with_params()
    {
        $this->model('car');

        if(isset($_POST['data']) && is_numeric($_POST['data']) == true){            
                $query = 'CALL GetSpecificVehicle(' . $_POST['data'] . ')';
            
                $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, [ 'cars' => $this->model->DB_ExecuteQuery($query) ]); 
        }
        else{
            $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, []); 
        }

        $this->view->setPageTitle(READ_DATA_FROM_DB_STORED_PROCEDURE_PARAMETERS . PROJECT_NAME);

        $this->view->render();
    }

    #endregion
}