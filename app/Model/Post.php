<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
// Un comentario muy chulo.
	public $validate = array(
		'title' => array(
		'rule' => 'notBlank'
		),
		'body' => array(
		'rule' => 'notBlank'
		)
	);
}
