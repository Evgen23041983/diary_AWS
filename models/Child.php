<?php
class Child extends Model
{
    
    public static function GetInfo()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `tasks`WHERE `member`!="mother" AND `member`!="father"';
        $result = $db->query($sql);
        $index = array();
        $i=0;
        while($row=$result->fetch()) {
            $index[$i]['id'] = $row['id'];
            $index[$i]['task'] = $row['task'];
            $index[$i]['member'] = $row['member'];
            $i++;
        }
        return $index;
    }

    
    
}
?>