<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Departement extends Entity {
		protected $Departement;
		
		public function departement() {
			return $this->Departement;
		}
		public function setDepartement($departement) {
			if (!empty($departement) && is_string($departement)) {
				$this->Departement = $departement;
			}
		}
		public function isValid() {
			return (!empty($this->Departement) && is_string($this->Departement));
		}
	}