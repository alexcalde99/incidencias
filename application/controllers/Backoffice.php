<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Backoffice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
        date_default_timezone_set('Europe/Madrid');
    }

    public function index(){

        $this->load->view('login.php');
    }


    /******************************************************************************
     * funcion validar usuarios
     *****************************************************************************/
    public function validate_user(){

        $user = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('users_model');
        if($this->users_model->validate_user($user, $password)){
            $this->load->view('vista-backoffice');
        }else {
            $this->index();
        }

    }


    /******************************************************************************
     * funcion CRUD usuarios
     *****************************************************************************/


    function crud_usuarios(){
        //creamos objeto crud
        $crud = new grocery_CRUD();
        //Seleccionar la tabla usuarios
        $crud->set_table('usuarios');
        //objetener la info de la tabla en un array, para despues mostrar
        $crud->callback_before_insert(array($this,'encrypt_password_callback'));
        $output = $crud->render();


        //a la vista-backofffice le paso el output(array)
        $this->load->view('vista-backoffice', $output);


    }

    /******************************************************************************
     * funcion CRUD incidencias
     *****************************************************************************/


    function crud_incidencias(){
        //creamos objeto crud
        $crud = new grocery_CRUD();
        //Seleccionar la tabla incidencias
        $crud->set_table('incidencias');
        //objetener la info de la tabla en un array, para despues mostrar
        $output = $crud->render();

        //a la vista-backofffice le paso el output(array)
        $this->load->view('vista-backoffice', $output);


    }

    /******************************************************************************
     * funcion CRUD ROLES
     *****************************************************************************/

    function crud_roles(){
        //creamos objeto crud
        $crud = new grocery_CRUD();
        //Seleccionar la tabla ROLES
        $crud->set_table('roles');
        //obtener la info de la tabla en un array, para despues mostrar
        $output = $crud->render();

        //a la vista-backoffice le pasamos el output(array)
        $this->load->view('vista-backoffice', $output);

    }

    /******************************************************************************
     * funcion CRUD ROLES
     *****************************************************************************/

    function crud_tipo_incidencias(){
        //creamos objeto crud
        $crud = new grocery_CRUD();
        //Seleccionar la tabla TIPOS INCIDENCIAS
        $crud->set_table('tipos_incidencias');
        //obtener la info de la tabla en un array, para despues mostrar
        $output = $crud->render();

        //a la vista-backoffice le pasamos el output(array)
        $this->load->view('vista-backoffice', $output);

    }


    /******************************************************************************
     * funcion ENCRIPTAR PASSWORD
     *****************************************************************************/

    function encrypt_password_callback($post_array) {
        $this->load->library('encrypt');

        $post_array['clave'] = $this->encrypt->encode($post_array['clave']);

        return $post_array;
    }









    /******************************************************************************
     * funcion logout       *
     *****************************************************************************/

    function logout(){

    }


}