<?php

namespace Base;

use \Book as ChildBook;
use \BookQuery as ChildBookQuery;
use \Comment as ChildComment;
use \CommentQuery as ChildCommentQuery;
use \Rating as ChildRating;
use \RatingQuery as ChildRatingQuery;
use \Read as ChildRead;
use \ReadQuery as ChildReadQuery;
use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\BookTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'book' table.
 *
 *
 *
* @package    propel.generator..Base
*/
abstract class Book implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\BookTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the book_id field.
     * @var        int
     */
    protected $book_id;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the author field.
     * @var        string
     */
    protected $author;

    /**
     * The value for the genre field.
     * @var        string
     */
    protected $genre;

    /**
     * The value for the publisher field.
     * @var        string
     */
    protected $publisher;

    /**
     * The value for the language field.
     * @var        string
     */
    protected $language;

    /**
     * The value for the content field.
     * @var        string
     */
    protected $content;

    /**
     * The value for the path field.
     * @var        string
     */
    protected $path;

    /**
     * The value for the year field.
     * @var        \DateTime
     */
    protected $year;

    /**
     * The value for the user_id field.
     * @var        int
     */
    protected $user_id;

    /**
     * @var        ChildUser
     */
    protected $aUser;

    /**
     * @var        ObjectCollection|ChildComment[] Collection to store aggregation of ChildComment objects.
     */
    protected $collComment_books;
    protected $collComment_booksPartial;

    /**
     * @var        ObjectCollection|ChildRating[] Collection to store aggregation of ChildRating objects.
     */
    protected $collRating_books;
    protected $collRating_booksPartial;

    /**
     * @var        ObjectCollection|ChildRead[] Collection to store aggregation of ChildRead objects.
     */
    protected $collRead_books;
    protected $collRead_booksPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildComment[]
     */
    protected $comment_booksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRating[]
     */
    protected $rating_booksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildRead[]
     */
    protected $read_booksScheduledForDeletion = null;

    /**
     * Initializes internal state of Base\Book object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Book</code> instance.  If
     * <code>obj</code> is an instance of <code>Book</code>, delegates to
     * <code>equals(Book)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Book The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        return array_keys(get_object_vars($this));
    }

    /**
     * Get the [book_id] column value.
     *
     * @return int
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * Get the [title] column value.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the [author] column value.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the [genre] column value.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Get the [publisher] column value.
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Get the [language] column value.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Get the [content] column value.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the [path] column value.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Get the [optionally formatted] temporal [year] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getYear($format = NULL)
    {
        if ($format === null) {
            return $this->year;
        } else {
            return $this->year instanceof \DateTime ? $this->year->format($format) : null;
        }
    }

    /**
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of [book_id] column.
     *
     * @param  int $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setBookId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->book_id !== $v) {
            $this->book_id = $v;
            $this->modifiedColumns[BookTableMap::COL_BOOK_ID] = true;
        }

        return $this;
    } // setBookId()

    /**
     * Set the value of [title] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[BookTableMap::COL_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [author] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setAuthor($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->author !== $v) {
            $this->author = $v;
            $this->modifiedColumns[BookTableMap::COL_AUTHOR] = true;
        }

        return $this;
    } // setAuthor()

    /**
     * Set the value of [genre] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setGenre($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->genre !== $v) {
            $this->genre = $v;
            $this->modifiedColumns[BookTableMap::COL_GENRE] = true;
        }

        return $this;
    } // setGenre()

    /**
     * Set the value of [publisher] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setPublisher($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->publisher !== $v) {
            $this->publisher = $v;
            $this->modifiedColumns[BookTableMap::COL_PUBLISHER] = true;
        }

        return $this;
    } // setPublisher()

    /**
     * Set the value of [language] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setLanguage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->language !== $v) {
            $this->language = $v;
            $this->modifiedColumns[BookTableMap::COL_LANGUAGE] = true;
        }

        return $this;
    } // setLanguage()

    /**
     * Set the value of [content] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->content !== $v) {
            $this->content = $v;
            $this->modifiedColumns[BookTableMap::COL_CONTENT] = true;
        }

        return $this;
    } // setContent()

    /**
     * Set the value of [path] column.
     *
     * @param  string $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setPath($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->path !== $v) {
            $this->path = $v;
            $this->modifiedColumns[BookTableMap::COL_PATH] = true;
        }

        return $this;
    } // setPath()

    /**
     * Sets the value of [year] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTime value.
     *               Empty strings are treated as NULL.
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setYear($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->year !== null || $dt !== null) {
            if ($dt !== $this->year) {
                $this->year = $dt;
                $this->modifiedColumns[BookTableMap::COL_YEAR] = true;
            }
        } // if either are not null

        return $this;
    } // setYear()

    /**
     * Set the value of [user_id] column.
     *
     * @param  int $v new value
     * @return $this|\Book The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[BookTableMap::COL_USER_ID] = true;
        }

        if ($this->aUser !== null && $this->aUser->getUserId() !== $v) {
            $this->aUser = null;
        }

        return $this;
    } // setUserId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : BookTableMap::translateFieldName('BookId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->book_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : BookTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : BookTableMap::translateFieldName('Author', TableMap::TYPE_PHPNAME, $indexType)];
            $this->author = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : BookTableMap::translateFieldName('Genre', TableMap::TYPE_PHPNAME, $indexType)];
            $this->genre = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : BookTableMap::translateFieldName('Publisher', TableMap::TYPE_PHPNAME, $indexType)];
            $this->publisher = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : BookTableMap::translateFieldName('Language', TableMap::TYPE_PHPNAME, $indexType)];
            $this->language = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : BookTableMap::translateFieldName('Content', TableMap::TYPE_PHPNAME, $indexType)];
            $this->content = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : BookTableMap::translateFieldName('Path', TableMap::TYPE_PHPNAME, $indexType)];
            $this->path = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : BookTableMap::translateFieldName('Year', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->year = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : BookTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = BookTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Book'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUser !== null && $this->user_id !== $this->aUser->getUserId()) {
            $this->aUser = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildBookQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->collComment_books = null;

            $this->collRating_books = null;

            $this->collRead_books = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Book::setDeleted()
     * @see Book::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildBookQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $isInsert = $this->isNew();
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                BookTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->comment_booksScheduledForDeletion !== null) {
                if (!$this->comment_booksScheduledForDeletion->isEmpty()) {
                    \CommentQuery::create()
                        ->filterByPrimaryKeys($this->comment_booksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->comment_booksScheduledForDeletion = null;
                }
            }

            if ($this->collComment_books !== null) {
                foreach ($this->collComment_books as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rating_booksScheduledForDeletion !== null) {
                if (!$this->rating_booksScheduledForDeletion->isEmpty()) {
                    \RatingQuery::create()
                        ->filterByPrimaryKeys($this->rating_booksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rating_booksScheduledForDeletion = null;
                }
            }

            if ($this->collRating_books !== null) {
                foreach ($this->collRating_books as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->read_booksScheduledForDeletion !== null) {
                if (!$this->read_booksScheduledForDeletion->isEmpty()) {
                    \ReadQuery::create()
                        ->filterByPrimaryKeys($this->read_booksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->read_booksScheduledForDeletion = null;
                }
            }

            if ($this->collRead_books !== null) {
                foreach ($this->collRead_books as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[BookTableMap::COL_BOOK_ID] = true;
        if (null !== $this->book_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BookTableMap::COL_BOOK_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BookTableMap::COL_BOOK_ID)) {
            $modifiedColumns[':p' . $index++]  = 'book_id';
        }
        if ($this->isColumnModified(BookTableMap::COL_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'title';
        }
        if ($this->isColumnModified(BookTableMap::COL_AUTHOR)) {
            $modifiedColumns[':p' . $index++]  = 'author';
        }
        if ($this->isColumnModified(BookTableMap::COL_GENRE)) {
            $modifiedColumns[':p' . $index++]  = 'genre';
        }
        if ($this->isColumnModified(BookTableMap::COL_PUBLISHER)) {
            $modifiedColumns[':p' . $index++]  = 'publisher';
        }
        if ($this->isColumnModified(BookTableMap::COL_LANGUAGE)) {
            $modifiedColumns[':p' . $index++]  = 'language';
        }
        if ($this->isColumnModified(BookTableMap::COL_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = 'content';
        }
        if ($this->isColumnModified(BookTableMap::COL_PATH)) {
            $modifiedColumns[':p' . $index++]  = 'path';
        }
        if ($this->isColumnModified(BookTableMap::COL_YEAR)) {
            $modifiedColumns[':p' . $index++]  = 'year';
        }
        if ($this->isColumnModified(BookTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }

        $sql = sprintf(
            'INSERT INTO book (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'book_id':
                        $stmt->bindValue($identifier, $this->book_id, PDO::PARAM_INT);
                        break;
                    case 'title':
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case 'author':
                        $stmt->bindValue($identifier, $this->author, PDO::PARAM_STR);
                        break;
                    case 'genre':
                        $stmt->bindValue($identifier, $this->genre, PDO::PARAM_STR);
                        break;
                    case 'publisher':
                        $stmt->bindValue($identifier, $this->publisher, PDO::PARAM_STR);
                        break;
                    case 'language':
                        $stmt->bindValue($identifier, $this->language, PDO::PARAM_STR);
                        break;
                    case 'content':
                        $stmt->bindValue($identifier, $this->content, PDO::PARAM_STR);
                        break;
                    case 'path':
                        $stmt->bindValue($identifier, $this->path, PDO::PARAM_STR);
                        break;
                    case 'year':
                        $stmt->bindValue($identifier, $this->year ? $this->year->format("Y-m-d H:i:s") : null, PDO::PARAM_STR);
                        break;
                    case 'user_id':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setBookId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BookTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getBookId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getAuthor();
                break;
            case 3:
                return $this->getGenre();
                break;
            case 4:
                return $this->getPublisher();
                break;
            case 5:
                return $this->getLanguage();
                break;
            case 6:
                return $this->getContent();
                break;
            case 7:
                return $this->getPath();
                break;
            case 8:
                return $this->getYear();
                break;
            case 9:
                return $this->getUserId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Book'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Book'][$this->hashCode()] = true;
        $keys = BookTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBookId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getAuthor(),
            $keys[3] => $this->getGenre(),
            $keys[4] => $this->getPublisher(),
            $keys[5] => $this->getLanguage(),
            $keys[6] => $this->getContent(),
            $keys[7] => $this->getPath(),
            $keys[8] => $this->getYear(),
            $keys[9] => $this->getUserId(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }

                $result[$key] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collComment_books) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'comments';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'comments';
                        break;
                    default:
                        $key = 'Comments';
                }

                $result[$key] = $this->collComment_books->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRating_books) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'ratings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ratings';
                        break;
                    default:
                        $key = 'Ratings';
                }

                $result[$key] = $this->collRating_books->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRead_books) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'reads';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'reads';
                        break;
                    default:
                        $key = 'Reads';
                }

                $result[$key] = $this->collRead_books->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Book
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = BookTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Book
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setBookId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setAuthor($value);
                break;
            case 3:
                $this->setGenre($value);
                break;
            case 4:
                $this->setPublisher($value);
                break;
            case 5:
                $this->setLanguage($value);
                break;
            case 6:
                $this->setContent($value);
                break;
            case 7:
                $this->setPath($value);
                break;
            case 8:
                $this->setYear($value);
                break;
            case 9:
                $this->setUserId($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = BookTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setBookId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAuthor($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setGenre($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPublisher($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLanguage($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setContent($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPath($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setYear($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setUserId($arr[$keys[9]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     *
     * @return $this|\Book The current object, for fluid interface
     */
    public function importFrom($parser, $data)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), TableMap::TYPE_PHPNAME);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BookTableMap::DATABASE_NAME);

        if ($this->isColumnModified(BookTableMap::COL_BOOK_ID)) {
            $criteria->add(BookTableMap::COL_BOOK_ID, $this->book_id);
        }
        if ($this->isColumnModified(BookTableMap::COL_TITLE)) {
            $criteria->add(BookTableMap::COL_TITLE, $this->title);
        }
        if ($this->isColumnModified(BookTableMap::COL_AUTHOR)) {
            $criteria->add(BookTableMap::COL_AUTHOR, $this->author);
        }
        if ($this->isColumnModified(BookTableMap::COL_GENRE)) {
            $criteria->add(BookTableMap::COL_GENRE, $this->genre);
        }
        if ($this->isColumnModified(BookTableMap::COL_PUBLISHER)) {
            $criteria->add(BookTableMap::COL_PUBLISHER, $this->publisher);
        }
        if ($this->isColumnModified(BookTableMap::COL_LANGUAGE)) {
            $criteria->add(BookTableMap::COL_LANGUAGE, $this->language);
        }
        if ($this->isColumnModified(BookTableMap::COL_CONTENT)) {
            $criteria->add(BookTableMap::COL_CONTENT, $this->content);
        }
        if ($this->isColumnModified(BookTableMap::COL_PATH)) {
            $criteria->add(BookTableMap::COL_PATH, $this->path);
        }
        if ($this->isColumnModified(BookTableMap::COL_YEAR)) {
            $criteria->add(BookTableMap::COL_YEAR, $this->year);
        }
        if ($this->isColumnModified(BookTableMap::COL_USER_ID)) {
            $criteria->add(BookTableMap::COL_USER_ID, $this->user_id);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildBookQuery::create();
        $criteria->add(BookTableMap::COL_BOOK_ID, $this->book_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getBookId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getBookId();
    }

    /**
     * Generic method to set the primary key (book_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBookId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getBookId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Book (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setAuthor($this->getAuthor());
        $copyObj->setGenre($this->getGenre());
        $copyObj->setPublisher($this->getPublisher());
        $copyObj->setLanguage($this->getLanguage());
        $copyObj->setContent($this->getContent());
        $copyObj->setPath($this->getPath());
        $copyObj->setYear($this->getYear());
        $copyObj->setUserId($this->getUserId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getComment_books() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addComment_book($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRating_books() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRating_book($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRead_books() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRead_book($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBookId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Book Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Book The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setUserId(NULL);
        } else {
            $this->setUserId($v->getUserId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addBook_user($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUser(ConnectionInterface $con = null)
    {
        if ($this->aUser === null && ($this->user_id !== null)) {
            $this->aUser = ChildUserQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addBook_users($this);
             */
        }

        return $this->aUser;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Comment_book' == $relationName) {
            return $this->initComment_books();
        }
        if ('Rating_book' == $relationName) {
            return $this->initRating_books();
        }
        if ('Read_book' == $relationName) {
            return $this->initRead_books();
        }
    }

    /**
     * Clears out the collComment_books collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addComment_books()
     */
    public function clearComment_books()
    {
        $this->collComment_books = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collComment_books collection loaded partially.
     */
    public function resetPartialComment_books($v = true)
    {
        $this->collComment_booksPartial = $v;
    }

    /**
     * Initializes the collComment_books collection.
     *
     * By default this just sets the collComment_books collection to an empty array (like clearcollComment_books());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initComment_books($overrideExisting = true)
    {
        if (null !== $this->collComment_books && !$overrideExisting) {
            return;
        }
        $this->collComment_books = new ObjectCollection();
        $this->collComment_books->setModel('\Comment');
    }

    /**
     * Gets an array of ChildComment objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildBook is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildComment[] List of ChildComment objects
     * @throws PropelException
     */
    public function getComment_books(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collComment_booksPartial && !$this->isNew();
        if (null === $this->collComment_books || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collComment_books) {
                // return empty collection
                $this->initComment_books();
            } else {
                $collComment_books = ChildCommentQuery::create(null, $criteria)
                    ->filterByBook($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collComment_booksPartial && count($collComment_books)) {
                        $this->initComment_books(false);

                        foreach ($collComment_books as $obj) {
                            if (false == $this->collComment_books->contains($obj)) {
                                $this->collComment_books->append($obj);
                            }
                        }

                        $this->collComment_booksPartial = true;
                    }

                    return $collComment_books;
                }

                if ($partial && $this->collComment_books) {
                    foreach ($this->collComment_books as $obj) {
                        if ($obj->isNew()) {
                            $collComment_books[] = $obj;
                        }
                    }
                }

                $this->collComment_books = $collComment_books;
                $this->collComment_booksPartial = false;
            }
        }

        return $this->collComment_books;
    }

    /**
     * Sets a collection of ChildComment objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $comment_books A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function setComment_books(Collection $comment_books, ConnectionInterface $con = null)
    {
        /** @var ChildComment[] $comment_booksToDelete */
        $comment_booksToDelete = $this->getComment_books(new Criteria(), $con)->diff($comment_books);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->comment_booksScheduledForDeletion = clone $comment_booksToDelete;

        foreach ($comment_booksToDelete as $comment_bookRemoved) {
            $comment_bookRemoved->setBook(null);
        }

        $this->collComment_books = null;
        foreach ($comment_books as $comment_book) {
            $this->addComment_book($comment_book);
        }

        $this->collComment_books = $comment_books;
        $this->collComment_booksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Comment objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Comment objects.
     * @throws PropelException
     */
    public function countComment_books(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collComment_booksPartial && !$this->isNew();
        if (null === $this->collComment_books || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collComment_books) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getComment_books());
            }

            $query = ChildCommentQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBook($this)
                ->count($con);
        }

        return count($this->collComment_books);
    }

    /**
     * Method called to associate a ChildComment object to this object
     * through the ChildComment foreign key attribute.
     *
     * @param  ChildComment $l ChildComment
     * @return $this|\Book The current object (for fluent API support)
     */
    public function addComment_book(ChildComment $l)
    {
        if ($this->collComment_books === null) {
            $this->initComment_books();
            $this->collComment_booksPartial = true;
        }

        if (!$this->collComment_books->contains($l)) {
            $this->doAddComment_book($l);
        }

        return $this;
    }

    /**
     * @param ChildComment $comment_book The ChildComment object to add.
     */
    protected function doAddComment_book(ChildComment $comment_book)
    {
        $this->collComment_books[]= $comment_book;
        $comment_book->setBook($this);
    }

    /**
     * @param  ChildComment $comment_book The ChildComment object to remove.
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function removeComment_book(ChildComment $comment_book)
    {
        if ($this->getComment_books()->contains($comment_book)) {
            $pos = $this->collComment_books->search($comment_book);
            $this->collComment_books->remove($pos);
            if (null === $this->comment_booksScheduledForDeletion) {
                $this->comment_booksScheduledForDeletion = clone $this->collComment_books;
                $this->comment_booksScheduledForDeletion->clear();
            }
            $this->comment_booksScheduledForDeletion[]= clone $comment_book;
            $comment_book->setBook(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Book is new, it will return
     * an empty collection; or if this Book has previously
     * been saved, it will retrieve related Comment_books from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Book.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildComment[] List of ChildComment objects
     */
    public function getComment_booksJoinUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildCommentQuery::create(null, $criteria);
        $query->joinWith('User', $joinBehavior);

        return $this->getComment_books($query, $con);
    }

    /**
     * Clears out the collRating_books collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRating_books()
     */
    public function clearRating_books()
    {
        $this->collRating_books = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRating_books collection loaded partially.
     */
    public function resetPartialRating_books($v = true)
    {
        $this->collRating_booksPartial = $v;
    }

    /**
     * Initializes the collRating_books collection.
     *
     * By default this just sets the collRating_books collection to an empty array (like clearcollRating_books());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRating_books($overrideExisting = true)
    {
        if (null !== $this->collRating_books && !$overrideExisting) {
            return;
        }
        $this->collRating_books = new ObjectCollection();
        $this->collRating_books->setModel('\Rating');
    }

    /**
     * Gets an array of ChildRating objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildBook is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRating[] List of ChildRating objects
     * @throws PropelException
     */
    public function getRating_books(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRating_booksPartial && !$this->isNew();
        if (null === $this->collRating_books || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRating_books) {
                // return empty collection
                $this->initRating_books();
            } else {
                $collRating_books = ChildRatingQuery::create(null, $criteria)
                    ->filterByBook($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRating_booksPartial && count($collRating_books)) {
                        $this->initRating_books(false);

                        foreach ($collRating_books as $obj) {
                            if (false == $this->collRating_books->contains($obj)) {
                                $this->collRating_books->append($obj);
                            }
                        }

                        $this->collRating_booksPartial = true;
                    }

                    return $collRating_books;
                }

                if ($partial && $this->collRating_books) {
                    foreach ($this->collRating_books as $obj) {
                        if ($obj->isNew()) {
                            $collRating_books[] = $obj;
                        }
                    }
                }

                $this->collRating_books = $collRating_books;
                $this->collRating_booksPartial = false;
            }
        }

        return $this->collRating_books;
    }

    /**
     * Sets a collection of ChildRating objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $rating_books A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function setRating_books(Collection $rating_books, ConnectionInterface $con = null)
    {
        /** @var ChildRating[] $rating_booksToDelete */
        $rating_booksToDelete = $this->getRating_books(new Criteria(), $con)->diff($rating_books);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->rating_booksScheduledForDeletion = clone $rating_booksToDelete;

        foreach ($rating_booksToDelete as $rating_bookRemoved) {
            $rating_bookRemoved->setBook(null);
        }

        $this->collRating_books = null;
        foreach ($rating_books as $rating_book) {
            $this->addRating_book($rating_book);
        }

        $this->collRating_books = $rating_books;
        $this->collRating_booksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Rating objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Rating objects.
     * @throws PropelException
     */
    public function countRating_books(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRating_booksPartial && !$this->isNew();
        if (null === $this->collRating_books || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRating_books) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRating_books());
            }

            $query = ChildRatingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBook($this)
                ->count($con);
        }

        return count($this->collRating_books);
    }

    /**
     * Method called to associate a ChildRating object to this object
     * through the ChildRating foreign key attribute.
     *
     * @param  ChildRating $l ChildRating
     * @return $this|\Book The current object (for fluent API support)
     */
    public function addRating_book(ChildRating $l)
    {
        if ($this->collRating_books === null) {
            $this->initRating_books();
            $this->collRating_booksPartial = true;
        }

        if (!$this->collRating_books->contains($l)) {
            $this->doAddRating_book($l);
        }

        return $this;
    }

    /**
     * @param ChildRating $rating_book The ChildRating object to add.
     */
    protected function doAddRating_book(ChildRating $rating_book)
    {
        $this->collRating_books[]= $rating_book;
        $rating_book->setBook($this);
    }

    /**
     * @param  ChildRating $rating_book The ChildRating object to remove.
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function removeRating_book(ChildRating $rating_book)
    {
        if ($this->getRating_books()->contains($rating_book)) {
            $pos = $this->collRating_books->search($rating_book);
            $this->collRating_books->remove($pos);
            if (null === $this->rating_booksScheduledForDeletion) {
                $this->rating_booksScheduledForDeletion = clone $this->collRating_books;
                $this->rating_booksScheduledForDeletion->clear();
            }
            $this->rating_booksScheduledForDeletion[]= clone $rating_book;
            $rating_book->setBook(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Book is new, it will return
     * an empty collection; or if this Book has previously
     * been saved, it will retrieve related Rating_books from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Book.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildRating[] List of ChildRating objects
     */
    public function getRating_booksJoinUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildRatingQuery::create(null, $criteria);
        $query->joinWith('User', $joinBehavior);

        return $this->getRating_books($query, $con);
    }

    /**
     * Clears out the collRead_books collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addRead_books()
     */
    public function clearRead_books()
    {
        $this->collRead_books = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collRead_books collection loaded partially.
     */
    public function resetPartialRead_books($v = true)
    {
        $this->collRead_booksPartial = $v;
    }

    /**
     * Initializes the collRead_books collection.
     *
     * By default this just sets the collRead_books collection to an empty array (like clearcollRead_books());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRead_books($overrideExisting = true)
    {
        if (null !== $this->collRead_books && !$overrideExisting) {
            return;
        }
        $this->collRead_books = new ObjectCollection();
        $this->collRead_books->setModel('\Read');
    }

    /**
     * Gets an array of ChildRead objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildBook is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildRead[] List of ChildRead objects
     * @throws PropelException
     */
    public function getRead_books(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collRead_booksPartial && !$this->isNew();
        if (null === $this->collRead_books || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRead_books) {
                // return empty collection
                $this->initRead_books();
            } else {
                $collRead_books = ChildReadQuery::create(null, $criteria)
                    ->filterByBook($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collRead_booksPartial && count($collRead_books)) {
                        $this->initRead_books(false);

                        foreach ($collRead_books as $obj) {
                            if (false == $this->collRead_books->contains($obj)) {
                                $this->collRead_books->append($obj);
                            }
                        }

                        $this->collRead_booksPartial = true;
                    }

                    return $collRead_books;
                }

                if ($partial && $this->collRead_books) {
                    foreach ($this->collRead_books as $obj) {
                        if ($obj->isNew()) {
                            $collRead_books[] = $obj;
                        }
                    }
                }

                $this->collRead_books = $collRead_books;
                $this->collRead_booksPartial = false;
            }
        }

        return $this->collRead_books;
    }

    /**
     * Sets a collection of ChildRead objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $read_books A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function setRead_books(Collection $read_books, ConnectionInterface $con = null)
    {
        /** @var ChildRead[] $read_booksToDelete */
        $read_booksToDelete = $this->getRead_books(new Criteria(), $con)->diff($read_books);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->read_booksScheduledForDeletion = clone $read_booksToDelete;

        foreach ($read_booksToDelete as $read_bookRemoved) {
            $read_bookRemoved->setBook(null);
        }

        $this->collRead_books = null;
        foreach ($read_books as $read_book) {
            $this->addRead_book($read_book);
        }

        $this->collRead_books = $read_books;
        $this->collRead_booksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Read objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Read objects.
     * @throws PropelException
     */
    public function countRead_books(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collRead_booksPartial && !$this->isNew();
        if (null === $this->collRead_books || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRead_books) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getRead_books());
            }

            $query = ChildReadQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBook($this)
                ->count($con);
        }

        return count($this->collRead_books);
    }

    /**
     * Method called to associate a ChildRead object to this object
     * through the ChildRead foreign key attribute.
     *
     * @param  ChildRead $l ChildRead
     * @return $this|\Book The current object (for fluent API support)
     */
    public function addRead_book(ChildRead $l)
    {
        if ($this->collRead_books === null) {
            $this->initRead_books();
            $this->collRead_booksPartial = true;
        }

        if (!$this->collRead_books->contains($l)) {
            $this->doAddRead_book($l);
        }

        return $this;
    }

    /**
     * @param ChildRead $read_book The ChildRead object to add.
     */
    protected function doAddRead_book(ChildRead $read_book)
    {
        $this->collRead_books[]= $read_book;
        $read_book->setBook($this);
    }

    /**
     * @param  ChildRead $read_book The ChildRead object to remove.
     * @return $this|ChildBook The current object (for fluent API support)
     */
    public function removeRead_book(ChildRead $read_book)
    {
        if ($this->getRead_books()->contains($read_book)) {
            $pos = $this->collRead_books->search($read_book);
            $this->collRead_books->remove($pos);
            if (null === $this->read_booksScheduledForDeletion) {
                $this->read_booksScheduledForDeletion = clone $this->collRead_books;
                $this->read_booksScheduledForDeletion->clear();
            }
            $this->read_booksScheduledForDeletion[]= clone $read_book;
            $read_book->setBook(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Book is new, it will return
     * an empty collection; or if this Book has previously
     * been saved, it will retrieve related Read_books from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Book.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildRead[] List of ChildRead objects
     */
    public function getRead_booksJoinUser(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildReadQuery::create(null, $criteria);
        $query->joinWith('User', $joinBehavior);

        return $this->getRead_books($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUser) {
            $this->aUser->removeBook_user($this);
        }
        $this->book_id = null;
        $this->title = null;
        $this->author = null;
        $this->genre = null;
        $this->publisher = null;
        $this->language = null;
        $this->content = null;
        $this->path = null;
        $this->year = null;
        $this->user_id = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collComment_books) {
                foreach ($this->collComment_books as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRating_books) {
                foreach ($this->collRating_books as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRead_books) {
                foreach ($this->collRead_books as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collComment_books = null;
        $this->collRating_books = null;
        $this->collRead_books = null;
        $this->aUser = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BookTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {

    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {

    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
