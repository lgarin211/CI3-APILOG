<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function read()
	{
		$data = $this->db->get('KOT')->result();
		$data = json_encode($data);
		echo ($data);
	}

	public function creat()
	{
		if (!empty($_POST)) {
			$data = $_POST;
			$this->db->insert('KOT', $data);
			echo 'success';
		} else {
			echo 'ada yang salah';
		}
	}
	public function update()
	{
		if (!empty($_POST['id'])) {
			$data = $_POST;
			$this->db->set($data);
			$this->db->where('id', $_POST['id']);
			$this->db->update('KOT');
			echo 'berhasil';
		} else {
			echo 'ada yang salah';
		}
	}
	public function del()
	{
		if (!empty($_GET['id'])) {
			$this->db->where('id', $_GET['id']);
			$this->db->delete('KOT');
			echo 'berhasil';
		} else {
			echo 'ada yang salah';
		}
	}
}
