<?php
$access_token = 'F4BWnuHCvcqyAgqnMra399L+uxpqZp+KjmNH0678EiD19LlOo76950emiHHZnUxFsD2L8FFlxRUK+qiV3JFUm8JcwYr/XyMxnR/Gg5I1UgVNdkpS2LGrG9CidF/qU5cKGiGfMfBlSgIHCSH5PmW52AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['message']['text'] == 'สวัสดี'||$event['message']['text'] == 'หวัดดี'||$event['message']['text'] == 'ดีจ้า') {
			// Get text sent
			$text = "สวัสดีจ้^_^ \nยินดีต้อนรับสู่สาขาวิชาวิศวกรรมสารสนเทศและการสื่อสาร \nมีข้อสงสัยอะไรถามได้นะ:-)";
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}else if($event['message']['type'] == 'sticker') 
		{
			$text = array(
 			'type' => 'sticker',
 			'packageId' => '4',
 			'stickerId' => '300'
 				);
			$replyToken = $event['replyToken'];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$text],
				];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			;echo $result . "\r\n";
		}
}
echo "OK";
