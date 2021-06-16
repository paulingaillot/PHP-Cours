<?php
  require_once('constant.php');

  //----------------------------------------------------------------------------
  //--- dbConnect --------------------------------------------------------------
  //----------------------------------------------------------------------------
  // Create the connection to the database.
  // \return False on error and the database otherwise.
  function dbConnect()
  {
    try
    {
      $db = new PDO('pgsql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $exception)
    {
      error_log('Connection error: '.$exception->getMessage());
      return false;
    }
    return $db;
  }

  //----------------------------------------------------------------------------
  //--- dbRequestTweets --------------------------------------------------------
  //----------------------------------------------------------------------------
  // Function to get all tweets (if $login='') or the tweets of a user
  // (otherwise).
  // \param db The connected database.
  // \param login The login of the user (for specific request).
  // \return The list of tweets.
  function dbRequestAvi($db, $login='')
  {
    try
    {
      $request = "SELECT * FROM Etudiants";
      if ($login != '') {
        $request .= " WHERE login='".$login."'";
      }
       
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      echo 'Request error: '.$exception->getMessage();
      return false;
    }
    return $result;
  }

  //----------------------------------------------------------------------------
  //--- dbAddCTweet ------------------------------------------------------------
  //----------------------------------------------------------------------------
  // Add a tweet.
  // \param db The connected database.
  // \param login The login of the user.
  // \param text The tweet to add.
  // \return True on success, false otherwise.
  function dbAddAvi($db, $comment, $note, $login)
  {
    try
    {
      $request = "INSERT INTO Etudiants(note, comment, login) VALUES(".$note.", '".$comment."', '".$login."')";
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return true;
  }
  
  //----------------------------------------------------------------------------
  //--- dbModifyTweet ----------------------------------------------------------
  //----------------------------------------------------------------------------
  // Function to modify a tweet.
  // \param db The connected database.
  // \param id The id of the tweet to update.
  // \param login The login of the user.
  // \param text The new tweet.
  // \return True on success, false otherwise.
  function dbModifyAvi($db, $id, $text, $note)
  {
    try
    {
      $request = "UPDATE Etudiants SET comment='".$text."', note=".$note." WHERE id=".$id;
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      echo 'Request error: '.$exception->getMessage();
      return false;
    }
    return true;
  }

  //----------------------------------------------------------------------------
  //--- dbDeleteTweet ----------------------------------------------------------
  //----------------------------------------------------------------------------
  // Delete a tweet.
  // \param db The connected database.
  // \param id The id of the tweet.
  // \param login The login of the user.
  // \return True on success, false otherwise.
  function dbDeleteAvi($db, $id)
  {
    try
    {
      $request = 'DELETE FROM Etudiants WHERE id=:id';
      $statement = $db->prepare($request);
      $statement->bindParam(':id', $id, PDO::PARAM_INT);
      $statement->execute();
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return true;
  }
?>
