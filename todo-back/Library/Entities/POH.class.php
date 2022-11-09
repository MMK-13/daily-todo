<?php
	namespace Library\Entities;

	use \Library\Entity;

	class POH extends Entity {
		protected $POH;
		
		public function POH() {
			return $this->POH;
		}
		public function setPOH($POH) {
			if (!empty($POH) && is_string($POH)) {
				$this->POH = $POH;
			}
		}
		public function isValid() {
			return (!empty($this->POH) && is_string($this->POH));
		}
	}