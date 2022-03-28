<?php

class DataBase
{
    private $dsn;
    private  $user;
    private  $password;

    function __construct($dsn, $user, $password){
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect(){
        $db = new PDO($this->dsn, $this->user, $this->password);
        $this->db = $db;
    }

    public function insert_into_users(...$args){
        $query = "INSERT INTO `users` (`name`, `password`, `email`, `room`, `photo`) VALUES(?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($args);
    }

    public function draw_the_table($table_name, ...$args){
        echo "<table border='2'><tr>";
        for($i = 0; $i < count($args);$i++){
            echo"<th>$args[$i]</th>";
        }
        echo '<th>Image</th>';
        echo '<th>Edit</th>';
        echo '<th>Delete</th>';
        echo '</tr>';
        $query = "SELECT * FROM $table_name;";
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        while ($obj = $stmt -> fetchObject()) {
            echo '<tr>';
            for ($i = 0; $i < count($args);$i++){
                echo '<td>';
                $something = $args[$i];
                echo $obj->$something;
                echo '</td>';
            }
            echo "<td><img src='Images/$obj->photo' style='width:50px;height:50px'></td>";
            echo "<td><a href='Edit.php?id=".$obj->id."'>Edit</a></td>";
            echo "<td><a href='Delete.php?id=".$obj->id."'>Delete</a></td>";
            echo'</tr>';
        }
        echo '</table>';
    }

    public function delete($table_name, $id){
        $query = "DELETE FROM $table_name WHERE id=$id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function update($table_name, $id, ...$args){
        $query = "UPDATE $table_name SET ";
        for($i = 0; $i < count($args); $i+=2){
            $some_number = $i + 1;
            if($some_number == count($args) - 1)
            {
                $query .= "`$args[$i]`"."="."'$args[$some_number]' ";
            }
            else{
                $query .= "`$args[$i]`"."="."'$args[$some_number]', ";
            }
        }
        $the_int_id = (int) $id;
        $query .= "WHERE id=$the_int_id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public function fetch_name($id){
        $query ="SELECT `name` FROM users WHERE id= $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0][0];
    }

    public function select_row($id){
        $query ="SELECT * FROM users WHERE id= $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}