Yii2 HepsiJet
=============
Yii2 HepsiJet API Component

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist mhunesi/yii2-hepsijet "*"
```

or add

```
"mhunesi/yii2-hepsijet": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
'component' => [
     ...
    'hepsiJet' => [
        'class' => '\mhunesi\hepsijet\HepsiJet',
        'username' => 'username',
        'password' => 'password',
        'clientOptions' => [
            'verify' => false,
            'debug' => false,
            'timeout' => '2.0'
        ]
    ]
]

$hepsiJet = Yii::$app->hepsiJet;
```

OR 


```php
$hepsiJet = new HepsiJet([
    'username' => 'username',
    'password' => 'password',
    'clientOptions' => [
        'verify' => false,
        'debug' => false,
        'timeout' => '2.0'
    ]
]);
```

## Create Order

```php 
        
$model = new Cargo([
    'company' => new Company([
        'name' => 'CompanyName',
        'abbreviationCode' => 'CMPNYNM'
    ]),
    'currentXDock' => new CurrentXDock([
        'abbreviationCode' => 'CMP_ENSYRT'
    ]),
    'delivery' => new Delivery([
        'customerDeliveryNo' => 'OrderNumber',
        'customerOrderId' => 'OrderNumber',
        'totalParcels' => 1,
        'desi' => 4,
        'deliverySlotOriginal' => 0,
        'deliveryDateOriginal' => date('Y-m-d'),
        'deliveryType' => 'RETAIL',
        'product' => new Product([
            'productCode' => 'HX_STD'
        ]),
        'receiver' => new Receiver([
            'companyCustomerId' => 'companyCustomerId',
            'firstName' => 'Receiver Name',
            'lastName' => 'Receiver Last Name',
            'phone1' => '7777777777',
            'email' => 'receiver@gmail.com'
        ]),
        'senderAddress' => new Address([
            'companyAddressId' => 'ADD-12314',
            'country' => new Country([
                'name' => 'Türkiye'
            ]),
            'city' => new City([
                'name' => 'İstanbul'
            ]),
            'town' => new Town([
                'name' => 'Esenyurt',
            ]),
            'district' => new District([
                'name' => 'Akçaburgaz',
            ]),
            'addressLine1' => 'Akçaburgaz Mahallesi Muhsin Yazıcıoğlu Caddesi 121. Sok No:21 Esenyurt/İSTANBUL Esenyurt İstanbul Türkiye'
        ]),
        'recipientAddress' => new Address([
            'companyAddressId' => 'ADD-1012432',
            'country' => new Country([
                'name' => 'Türkiye'
            ]),
            'city' => new City([
                'name' => 'İstanbul'
            ]),
            'town' => new Town([
                'name' => 'Tuzla',
            ]),
            'district' => new District([
                'name' => 'Postane',
            ]),
            'addressLine1' => 'Postane Mah. Barbaros Hayrettin Cad. Şule Sok. Kardeşler Apartmanı 4/11 Tuzla/İstanbul'
        ]),
        'recipientPerson' => 'Receiver Name Lastname',
        'recipientPersonPhone1' => '7777777777'
    ])
]);

$cargoResult = $hepsiJet->delivery()->sendDeliveryOrderEnhanced($model);
```

OR 

```php
$data = [
    'company' => [
        'name' => 'CompanyName',
        'abbreviationCode' => 'CMPNYNM'
    ],
    'delivery' => [
        'customerDeliveryNo' => 'OrderNumber',
        'customerOrderId' => 'OrderNumber',
        'totalParcels' => 1,
        'desi' => 4,
        'deliverySlotOriginal' => 0,
        'deliveryDateOriginal' => '2021-12-17',
        'deliveryType' => 'RETAIL',
        'recipientPerson' => 'Receiver Name Lastname',
        'recipientPersonPhone1' => '7777777777',
        'receiver' => [
            'companyCustomerId' => 'companyCustomerId',
            'firstName' => 'Receiver Name',
            'lastName' => 'Receiver Last Name',
            'phone1' => '7777777777',
            'email' => 'receiver@company.com',
        ],
        'product' => [
            'productCode' => 'HX_STD',
        ],
        'senderAddress' => [
            'companyAddressId' => 'ADD-12314',
            'addressLine1' => 'Akçaburgaz Mahallesi Muhsin Yazıcıoğlu Caddesi 121. Sok No:21 Esenyurt/İSTANBUL Esenyurt İstanbul Türkiye',
            'country' => [
                'name' => 'Türkiye',
            ],
            'city' => [
                'name' => 'İstanbul',
            ],
            'town' => [
                'name' => 'Esenyurt',
            ],
            'district' => [
                'name' => 'Akçaburgaz',
            ],
        ],
        'recipientAddress' => [
            'companyAddressId' => 'ADD-1012432',
            'addressLine1' => 'Postane Mah. Barbaros Hayrettin Cad. Şule Sok. Kardeşler Apartmanı 4/11 Tuzla/İstanbul',
            'country' => [
                'name' => 'Türkiye',
            ],
            'city' => [
                'name' => 'İstanbul',
            ],
            'town' => [
                'name' => 'Tuzla',
            ],
            'district' => [
                'name' => 'Postane',
            ],
        ],
    ],
    'currentXDock' => [
        'abbreviationCode' => 'CMP_ENSYRT'
    ],
]; 

$model = new Cargo($data);

$cargoResult = $hepsiJet->delivery()->sendDeliveryOrderEnhanced($model);
```

## Delete Order

```php
$deleteDeliveryOrder = $hepsiJet->delivery()->deleteDeliveryOrder(['OrderNumber']);

if($deleteDeliveryOrder->status){
    $data = $deleteDeliveryOrder->toArray();
}else{
    echo $deleteDeliveryOrder->message;
}
```

##Tracking

### rest/delivery/integration/track
```php
$trackResponse = $hepsiJet->delivery()->track(['OrderNumber']);

if($trackResponse->status){
    $data = $trackResponse->toArray();
}else{
    echo $trackResponse->message;
}
```

### /rest/deliveryTransaction/getDeliveryTracking
```php
$trackResponse = $hepsiJet->deliveryTransaction()->getDeliveryTracking(['OrderNumber']);

if($trackResponse->status){
    $data = $trackResponse->toArray();
}else{
    echo $trackResponse->message;
}
```

### /rest/deliveryTransaction/getDeliveryTrackingV2
```php
$trackResponse = $hepsiJet->deliveryTransaction()->getDeliveryTrackingV2(['OrderNumber']);

if($trackResponse->status){
    $data = $trackResponse->toArray();
}else{
    echo $trackResponse->message;
}
```

## GetEndOfTheDay

```php
$getEndOfTheDayResponse = $hepsiJet->deliveryTransaction()->getEndOfTheDay();

if($getEndOfTheDayResponse->status){
    $data = $getEndOfTheDayResponse->toArray();
}else{
    echo $getEndOfTheDayResponse->message;
}
```


## Settlement

### Cities
```php
$cities = $hepsiJet->settlement()->cities();

$cities = $cities->toArray();
```

### Towns
```php
$towns = $hepsiJet->settlement()->towns($id);

$towns = $towns->toArray();
```

### Districts
```php
$districts = $hepsiJet->settlement()->districts(1);

$districts = $districts->toArray();
```





