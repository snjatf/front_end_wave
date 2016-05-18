<?php

$oprType=$_REQUEST['opr'];
$data='[
  {
    "author": "Pete Hunt",
    "text": "This is one comment [百度(http://www.baidu.com)"
  },
  {
    "author": "Jordan Walke",
    "text": "This is *another* comment"
  },
  {
    "author": "Zhuangsd",
    "text": "[Google(http://www.Google.com)"
  },
  {
    "author": "Dengxy",
    "text": "Dengxiaoyu"
  }
]';

$data=json_decode($data, true);
// var_dump($data);
switch ($oprType) {
  case 'getData':
   echo json_encode($data);
    break;
    case 'addData':
    // print_r($data);
    var_dump(commitComment(null));
      break;
  default:
    # code...
    break;
}

function commitComment($comment)
{
  // array("author"=>"庄少东","text"=>"庄少东新增的文件！")
  $array=array("author"=>"庄少东","text"=>"庄少东新增的文件！");
  array_push($data,$array);
  // $data[]=;
  return $data;
}
// print_r($data);
 ?>
