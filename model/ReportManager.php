<?php 

require_once("ManagerConnect.php");


class ReportManager extends Manager
{
      public function postReport($id, $user_id)
      {
            $db = $this->dbConnect();
            $req = $db->prepare('INSERT INTO report(comment_id, user_id, reported_at) VALUES(?, ?, NOW())');
            $reported = $req->execute(array($id, $user_id));

            return $reported;
      }

      public function getReports()
      {
            $db = $this->dbConnect();
            $results = array();
            $reports = $db->query('SELECT COUNT(*) AS nb_reports, comment_id, user_id, DATE_FORMAT(reported_at, "%d/%m/%Y %H:%i:%s") AS date_c FROM report GROUP BY comment_id HAVING nb_reports >= 2 ORDER BY nb_reports DESC');

            while ($row_reposts = $reports->fetch()) {
                  $comments = $db->query('SELECT * FROM comment WHERE id=' . $row_reposts['comment_id']);
                  $row_comments = $comments->fetch();

                  $author = $db->query('SELECT * FROM user WHERE id=' . $row_comments['user_id']);
                  $row_author = $author->fetch();

                  $results[] = array(
                        'date_c' => $row_reposts['date_c'],
                        'user_id' => $row_reposts['user_id'],
                        'comment_id' => $row_reposts['comment_id'],
                        'nb_reports' => $row_reposts['nb_reports'],
                        'comment' => $row_comments['content'],
                        'author' => $row_author['firstname'] . ' ' . $row_author['name']
                  );
            }

            return $results;
      }
}

?>
