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
  var_dump($boards);