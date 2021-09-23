<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login/login');
	}

    public function login()
	{
		$this->load->view('admin/login/login');
	}

    public function autentikasi()
    {
        $username = $this->input->post('username', true);
        $password = sha1($this->input->post('password', true));

        $sql = $this->ModelAdmin->cekLoginAdmin(['username_pustakawan' => $username, 'passw_pustakawan' => $password]);
        $cekUser = $sql->row_array();

        if(!$cekUser){
            ?>
            <script type="text/javascript">
                alert("Maaf Username dan Password tidak sesuai!");
                document.location="<?php echo base_url('admin/login');?>";
            </script>
            <?php
        }
        else{
            $data = [
                'idpustakawan' => $cekUser['id_pustakawan'],
                'enid' => sha1($cekUser['id_pustakawan'])

            ];
            $this->session->set_userdata($data);
            ?>
            <script type="text/javascript">
                alert("Selamat datang <?php echo $cekUser['nama_pustakawan'];?>");
                document.location="<?php echo base_url('admin/dashboard');?>";
            </script>
            <?php
        }
    }

    public function dashboard()
    {
        $this->load->view('Admin/login/dashboard');
    }
}