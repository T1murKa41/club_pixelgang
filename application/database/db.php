<?php
    session_start();
    
    require 'connect.php';

    function printUser($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    function dbError($request) {
        $errorIn = $request->errorInfo();

        if ($errorIn[0] !== PDO::ERR_NONE) {
            echo $errorIn[2];
            exit();
        }

        return true;
    }

    function allSelect($table, $params=[]) {
        global $pdo;

        $query = "SELECT * FROM $table";

        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'".$value."'";
                }
                if ($i === 0) {
                    $query = $query . " WHERE $key=$value";
                } else {
                    $query = $query . " and $key=$value";
                }
                $i++;
            }
        }

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);
        return $request->fetchAll();
    }

    function oneSelect($table, $params=[]) {
        global $pdo;

        $query = "SELECT * FROM $table";

        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'".$value."'";
                }
                if ($i === 0) {
                    $query = $query . " WHERE $key=$value";
                } else {
                    $query = $query . " and $key=$value";
                }
                $i++;
            }
        }

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);
        return $request->fetch();
    }

    function insert($table, $params) {
        global $pdo;

        $i = 0;
        $col = '';
        $mask = '';

        foreach ($params as $key=>$value) {
            if ($i === 0) {
                $col = $col . "$key";
                $mask = $mask . "'$value'";
            } else {
                $col = $col . ", $key";
                $mask = $mask . ", '$value'";
            }
            $i++;
        }


        $query = "INSERT INTO $table ($col) VALUE ($mask)";

        $request = $pdo->prepare($query);
        $request->execute($params);

        dbError($request);

        return $pdo->lastInsertId();
    }

    function update($table, $id, $params) {
        global $pdo;

        $i = 0;
        $str = '';

        foreach ($params as $key=>$value) {
            if ($i === 0) {
                $str = $str . $key . " = '" .$value . "'";
            } else {
                $str = $str . ", " . $key . " = '" .$value . "'";
            }
            $i++;
        }


        $query = "UPDATE $table SET $str WHERE id=$id";

        $request = $pdo->prepare($query);
        $request->execute($params);

        dbError($request);
    }

    function delete($table, $id) {
        global $pdo;

        $query = "DELETE FROM $table WHERE id=$id";

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);
    }

    function allSelectPostUsers($table1, $table2) {
        global $pdo;

        $query = "SELECT 
                        t1.id,
                        t1.title,
                        t1.path_img,
                        t1.content,
                        t1.id_topic,
                        t1.published,
                        t1.created,
                        t2.name 
                  FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);

        return $request->fetchAll();
    }

    function allSelectPostAuthorIndex($table1, $table2) {
        global $pdo;

        $query = "SELECT p.*, u.name FROM $table1 AS p JOIN $table2 AS u ON p.id_user=u.id WHERE p.published=1";

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);

        return $request->fetchAll();
    }

    function allSelectPostAuthorOne($table1, $table2, $id) {
        global $pdo;

        $query = "SELECT p.*, u.name FROM $table1 AS p JOIN $table2 AS u ON p.id_user=u.id WHERE p.id=$id";

        $request = $pdo->prepare($query);
        $request->execute();

        dbError($request);

        return $request->fetch();
    }
?>