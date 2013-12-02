<?php

Class Input_Fields() {

	var $text = 'text';
	var $textarea = 'textarea';
	var $selectbox = 'selectbox';

	public function __construct($type = array()) {

	}

	public function get_input_string($instance, $name, $quant) {

		$name_id = ${$name . 'id'};
		$name_name = ${$name . 'name'};

		$input_field_label = "
			<label for='$name_id'>
		";
		$input_field_input = "
			<input type='$type' name='$name_name' id='$name_id' value=''>
		";
	}
}