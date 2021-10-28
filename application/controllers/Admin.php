<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {


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
    $username = $this->input->post('username',true);
    $password = sha1($this->input->post('password',true));

    $sql = $this->modeladmin->cekloginadmin(['username_pustakawan' => $username, 'passw_pustakawan' => $password]);
    $cekuser = $sql->row_array();

    if(!$cekuser){
        ?>
        <script type="text/javascript">
            alert("maaf username dan password tidak sesuai!");
            document.location="<?php echo base_url('admin/login');?>";
        </script>
        <?php
    }
    else{
        $data = [
            'idpustakawan' => $cekuser['id_pustakawan'],
            'enid' => sha1($cekuser['id_pustakawan']),
            'nama_pustakawan' => $cekuser['nama_pustakawan'],
            'akses' => $cekuser['akses_pustakawan']
        ];
        $this->session->set_userdata($data);
        ?>
        <script type="text/javascript">
            alert("selamat datang <?php echo $cekuser['nama_pustakawan'];?>");
            document.location="<?php echo base_url('admin/dashboard');?>";
        </script>
        <?php
    }
 }
    public function dashboard()
    {
        $data['judul_web'] = 'dashboard';
        $data['active_menu'] = 'dashboard';

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/login/dashboard');
        $this->load->view('admin/template_admin/footer');

    }

    public function logout()
	{
        $this->session->unset_userdata('idpustakawan');
        $this->session->unset_userdata('namapustakawan');
        $this->session->unset_userdata('enid');

        ?>
        <script type="text/javascript">
            alert("anda telah logout!");
            document.location="<?php echo base_url('admin/login');?>";
        </script>
        <?php
    }

    public function master_data_anggota()
    {
        $data['judul_web'] = 'Master Data Anggota';
        $data['active_menu'] = 'master_data_anggota';
        $data['data_anggota'] = $this->ModelAnggota->getAll()->result_array();
        //print_r($data);
        //die;

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/anggota/master_data_anggota',$data);
        $this->load->view('admin/template_admin/footer');

    }

    public function master_data_kategori()
    {
        $data['judul_web'] = 'master data kategori';
        $data['active_menu'] = 'master_data_kategori';
        $data['data_kategori'] = $this->ModelKategori->getAll()->result_array();

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/kategori/master_data_kategori',$data);
        $this->load->view('admin/template_admin/footer');
    }

    public function tambah_data_anggota()
    {
        $data['judul_web'] = 'tambah data anggota';
        $data['active_menu'] = 'tambah_data_anggota';

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/anggota/tambah_data_anggota');
        $this->load->view('admin/template_admin/footer');
    }
    
    public function simpan_data_anggota()
    {
        $tahun = date("y");
        $hasil = $this->ModelAnggota->autoNumber(['substr(no_anggota,1,2)' => $tahun]) -> row_array();
        $kode = $hasil['no_anggota'];

        $noUrut = (int) substr($kode, 5, 4);
        $noUrut++;
        $id = date('ym').sprintf("%04s", $noUrut);

        $passwordSTD = sha1("anggota123");

        $data = [
            'no_anggota' => $id,
            'no_identitas' => $this->input->post('no_iden', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'pass_anggota' => $passwordSTD,
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'status_anggota' => $this->input->post('status_anggota', true),

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
        $where = ['sha1(no_anggota)' => $this-> uri -> segment(3)];
        $this->ModelAnggota->hapusAnggota($where);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_anggota');?>";
        </script>
        <?php
    }

    public function edit_data_anggota()
    {
        $data['judul_web'] = 'edit data anggota';
        $data['active_menu'] = 'edit_data_anggota';

        $where = ['sha1(no_anggota)' => $this->uri->segment(3)];
        $hasil = $this->ModelAnggota->getWhere($where)->row_array();

        $idAnggota = [
            'idAnggota' => $hasil['no_anggota']
        ];

        $this->session->set_userdata($idAnggota);

        $dataEdit =[
            'no_iden' => $hasil['no_identitas'],
            'nama_anggota' => $hasil['nama_anggota'],
            'tempat_lahir' => $hasil['tempat_lahir'],
            'tanggal_lahir' => $hasil['tanggal_lahir'],
            'jenis_kelamin' => $hasil['jenis_kelamin'],
            'status_anggota' => $hasil['status_anggota']
        ];

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/anggota/edit_data_anggota',$dataEdit);
        $this->load->view('admin/template_admin/footer');
    }

    public function update_data_anggota()
    {
        $id = $this->session->userdata('idAnggota');
        $where =['no_anggota' => $id];

        $data =[
            'no_identitas' => $this->input->post('no_iden',true),
            'nama_anggota' => $this->input->post('nama_anggota',true),
            'tempat_lahir' => $this->input->post('tempat_lahir',true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir',true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin',true),
            'status_anggota' => $this->input->post('status_anggota',true)
        ];

        $simpan = $this->ModelAnggota->updateAnggota($data, $where);
        $this->session->unset_userdata($idAnggota);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_anggota');?>";
        </script>
        <?php
    }

    public function tambah_data_kategori()
    {
        $data['judul_web'] = 'tambah data kategori';
        $data['active_menu'] = 'tambah_data_kategori';

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/kategori/tambah_data_kategori');
        $this->load->view('admin/template_admin/footer');
    }

    public function simpan_data_kategori()
    {
        $hasil = $this->ModelKategori->autoNumber()->row_array();
        $kode = $hasil['id_kategori_buku'];

        $noUrut = (int) substr($kode, 2, 3);
        $noUrut++;
        $id = "K".sprintf("%03s", $noUrut);

        $data = [
            'id_kategori_buku' => $id,
            'nama_kategori_buku' => $this->input->post('nama_kategori', true),
            'status_kategori_buku' => "Aktif"
        ];

        $simpan = $this->ModelKategori->simpanKategori($data);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_kategori');?>";
        </script>
        <?php
    }

    public function hapus_data_kategori()
    {
        $where = ['sha1(id_kategori_buku)' => $this-> uri -> segment(3)];
        $this->ModelKategori->hapusKategori($where);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_kategori');?>";
        </script>
        <?php
    }

    public function edit_data_kategori()
    {
        $data['judul_web'] = 'edit data kategori';
        $data['active_menu'] = 'edit_data_kategori';

        $where = ['sha1(id_kategori_buku)' => $this->uri->segment(3)];
        $hasil = $this->ModelKategori->getWhere($where)->row_array();

        $idKategori = [
            'idKategori' => $hasil['id_kategori_buku']
        ];

        $this->session->set_userdata($idKategori);

        $dataEdit =[
            'nama_kategori' => $hasil['nama_kategori_buku'],
            'status_kategori' => $hasil['status_kategori_buku'],
        ];

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/kategori/edit_data_kategori',$dataEdit);
        $this->load->view('admin/template_admin/footer');
    }

    public function update_data_kategori()
    {
        $id = $this->session->userdata('idKategori');
        $where = ['id_kategori_buku' => $id];

        $data =[
            'nama_kategori_buku' => $this->input->post('nama_kategori_buku',true),
            'status_kategori_buku' => $this->input->post('status_kategori_buku',true),
        ];

        $simpan = $this->ModelKategori->updateKategori($data, $where);
        $this->session->unset_userdata('idKategori');
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_kategori');?>";
        </script>
        <?php
    }

    public function master_data_pustakawan()
    {
        $data['judul_web'] = 'Master Data Pustakawan';
        $data['active_menu'] = 'master_data_pustakawan';
        $data['data_pustakawan'] = $this->ModelPustakawan->getAll()->result_array();
        //print_r($data);
        //die;

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('pustakawan/master_data_pustakawan',$data);
        $this->load->view('admin/template_admin/footer');

    }

    public function edit_data_pustakawan()
    {
        $data['judul_web'] = 'edit data pustakawan';
        $data['active_menu'] = 'edit_data_pustakawan';

        $where = ['sha1(id_pustakawan)' => $this->uri->segment(3)];
        $hasil = $this->ModelPustakawan->getWhere($where)->row_array();

        $idpustakawan = [
            'id_pustakawan' => $hasil['id_pustakawan']
        ];

        $this->session->set_userdata($idpustakawan);

        $dataEdit =[
            'nama_pustakawan' => $hasil['nama_pustakawan'],
            'username_pustakawan' => $hasil['username_pustakawan'],
            'akses_pustakawan' => $hasil['akses_pustakawan'],
        ];

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('pustakawan/edit_data_pustakawan',$dataEdit);
        $this->load->view('admin/template_admin/footer');
    }

    public function update_data_pustakawan()
    {
        $id = $this->session->userdata('idpustakawan');
        $where =['id_pustakawan' => $id];

        $data =[
            'nama_pustakawan' => $this->input->post('nama_pustakawan', true),
            'username_pustakawan' => $this->input->post('username_pustakawan', true),
            'akses_pustakawan' => $this->input->post('akses_pustakawan',true)
        ];

        $simpan = $this->ModelPustakawan->updatePustakawan($data, $where);
        $this->session->unset_userdata('idpustakawan');
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_pustakawan');?>";
        </script>
        <?php
    }

    public function simpan_data_pustakawan()
    {
        $hasil = $this->ModelPustakawan->autoNumber()->row_array();
        $kode = $hasil['id_pustakawan'];

        $noUrut = (int) substr($kode, 2, 3);
        $noUrut++;
        $id = "K".sprintf("%03s", $noUrut);

        $data = [
            'id_pustakawan' => $id,
            'nama_pustakawan' => $this->input->post('nama_pustakawan', true),
            'username_pustakawan' => $this->input->post('username_pustakawan', true),
            'akses_pustakawan' => 2,
            'passw_pustakawan' => sha1('pustakawan'),
        ];

        $simpan = $this->ModelPustakawan->simpanPustakawan($data);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_pustakawan');?>";
        </script>
        <?php
    }

    public function tambah_data_pustakawan()
    {
        $data['judul_web'] = 'tambah data pustakawan';
        $data['active_menu'] = 'tambah_data_pustakawan';

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('pustakawan/tambah_data_pustakawan');
        $this->load->view('admin/template_admin/footer');
    }

    public function hapus_data_pustakawan()
    {
        $where = ['sha1(id_pustakawan)' => $this-> uri -> segment(3)];
        $this->ModelPustakawan->hapusPustakawan($where);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_pustakawan');?>";
        </script>
        <?php
    }

    public function master_data_buku()
    {
        $data['judul_web'] = 'Master Data Buku';
        $data['active_menu'] = 'master_data_buku';
        $data['databuku'] = $this->ModelBuku->joinKategori()->result_array();
        //print_r($data);
        //die;

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/buku/master_data_buku',$data);
        $this->load->view('admin/template_admin/footer');

    }

    public function tambah_data_buku()
    {
        $where=['status_kategori_buku' => "aktif"];
        $data['data_kategori'] = $this->ModelKategori->getWhere($where)->result_array();
        $data['judul_web'] = 'tambah data buku';
        $data['active_menu'] = 'tambah_data_buku';

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/buku/tambah_data_buku', $data);
        $this->load->view('admin/template_admin/footer');
    }

    public function simpan_data_buku()
    {
        $hasil = $this->ModelBuku->autoNumber(['id_kategori_buku' => $this->input->post('kategori', true)])->row_array();
        //print_r($hasil);
        //die;
        $kode = $hasil['kode_buku'];

        $noUrut = (int) substr($kode, 11, 5);
        $noUrut++;
        $id = $this->input->post('kategori',true)."-".date("ym")."-".sprintf("%05s", $noUrut);

        $data = [
            'kode_buku' => $id,
            'judul_buku' => $this->input->post('judul_buku', true),  
            'penulis_buku' => $this->input->post('penulis_buku', true),      
            'penerbit_buku' => $this->input->post('penerbit_buku', true), 
            'tahun_terbit' => $this->input->post('tahun_terbit', true),              
            'stok_buku' => $this->input->post('stok_buku', true),
            'id_kategori_buku' => $this->input->post('kategori', true)      
      
        ];

        $simpan = $this->ModelBuku->simpanBuku($data);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_buku');?>";
        </script>
        <?php
    }

    public function hapus_data_buku()
    {
        $where = ['sha1(kode_buku)' => $this-> uri -> segment(3)];
        $this->ModelBuku->hapusBuku($where);
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_buku');?>";
        </script>
        <?php
    }

    public function edit_data_buku()
    {
        $data['judul_web'] = 'edit data buku';
        $data['active_menu'] = 'edit_data_buku';

        $where = ['sha1(kode_buku)' => $this->uri->segment(3)];
        $hasil = $this->ModelBuku->getWhere($where)->row_array();
        //print_r($hasil);
        //die;

        $data['data_kategori'] = $this->ModelKategori->getWhere(['status_kategori_buku' => "aktif"])->result_array();

        $kodebuku = [
            'kodebuku' => $hasil['kode_buku']
        ];

        $this->session->set_userdata($kodebuku);

        $dataEdit =[
            'judul_buku' => $hasil['judul_buku'],  
            'penulis_buku' => $hasil['penulis_buku'],      
            'penerbit_buku' => $hasil['penerbit_buku'], 
            'tahun_terbit' => $hasil['tahun_terbit'],              
            'stok_buku' => $hasil['stok_buku'],
            'kategori' => $hasil['id_kategori_buku']
        ];

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar', $data);
        $this->load->view('admin/buku/edit_data_buku',$dataEdit);
        $this->load->view('admin/template_admin/footer');
    }

    public function update_data_buku()
    {
        $id = $this->session->userdata('kodebuku');
        $where =['kode_buku' => $id];

    if(substr($id,4)!=$this->input->post('kategori',true)){
            $hasil =$this->ModelBuku->autoNumber(['id_kategori_buku' => $this->input->post ('kategori',true)])->row_array();
            $kode =$hasil['kode_buku'];

        $noUrut = (int) substr($kode,11 ,5);
        $noUrut++;
        $idBaru = $this->input->post('kategori',true)."-".date("ym")."-".sprintf("%05s", $noUrut);

        $data =[
            'kode_buku' => $idBaru,
            'judul_buku' => $this->input->post('judul_buku', true),  
            'penulis_buku' => $this->input->post('penulis_buku', true),      
            'penerbit_buku' => $this->input->post('penerbit_buku', true), 
            'tahun_terbit' => $this->input->post('tahun_terbit', true),              
            'stok_buku' => $this->input->post('stok_buku', true),
            'id_kategori_buku' => $this->input->post('kategori', true)     
        ];
    }
    else{
        $data = [
            'judul_buku' => $this->input->post('judul_buku', true),  
            'penulis_buku' => $this->input->post('penulis_buku', true),      
            'penerbit_buku' => $this->input->post('penerbit_buku', true), 
            'tahun_terbit' => $this->input->post('tahun_terbit', true),              
            'stok_buku' => $this->input->post('stok_buku', true),
            'id_kategori_buku' => $this->input->post('kategori', true)     
        ];
    }
        $simpan = $this->ModelBuku->updateBuku($data, $where);
        $this->session->unset_userdata('kodebuku');
        ?>
        <script type="text/javascript">
            document.location="<?php echo base_url('admin/master_data_buku');?>";
        </script>
        <?php
    }

    public function edit_data_pass()
    {
        $data['judul_web'] = 'Master Data Anggota';
        $data['active_menu'] = 'edit_data_pass';
        $data['data_anggota'] = $this->ModelEditPass->getAll()->result_array();
        //print_r($data);
        //die;

        $this->load->view('admin/template_admin/header', $data);
        $this->load->view('admin/template_admin/sidebar');
        $this->load->view('admin/login/edit_data_pass',$data);
        $this->load->view('admin/template_admin/footer');

    }

    public function updatePassword()
    {
        $id_pustakawan = $_SESSION['idpustakawan'];
        $hasil = $this->ModelEditPass->getPassword(['id_pustakawan' => $id_pustakawan])->row_array();
        $pass_lama = sha1($this->input->post('passLama', true));
        // $data = [
        //     'pass_lama' => $pass_lama,
        //     'hasil' => $hasil['passw_pustakawan']
        // ];
        // print_r($id_pustakawan);
        // die;
        $passBaru = $this->input->post('passBaru', true);

        $where = ['id_pustakawan' => $id_pustakawan];

        if ($pass_lama == $hasil['passw_pustakawan']) {
            $this->ModelEditPass->updatePassword(sha1($passBaru), $where);
            ?>
            <script type="text/javascript">
                alert("data password sudah diubah!");
                document.location="<?php echo base_url('admin/dashboard');?>";
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("data password belum diubah!");
                document.location="<?php echo base_url('admin/edit_data_pass');?>";
            </script>
            <?php

        }
    }

}