<?php

class crud {

    private $db;
    private $data;
    
    
    public function __construct($db, $post_data){
        $this->db = $db;
        $this->data = $post_data;
    }

    public function save(){

        
        $name = $this->data['userName'];
        $email = $this->data['email'];
        $date = $this->data['date'];
        $message = $this->data['message'];

        $sql_query = "INSERT INTO users (name, email, date, message) VALUES ('$name', '$email', '$date', '$message')";

        if ($this->db->query($sql_query) === TRUE) {
            $response = array('status' => 'success');
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => mysqli_error($this->db));
            echo json_encode($response);
        }
    }

    
    public function select(){
        $sql_query = "SELECT * FROM users ";
        $result = $this->db->query($sql_query);
        if ($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $date = $row['date'];
                    $message = $row['message'];
                    echo '
                        <tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$date.'</td>
                        <td>'.$message.'</td>
                        <td>
                            <button class="btn btn-primary"><a class="text-light" href="update.php?updateId='.$id.'">Update</a></button>
                            <button class="btn btn-danger" data-delete-id="'.$id.'">Delete</button>
                        </td>
                        </tr>';
                }
            } 
    }

    public function delete($id){
    $id = $id;
    $sql_query = "DELETE FROM users WHERE id = $id";
    if ($this->db->query($sql_query)){
        $response = array('status' => 'success');
        echo json_encode($response);
        } else {
        $response = array('status' => 'error', 'message' => mysqli_error($this->db->conn));
        echo json_encode($response);
        }
    }

    public function update(){
        $id = $this->data['id'];
        $name = $this->data['userName'];
        $email = $this->data['email'];
        $date = $this->data['date'];
        $message = $this->data['message'];

        $sql_query = "UPDATE users SET name = '$name', email = '$email', date = '$date', message = '$message' WHERE id = $id";

        if ($this->db->query($sql_query)) {

            $response = array('status' => 'success');
            echo json_encode($response);
            } else {
     
            $response = array('status' => 'error', 'message' => mysqli_error($this->db->conn));
            echo json_encode($response);
            }
    }

    public function getbyId($id){
        
        $id = $id;
        $sql_query = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql_query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

}
?>