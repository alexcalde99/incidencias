<?php

class Incidencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        //FA LA CONEXIO
        $this->load->database(); //Per a poder gastar totes les funcions de la base de dades
        //$this->load->helper('url'); //site_url (funcio que crida desde la vista al controlador)
        $this->load->library('session');
    }

    public function getAllIncidencias() {
        $sql = "SELECT * FROM incidencias ORDER BY fecha_alta DESC ";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {

            return $query->result();
        }
    }
}
