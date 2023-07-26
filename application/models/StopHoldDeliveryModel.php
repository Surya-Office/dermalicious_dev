<?php

class StopHoldDeliveryModel extends CI_Model
{
    function getDataTrans($id_trans) {
        return $this->db->select('id_transaksi, id_customer')->get_where('tbl_transaksi', ['id_transaksi'=> $id_trans])->row();
    }

    function insertHold() {
        $post = $this->input->post();
        $data = array(
            'id_transaksi' => $post['id_trans'],
            'start_date_hold'=> date('d-M-Y', strtotime($post['start_hold'])),
            'end_date_hold' => date('d-M-Y', strtotime($post['end_hold'])),
            'id_customer' => $post['id_cust'],

        );
        $this->db->insert('tbl_hold_delivery', $data);
    }

    public function getDetailTransaksi($id)
    {
        // $this->db->select
        return $this->db->get_where('tbl_transaksi_detail', ['id_transaksi' => $id,])->result_array();
    }

    function deletePengiriman($id_trans, $id_transaksi_detail, $tgl) {
        $where_delete = array(
            'id_transaksi' => $id_trans, 'id_transaksi_detail' => $id_transaksi_detail, 'tgl_pengiriman' => $tgl
        );
        // var_dump($where_delete);die;
        $this->db->where($where_delete);
        $this->db->delete('tbl_transaksi_pengiriman');
    }
}
