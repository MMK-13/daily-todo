<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Expatrie extends Entity {
		protected $id_ticket;
		protected $id_departement;
		protected $id_position_somilo;
		protected $id_room_located;
		protected $id_poh;
		protected $id_country;
		protected $id_company;
		protected $id_reside;
		protected $id_crew;
		protected $email;
		protected $telephone;
		protected $first_name;
		protected $surname;
		protected $id_intnat;
		protected $fin_carriere;
		protected $motif;
		
		public function id_ticket() {
			return $this->id_ticket;
		}
		public function motif() {
			return $this->motif;
		}
		public function fin_carriere() {
			return $this->fin_carriere;
		}
		public function id_intnat() {
			return $this->id_intnat;
		}
		public function id_departement() {
			return $this->id_departement;
		}
		public function id_position_somilo() {
			return $this->id_position_somilo;
		}
		public function setId_ticket($id_ticket) {
			if (!empty($id_ticket)) {
				$this->id_ticket = $id_ticket;
			}
		}
		public function id_room_located() {
			return $this->id_room_located;
		}
		public function id_poh()		{
			return $this->id_poh;
		}
		public function id_country(){
			return $this->id_country;
		}
		public function id_company(){
			return $this->id_company;
		}
		public function id_reside(){
			return $this->id_reside;
		}
		public function id_crew(){
			return $this->id_crew;
		}
		public function email(){
			return $this->email;
		}
		public function telephone(){
			return $this->telephone;
		}
		public function first_name(){
			return $this->first_name;
		}
		public function surname(){
			return $this->surname;
		}
		public function setId_departement($id_departement) {
			if (!empty($id_departement)) {
				$this->id_departement = $id_departement;
			}
		}
		public function setId_position_somilo($id_position_somilo) {
			if (!empty($id_position_somilo)) {
				$this->id_position_somilo = $id_position_somilo;
			}
		}
		public function setId_room_located($id_room_located) {
			if (!empty($id_room_located)) {
				$this->id_room_located = $id_room_located;
			}
		}
		public function setId_poh($id_poh) {
			if (!empty($id_poh)) {
				$this->id_poh = $id_poh;
			}
		}
		public function setMotif($motif) {
			if (!empty($motif)) {
				$this->motif = $motif;
			}
		}
		public function setId_country($id_country) {
			if (!empty($id_country)) {
				$this->id_country = $id_country;
			}
		}
		public function setId_company($id_company) {
			if (!empty($id_company)) {
				$this->id_company = $id_company;
			}
		}
		public function setId_reside($id_reside) {
			if (!empty($id_reside)) {
				$this->id_reside = $id_reside;
			}
		}
		public function setFin_carriere($fin_carriere) {
			if (!empty($fin_carriere)) {
				$this->fin_carriere = $fin_carriere;
			}
		}
		public function setId_crew($id_crew) {
			if (!empty($id_crew)) {
				$this->id_crew = $id_crew;
			}
		}
		public function setId_intnat($id_intnat) {
			if (!empty($id_intnat)) {
				$this->id_intnat = $id_intnat;
			}
		}
		public function setEmail($email) {
			if (!empty($email) && is_string($email)) {
				$this->email = $email;
			}
		}
		public function setTelephone($telephone) {
			if (!empty($telephone) && is_string($telephone)) {
				$this->telephone = $telephone;
			}
		}
		public function setFirst_name($first_name) {
			if (!empty($first_name) && is_string($first_name)) {
				$this->first_name = $first_name;
			}
		}
		public function setSurname($surname) {
			if (!empty($surname) && is_string($surname)) {
				$this->surname = $surname;
			}
		}
		public function isValid() {
			return true;
		}
	}