<?php

class UI_Controller extends db_Controller{
    
    function showAllUsers(){
        $datas = $this->getAllUsers();
        foreach ($datas as $key => $value) {
                print_r( $datas[$key]);
        }
    }
    
}
