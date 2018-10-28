<?php
	
	
	class JDbug {
		
		private $JDbugVersion = '1.0.9 ver';
		private $greeting = '<br><--JDbug start-->';
		private $Stopped = '<--JDbug stopped-->';
		
		private $typeVar;
		private $dumpVar;
		
		private static $timeStart;
		private static $timeEnd;
		
		private static $memoryStart;
		private static $memoryEnd;
		
		public function __construct ($mixedVar) {
			if (JCONFIG['jdbug'] == 'Off') {
				return FALSE;
			}else {
				echo $this->greeting;
				$this->typeVar = gettype($mixedVar);
				$this->dumpVar = $mixedVar;
				$this->menu();
				//echo '<br>TEST - '.$this->typeVar;
				echo '<br>'.$this->Stopped;
			}
		}
		
		public function dmp ($var = []) {
			var_dump($var);
		}
		
		public static function startMemory () {
			self::$memoryStart = memory_get_usage();
		}
		
		public static function resultMemory () {
			self::$memoryEnd = memory_get_usage();
			$memoryResult = self::$memoryEnd - self::$memoryStart;
			$memoryResult = $memoryResult / ONE_Kb;
			echo "<br>Memory usage ".$memoryResult." Kb";
		}
		
		public static function startTime () {
			self::$timeStart = microtime();
		}
		
		public static function resultTime () {
			self::$timeEnd = microtime();
			$timeResult = self::$timeEnd - self::$timeStart;
			return round($timeResult,7);
		}
		
		private function menu () {
			switch ($this->typeVar) {
				
				case 'string':
				$this->isString();
				break;
				
				case 'array':
				$this->isArray();
				break;
				
				case 'boolean';
				$this->isBoolean();
				break;
				
				case 'integer';
				$this->isInteger();
				break;
				
				case 'double';
				$this->isDouble();
				break;
				
				case 'object':
				$this->isObject();
				break;
				
				case 'NULL':
				$this->isNull();
				break;
			}
		}
		
		private function isBoolean () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Value - '.mb_strlen($this->dumpVar);
		}
		
		private function isInteger () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Value - '.mb_strlen($this->dumpVar);
			
			printf('<br>Second value - '.$this->dumpVar);
		}
		
		private function isString () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>First value - '.mb_strlen($this->dumpVar);
			
			printf('<br>Second value - '.$this->dumpVar);
		}
		
		private function isDouble () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Value - '.mb_strlen($this->dumpVar);
			
			printf('<br>Second value - '.$this->dumpVar);
		}
		
		private function isArray () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Value - '.count($this->dumpVar);
			echo '<ul>';
			echo 'Second value';
			foreach ($this->dumpVar as $key => $val) {
				echo '<li>'.$this->dumpVar[$key]=$key.' => '.$this->dumpVar[$key]=$val.'</li>';
			}
			echo '</ul>';
		}
		
		private function isObject () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Class name - '.get_class($this->dumpVar);
			$this->dumpVar = get_class_methods($this->dumpVar);
			echo '<ul>';
			echo 'Class methods';
			foreach ($this->dumpVar as $key => $val) {
				echo '<li>'.$this->dumpVar[$key] = $val.'</li>';
			}
			echo '</ul>';
		}
		
		private function isNull () {
			echo '<br>Data type - '.$this->typeVar;
			echo '<br>Value - '.$this->dumpVar;
		}
		
		private function garbage () {
			echo 'Turn On = TRUE, turn off = FALSE';
		}
		
		public function __destruct () {
		}
	}
?>