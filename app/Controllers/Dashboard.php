<?php

namespace App\Controllers;

use App\Models\Posts_model;
use App\Models\Users_model;
use App\Models\Categories_model;
use App\Models\Newsletter_model;
use function PHPSTORM_META\map;

class Dashboard extends BaseController
{
	public function index()
	{

		//return view('welcome_message');
		//$data['dato1'] = "Dato1";
		//$data['dato2'] = "Dato2";
		//return view('format.php', $data);
		//echo "Inside Dashboard" . "<br>";
		//$this->hello("dashboard",55);
		/*
		$model = new Users_model();
		$plainText = "123456";
		$password = password_hash($plainText, PASSWORD_BCRYPT);
		$data = [
			"name" => "Víctor",
			"username" => "victor_user",
			"password" => $password,
			"role"=> 1,
			"last_login" => date("Y-m-d H:i:s")
		];
		$id = $model->insert($data);
		echo "ID INSERT : " . $id;
		*/
		/*
		$model = new Posts_model();
		$data = [
			"banner" => "images/thumbs/posts/avian-400.jpg",
			"title" => "Lorem ipsum title",
			"intro" => "Intro Lorem ipsum",
			"content" => "Lorem ipsum content",
			"category" => 1,
			"tags" => "prueba,prueba1",
			"created_at" => date("Y-m-d H:i:s"),
			"created_by" =>1
		];
		$id = $model->insert($data);
		echo "POST INSERT: " . $id;
		*/
		$this->load_view('index');

	}

	public function upload_post()
	{
		
		//carga categorias
		$model = new Categories_model();

		$post_model = new Posts_model();
		$data['categories'] = $model->findAll();

		helper(["url","form"]); // carga de form validation
		$validation = \Config\Services::validation();

		$validation->setRules([
						"title" => "required",
						"intro" => "required",
						"content" => "required|min_length[50]",
						"category" => "required",

					],
					[
						"title" => [
							"required" => "El título es requerido"
						],
						"intro" => [
							"required" => "La intro es requerida"
						],
						"content" => [
							"required" 		=> "El contenido es requerido",
							"min_length"	=> "Mínimo 50 carácteres"
						],
						"category" => [
							"required"		=> "La categoría es requerida"
						],							
					]
		);

		if($_POST) {

			//form validation errors
			if(! $validation->withRequest($this->request)->run()) {
				$errors = $validation->getErrors();
				$data['errors'] = $errors;
				$data['url'] ="/dashboard/upload_post";
				$this->load_view('includes/error', $data);
				die;
			}
			
		    $img = $this->request->getFile("banner");
	
			if ($img->isValid() && ! $img->hasMoved()) {
				$newName = $img->getRandomName();
				$img->move(ROOTPATH . "public\uploads\posts\images", $newName);
			} else {
				$data['errors'] = ["imagen no valida"];
				$data['url'] ="/dashboard/upload_post";
				$this->load_view('includes/error', $data);
				die;
			}

			$_POST['banner'] = $newName;
			$_POST['slug'] = url_title($_POST['title']);
			$_POST['created_at'] = date("Y-m-d H:i:s");
			$_POST['show_home'] = 1;

			$post_model->insert($_POST);
		}

		$this->load_view('upload_post', $data);
		die;
	}

	public function post(int $id) {

		if($id != null) {
			$db = \Config\Database::connect();
			$query ="SELECT *, c.id as category_id, c.name as category_name FROM `posts` p 
					join categories c ON c.id = p.category
					WHERE p.id= ". $id;

			$query = $db->query($query);
			$post = $query->getResult()[0];


			$querystring = "SELECT p.id,p.title, c.id as category_id, c.name as category_name FROM `posts` p 
			join categories c ON c.id = p.category ORDER BY rand() LIMIT 1";

			$query = $db->query($querystring);
			$post_random_previous = $query->getResult()[0];

			$query = $db->query($querystring);
			$post_random_next = $query->getResult()[0];

			$data['post'] = $post;
			$data['post_random_previous'] = $post_random_previous;
			$data['post_random_next'] = $post_random_next;
			$this->load_view('post', $data);
		}
	}

	public function add_newsletter() {
	
		$obj = new \stdClass();

		if($_POST['email'] != "") {
			//control de email válido
			if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$obj->status = 422;
				$obj->message ="Escriba un correo válido";
				echo json_encode($obj);
				die;
			}

			$newsletter = new Newsletter_model();
			$_POST['added_at'] = date("Y-m-d H:i:s");
			$insert = $newsletter->insert($_POST);
			if($insert){
				$obj->status = 200;
				$obj->message ="Te has suscrito a la newsletter";
				echo json_encode($obj);
				die;
			}
			$obj->status = 422;
			$obj->message ="Ya estas suscrito a la newsletter";
			echo json_encode($obj);
			die;
		}

		$obj->status = 422;
		$obj->message ="Escriba un correo válido";
		echo json_encode($obj);
		die;
	}

	public function form(){
		return view('format');
	}

	public function hello(string $slug = null, int $id = null) 
	{
		echo "SLUG: " . $slug .  " , ID: " . $id .PHP_EOL ;
	}

	public function template ()
	{
		$parser = \Config\Services::parser();

		$data = [
			"title" => "Titulo de la página",
			"content" => "lorem ipsum",
			'footer' => 'good bye',
		];

		echo $parser->setdata($data)->render('template');
	}

	public function load_view(string $view = null, array $data = [])
	{
		$db = \Config\Database::connect();
		$query="SELECT * FROM categories";
		$query = $db->query($query);
		$categories_home = $query->getResult();
		$data['categories_home'] = $categories_home;

		setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
        $query="SELECT * FROM posts WHERE show_home=1";
        $query = $db->query($query);
        $posts_home = $query->getResult();

		$data['posts_home'] = $posts_home;

		echo view('includes/header', $data);
		echo view($view, $data);
		echo view('includes/footer', $data);
	}
}
