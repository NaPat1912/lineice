<?php
$access_token = 'F4BWnuHCvcqyAgqnMra399L+uxpqZp+KjmNH0678EiD19LlOo76950emiHHZnUxFsD2L8FFlxRUK+qiV3JFUm8JcwYr/XyMxnR/Gg5I1UgVNdkpS2LGrG9CidF/qU5cKGiGfMfBlSgIHCSH5PmW52AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
