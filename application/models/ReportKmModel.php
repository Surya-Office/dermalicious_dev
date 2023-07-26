<?php

class ReportKmModel extends CI_Model 
{
    function get_timeTable($tgl) {
        $where = array(
            // 'id_transaksi_detail' => $id_transaksi_detail,
            'tgl_pengiriman' => date('Y-m-d', strtotime($tgl)),
            'status_veryfied'=> 'verified',
            'status_delete' => null
        );
        // $this->db->select(' jenis_paket, tbl_transaksi_pengiriman.id_transaksi_detail, jml_lunch as lunch, sum(jml_dinner) as dinner, ');
        // // $this->db->select('nama_customer, paid_date, jml_lunch as lunch, jml_dinner as dinner, alamat_1, km_1');
        $this->db->select('nama_customer, paid_date, alamat_1, km_1, alamat_2, km_2, alamat_3, km_3, telepon_1, tbl_transaksi_pengiriman.jenis_paket, tbl_transaksi_pengiriman.id_transaksi_detail, jml_lunch as lunch, jml_dinner as dinner');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_pengiriman.id_transaksi_detail=tbl_transaksi_detail.id_transaksi_detail');
        $this->db->join('tbl_transaksi', 'tbl_transaksi_pengiriman.id_transaksi=tbl_transaksi.id_transaksi');
        $this->db->join('ms_customer', 'tbl_transaksi.id_customer=ms_customer.id_customer');

        $this->db->where($where);
        // $this->db->group_by('tbl_transaksi_detail.id_transaksi');
        $this->db->order_by('tbl_transaksi_pengiriman.id_transaksi', 'asc');
        $this->db->order_by('km_1', 'asc');
        return $this->db->get()->result_array();
    }

    // function getAddress($id_detail, $id_trans) {
    //     $where = array(
    //         // 'id_transaksi_detail' => $id_transaksi_detail,
    //         'status_veryfied'=> 'verified'
    //     );
    //     $this->db->select('tbl_transaksi.id_transaksi, nama_customer, paid_date, alamat_1, telepon_1, km_1');
    //     $this->db->from('tbl_transaksi_detail');
    //     // $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_detail.id_transaksi_detail=tbl_transaksi_pengiriman.id_transaksi_detail');
    //     $this->db->join('tbl_transaksi', 'tbl_transaksi_detail.id_transaksi=tbl_transaksi.id_transaksi');
    //     $this->db->join('ms_customer', 'tbl_transaksi.id_customer=ms_customer.id_customer');

    //     $this->db->where($where);
    //     $this->db->order_by('km_1', 'asc');
    //     $this->db->group_by('tbl_transaksi.id_transaksi');
    //     return $this->db->get()->result();
    // }
}