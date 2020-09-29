<?php

# This is the base View class
# It is responsible for rendering the view

class View 
{
    protected $view_file;
    protected $view_data;
    protected $page_title;

    public function __construct($view_file, $view_data)
    {
        $this->view_file = $view_file;
        $this->view_data = $view_data;
        $this->page_title = PROJECT_NAME; // default page title
    }

    // sets page title
    public function setPageTitle($page_title)
    {
        $this->page_title = $page_title;
    }

    // renders the view
    public function render()
    {
        if(file_exists(VIEW . $this->view_file. '.phtml')){
            include VIEW . $this->view_file. '.phtml';
        }
    }

    public function getAction()
    {
        return (explode(DIRECTORY_SEPARATOR, $this->view_file)[1]);
    }
}