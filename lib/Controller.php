<?php

namespace lib;

class Controller extends System{
	
	public $dados;
	public $layout;
	
	private $path;
	private $pathRender;
	//view web
	protected $title = null;
	protected $description = null;
	protected $keywords;
	protected $image;
	protected $captionController;
	protected $captionAction;
	protected $captionParams;
	
	
	public function __construct(){
		parent::__construct();
	}
	
	private function setPath($render){
		
		if(is_array($render)){
			foreach($render as $li){
				$path = 'view/' . $this->getArea() . '/' . $this->getController . '/' . $li . '.phtml'; 
				$this->fileExists($path);
				$this->path[] = $path;
			}
		}else{
			$this->pathRender = is_null($render) ? $this->getAction() : $render;
			$this->path = 'view/' . $this->getArea() . '/' . $this->getController . '/' . $this->pathRender . '.phtml';
			$this->fileExists($this->path);
		}
	
	}
	
	private function fileExists($file){
		
		if(!file_exists($file)){
			die("Não foi localizado o arquivo " . $file);
		}
	}
	
	public function view($render = null){
		$this->title = is_null($this->title) ? 'Meu Titulo' : $this->title;
		$this->description = is_null($this->description) ? 'Minha descrição' : $this->description;
		$this->keywords = is_null($this->keywords) ? 'Minha keywords' : $this->keywords;
		
		$this->setPath($render);
		if(is_null($this->layout)){
			$this->render();
		}else{
			$this->layout = "content/{$this->getArea()}/shared/{$this->layout}.phtml";
		}
	}
	
	public function render($file = null){
		
		
	}
}