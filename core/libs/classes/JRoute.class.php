<?php
	class JRoute {
		
		private $route;
		private $arrRoute;
		
		public function __construct() {
			$this->getRoute();
		}
		
		private function getRoute() {
			$this->route = $_SERVER['REQUEST_URI'];
			$this->arrRoute = explode("?",$this->route);
			foreach ($this->arrRoute as $key => $val) {
				echo $this->arrRoute[$key]=$val;
			}
		}
	}
?>