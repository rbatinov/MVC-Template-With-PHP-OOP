<?php 

# This is the base class Controller
# We set the View and Model here

class Controller
{
    protected $view;
    protected $model;

    public function view($viewName, $data=[])
    {
        $this->view = new View($viewName, $data);

        return $this->view;
    }

    public function model($modelName, $data=[])
    {
        if(file_exists(MODEL . $modelName . '.php')){
            require MODEL . $modelName . '.php';
            $this->model = new $modelName($modelName);
        }
    }

    # Returns child controller name - in order to dynamically set the path to the view
    # for example if we have 'carController' the function will return 'car'
    public function controller_name(){
        return substr(get_class($this), 0, -10);
    }


}