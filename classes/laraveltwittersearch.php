<?php

class LaravelTwitterSearch
{
	private $base_url = 'http://search.twitter.com/search.json?q=';
	private $search;

	public function __construct($term = 'laravel') {
		$this->setTerm($term);
		return $this;
	}
	public function setTerm($term = NULL) {
		$this->search = is_null($term)? $this->search : urlencode($term);
		return $this;
	}
	private function getFeed() {
		$url = $this->base_url . $this->search;
		$feed = file_get_contents($url);
		return $feed;
	}
	public function parseFeed() {
		$json = $this->getFeed();
		$array = json_decode($json);
		return $array;
	}
	public function getList() {
		$list = array();
		$posts = $this->parseFeed();
		foreach ($posts->results as $post) {
			$list[$post->id_str]['user']    = $post->from_user;
			$list[$post->id_str]['link']    = 'https://twitter.com/' . $post->from_user . '/status/' . $post->id_str; 
			$list[$post->id_str]['message'] = $post->text;
			$list[$post->id_str]['date']    = $post->created_at;
		}
		return $list;
	}
}