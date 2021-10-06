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
                'namapustakawan' => $cekUser['nama_pustakawan'],
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
        public function logout()
        {
            $this->session->unset_userdata('idpustakawan');
            $this->session->unset_userdata('namapustakawan');
            $this->session->unset_userdata('enid');
            
            ?>
            <script type="text/javascript">
                alert("Anda telah logout");
                document.location="<?php echo base_url('admin/login');?>";
            </script>
            <?php
        }
        public function dashboard()
        {
            //$this->load->view('admin/login/dashboard');
            $data['judul_web']='Dashboard';
            $data['active_menu']='dahsboard';
            $this->load->view('admin/template_admin/header', $data);
            $this->load->view('admin/template_admin/sidebar');
            $this->load->view('admin/login/dashboard');
            $this->load->view('admin/template_admin/footer');
        }
        public function master_data_anggota()
        {
            $data['judul_web']='Master Data Anggota';
            $data['active_menu']='master_data_anggota';
            $data['data_anggota']=$this->ModelAnggota->getAll()->result_array();

            $this->load->view('admin/template_admin/header', $data);
            $this->load->view('admin/template_admin/sidebar');
            $this->load->view('admin/anggota/master_data_anggota', $data);
            $this->load->view('admin/template_admin/footer');
        }
        public function tambah_data_anggota()
        {
            $data['judul_web']='Tambah Data Anggota';
            $data['active_menu']='tambah_data_anggota';

            $this->load->view('admin/template_admin/header', $data);
            $this->load->view('admin/template_admin/sidebar');
            $this->load->view('admin/anggota/tambah_data_anggota', $data);
            $this->load->view('admin/template_admin/footer');
        }
        public function simpan_data_anggota()
        {
        $tahun=date("y");
        $hasil=$this->ModelAnggota->autoNumber(['substr(no_anggota,1,2)' => $tahun])->row_array();
        $kode=$hasil['no_anggota'];

        $noUrut=(int) substr($kode, 5, 4);
        $noUrut++;
        $id=date('ym').sprintf('%04s', $noUrut);

        $passwordSTD = sha1('anggota123');

        $data=[
            'no_anggota'=>$id,
            'no_identitas'=>$this->input->post('no_iden', true),
            'nama_anggota'=>$this->input->post('nama_anggota', true),
            'pass_anggota'=>$passwordSTD,
            'tempat_lahir'=>$this->input->post('tempat_lahir', true),
            'tanggal_lahir'=>$this->input->post('tanggal_lahir', true),
            'jenis_kelamin'=>$this->input->post('jekel', true),
            'status_anggota'=>$this->input->post('status', true),

        ];
        $simpan = $this->ModelAnggota->simpanAnggota($data);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_anggota');?>";
        </script>
        <?php
        }
        public function hapus_data_anggota()
        {
            $where=['sha1(no_anggota)' => $this->uri->segment(3)];
            $this->ModelAnggota->hapusAnggota($where);
            ?>
            <script type="text/javascript">
                document.location="<?php echo base_url('admin/master_data_anggota');?>";
            </script>
            <?php
        }
        public function edit_data_anggota()
        {
            $data['judul_web']='Edit Data Anggota';
            $data['active_menu']='edit_data_anggota';
            
            $where = ['sha1(no_anggota)' => $this->uri->segment(3)];
        $hasil = $this->ModelAnggota->getWhere($where)->row_array();

        $idAnggota = [
            'idAnggota' => $hasil['no_anggota']
        ];

        $this->session->set_userdata($idAnggota);

        $dataEdit = [
            'no_iden' => $hasil['no_identitas'],
            'nama_anggota' => $hasil['nama_anggota'],
            'tempat_lahir' => $hasil['tempat_lahir'],
            'tanggal_lahir' => $hasil['tanggal_lahir'],
            'jekel' => $hasil['jenis_kelamin'],
            'status' => $hasil['status_anggota']
        ];


        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/anggota/edit_data_anggota', $dataEdit);
        $this->load->view('admin/template_admin/footer');      
        }
        public function update_data_anggota()
        {
            $id = $this->session->userdata('idAnggota');
            $where = ['no_anggota' => $id];
    
            $data = [
                'no_identitas' => $this->input->post('no_iden', true),
                'nama_anggota' => $this->input->post('nama_anggota', true),
                'tempat_lahir' => $this->input->post('tmpt_lahir', true),
                'tanggal_lahir' => $this->input->post('tgl_lahir', true),
                'jenis_kelamin' => $this->input->post('jekel', true),
                'status_anggota' => $this->input->post('status', true),
    
            ];
    
            $simpan = $this->ModelAnggota->updateAnggota($data, $where);
            $this->session->unset_userdata('idAnggota');
            ?>
            <script type="text/javascript">
                document.location="<?php echo base_url('admin/master_data_anggota');?>";
            </script>
            <?php
        }
        public function master_kategori()
        {
        $data['judul_web'] = "Master Data Kategori";
        $data['active_menu'] = "master_kategori";
        $data['data_kategori'] = $this->ModelKategori->getAll()->result_array();

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/kategori/master_kategori');
        $this->load->view('admin/template_admin/footer');  
        }
        public function tambah_kategori()
        {
            $data['judul_web']='Tambah Data Kategori';
            $data['active_menu']='tambah_kategori';

            $this->load->view('admin/template_admin/header', $data);
            $this->load->view('admin/template_admin/sidebar');
            $this->load->view('admin/kategori/tambah_kategori');
            $this->load->view('admin/template_admin/footer'); 
        } 
        public function simpan_kategori()
        {
            $hasil = $this->ModelKategori->autoNumber()->row_array();
            $kode = $hasil['id_kategori_buku'];
    
            $noUrut = (int) substr($kode, 2, 3);
            $noUrut++;
            $id = 'K' . sprintf('%03s', $noUrut);
    
            $data = [
                'id_kategori_buku' => $id,
                'nama_kategori_buku' => $this->input->post('nama_kategori', true),
                'status_kategori_buku' => "Aktif",
    
            ];
    
            $simpan = $this->ModelKategori->simpanKategori($data);
            ?>
            <script type="text/javascript">
                document.location="<?php echo base_url('admin/master_kategori');?>";
            </script>
            <?php
        }
        public function hapus_kategori()
        {
            $where = ['sha1(id_kategori_buku)' => $this->uri->segment(3)];
            $this->ModelKategori->hapusKategori($where);
            ?>
            <script type="text/javascript">
                document.location="<?php echo base_url('admin/master_kategori');?>";
            </script>
            <?php
        }
        public function edit_kategori()
        {
        $data['judul_web'] = "Edit Data Kategori";
        $data['active_menu'] = "edit_kategori";

        $where = ['sha1(id_kategori_buku)' => $this->uri->segment(3)];
        $hasil = $this->ModelKategori->getWhere($where)->row_array();

        $idKategori = [
            'idKategori' => $hasil['id_kategori_buku']
        ];

        $this->session->set_userdata($idKategori);

        $dataEdit = [
            'nama_kategori' => $hasil['nama_kategori_buku'],
            'status' => $hasil['status_kategori_buku'],
        ];


        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/kategori/edit_kategori', $dataEdit);
        $this->load->view('admin/template_admin/footer'); 
        }
        public function update_kategori()
        {
        $id = $this->session->userdata('idKategori');

        $where = ['id_kategori_buku' => $id];

        $data = [
            'id_kategori_buku' => $id,
            'nama_kategori_buku' => $this->input->post('nama_kategori', true),
            'status_kategori_buku' => $this->input->post('status', true),
        ];
        $simpan = $this->ModelKategori->updateKategori($data, $where);
        $this->session->unset_userdata('idKategori');
        ?>
            <script type="text/javascript">
                document.location="<?php echo base_url('admin/master_kategori');?>";
            </script>
            <?php
        }
}