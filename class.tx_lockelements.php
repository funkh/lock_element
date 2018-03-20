<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Steffen Kamper <info@sk-typo3.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

class tx_lockelements {
	
	
	/**
	* processCmdmap_preProcess()
	* this function is called by the Hook in tce from class.t3lib_tcemain.php before processing commands
	*
	* @param string $command: reference to command: move,copy,version,delete or undelete
	* @param string $table: database table
	* @param string $id: database record uid
	* @param array $value: reference to command parameter array
	* @param object $pObj: page Object reference
	*/
	function processCmdmap_preProcess(&$command, $table, $id, &$value, &$pObj){
		if ($command == 'delete' && ($table == 'tt_content' || $table == 'pages')) {
			//look for lock
			$rec = t3lib_BEfunc::getRecord($table, $id,'tx_lockelement_locked');
			if($rec['tx_lockelement_locked']) {
				//remove delete command
				$command='';
			} 
		}
	}
	
}  
?>