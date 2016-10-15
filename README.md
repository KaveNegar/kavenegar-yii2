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
	$sender = "10004346";
	$message = "خدمات پیام کوتاه کاوه نگار";
	$receptor = array("09123456789","09367891011");
	$result = $api->Send($sender,$receptor,$message);
	if($result){
		foreach($result as $r){
			echo "messageid = $r->messageid";
			echo "message = $r->message";
			echo "status = $r->status";
			echo "statustext = $r->statustext";
			echo "sender = $r->sender";
			echo "receptor = $r->receptor";
			echo "date = $r->date";
			echo "cost = $r->cost";
		}		
	}
}
catch(\Kavenegar\Exceptions\ApiException $e){
	// در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
	echo $e->errorMessage();
}
catch(\Kavenegar\Exceptions\HttpException $e){
	// در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
	echo $e->errorMessage();
}

/*
sample output
{
    "return":
    {
        "status":200,
        "message":"تایید شد"
    },
    "entries": 
    [
        {
            "messageid":8792343,
            "message":"خدمات پیام کوتاه کاوه نگار",
            "status":1,
            "statustext":"در صف ارسال",
            "sender":"10004346",
            "receptor":"09123456789",
            "date":1356619709,
            "cost":120
        },
        {
            "messageid":8792344,
            "message":"خدمات پیام کوتاه کاوه نگار",
            "status":1,
            "statustext":"در صف ارسال",
            "sender":"10004346",
            "receptor":"09367891011",
            "date":1356619709,
            "cost":120
        }
    ]
}
*/


```
