<?php

/**
 * BoardForm class.
 * BoardForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class BoardForm extends CFormModel
{
        public $name;
        public $type_id;
        private $_identity;

        /**
         * Declares the validation rules.
         * The rules state that username, password & email are required,
         * and username & email needs to be unique.
         */
        public function rules()
        {
                return array(
                    array('name, type_id', 'required'),
                    array('type_id', 'numerical', 'integerOnly'=>true),
                    array('name', 'unique', 'className' => 'Board', 'on' => 'create'),
            	);
        }

        /**
         * Declares attribute labels.
         */
        public function attributeLabels()
        {
                return array(
                       'name' => 'Tên bảng',
                       'type_id' => 'Loại bảng',
                );
        }
}