<?php
	namespace Library\Entities;

	use \Library\Entity;

	class Son extends Entity {
		protected $rappeur;
		protected $titre;
		protected $description;
		protected $lienImage;
		protected $lienSon;
		protected $lienClip;
		protected $nbreDownloadSon;
		protected $nbreDownloadClip;
		protected $datePublication;

		public function rappeur() {
			return $this->rappeur;
		}
		public function titre() {
			return $this->titre;
		}
		public function setTitre($titre) {
			if (is_string($titre) && !empty($titre)) {
				$this->titre = $titre;
			}
		}
		public function setRappeur($rappeur) {
			$rappeur = (int)$rappeur;
			$this->rappeur = $rappeur;
		}
	}