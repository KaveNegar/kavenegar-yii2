# kavenegar-yii2



Installation
-----
```
composer require kavenegar/yii2
```
or add
```
"kavenegar/yii2": "*"
```
And run following command to download extension using **composer**:
```php
$ composer update
```

Basic setup
-----


Configuration
-----
Add the following in your config:
```php
return [
	'components' => [
		'Kavenegar' => [
			'class' => 'Kavenegar\Yii2\Kavenegar',
			'apikey' => '{ API Key }',
		],
	],
];
```

Usage
-----
```php
try{
	$api = Yii::$app->Kavenegar->KavenegarApi();
	$sender = "{ Sender Line }";
	$message = "{ Message }";
	$receptor = array("{ Receptor #1 }","{ Receptor #2 }");
	$result = $api->Send($sender,$receptor,$message);
	if($result){
		var_dump($result);
	}
}
catch(\Kavenegar\Exceptions\ApiException $e){
	echo $e->errorMessage();
}
catch(\Kavenegar\Exceptions\HttpException $e){
	echo $e->errorMessage();
}
```
