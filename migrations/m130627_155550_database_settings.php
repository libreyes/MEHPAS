<?php

class m130627_155550_database_settings extends CDbMigration
{
	public function up()
	{
		$this->insert('config_key',array(
			'config_group_id' => 4,
			'module_name' => 'mehpas',
			'name' => 'mehpas_enabled',
			'label' => 'MEHPAS enabled',
			'config_type_id' => 1,
			'default_value' => '0',
			'display_order' => 500,
		));

		$this->insert('config_key',array(
			'config_group_id' => 4,
			'module_name' => 'mehpas',
			'name' => 'mehpas_bad_gps',
			'label' => 'MEHPAS bad GPs',
			'config_type_id' => 6,
			'default_value' => serialize(array()),
			'display_order' => 510,
		));

		$this->insert('config_key',array(
			'config_group_id' => 4,
			'module_name' => 'mehpas',
			'name' => 'mehpas_legacy_letters',
			'label' => 'MEHPAS legacy letters',
			'config_type_id' => 1,
			'default_value' => '0',
			'display_order' => 520,
		));

		$this->insert('config_key',array(
			'config_group_id' => 4,
			'module_name' => 'mehpas',
			'name' => 'mehpas_cache_time',
			'label' => 'MEHPAS cache time',
			'config_type_id' => 2,
			'default_value' => '',
			'display_order' => 530,
		));
	}

	public function down()
	{
		$this->delete('config_key',"module_name='mehpas'");
	}
}
