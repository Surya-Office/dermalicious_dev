<?php
class TimeTable extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('timetablemodel');
    }

    public function index()
    {
        $this->load->view('time_table/summary');
    }

    public function list_timetable_summary()
    {
        $timetable = $this->timetablemodel->get_datatables();
        var_dump($timetable);die;
    }
}

?>