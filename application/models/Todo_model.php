<?php

class Todo_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public $tableName = "todos";

    public function get_all(){

        return $this->db->get($this->tableName)->result();

    }

    public function insert($data = array()){

        return $this->db->insert($this->tableName, $data);


    }

    public function delete($id){

        return $this->db->where("id", $id)->delete($this->tableName);

    }

    public function update($id, $data = array()){


        return $this->db->where("id", $id)->update($this->tableName, $data);

    }

}