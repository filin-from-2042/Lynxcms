<?php

/**
 * This is the model class for table "tbl_content".
 *
 * The followings are the available columns in table 'tbl_content':
 * @property string $content_id
 * @property string $title
 * @property string $alias
 * @property string $content
 * @property integer $published
 * @property string $keywords
 * @property string $description
 * @property string $created_by
 * @property string $creation_date
 * @property string $updated_by
 * @property string $updation_date
 * @property string $category_id
 *
 * The followings are the available model relations:
 * @property User $createdBy
 * @property User $updatedBy
 * @property Category $category
 * @property Tag[] $tblTags
 */
class Content extends CActiveRecord
{       
        
    /*
       function getCategoryOptions()
        {
            
     }
       
        */
        
        function  getAllowedCategoryRange(){
            
            
            
        }
        
        function beforeSave() 
        {
            if (NULL!==Yii::app()->user)
                $id=Yii::app ()->user->id;
            else {
                $id=1;
            }
            if ($this->isNewRecord)
                $this->created_by=$id;
                $this->updated_by=$id;
          return  parent::beforeSave();
        }
        
        public function behaviors() {
            return array('CTimestampBehavior'=>array(
                            'class'=>'zii.behaviors.CTimestampBehavior',
                            'createAttribute'=>'creation_date',
                            'updateAttribute'=>'updation_date',
                            'setUpdateOnCreate'=>'true',),
                );
                            
            
        }
        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, content, published,  category_id', 'required'),
			array('published', 'numerical', 'integerOnly'=>true),
			array('title, alias, keywords, description', 'length', 'max'=>150),
			array('created_by, updated_by, category_id', 'length', 'max'=>10),
			array('creation_date, updation_date, created_by, updated_by','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('content_id, title, alias, content, published, keywords, description, created_by, creation_date, updated_by, updation_date, category_id', 'safe', 'on'=>'search'),
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
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'tblTags' => array(self::MANY_MANY, 'Tag', 'tbl_content_tag_assignment(content_id, tag_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'title' => 'Название',
			'alias' => 'Алиас',
			'content' => 'Текст',
			'published' => 'Опубликовано',
			'keywords' => 'Ключевое слово',
			'description' => 'Описание',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'updated_by' => 'Updated By',
			'updation_date' => 'Updation Date',
			'category_id' => 'Категория',
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

		$criteria->compare('content_id',$this->content_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updation_date',$this->updation_date,true);
		$criteria->compare('category_id',$this->category_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
