<?php

#This is an Example of simple Controller to show how the project is working

class homeController extends Controller
{
    public function index()
    {
        $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, []);

        $this->view->setPageTitle('Home Page' . PROJECT_NAME);  

        $this->view->render();
    }

    public function aboutProject()
    {
        $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, []);

        $this->view->setPageTitle('About Project' . PROJECT_NAME);

        $this->view->render();
    }

}