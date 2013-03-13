<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 * @todo This command is currently disabled until the referral code is fixed
 */

class PopulatePracticesCommand extends CConsoleCommand {

	public function getName() {
		return 'PopulatePractices';
	}

	public function getHelp() {
		return "Imports practice data for every patient currently in on the waiting list\n";
	}

	public function run($args) {
		$patient_ids = Yii::app()->db->createCommand()
		->select('patient_id')
		->from('element_operation')
		->join('event', 'event.id = element_operation.event_id')
		->join('episode', 'episode.id = event.episode_id')
		->where('element_operation.status IN (0,2)')
		->queryColumn();
		foreach($patient_ids as $patient_id) {
			$patient = Patient::model()->findByPk($patient_id);
			if($patient) {
				echo ".";
			} else {
				echo "!";
			}
		}
		echo "done.\n";
	}

}
