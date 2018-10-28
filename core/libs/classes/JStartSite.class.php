<?php
	
	class JStartSite {
		
		private $splAutuLoadClass;
		private $arrIni;
		private $iniFilePath;
		private $pathToConstFile;
		
		public function __construct ($iniFilePath, $pathToConstFile) {
			$this->iniFilePath = $iniFilePath;
			$this->autoLoadClass();
			$this->startConfig();
			$this->JConfig();
			$this->pathToConstFile = $pathToConstFile;
			$this->constSite();
		}
		
		private function autoLoadClass () {
			$this->splAutuLoadClass = spl_autoload_register (
				function ($class) {
    				require_once $class.'.class.php';
    			}
			);
			
			if (!$this->splAutuLoadClass) {
				throw new JException("System error: File 'autoLoadСlass.php is not found!!!"."Error number: 0x002s");
			}
		}
		
		private function constSite () {
			require_once ($this->pathToConstFile);
		}
		
		private function startConfig () {
				if (!$this->arrIni = parse_ini_file($this->iniFilePath)) {
					throw new JException("System error: Configuration file 'Config.ini' not found !!!"."Error number: 0x001s");
				}
				
		}
		
		private function JConfig() {
				return define('JCONFIG', $this->arrIni);
		}
		
	}
?>