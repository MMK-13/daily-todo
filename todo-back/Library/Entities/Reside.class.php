<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Reside extends Entity {
		protected $Reside;
		
		public function reside() {
			return $this->Reside;
		}
		public function setReside($Reside) {
			if (!empty($Reside) && is_string($Reside)) {
				$this->Reside = $Reside;
			}
		}
		public function isValid() {
			return (!empty($this->Reside) && is_string($this->Reside));
		}
	}