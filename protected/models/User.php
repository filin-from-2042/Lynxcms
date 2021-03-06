<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $user_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $creation_date
 * @property string $last_login_time
 * @property integer $role
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 * @property Content[] $contents1
 * @property Role $role0
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, role', 'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('name, email, password', 'length', 'max'=>150),
			array('last_login_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, name, email, password, creation_date, last_login_time, role', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contents' => array(self::HAS_MANY, 'Content', 'created_by'),
			'contents1' => array(self::HAS_MANY, 'Content', 'updated_by'),
			'role0' => array(self::BELONGS_TO, 'Role', 'role'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'creation_date' => 'Creation Date',
			'last_login_time' => 'Last Login Time',
			'role' => 'Role',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->with=array('role0');
		$criteria->compare('role',$this->role);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function validatePassword($password)
        {
                return CPasswordHelper::verifyPassword($password,$this->password);
        }
 
        public function hashPassword($password)
        {
                return CPasswordHelper::hashPassword($password);
        }
        
        protected function beforeSave()
        {
                $this->password=$this->hashPassword($this->password);
                return parent::beforeSave();
        }
        
}
