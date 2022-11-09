<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Ticket extends Entity {
		protected $Ticket;
		
		public function ticket() {
			return $this->Ticket;
		}
		public function setTicket($ticket) {
			if (!empty($ticket) && is_string($ticket)) {
				$this->Ticket = $ticket;
			}
		}
		public function isValid() {
			return (!empty($this->Ticket) && is_string($this->Ticket));
		}
	}