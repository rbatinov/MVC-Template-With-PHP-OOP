<?php

# This controller will contain system pages like '404 not found'

class mySystemController extends Controller
{
    public function notFound()
    {
        $this->view($this->controller_name() . DIRECTORY_SEPARATOR . __FUNCTION__, []);

        $this->view->setPageTitle('Page Not Found' . PROJECT_NAME); 

        $this->view->render();
    }


}