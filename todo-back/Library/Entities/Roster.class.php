<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Roster extends Entity {
		protected $id_expatrie;
		protected $fly_in;
		protected $fly_out;
		protected $days;
		protected $roster;
		protected $fly_inter;
		
		public function id_expatrie() {
			return $this->id_expatrie;
		}
		public function fly_in() {
			return $this->fly_in;
		}
		public function fly_out() {
			return $this->fly_out;
		}
		public function days() {
			return $this->days;
		}
		public function roster() {
			return $this->roster;
		}
		public function fly_inter() {
			return $this->fly_inter;
		}
		public function setId_expatrie($id_expatrie) {
			if (!empty($id_expatrie) && is_numeric($id_expatrie)) {
				$this->id_expatrie = $id_expatrie;
			}
		}
		public function setFly_in($fly_in) {
			$this->fly_in = $fly_in;
		}
		public function setFly_out($fly_out) {
			$this->fly_out = $fly_out;
		}
		public function setFly_inter($fly_inter) {
			$this->fly_inter = $fly_inter;
		}
		public function setDays($days) {
			if (!empty($days) && is_numeric($days)) {
				$this->days = $days;
			}
		}
		public function setRoster($roster) {
			if (!empty($roster) && is_string($roster)) {
				$this->roster = $roster;
			}
		}

		public function isValid() {
			return preg_match('`^([0-9]+)\/([0-9]+)`',$this->roster);
		}
	}