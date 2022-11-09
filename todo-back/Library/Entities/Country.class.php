<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Country extends Entity {
		protected $Country;
		
		public function country() {
			return $this->Country;
		}
		public function setCountry($Country) {
			if (!empty($Country) && is_string($Country)) {
				$this->Country = $Country;
			}
		}
		public function isValid() {
			return (!empty($this->Country) && is_string($this->Country));
		}
	}