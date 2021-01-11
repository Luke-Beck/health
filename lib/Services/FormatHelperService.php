<?php
declare(strict_types=1);
/**
 * @copyright Copyright (c) 2020 Florian Steffens <flost-dev@mailbox.org>
 *
 * @author Florian Steffens <flost-dev@mailbox.org>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Health\Services;

class FormatHelperService {

	public function typeCast($key, $value) {
		 $intData = ['age', 'size'];
         if(in_array($key, $intData)) {
         	$value = intval($value);
         }

         $doubleData = ['weightTarget', 'weightTargetInitialWeight', 'weight', 'measurement', 'bodyfat'];
         if(in_array($key, $doubleData)) {
         	$value = floatval($value);
         }

         $booleanData = [
         	'enabledModuleWeight',
			 'enabledModuleBreaks',
			 'enabledModuleFeeling',
			 'enabledModuleMedicine',
			 'enabledModuleActivities',
			 'enabledModuleMeasurement',
			 'enabledModuleSleep',
			 'enabledModuleNutrition',
			 'feelingColumnMood',
			 'feelingColumnSadness',
			 'feelingColumnPain',
			 'feelingColumnSymptoms',
			 'feelingColumnAttacks',
			 'feelingColumnMedication',
		 ];
         if(in_array($key, $booleanData)) {
         	if( $value === true || $value === 'true' || $value === 1 || $value === '1') {
         		$value = true;
         	} else {
         		$value = false;
         	}
         }

         $datetimeData = ['weightTargetStartDate'];
         if(in_array($key, $datetimeData)) {
         	$dt = new \DateTime($value);
         	$value = $dt->format('Y-m-d H:i:s');
         }

         return $value;
	}
}
