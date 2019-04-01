<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Produk extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }

    Public function index_get()
    {
        $id=$this->get('id');
            if($id===null)
            {
                $produk=$this->produk_model->getproduk();
            }else 
            {
                $produk=$this->produk_model->getproduk($id);
            }
                if($produk)
                {
                    $this->response([
                        'status'=>true,
                        'data'=>$produk
                        
                    ], REST_Controller::HTTP_OK);
                }else
                {
                    // Set the response and exit
                    $this->response([
                        'status' => FALSE,
                        'message' => 'ID Tidak Ditemukan'
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
                }
        

    }
    Public function index_delete()
    {
        $id=$this->delete('id');
            if($id===null)
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Perintah Ini Membutuhkan ID'
                ], REST_Controller::HTTP_NOT_FOUND);
            }else
            {
               if($this->produk_model->deleteproduk($id) > 0);
               $this->response([
                'status'=>true,
                'data'=>$id,
                'message'=>'Data Berhasil Dihapus'
                
                ], REST_Controller::HTTP_OK);
            }
            {
                $this->response([
                    'status' => FALSE,
                    'message' => 'ID Tidak Ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }

    }

    Public function index_post()
    {
        $data=[
            'id_produk'=>$this->post(id_p),
            'nama_produk'=>$this->post(nama_produk),
            'jenis'=>$this->post(jenis),
            'harga'=>$this->post(harga),
            'stock'=>$this->post(stock),
            'keterangan'=>$this->post(keterangan)
        ]
    }
}
