<?php
class DBHelper{
    private static $server_name='localhost';
    private static $username='root';
    private static  $password='';
    private static $database='db4scrum';
    
    public function getConnect()
    {
        $conn= mysql_connect(self::$server_name,self::$username,self::$password);
        if (!$conn){
           die('Could not connect: ' . mysql_error());
         }
        return $conn;
    }
    
    //执行查询语句
    public static function Query($queryStr)
    {
        if ($queryStr=='') {
            return;
        }
        // var_dump($queryStr);die;
        $conn=self::getConnect();
        // mysql_query("SET NAMES 'GBK'");        
        $result= mysql_db_query(self::$database,$queryStr);
        $returnValue=array();
        while($row=mysql_fetch_array($result))
        {
            $returnValue[]=$row;
        }
        //释放资源
        mysql_free_result($result);
        //关闭连接
        mysql_close($conn);
        return $returnValue;
    }
    
    public static function Insert($value='')
    {
        if ($value=='') {
            return;
        }
        $conn=self::getConnect();
        mysql_select_db(self::$database,$conn);
        
        $return=mysql_query($value,$conn);
        //关闭连接
        mysql_close($conn);
        
        return $return;
    }
    
}

