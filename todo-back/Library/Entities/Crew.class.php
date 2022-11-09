<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Crew extends Entity {
		protected $Crew;
		
		public function crew() {
			return $this->Crew;
		}
		public function setCrew($Crew) {
			if (!empty($Crew) && is_string($Crew)) {
				$this->Crew = $Crew;
			}
		}
		public function isValid() {
			return (!empty($this->Crew) && is_string($this->Crew));
		}
	}