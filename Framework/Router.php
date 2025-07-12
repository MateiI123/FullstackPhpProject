<?php 


class Router{

	protected $routes = [];



	public function registerRoute($method , $uri , $action){


	list($controller , $contollerMethod) = explode("@" , $action);	//explode face split la un string cu ce i dai ca prim param , separat de ce ii este dat ca prim param

	$this->routes[] = [
			'method' => $method,
			'uri' => $uri,
			'controller' => $controller,
			'controllerMethod' => $contollerMethod

		];

	}


	 public function get($uri , $controller){
		$this->registerRoute('GET' , $uri ,$controller);
	 }


	public function post($uri , $controller){

		$this->registerRoute('POST' , $uri ,$controller);
	}


		
	 
	 public function put($uri , $controller){
		$this->registerRoute('PUT' , $uri ,$controller);
	 }

		
	 
	 public function delete($uri , $controller){
		$this->registerRoute('DELETE' , $uri ,$controller);
	 }


	 public function route($uri , $method) {

				

			foreach($this->routes as $route){
		
			//	echo $route['uri'];
				
			//	echo $method;

				
			if($route['uri'] === $uri && $route['method'] === $method){
				



				loadContoller($route['controller']);


				$controller = $route['controller'];
				$controllerMethod = $route['controllerMethod'];	


				
				$controllerInstance = new $controller();
				$controllerInstance->$controllerMethod();

				return;
			} 
		}
		
			loadContoller('ErrorController');
			ErrorController::notFound();
	 }
		
	 




}


?>
