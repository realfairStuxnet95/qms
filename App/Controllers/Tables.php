<?php 

class Tables {
	public function users(){
		return 'system_users';
	}
	public function articles_categories(){
		return 'articles_categories';
	}
	public function articles(){
		return 'articles';
	}
	public function comments(){
		return 'articles_comments';
	}
	public function advert_categories(){
		return 'advert_categories';
	}
	public function banners(){
		return 'banners';
	}
	public function articles_posters(){
		return 'articles_posters';
	}
	public function attachments(){
		return 'articles_attachments';
	}
	public function publish_status(){
		return 'PUBLISHED';
	}
	public function members(){
		return 'foot_users';
	}
}
?>