<?php

/**
 * UserForm class.
 * UserForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class UserForm extends CFormModel
{
        public $username;
        public $password;
        public $password2;
        public $newPassword;
        public $newEmail;
        public $email;
        private $_identity;

        /**
         * Declares the validation rules.
         * The rules state that username, password & email are required,
         * and username & email needs to be unique.
         */
        public function rules()
        {
                return array(
                    array('username, password, password2, email', 'required', 'on' => 'register'),
            		array('username, email', 'unique', 'className' => 'User', 'on' =>'register'),
                    array('password', 'compare','compareAttribute'=>'password2', 'on' => 'register'),
                    array('password, newPassword, password2', 'required', 'on' => 'updatePassword'),
                    array('password', 'authenticatePass','on'=>'updatePassword, updateEmail'),
                    array('newPassword', 'authenticatePass','on'=>'updatePassword'),
                    array('newPassword', 'compare','compareAttribute'=>'password2', 'on' => 'updatePassword'),
                    array('password, newEmail, email', 'required', 'on' => 'updateEmail'),
                    array('email, new', 'authenticateEmail' , 'on' => 'updateEmail'),
                    array('email, newEmail','email','on'=>'register, updateEmail'),
                    array('username, email, password, password2, newPassword, newEmail', 'filter', 'filter' => 'trim'),

            	);
        }

        /**
         * Declares attribute labels.
         */
        public function attributeLabels()
        {
                return array(
                        'username'=>'Tên đăng nhập',
                        'password'=>'Mật khẩu',
                        'password2' => 'Xác nhận mật khẩu',
                        'email'=>'Email',
                        'newEmail' => 'Email mới',
                        'newPassword' => 'Mật khẩu mới',
                );
        }
    public function authenticatePass($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $user = User::model()->findByPk(Yii::app()->user->id);
            if(!$user->validatePassword($this->password)) {
                $this->addError('password','Mật khẩu không chính xác.');
            }else if($this->password == $this->newPassword) $this->addError('newPassword','Mật khẩu mới không được giống với mật khẩu cũ.');
        }
    }
    public function authenticateEmail($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $user = User::model()->findByPk(Yii::app()->user->id);
            if($user->email!=$this->email) $this->addError('email','Email không chính xác.');
            else if($this->email == $this->newEmail) $this->addError('newEmail','Email mới không được giống với email cũ.');
        }
    }
}