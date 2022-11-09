<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Company extends Entity {
		protected $Company;
		
		public function company() {
			return $this->Company;
		}
		public function setCompany($Company) {
			if (!empty($Company) && is_string($Company)) {
				$this->Company = $Company;
			}
		}
		public function isValid() {
			return (!empty($this->Company) && is_string($this->Company));
		}
	}