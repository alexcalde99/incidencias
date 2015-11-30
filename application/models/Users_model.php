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
     *****************************************************************************/
public function encriptar_usuario($password){

    return $this->encryptation->encrypt($password);

}









    public function getAllUsers() {
        $sql = "SELECT * FROM cg_users ORDER BY user_name";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        
            return $query->result();
               
        }
    }
    
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

?>