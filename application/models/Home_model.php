<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_query_post($whereIntIdPost = '')
  {
    $query = "";

    if ($whereIntIdPost == '') {
      $query = "SELECT lol_post.*,
      dislikes.`dislike`,
      lol_user.`username`,
      SUM(lol_like_post.`response`) as `likes`
      FROM lol_post
      JOIN lol_user
      ON lol_user.`intIdUser` = lol_post.`intIdUser`
      LEFT JOIN lol_like_post
      ON lol_like_post.`intIdPost` = lol_post.`intIdPost`
      LEFT JOIN (
        SELECT
        intIdPost,
        COUNT(response) AS `dislike`
        FROM lol_like_post
        WHERE response = '0'
        GROUP BY intIdPost
      ) dislikes
      ON dislikes.`intIdPost` = lol_post.`intIdPost`
      GROUP BY lol_post.`intIdPost`";

    } else {
      $query = "SELECT
      dislikes.`dislike`,
      SUM(lol_like_post.`response`) as `likes`
      FROM lol_post
      LEFT JOIN lol_like_post
      ON lol_like_post.`intIdPost` = lol_post.`intIdPost`
      LEFT JOIN (
        SELECT
        intIdPost,
        COUNT(response) AS `dislike`
        FROM lol_like_post
        WHERE response = '0'
        GROUP BY intIdPost
      ) dislikes
      ON dislikes.`intIdPost` = lol_post.`intIdPost`
      WHERE lol_post.`intIdPost` = '$whereIntIdPost'
      GROUP BY lol_post.`intIdPost`";

    }

    return $query;
  }

  public function get_my_post_query()
  {
    $intIdUser = $this->session->userdata['user']['intIdUser'];

    $query = "SELECT lol_post.*,
    dislikes.`dislike`,
    lol_user.`username`,
    SUM(lol_like_post.`response`) as `likes`
    FROM lol_post
    JOIN lol_user
    ON lol_user.`intIdUser` = lol_post.`intIdUser`
    LEFT JOIN lol_like_post
    ON lol_like_post.`intIdPost` = lol_post.`intIdPost`
    LEFT JOIN (
      SELECT
      intIdPost,
      COUNT(response) AS `dislike`
      FROM lol_like_post
      WHERE response = '0'
      GROUP BY intIdPost
    ) dislikes
    ON dislikes.`intIdPost` = lol_post.`intIdPost`
    WHERE lol_post.`intIdUser` = '$intIdUser'
    GROUP BY lol_post.`intIdPost`";

    return $query;
  }

  public function get_limit_post($my ,$offset , $limit)
  {
    $intIdUser = $this->session->userdata['user']['intIdUser'];
    $where = ($my != '') ? "WHERE lol_post.`intIdUser` = '$intIdUser'" : "" ;
    $query = "SELECT lol_post.*,
    dislikes.`dislike`,
    lol_user.`username`,
    SUM(lol_like_post.`response`) as `likes`
    FROM lol_post
    JOIN lol_user
    ON lol_user.`intIdUser` = lol_post.`intIdUser`
    LEFT JOIN lol_like_post
    ON lol_like_post.`intIdPost` = lol_post.`intIdPost`
    LEFT JOIN (
      SELECT
      intIdPost,
      COUNT(response) AS `dislike`
      FROM lol_like_post
      WHERE response = '0'
      GROUP BY intIdPost
    ) dislikes
    ON dislikes.`intIdPost` = lol_post.`intIdPost`
    $where
    GROUP BY lol_post.`intIdPost`
    LIMIT $offset, $limit";
    return $query;
  }

}
