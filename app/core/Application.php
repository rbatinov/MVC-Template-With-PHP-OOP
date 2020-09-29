<?php

# This is the base Application class.
# It is responsible for preparing the URL, check if controller, action exist, and execute the desired controller and method.

class Application{
    
    protected $controller = 'homeController'; // default controller
    protected $action = 'index'; // default action
    protected $params = [];


    public function __construct()
    {
        $this->prepareURL();

        // if such a controller exists
        if(file_exists(CONTROLLER.$this->controller . '.php')){
                $this->controller = new $this->controller;

                // if the method exists call the controller with the action
                if(method_exists($this->controller, $this->action)){
                    call_user_func_array([$this->controller, $this->action] ,$this->params);
                }
                else{
                    // if the action does not exist - > call the PageNotFound view
                    $this->setNotFoundPage();

                    call_user_func_array([$this->controller, $this->action] , $this->params);
                }
        }
        else{
            // if the controller does not exist - > call the PageNotFound view
            $this->setNotFoundPage();

            call_user_func_array([$this->controller, $this->action] ,$this->params);
        }
    }

    protected function setController($controllerName){
        $this->controller = new $controllerName;
    }

    protected function setAction($actionName){
        $this->action = $actionName;
    }

    protected function setNotFoundPage(){
        $this->setController('mySystemController'); 
        $this->setAction('notFound');
    }

    protected function prepareURL()
    {
        $request = trim($_SERVER['REQUEST_URI'], '/');
        
        #always check url parameters if they are 0, 1, 2, 3 -> based on how the site is hosted
        # in my example - I access the site through this link http://localhost/MVC_template/public/
        # first is the localhost, then is the application name, then the public folder and after that there will be the controller and the index

        if(!empty($request)){
            $url = explode('/', $request);
            $this->controller = isset($url[2]) ? $url[2].'Controller' : $this->controller; #access the default controller set in the beginning of the file
            $this->action = isset($url[3]) ? $url[3] : $this->action; #and the default action
            
            unset($url[0], $url[1]);

            $this->params = !empty($url) ? array_values($url) : [];
        }

    }


}