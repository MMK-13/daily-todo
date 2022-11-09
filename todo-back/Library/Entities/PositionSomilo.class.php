<?php
	namespace Library\Entities;

	use \Library\Entity;

	class PositionSomilo extends Entity {
		protected $PositionSomilo;
		
		public function PositionSomilo() {
			return $this->PositionSomilo;
		}
		public function setPositionSomilo($PositionSomilo) {
			if (!empty($PositionSomilo) && is_string($PositionSomilo)) {
				$this->PositionSomilo = $PositionSomilo;
			}
		}
		public function isValid() {
			return (!empty($this->PositionSomilo) && is_string($this->PositionSomilo));
		}
	}