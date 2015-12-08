<?php

class Users_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        //FA LA CONEXIO
        $this->load->database(); //Per a poder gastar totes les funcions de la base de dades
        //$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Users_model');
    }


    /******************************************************************************
     * funcion validar usuario
     *****************************************************************************/
    public function validate_user($user,$password){

        $sql = "SELECT * FROM usuarios WHERE user=? AND clave=?";
        $query = $this->db->query($sql, array($user, $password));

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;

        }

    }


    /******************************************************************************
     * funcion ENCRIPTAR usuario
     * Le pasamos un pass y nos devuelve un pass encriptado
     *****************************************************************************/
public function encriptar_usuario($password){

    $passwordEncriptado = $this->encrypt->encode($password);
    return $passwordEncriptado;
}

    /******************************************************************************
     * funcion DESENCRIPTAR usuario
     *  Le pasamos un pass encriptado y nos devuelve un pass
     *****************************************************************************/
    function desencriptar_usuario($password){
        $passwordDesncriptado = $this->encrypt->encode($password);
        return $passwordDesncriptado;
    }













    //////////////////////////////////////////////////////////
    //
    /////////////////////////////////////////////////////////
    public function isValidUser($user,$password) {
        $sql="SELECT  * FROM usuarios WHERE email = ? AND clave = ? ";
        $query = $this->db->query($sql, array($user,$password));
        
        if($query->num_rows() == 1){
          //un fetch
            $fila=$query->row();
            $userData=array(
                'user_id'=>$fila->id,
                'user_email'=>$fila->email,
                'user_nombre'=>$fila->nombre);            
            
             
            
            $this->session->set_userdata($userData);
            return true;
            
            
        }else{
            return false;
        }
    }
    
    

}

