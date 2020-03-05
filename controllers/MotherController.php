<?


class MotherController
{
    public function actionAdd()
    {
        if(isset($_POST['submitadd'])) {
            $task = $_POST['task'];
            Mother::InsertInfo($task);
            
    }

        if(isset($_POST['done']) && $_POST['done'] == 'yes') {
            $idd = $_POST['idd'];
            $done = 'Yes';
            Mother::CheckboxInfo($idd, $done);
        } else {
            $idd = $_POST['idd'];
            $done = 'No';
            Mother::CheckboxInfo($idd, $done);
    }

        
        require_once(ROOT . '/views/user/mother.php');
        return true;
    }
 }
?>