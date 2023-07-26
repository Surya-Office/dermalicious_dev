<?php

class TimeTableModel extends CI_Model
{
    private function get_summary_timetable()
    {
        $this->db->select('tbl_transaksi_pengiriman.tgl_pengiriman, jenis_paket, jml_pack_dikirim');
        $this->db->from('tbl_transaksi_pengiriman');
        $this->db->join('tbl_transaksi_detail', 'tbl_transaksi_detail.id_transaksi_detail = tbl_transaksi_pengiriman.id_transaksi_detail');
        // $this->db->join('ms_perusahaan', 'tbl_transaksi.id_perusahaan = ms_perusahaan.id_perusahaan');
        // $this->db->join('ms_customer', 'tbl_transaksi.id_customer = ms_customer.id_customer');
        // return $this->db->get('tbl_transaksi')->result_array();
        $this->db->group_by('tbl_transaksi_pengiriman.tgl_pengiriman');
    }

    function get_datatables()
	{
		$this->get_summary_timetable();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_filtered()
	{
		$this->get_summary_timetable();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('tbl_transaksi');
		return $this->db->count_all_results();
	}
}
