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
 */

/**
 * This is the model class for table "SILVER.ENV030_LOCDETS".
 *
 * The followings are the available columns in table 'SILVER.ENV030_LOCDETS':
 * @property string $OBJ_TYPE
 * @property string $OBJ_LOC
 * @property string $DATE_FR
 */
class PAS_Practice extends PasAssignedEntity
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SILVER.ENV030_LOCDETS';
	}

	/**
	 * @return array primary key for the table
	 */
	public function primaryKey()
	{
		return array('OBJ_TYPE','OBJ_LOC','DATE_FR');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array();
	}

	/**
	 * Find Practice by external ID (obj_loc)
	 * Table has no primary key, so we need to fetch the record with the most recent date_fr and
	 * exclude records with a date_to < today
	 * @param unknown_type $id
	 */
	public function findByExternalId($id)
	{
		return $this->find(array(
				'condition' => 'OBJ_LOC = :practice_id AND OBJ_TYPE = \'SURG\' AND ("DATE_TO" IS NULL OR "DATE_TO" >= SYSDATE) AND ("DATE_FR" IS NULL OR "DATE_FR" <= SYSDATE)',
				'order' => 'DATE_FR DESC',
				'params' => array(
						':practice_id' => $id
				),
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		return new CActiveDataProvider(get_class($this), array(
				'criteria'=>$criteria,
		));
	}

}
