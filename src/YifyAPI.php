<?php

namespace YifyAPI;

use GuzzleHttp\Client;

class YifyAPI {
    private $client;
    private $app_key;

    public function __construct($base_uri = 'https://yts.am/api/v2/', $app_key = false)
    {
        $this->client = new Client([
            'base_uri' => $base_uri,
        ]);
        $this->app_key = $app_key;
    }

    private function throwException($code, $reason) {
        throw new \Exception("{$code} => {$reason}.");
    }

    private function returnResponse($response) {
        if ($response->getStatusCode() != 200) {
            $this->throwException($response->getStatusCode(), $response->getReasonPhrase());
        } else {
            return json_decode($response->getBody());
        }
    }

    public function listMovies($options = []) {
        $parameters = [];
        $response = $this->client->request('GET', 'list_movies.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function movieDetails($movie_id, $options = []) {
        $parameters = [
            'movie_id' => $movie_id,
        ];
        $response = $this->client->request('GET', 'movie_details.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function movieSuggestions($movie_id, $options = []) {
        $parameters = [
            'movie_id' => $movie_id,
        ];
        $response = $this->client->request('GET', 'movie_suggestions.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function movieComments($movie_id, $options = []) {
        $parameters = [
            'movie_id' => $movie_id,
        ];
        $response = $this->client->request('GET', 'movie_comments.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function movieReviews($movie_id, $options = []) {
        $parameters = [
            'movie_id' => $movie_id,
        ];
        $response = $this->client->request('GET', 'movie_reviews.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function movieParentalGuides($movie_id, $options = []) {
        $parameters = [
            'movie_id' => $movie_id,
        ];
        $response = $this->client->request('GET', 'movie_parental_guides.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function listUpcoming($options = []) {
        $parameters = [];
        $response = $this->client->request('GET', 'list_upcoming.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userDetails($user_id, $options = []) {
        $parameters = [
            'user_id' => $user_id,
        ];
        $response = $this->client->request('GET', 'user_details.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userGetKey($username, $password, $options = []) {
        $parameters = [
            'user_id' => $username,
            'password' => $password,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_get_key.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userProfile($user_key, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_profile.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userEditSettings($user_key, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_edit_settings.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userRegister($username, $password, $email, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_register.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userForgotPassword($email, $options = []) {
        $parameters = [
            'email' => $email,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_forgot_password.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function userResetPassword($reset_code, $new_password, $options = []) {
        $parameters = [
            'email' => $reset_code,
            'new_password' => $new_password,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'user_reset_password.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function likeMovie($user_key, $movie_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'movie_id' => $movie_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'like_movie.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function getMovieBookmarks($user_key, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'get_movie_bookmarks.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function addMovieBookmark($user_key, $movie_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'movie_id' => $movie_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'add_movie_bookmark.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function deleteMovieBookmark($user_key, $movie_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'movie_id' => $movie_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'delete_movie_bookmark.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function makeComment($user_key, $movie_id, $comment_text, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'movie_id' => $movie_id,
            'comment_text' => $comment_text,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'make_comment.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function likeComment($user_key, $comment_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'comment_id' => $comment_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'like_comment.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function reportComment($user_key, $comment_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'comment_id' => $comment_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'report_comment.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function deleteComment($user_key, $comment_id, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'comment_id' => $comment_id,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'delete_comment.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }

    public function makeRequest($user_key, $movie_title, $options = []) {
        $parameters = [
            'user_key' => $user_key,
            'movie_title' => $movie_title,
            'application_key' => $this->app_key,
        ];
        $response = $this->client->request('GET', 'make_request.json', [
            'query' => array_merge($options, $parameters),
        ]);
        return $this->returnResponse($response);
    }
}