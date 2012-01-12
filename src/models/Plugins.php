<?php

/**
 *
 */
class Plugins extends BaseModel
{
	protected $attributes = array(
		'name'    => array('type' => AttributeType::String, 'maxSize' => 50),
		'version' => array('type' => AttributeType::String, 'maxSize' => 15),
		'enabled' => array('type' => AttributeType::Boolean, 'default' => true, 'required' => true)
	);

	protected $hasMany = array(
		'settings' => array('model' => 'PluginSettings', 'foreignKey' => 'plugin')
	);

	/**
	 * Returns an instance of the specified model
	 * @return object The model instance
	 * @static
	 */
	public static function model($class = __CLASS__)
	{
		return parent::model($class);
	}
}
