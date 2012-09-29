<?php

/**
 * This is the model class for table "books".
 *
 * The followings are the available columns in table 'books':
 * @property string $book_id
 * @property integer $number_of_pages
 * @property string $title
 * @property string $author
 */
class BooksActiveRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BooksActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'books';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number_of_pages, title, author', 'required'),
			array('number_of_pages', 'numerical', 'integerOnly' => true),
			array('title', 'length', 'max' => 100),
			array('author', 'length', 'max' => 50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('book_id, number_of_pages, title, author', 'safe', 'on' => 'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'book_id' => 'Book',
			'number_of_pages' => 'Number Of Pages',
			'title' => 'Title',
			'author' => 'Author',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria = new CDbCriteria;
		$criteria->compare('book_id', $this->book_id, true);
		$criteria->compare('number_of_pages', $this->number_of_pages);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('author', $this->author, true);
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}