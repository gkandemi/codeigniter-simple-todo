<?php

class Todo extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("todo_model");

    }


    // siteAdi/ControllerAdi/metodAdi/parametre/parametre
    public function index(){



        $items = $this->todo_model->get_all();

        $viewData = array(
            "todos" => $items,
        );

        $this->load->view("todo_list", $viewData);

    }

    public function insert(){

        $todo_title =  $this->input->post("todo_title");

        $insert = $this->todo_model->insert(
            array(
                "title"         => $todo_title,
                "isCompleted"   => 0,
                "createdAt"     => date("Y-m-d H:i:s")
            )
        );

        if($insert){

            redirect(base_url());

        }



    }

    public function delete($id){

//        echo $this->uri->segment(3);

        $delete = $this->todo_model->delete($id);

        redirect(base_url());

    }

    public function isCompletedSetter($id){

        $completed = ($this->input->post("completed") == "true") ? 1 : 0;

        $this->todo_model->update($id, array(
            "isCompleted"   => $completed
        ));

    }


}