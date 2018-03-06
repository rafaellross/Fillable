<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Smart Plumbing
 */
class Employee {
    public $id;
    public $name;
    public $phone;

    public function __construct($id, $name, $phone) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;        
    }
}
