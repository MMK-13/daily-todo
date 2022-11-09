<?php
	namespace Library;

	abstract class BackController extends ApplicationComponent {
		protected $action = '';
		protected $module = '';
		protected $page = NULL;
		protected $view = '';
		protected $managers;

		public function __construct(Application $app,$module,$action) {
			parent::__construct($app);
			$this->managers = new Managers('PDO',DBFactory::MySQLPDO());
			$this->page = new Page($app);
			$this->setAction($action);
			$this->setModule($module);
			$this->setView($action);
		}
		public function execute() {
			$method = 'execute'.ucfirst($this->action);
			if (!is_callable(array($this,$method))) {
				throw new \RuntimeException("L'action $this->action n'est pas définie sur ce module...");
			}
			$this->$method($this->app->httpRequest());
		}
		public function page() {
			return $this->page;
		}
		public function setModule($module) {
			if (!is_string($module) || empty($module)) {
				throw new \InvalidArgumentException("Le module doit être une chaîne de caractères valide...");
			}
			$this->module = $module;
		}
		public function setAction($action) {
			if (!is_string($action) || empty($action)) {
				throw new \InvalidArgumentException("L'action doit être une chaîne de caractères valide...");
			}
			$this->action = $action;
		}
		public function setView($view) {
			if (!is_string($view) || empty($view)) {
				throw new \InvalidArgumentException("La vue doit être une chaîne de caractères valide...");
			}
			$this->view = $view;
			$this->page->setContentFile(__DIR__.'/../Applications/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
		}
	}