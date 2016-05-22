<?php
include (dirname(__FILE__)."/Helper/DBHelper.php");
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
   echo getComments();
  break;
  case 'getTask':
   echo getTask();
  break;
    case 'addData':
    // print_r($data);
    $comment=array('author' =>$_REQUEST['author'] ,
                      'text'=>$_REQUEST['text'],
                       );
    echo commitComment($comment);
      break;
  default:
    # code...
    break;
}

function commitComment($comment)
{
  $insertStr="insert into story(story_name,remark) values('".$comment['author']."','".$comment['text']."')";
  if (DBHelper::Insert($insertStr)==1) {
    return getComments();
  }
}
// print_r($data);



function getComments($filter='')
{
  $queryStr='SELECT id,story_name as author,remark as text from story'.(($filter=='')?'':' where '.$filter);
  return json_encode(DBHelper::Query($queryStr));
}

function getTask()
{
  $queryStr='SELECT id task_id,story_name as task_name,remark as type from story';
  return json_encode(DBHelper::Query($queryStr));
}
 ?>
