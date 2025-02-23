<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_users()
    {
      
        return [
            ['id' => 1, 'name' => 'Rahul'],
            ['id' => 2, 'name' => 'Ajay'],
            ['id' => 3, 'name' => 'Arun']
        ];
    }
}
