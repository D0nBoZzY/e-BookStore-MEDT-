<?php

namespace Map;

use \Book;
use \BookQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'book' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class BookTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.BookTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'ebookstore';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'book';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Book';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Book';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the book_id field
     */
    const COL_BOOK_ID = 'book.book_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'book.title';

    /**
     * the column name for the author field
     */
    const COL_AUTHOR = 'book.author';

    /**
     * the column name for the genre field
     */
    const COL_GENRE = 'book.genre';

    /**
     * the column name for the publisher field
     */
    const COL_PUBLISHER = 'book.publisher';

    /**
     * the column name for the language field
     */
    const COL_LANGUAGE = 'book.language';

    /**
     * the column name for the content field
     */
    const COL_CONTENT = 'book.content';

    /**
     * the column name for the path field
     */
    const COL_PATH = 'book.path';

    /**
     * the column name for the year field
     */
    const COL_YEAR = 'book.year';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'book.user_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('BookId', 'Title', 'Author', 'Genre', 'Publisher', 'Language', 'Content', 'Path', 'Year', 'UserId', ),
        self::TYPE_CAMELNAME     => array('bookId', 'title', 'author', 'genre', 'publisher', 'language', 'content', 'path', 'year', 'userId', ),
        self::TYPE_COLNAME       => array(BookTableMap::COL_BOOK_ID, BookTableMap::COL_TITLE, BookTableMap::COL_AUTHOR, BookTableMap::COL_GENRE, BookTableMap::COL_PUBLISHER, BookTableMap::COL_LANGUAGE, BookTableMap::COL_CONTENT, BookTableMap::COL_PATH, BookTableMap::COL_YEAR, BookTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('book_id', 'title', 'author', 'genre', 'publisher', 'language', 'content', 'path', 'year', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('BookId' => 0, 'Title' => 1, 'Author' => 2, 'Genre' => 3, 'Publisher' => 4, 'Language' => 5, 'Content' => 6, 'Path' => 7, 'Year' => 8, 'UserId' => 9, ),
        self::TYPE_CAMELNAME     => array('bookId' => 0, 'title' => 1, 'author' => 2, 'genre' => 3, 'publisher' => 4, 'language' => 5, 'content' => 6, 'path' => 7, 'year' => 8, 'userId' => 9, ),
        self::TYPE_COLNAME       => array(BookTableMap::COL_BOOK_ID => 0, BookTableMap::COL_TITLE => 1, BookTableMap::COL_AUTHOR => 2, BookTableMap::COL_GENRE => 3, BookTableMap::COL_PUBLISHER => 4, BookTableMap::COL_LANGUAGE => 5, BookTableMap::COL_CONTENT => 6, BookTableMap::COL_PATH => 7, BookTableMap::COL_YEAR => 8, BookTableMap::COL_USER_ID => 9, ),
        self::TYPE_FIELDNAME     => array('book_id' => 0, 'title' => 1, 'author' => 2, 'genre' => 3, 'publisher' => 4, 'language' => 5, 'content' => 6, 'path' => 7, 'year' => 8, 'user_id' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('book');
        $this->setPhpName('Book');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Book');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('book_id', 'BookId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('author', 'Author', 'VARCHAR', true, 255, null);
        $this->addColumn('genre', 'Genre', 'VARCHAR', true, 255, null);
        $this->addColumn('publisher', 'Publisher', 'VARCHAR', true, 255, null);
        $this->addColumn('language', 'Language', 'VARCHAR', true, 255, null);
        $this->addColumn('content', 'Content', 'VARCHAR', true, 255, null);
        $this->addColumn('path', 'Path', 'VARCHAR', true, 255, null);
        $this->addColumn('year', 'Year', 'DATE', true, null, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'user', 'user_id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array('user_id' => 'user_id', ), null, null);
        $this->addRelation('Comment_book', '\\Comment', RelationMap::ONE_TO_MANY, array('book_id' => 'book_id', ), null, null, 'Comment_books');
        $this->addRelation('Rating_book', '\\Rating', RelationMap::ONE_TO_MANY, array('book_id' => 'book_id', ), null, null, 'Rating_books');
        $this->addRelation('Read_book', '\\Read', RelationMap::ONE_TO_MANY, array('book_id' => 'book_id', ), null, null, 'Read_books');
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BookId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('BookId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('BookId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? BookTableMap::CLASS_DEFAULT : BookTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Book object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = BookTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = BookTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + BookTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BookTableMap::OM_CLASS;
            /** @var Book $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            BookTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = BookTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = BookTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Book $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BookTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(BookTableMap::COL_BOOK_ID);
            $criteria->addSelectColumn(BookTableMap::COL_TITLE);
            $criteria->addSelectColumn(BookTableMap::COL_AUTHOR);
            $criteria->addSelectColumn(BookTableMap::COL_GENRE);
            $criteria->addSelectColumn(BookTableMap::COL_PUBLISHER);
            $criteria->addSelectColumn(BookTableMap::COL_LANGUAGE);
            $criteria->addSelectColumn(BookTableMap::COL_CONTENT);
            $criteria->addSelectColumn(BookTableMap::COL_PATH);
            $criteria->addSelectColumn(BookTableMap::COL_YEAR);
            $criteria->addSelectColumn(BookTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.book_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.author');
            $criteria->addSelectColumn($alias . '.genre');
            $criteria->addSelectColumn($alias . '.publisher');
            $criteria->addSelectColumn($alias . '.language');
            $criteria->addSelectColumn($alias . '.content');
            $criteria->addSelectColumn($alias . '.path');
            $criteria->addSelectColumn($alias . '.year');
            $criteria->addSelectColumn($alias . '.user_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(BookTableMap::DATABASE_NAME)->getTable(BookTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(BookTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(BookTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new BookTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Book or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Book object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Book) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BookTableMap::DATABASE_NAME);
            $criteria->add(BookTableMap::COL_BOOK_ID, (array) $values, Criteria::IN);
        }

        $query = BookQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            BookTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                BookTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the book table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return BookQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Book or Criteria object.
     *
     * @param mixed               $criteria Criteria or Book object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Book object
        }

        if ($criteria->containsKey(BookTableMap::COL_BOOK_ID) && $criteria->keyContainsValue(BookTableMap::COL_BOOK_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.BookTableMap::COL_BOOK_ID.')');
        }


        // Set the correct dbName
        $query = BookQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // BookTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BookTableMap::buildTableMap();
