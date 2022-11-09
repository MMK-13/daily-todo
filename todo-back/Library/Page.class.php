<?php
	namespace Library;

	class Page extends ApplicationComponent {
		protected $contentFile;
		protected $vars = array();
		
		public function addVar($var,$valeur) {
			if (!is_string($var) || is_numeric($var) || empty($var)) {
				throw new \InvalidArgumentException('Le nom de la variable doit être une chaîne de caractères non nulle');
			}
			$this->vars[$var] = $valeur;
		}
		public function getGeneratedPage() {
			if (!file_exists($this->contentFile)) {
				throw new \RuntimeException('La vue spécifiée n\'existe pas : '.$this->contentFile);
			}

			extract($this->vars);

			ob_start();
			require $this->contentFile;
			$content = ob_get_clean();

			ob_start();
			require __DIR__.'/../Applications/'.$this->app->name().'/Templates/json.php';
			return ob_get_clean();
		}
		public function setContentFile($contentFile) {
			if (!is_string($contentFile) || empty($contentFile)) {
				throw new \InvalidArgumentException('La vue spécifiée est invalide');
			}
			$this->contentFile = $contentFile;
		}
	}