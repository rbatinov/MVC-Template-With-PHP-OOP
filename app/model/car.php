<?php

class car
{
    protected static $data_file;
    protected $inventory = [];

    public function __construct($model_name){
        self::$data_file = DATA . $model_name . '.txt';
    }

    #region TXT file Functions
    private function load_TXT_File($model_name){
        if(file_exists(DATA . $model_name .'.txt')){
            $this->inventory = file(DATA . 'car.txt');
        }
    }

    public function getCars_txt($model_name){
        $this->load_TXT_File($model_name);

        return $this->inventory;
    }
    #endregion

    #region Database Functions
    public function DB_ExecuteQuery($query){
        $database = new Database(); // creates database class and opens a connection to the database

        $this->inventory = $database->getDB()->query($query);

        return $this->inventory;
    }
    #endregion

}