<?php


class UserModel extends CI_Model
{
    public function getRole()
    {
        return $this->db->get('ms_role')->result();
    }
}

?>