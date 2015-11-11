<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
// Un comentario muy chulo del pablito.
	public $validate = array(
		'title' => array(
		'rule' => 'notBlank'
		),
		'body' => array(
		'rule' => 'notBlank'
		)
	);

	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
}
