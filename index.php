<?php
  require __DIR__ ."/vendor/autoload.php";
  $gates=[
      'BaiYun_A_A17',
      'BeiJing_J7',
      'ShuangLiu_K203',
      'HongQiao_A157',
      'A2',
      'BaiYun_B_B230'
  ];

  $boards=collect($gates)->map(function($gate){
      return collect(explode('_',$gate))->last();
  })->toArray();
  //var_dump($boards);
$events=json_decode(file_get_contents(__DIR__.'/event.json'),true);
/*①$result=collect($events)->pluck('type')->map(function($eventType){
    switch ($eventType){
        case 'PushEvent':
            return 5;
        case 'CreateEvent':
            return 4;
        case  'WatchEvent':
            return 3;
        default:
            return 1;
    }
})->sum();*/
$lookUp=[
    'PushEvent'=>5,
    'CreateEvent'=>4,
    'WatchEvent'=>3,
];
$result=collect($events)->pluck('type')->map(function($eventType){
    $lookUp=[
        'PushEvent'=>5,
        'CreateEvent'=>4,
        'WatchEvent'=>3,
    ];
   return  collect($lookUp)->get($eventType,1);
})->sum();
dd($result);