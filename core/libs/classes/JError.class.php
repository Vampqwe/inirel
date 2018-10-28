<?php
	
	class JError {
		
		
		
		public static function JErrorNumber ($errorNumber) {
			switch ($errorNumber) {
				
				case 'ERROR_INI':
				echo 'File *config.ini* not found';
				break;
			}
		}
	}
?>