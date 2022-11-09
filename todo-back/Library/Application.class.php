<?php
	namespace Library;

	abstract class Application {	
		protected $httpRequest;
		protected $httpResponse;
		protected $name;
		protected $user;
		protected $config;

		abstract public function run();

		public function __construct() {
			$this->httpRequest = new HTTPRequest($this);
			$this->httpResponse = new HTTPResponse($this);
			$this->user = new User($this);
			$this->config = new Config($this);
		}
		public function httpRequest() {
			return $this->httpRequest;
		}
		public function httpResponse() {
			return $this->httpResponse;
		}
		public function name() {
			return $this->name;
		}
		public function config() {
			return $this->config;
		}
		public function user() {
			return $this->user;
		}
		public function getController()	{
			$router = new Router;

			$xml = new \DOMDocument;
			$xml->load(__DIR__.'/../Applications/'.$this->name.'/Config/routes.xml');

			$routes = $xml->getElementsByTagName('route');

			foreach ($routes as $route) {
				$vars = array();

				if ($route->hasAttribute('vars')) {
					$vars = explode(',', $route->getAttribute('vars'));
				}

				$router->addRoute(new \Library\Route($route->getAttribute('url'),$route->getAttribute('module'),$route->getAttribute('action'),$vars));
			}

			try {
				$matchedRoute = $router->getRoute($this->httpRequest->requestURI());
			} catch (\Exception $e) {
				if ($e->getCode() == \Library\Router::NO_ROUTE) {
					$this->httpResponse->redirect404();
				}
			}

			$_GET = array_merge($_GET,$matchedRoute->vars());

			$controllerClass = 'Applications\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';

			return new $controllerClass($this,$matchedRoute->module(),$matchedRoute->action());
		}
	}