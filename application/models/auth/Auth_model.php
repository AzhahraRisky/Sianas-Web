<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getUsernameUsers($username)
    {
        $query = "select `anggota`.`no_anggota` AS `kode`,`anggota`.`nama` AS `nama`,`anggota`.`password` AS `password`,`anggota`.`username` AS `username`, `anggota`. `role` as `role`, `anggota`. `foto` AS `foto` from `anggota` where username='" . $username . "'
        union
        select `admin`.`no_admin` AS `kode`,`admin`.`username` AS `username`,`admin`.`password` AS `password`,`admin`.`nama` AS `nama`,`admin`.`role` AS `role`, `admin`. `foto` AS `foto` from `admin` where username='" . $username . "'
        union
        select `mobil`.`no_mobil` AS `kode`,`mobil`.`username` AS `username`,`mobil`.`password` AS `password`,`mobil`.`nama` AS `nama`,`mobil`.`role` AS `role`, `mobil`. `foto` AS `foto` from `mobil` where username='" . $username . "'
        union
        select `superadmin`.`no_superadmin` AS `kode`,`superadmin`.`username` AS `username`,`superadmin`.`password` AS `password`,`superadmin`.`nama` AS `nama`,`superadmin`.`role` AS `role`, `superadmin`. `foto` AS `foto` from `superadmin` where username='" . $username . "';";
        return $this->db->query($query)->row();
    }

    public function getUserPassUsers($username, $password)
    {
        $query = "select `anggota`.`no_anggota` AS `kode`,`anggota`.`nama` AS `nama`,`anggota`.`password` AS `password`,`anggota`.`role` AS `role`,`anggota`.`foto` as `foto` from `anggota` where username='" . $username . "' and password='" . $password . "'
        UNION
        select `admin`.`no_admin` AS `kode`,`admin`.`nama` AS `nama`,`admin`.`password` AS `password`,`admin`.`role` AS `role`,`admin`.`foto`as`foto` from `admin` where username='" . $username . "' and password='" . $password . "'
        UNION
        select `mobil`.`no_mobil` AS `kode`,`mobil`.`nama` AS `nama`,`mobil`.`password` AS `password`,`mobil`.`role` AS `role`,`mobil`.`foto`as`foto` from `mobil` where username='" . $username . "' and password='" . $password . "'
        UNION
        select `superadmin`.`no_superadmin` AS `kode`,`superadmin`.`nama` AS `nama`,`superadmin`.`password` AS `password`,`superadmin`.`role` AS `role`,`superadmin`.`foto`as`foto` from `superadmin` where username='" . $username . "' and password='" . $password . "'";
        return $this->db->query($query);
    }
}
