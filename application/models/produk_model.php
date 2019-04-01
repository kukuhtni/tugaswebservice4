<?php
class Produk_model extends CI_Model
{
    public function getproduk($id=null)
    {
        if($id===null)
        {
            return $this->db->get('tb_product')->result_array();
        }else 
        {
            return $this->db->get_where('tb_product',['id_produk'=>$id])->result_array();
        } 
        
    }
    public function deleteproduk($id)
    {
        $this->db->delete('tb_product',['id_produk'=>$id]);
        return $this->db->affected_rows();
        
    }

}