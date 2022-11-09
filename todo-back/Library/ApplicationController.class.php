<?php
	namespace Library;

	class ApplicationController {
		static public function getApplication() {
			$xml = new \DOMDocument;
			$xml->load(__DIR__.'/../Config/applications.xml');
			$apps = $xml->getElementsByTagName('app');

			foreach ($apps as $key => $app) {
				if (preg_match('`^'.$app->getAttribute('url').'$`',$_SERVER['REQUEST_URI'])) {
					return self::link($app->getAttribute('application'));
				}
			}
		}
		static public function link($name) {
			return '\\Applications\\'.$name.'\\'.$name.'Application';
		}
	}