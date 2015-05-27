<?php

namespace Base;

use \Book as ChildBook;
use \BookQuery as ChildBookQuery;
use \Exception;
use \PDO;
use Map\BookTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'book' table.
 *
 *
 *
 * @method     ChildBookQuery orderByBookId($order = Criteria::ASC) Order by the book_id column
 * @method     ChildBookQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildBookQuery orderByAuthor($order = Criteria::ASC) Order by the author column
 * @method     ChildBookQuery orderByGenre($order = Criteria::ASC) Order by the genre column
 * @method     ChildBookQuery orderByPublisher($order = Criteria::ASC) Order by the publisher column
 * @method     ChildBookQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 * @method     ChildBookQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     ChildBookQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method     ChildBookQuery orderByYear($order = Criteria::ASC) Order by the year column
 * @method     ChildBookQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildBookQuery groupByBookId() Group by the book_id column
 * @method     ChildBookQuery groupByTitle() Group by the title column
 * @method     ChildBookQuery groupByAuthor() Group by the author column
 * @method     ChildBookQuery groupByGenre() Group by the genre column
 * @method     ChildBookQuery groupByPublisher() Group by the publisher column
 * @method     ChildBookQuery groupByLanguage() Group by the language column
 * @method     ChildBookQuery groupByContent() Group by the content column
 * @method     ChildBookQuery groupByPath() Group by the path column
 * @method     ChildBookQuery groupByYear() Group by the year column
 * @method     ChildBookQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildBookQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildBookQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildBookQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildBookQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildBookQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildBookQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildBookQuery leftJoinComment_book($relationAlias = null) Adds a LEFT JOIN clause to the query using the Comment_book relation
 * @method     ChildBookQuery rightJoinComment_book($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Comment_book relation
 * @method     ChildBookQuery innerJoinComment_book($relationAlias = null) Adds a INNER JOIN clause to the query using the Comment_book relation
 *
 * @method     ChildBookQuery leftJoinRating_book($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rating_book relation
 * @method     ChildBookQuery rightJoinRating_book($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rating_book relation
 * @method     ChildBookQuery innerJoinRating_book($relationAlias = null) Adds a INNER JOIN clause to the query using the Rating_book relation
 *
 * @method     ChildBookQuery leftJoinRead_book($relationAlias = null) Adds a LEFT JOIN clause to the query using the Read_book relation
 * @method     ChildBookQuery rightJoinRead_book($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Read_book relation
 * @method     ChildBookQuery innerJoinRead_book($relationAlias = null) Adds a INNER JOIN clause to the query using the Read_book relation
 *
 * @method     \UserQuery|\CommentQuery|\RatingQuery|\ReadQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildBook findOne(ConnectionInterface $con = null) Return the first ChildBook matching the query
 * @method     ChildBook findOneOrCreate(ConnectionInterface $con = null) Return the first ChildBook matching the query, or a new ChildBook object populated from the query conditions when no match is found
 *
 * @method     ChildBook findOneByBookId(int $book_id) Return the first ChildBook filtered by the book_id column
 * @method     ChildBook findOneByTitle(string $title) Return the first ChildBook filtered by the title column
 * @method     ChildBook findOneByAuthor(string $author) Return the first ChildBook filtered by the author column
 * @method     ChildBook findOneByGenre(string $genre) Return the first ChildBook filtered by the genre column
 * @method     ChildBook findOneByPublisher(string $publisher) Return the first ChildBook filtered by the publisher column
 * @method     ChildBook findOneByLanguage(string $language) Return the first ChildBook filtered by the language column
 * @method     ChildBook findOneByContent(string $content) Return the first ChildBook filtered by the content column
 * @method     ChildBook findOneByPath(string $path) Return the first ChildBook filtered by the path column
 * @method     ChildBook findOneByYear(string $year) Return the first ChildBook filtered by the year column
 * @method     ChildBook findOneByUserId(int $user_id) Return the first ChildBook filtered by the user_id column
 *
 * @method     ChildBook[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildBook objects based on current ModelCriteria
 * @method     ChildBook[]|ObjectCollection findByBookId(int $book_id) Return ChildBook objects filtered by the book_id column
 * @method     ChildBook[]|ObjectCollection findByTitle(string $title) Return ChildBook objects filtered by the title column
 * @method     ChildBook[]|ObjectCollection findByAuthor(string $author) Return ChildBook objects filtered by the author column
 * @method     ChildBook[]|ObjectCollection findByGenre(string $genre) Return ChildBook objects filtered by the genre column
 * @method     ChildBook[]|ObjectCollection findByPublisher(string $publisher) Return ChildBook objects filtered by the publisher column
 * @method     ChildBook[]|ObjectCollection findByLanguage(string $language) Return ChildBook objects filtered by the language column
 * @method     ChildBook[]|ObjectCollection findByContent(string $content) Return ChildBook objects filtered by the content column
 * @method     ChildBook[]|ObjectCollection findByPath(string $path) Return ChildBook objects filtered by the path column
 * @method     ChildBook[]|ObjectCollection findByYear(string $year) Return ChildBook objects filtered by the year column
 * @method     ChildBook[]|ObjectCollection findByUserId(int $user_id) Return ChildBook objects filtered by the user_id column
 * @method     ChildBook[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class BookQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \Base\BookQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'ebookstore', $modelName = '\\Book', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildBookQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildBookQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildBookQuery) {
            return $criteria;
        }
        $query = new ChildBookQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildBook|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BookTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(BookTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBook A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT book_id, title, author, genre, publisher, language, content, path, year, user_id FROM book WHERE book_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildBook $obj */
            $obj = new ChildBook();
            $obj->hydrate($row);
            BookTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildBook|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the book_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBookId(1234); // WHERE book_id = 1234
     * $query->filterByBookId(array(12, 34)); // WHERE book_id IN (12, 34)
     * $query->filterByBookId(array('min' => 12)); // WHERE book_id > 12
     * </code>
     *
     * @param     mixed $bookId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByBookId($bookId = null, $comparison = null)
    {
        if (is_array($bookId)) {
            $useMinMax = false;
            if (isset($bookId['min'])) {
                $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $bookId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bookId['max'])) {
                $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $bookId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $bookId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the author column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthor('fooValue');   // WHERE author = 'fooValue'
     * $query->filterByAuthor('%fooValue%'); // WHERE author LIKE '%fooValue%'
     * </code>
     *
     * @param     string $author The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByAuthor($author = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($author)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $author)) {
                $author = str_replace('*', '%', $author);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_AUTHOR, $author, $comparison);
    }

    /**
     * Filter the query on the genre column
     *
     * Example usage:
     * <code>
     * $query->filterByGenre('fooValue');   // WHERE genre = 'fooValue'
     * $query->filterByGenre('%fooValue%'); // WHERE genre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $genre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByGenre($genre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($genre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $genre)) {
                $genre = str_replace('*', '%', $genre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_GENRE, $genre, $comparison);
    }

    /**
     * Filter the query on the publisher column
     *
     * Example usage:
     * <code>
     * $query->filterByPublisher('fooValue');   // WHERE publisher = 'fooValue'
     * $query->filterByPublisher('%fooValue%'); // WHERE publisher LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publisher The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPublisher($publisher = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publisher)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publisher)) {
                $publisher = str_replace('*', '%', $publisher);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_PUBLISHER, $publisher, $comparison);
    }

    /**
     * Filter the query on the language column
     *
     * Example usage:
     * <code>
     * $query->filterByLanguage('fooValue');   // WHERE language = 'fooValue'
     * $query->filterByLanguage('%fooValue%'); // WHERE language LIKE '%fooValue%'
     * </code>
     *
     * @param     string $language The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByLanguage($language = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($language)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $language)) {
                $language = str_replace('*', '%', $language);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_LANGUAGE, $language, $comparison);
    }

    /**
     * Filter the query on the content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
     * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $content)) {
                $content = str_replace('*', '%', $content);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%'); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $path)) {
                $path = str_replace('*', '%', $path);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_PATH, $path, $comparison);
    }

    /**
     * Filter the query on the year column
     *
     * Example usage:
     * <code>
     * $query->filterByYear('2011-03-14'); // WHERE year = '2011-03-14'
     * $query->filterByYear('now'); // WHERE year = '2011-03-14'
     * $query->filterByYear(array('max' => 'yesterday')); // WHERE year > '2011-03-13'
     * </code>
     *
     * @param     mixed $year The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByYear($year = null, $comparison = null)
    {
        if (is_array($year)) {
            $useMinMax = false;
            if (isset($year['min'])) {
                $this->addUsingAlias(BookTableMap::COL_YEAR, $year['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($year['max'])) {
                $this->addUsingAlias(BookTableMap::COL_YEAR, $year['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_YEAR, $year, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(BookTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(BookTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BookTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(BookTableMap::COL_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BookTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \Comment object
     *
     * @param \Comment|ObjectCollection $comment  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByComment_book($comment, $comparison = null)
    {
        if ($comment instanceof \Comment) {
            return $this
                ->addUsingAlias(BookTableMap::COL_BOOK_ID, $comment->getBookId(), $comparison);
        } elseif ($comment instanceof ObjectCollection) {
            return $this
                ->useComment_bookQuery()
                ->filterByPrimaryKeys($comment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByComment_book() only accepts arguments of type \Comment or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Comment_book relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinComment_book($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Comment_book');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Comment_book');
        }

        return $this;
    }

    /**
     * Use the Comment_book relation Comment object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CommentQuery A secondary query class using the current class as primary query
     */
    public function useComment_bookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinComment_book($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Comment_book', '\CommentQuery');
    }

    /**
     * Filter the query by a related \Rating object
     *
     * @param \Rating|ObjectCollection $rating  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByRating_book($rating, $comparison = null)
    {
        if ($rating instanceof \Rating) {
            return $this
                ->addUsingAlias(BookTableMap::COL_BOOK_ID, $rating->getBookId(), $comparison);
        } elseif ($rating instanceof ObjectCollection) {
            return $this
                ->useRating_bookQuery()
                ->filterByPrimaryKeys($rating->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRating_book() only accepts arguments of type \Rating or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rating_book relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinRating_book($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rating_book');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Rating_book');
        }

        return $this;
    }

    /**
     * Use the Rating_book relation Rating object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RatingQuery A secondary query class using the current class as primary query
     */
    public function useRating_bookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRating_book($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rating_book', '\RatingQuery');
    }

    /**
     * Filter the query by a related \Read object
     *
     * @param \Read|ObjectCollection $read  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildBookQuery The current query, for fluid interface
     */
    public function filterByRead_book($read, $comparison = null)
    {
        if ($read instanceof \Read) {
            return $this
                ->addUsingAlias(BookTableMap::COL_BOOK_ID, $read->getBookId(), $comparison);
        } elseif ($read instanceof ObjectCollection) {
            return $this
                ->useRead_bookQuery()
                ->filterByPrimaryKeys($read->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRead_book() only accepts arguments of type \Read or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Read_book relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function joinRead_book($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Read_book');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Read_book');
        }

        return $this;
    }

    /**
     * Use the Read_book relation Read object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ReadQuery A secondary query class using the current class as primary query
     */
    public function useRead_bookQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRead_book($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Read_book', '\ReadQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildBook $book Object to remove from the list of results
     *
     * @return $this|ChildBookQuery The current query, for fluid interface
     */
    public function prune($book = null)
    {
        if ($book) {
            $this->addUsingAlias(BookTableMap::COL_BOOK_ID, $book->getBookId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the book table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BookTableMap::clearInstancePool();
            BookTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(BookTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(BookTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            BookTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            BookTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // BookQuery
