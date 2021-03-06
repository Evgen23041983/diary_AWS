<?php
class User
{
    function generateHash($password) {
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
            return crypt($password, $salt);
        }
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) return true;
        else return false;
    }
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) return true;
        else return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }

    public static function checkUserEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }

    public static function checkUserLogin($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return true;
        else return false;
    }

    public static function register($login, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO users (login, email, password) VALUES (:login, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkUserDataHash($email)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM users WHERE email = :email';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) return false;
        else return true;
    }
       


    public static function checkUserMother($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = "mother"';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        return $user = $result->fetch();
        
    }

    public static function checkUserFather($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = "father"';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        return $user = $result->fetch();
        
    }

}

?>