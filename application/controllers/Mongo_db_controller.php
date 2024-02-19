<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mongo_db_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->load->helper(array('form', 'url'));
       $this->load->model('Mongo_db_model');
    }

    public function index() {
        $this->load->view('equipos/vwListado');
    }

    public function addEquipo() {
        $archivo = $this->do_upload();

        $data = array(
            'archivo' => $archivo,
            'numSerie' => $_POST['txtNwSerie'],
            'txtNombre' => $_POST['txtNwNombre'],
            'txtDescripcion' => $_POST['txtNwDescripcion'],
            'numStatus' => $_POST['optradio']
        );
        $res = $this->Mongo_db_model->insertData($data);

        print_r($res);
    }

    public function obtener_documentos() {
        $documentos = $this->mongo_db->get('mi_coleccion');
        var_dump($documentos);
    }


    public function do_upload() {
        $nombre_equipo = $this->input->post('txtNwSerie');

        // Verificar si se proporcionó un nombre de equipo
        if (!empty($nombre_equipo)) {
            // Ruta de la carpeta de almacenamiento basada en el nombre del equipo
            $ruta_carpeta = './assets/imgs/' . $nombre_equipo . '/';

            // Crear la carpeta si no existe
            if (!is_dir($ruta_carpeta)) {
                mkdir($ruta_carpeta, 0777, true);
            }

            // Configuración de la carpeta de almacenamiento
            $config['upload_path']          = $ruta_carpeta;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;

            $this->load->library('upload', $config);

            // Subir la imagen
            if (!$this->upload->do_upload('igmNwEquipo')) {
                $error = array('error' => $this->upload->display_errors());
                return $error;
            } else {
                // La imagen se subió correctamente
                $data = array('upload_data' => $this->upload->data());

                // Obtener el nombre del archivo cargado
                $nombre_archivo = $data['upload_data']['file_name'];
                $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
                // Renombrar el archivo con el nombre del equipo
                $nuevo_nombre_archivo = $nombre_equipo . "." .  $extension;
                rename($ruta_carpeta . $nombre_archivo, $ruta_carpeta . $nuevo_nombre_archivo);

                
                
                $imagen = array(
                    'url' => $ruta_carpeta,
                    'nombre_equipo' => $nombre_equipo,
                    'extension' => $extension
                );
                return $imagen;
            }
            
        } else {
            // Mostrar error si no se proporciona el nombre del equipo
            $error = array('error' => 'Debes proporcionar un nombre de equipo');
            return $error;
        }
    }
}
