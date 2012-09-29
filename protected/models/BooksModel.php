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
	/**
	 * The Books AR
	 * @var BooksActiveRecord $booksActiveRecord
	 */
	protected $_booksActiveRecord;
	
	/**
	 * Constructor with DI
	 * @param BooksActiveRecord $booksActiveRecord
	 */
	public function __construct(BooksActiveRecord $booksActiveRecord = null) 
	{
		$this->_booksActiveRecord = $booksActiveRecord;
	}
	
	/**
	 * @return BooksActiveRecord The Books AR
	 */
	public function getBooksActiveRecord() 
	{
		return $this->_booksActiveRecord;
	}
	
	/**
	 * Save data to DB using BooksAR and other AR if needed
	 * @param array $data
	 */
	public function save(array $data) 
	{
		$this->_booksActiveRecord->attributes = $data;
		return $this->_booksActiveRecord->save();
	}
	
	/**
	 * Delete a Record.
	 * @param int $id ID of the AR to delete
	 */
	public function deleteById($id) 
	{
		return $this->_booksActiveRecord->deleteByPk($id);
	}
	
	/**
	 * Get a Book AR By ID
	 * @param int $id The ID of the AR
	 */
	public function getBookActiveRecordById($id) 
	{
		if (null === ($record = $this->_booksActiveRecord->findByPk($id))) {
			$this->_booksActiveRecord = null;	
		}
		$this->_booksActiveRecord = $record;
		return $record;
	}
}