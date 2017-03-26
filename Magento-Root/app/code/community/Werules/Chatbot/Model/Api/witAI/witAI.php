<?php
	class witAI
	{
		protected $_token;
		protected $_version = '20170325';

		/// Class constructor
		public function __construct($token) {
			$this->_token = $token;
		}

		function getWitAIResponse($q)
		{
			$access_token = $this->_token;
			$options = array(
				'http' => array(
					'method' => 'GET',
					'header' => "Authorization: Bearer " . $access_token . "\r\n"
				)
			);
			$context = stream_context_create($options);
			$url = 'https://api.wit.ai/message?v=' . $this->_version . '&q=' . urlencode($q);
			$result = file_get_contents($url, false, $context);
			$result = json_decode($result);
			return $result;
		}
	}
?>