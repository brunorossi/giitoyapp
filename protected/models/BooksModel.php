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
class BooksModel
{
	
	protected $_booksActiveRecord;
	
	public function __construct(BooksActiveRecord $booksActiveRecord = null) 
	{
		$this->_booksActiveRecord = $booksActiveRecord;
	}
	
	public function getBooksActiveRecord() 
	{
		return $this->_booksActiveRecord;
	}

	public function save(array $data) 
	{
		$this->_booksActiveRecord->attributes = $data;
		return $this->_booksActiveRecord->save();
	}
	
	public function update($id, $data) 
	{
		if (null === ($record = $this->_booksActiveRecord->findByPk($id))) {
			return false;			
		}
		$record->attributes = $data;		
		return $record->save();
	}
	
	public function deleteById($id) 
	{
		return $this->_booksActiveRecord->deleteByPk($id);
	}
	
	public function getBook($id) 
	{
		if (null === ($record = $this->_booksActiveRecord->findByPk($id))) {
			return false;			
		}
		return $record;		
	}
}