<?php

use Base\RatingQuery as BaseRatingQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'rating' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class RatingQuery extends BaseRatingQuery
{

  function bewerten ($book_id,$user_id,$sterne){
    $r = RaitingQuery::create();
    $r->setUserId($user_id);
    $r->setBookId($book_id);
    $r->setRating($sterne);
    $r->save();

  }
}

$con = Propel::getWriteConnection(\Map\BookTableMap::DATABASE_NAME);
$sql = "SELECT * FROM book WHERE title LIKE '%$i%';";
$stmt = $con->prepare($sql);
$rs=$stmt->executeQuery();
$array=mysqli_fetch_array($rs,MYSQLi_num);
return $array;
}
