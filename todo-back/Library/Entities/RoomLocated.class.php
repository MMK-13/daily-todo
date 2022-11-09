<?php
	namespace Library\Entities;

	use \Library\Entity;

	class RoomLocated extends Entity {
		protected $RoomLocated;
		
		public function RoomLocated() {
			return $this->RoomLocated;
		}
		public function setRoomLocated($RoomLocated) {
			if (!empty($RoomLocated) && is_string($RoomLocated)) {
				$this->RoomLocated = $RoomLocated;
			}
		}
		public function isValid() {
			return (!empty($this->RoomLocated) && is_string($this->RoomLocated));
		}
	}