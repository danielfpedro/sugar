<?php

return [
	'authorizations' => [
		'Users' => [
			'index' => [
				'allow' => ['secretária']
			],
			'add' => [
				'deny' => '*'
			],
			'edit' => [
				'allow' => ['secretaria', 'financeiro']
			],
		],
		'Faqs' => '*',
		'Posts' => [
			'index' => [
				'allow' => ['financeiro', 'secretária']
			],
			'add' => [
				'allow' => ['secretaria']
			],
			'edit' => [
				'allow' => ['secretaria']
			],
			'delete' => [
				'deny' => '*'
			]
		]
	]
];