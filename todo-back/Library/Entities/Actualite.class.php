<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Actualite extends Entity {
		protected $entity;
		protected $categorie;
		protected $datePublication;

		public function __construct($entity,$categorie,$datePublication) {
			$this->setEntity($entity);
			$this->setCategorie($categorie);
			$this->setDatePublication($datePublication);
		}
		public function entity() {
			return $this->entity;
		}
		public function categorie() {
			return $this->categorie;
		}
		public function datePublication() {
			return $this->datePublication;
		}
		public function setEntity($entity) {
			$entity = (int)$entity;
			$this->entity = $entity;
		}
		public function setCategorie($categorie) {
			$categorie = (int)$categorie;
			$this->categorie = $categorie;
		}
		public function setDatePublication(\DateTime $datePublication) {
			$this->datePublication = $datePublication;
		}
	}