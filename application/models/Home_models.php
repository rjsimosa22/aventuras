<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home_models extends CI_Model {

    public $variable;
    public $array;
    public $wh0;

    public function __construct() {
        
	parent::__construct();
        $this->db->query("SET lc_time_names = 'es_VE'");
    }
    
    public function contrato($var) {

        if( isset($var) ) {
            
            if( !empty($var) ) {
                
                        $wh0 = $this->db->where('a.status !=', '0');
            } else {
                        $wh0 = $this->db->where('a.status', '0');
            }
            
            $this->db->select('count(a.codigo) as contrato');
            $this->db->from('ordenes as a');
            $this->db->join('clientes as b', 'b.cedula = a.fk_cedula');
            $wh0;
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                    $array = array(

                        'acceso' => TRUE,
                        'contrato' => $row->contrato
                    );
                }
                return $array;
            }
        }
    }
    
    public function cuotasmensuales($inicio, $fin) {

        if( isset($inicio, $fin) ) {
            
            
            $this->db->select('sum(a.monto_total) as montos,count(a.id) as ventas,DATE_FORMAT(a.fecha_de_venta, "%M de %Y") as mes');
            $this->db->from('ventas as a');
            $this->db->where('a.fecha_de_venta >=', $inicio);
            $this->db->where('a.fecha_de_venta <=', $fin);
            $this->db->where('a.estatus!=', '4');
            $this->db->group_by('DATE_FORMAT(a.fecha_de_venta, "%m")');
            $this->db->group_by('DATE_FORMAT(a.fecha_de_venta, "%Y")');
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                    $array = array(
                        'acceso' => TRUE,
                        'mes' => $row->mes,
                        'montos' => $row->montos,
                        'ventas' => $row->ventas
                    );
                }
                return $array;
            } else {
                
                $array = array(
                    'acceso' => TRUE,
                    'mes' => '0',
                    'montos' => '0',
                    'ventas' => '0'
                );
                return $array;
            }
        }
    }
    
    public function cuotasdiarias($fechadia) {

        if( isset($fechadia) ) {
            
            
            $this->db->select('sum(a.monto_total) as montos,count(a.id) as ventas,DATE_FORMAT(a.fecha_de_venta, "%M de %Y") as mes');
            $this->db->from('ventas as a');
            $this->db->where('a.fecha_de_venta =', $fechadia);
            $this->db->where('a.estatus!=', '4');
            $this->db->group_by('DATE_FORMAT(a.fecha_de_venta, "%m")');
            $this->db->group_by('DATE_FORMAT(a.fecha_de_venta, "%Y")');
            $query = $this->db->get();

            if( $query->num_rows() > 0 ) {

                foreach ( $query->result() as $row ) {

                    $array = array(
                        'acceso' => TRUE,
                        'mes' => $row->mes,
                        'montos' => $row->montos,
                        'ventas' => $row->ventas
                    );
                }
                return $array;
            } else {
                
                $array = array(
                    'acceso' => TRUE,
                    'mes' => '0',
                    'montos' => '0',
                    'ventas' => '0'
                );
                return $array;
            }
        }
    }
}