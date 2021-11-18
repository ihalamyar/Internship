<?php

class Post
{
    private  $db = null;
    public $error = array();
    public $titleError = '';
    public $postError = '';
    public $postImageError = '';
    public $priceError = '';
    public $successPosts = '';
    public $event_image_error = '';
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getConnection()
    {
        return $this->db;
    }
    public function fetch_data($table)
    {
        try {

            $sql = "SELECT * FROM $table ";
            $query = $this->db->getmyDB()->prepare($sql);
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) { // here! as simple as that
                array_push($this->error, 'no post has been posted');
            } else {
                return $row;
            }
        } catch (PDOException $th) {
            //throw $th;
        }
    }

    // load all posts based on id
    public function fetchById($table, $id)
    {
        try {
            $sql = "SELECT * FROM $table WHERE user_id =? LIMIT 1";
            $stmt = $this->db->getMyDB()->prepare($sql);
            $stmt->execute(array($id));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (\PDOException $th) {
        }
    }

    // related posts
    public function relatedPost($table)
    {
        try {
            $sql = "SELECT * FROM $table ORDER BY  RAND()   LIMIT 4";
            $stmt = $this->db->getMyDB()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (\PDOException $th) {
        }
    }
    public function fetch_payments()
    {
        try {
            $sql = "SELECT * FROM users right JOIN  enroll ON users.id=enroll.user_id ORDER BY enroll.status ASC";
            $stmt = $this->db->getMyDB()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (\PDOException $e) {
        }
    }
    public function join_event()
    {
        try {
            $sql = "
               SELECT * FROM event INNER  JOIN  join_event ON event.event_id=join_event.join_event_id 
                INNER JOIN users ON join_event.user_id=users.id ORDER BY event.event_status  ASC
            ";
            $stmt = $this->db->getMyDB()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } catch (\PDOException $e) {
        }
    }

    // join three tables 
    public function joinTables()
    {
        try {

            $sql = "SELECT * FROM users  INNER JOIN profiles ON users.id=profiles.user_id  
            INNER JOIN posts ON users.id=posts.author_id ORDER BY posts.created_at DESC";
            $query = $this->db->getmyDB()->prepare($sql);
            $query->execute();
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            if (!$row) { // here! as simple as that
                // array_push($this->error, 'no post has been posted');
                return false;
            } else {
                return $row;
            }
        } catch (PDOException $th) {
            //throw $th;
        }
    }

    public function profile($id)
    {
        $sql = "SELECT * FROM users LEFT JOIN profiles ON users.id=profiles.user_id WHERE users.id = ? ";
        $stmt = $this->db->getMyDB()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }

    // insert new post
    public function register($posts)
    {
        try {
            foreach ($posts as $key => $value) {
                if ($key == 'title') {
                    if (trim($value) == "") {
                        $this->titleError = 'Write your title';
                    }
                }
                if ($key == 'body') {
                    if (trim($value) == "") {
                        $this->postError = 'Write your description';
                    }
                }
                if ($key == 'file') {
                    if (trim($value) == "") {
                        $this->postImageError = 'No image selected';
                    }
                }
                if ($key == 'project_price') {
                    if (trim($value) == "") {
                        $this->priceError = 'The project price ?';
                    }
                }
            }
            if ($this->titleError == "" && $this->postError == "" && $this->priceError == "") {
                $file_name = ($_FILES['file']['name']);
                $file_ext = explode('.', $file_name);
                $file_actual_ext = strtolower(end($file_ext));
                $file_allowed = array('png', 'jpg', 'jpeg', 'gif');
                $new_file = time() . mt_rand() . '.' . $file_actual_ext;
                $path = "../../public/post_images/" . $new_file;
                if (in_array($file_actual_ext, $file_allowed)) {
                    if (move_uploaded_file(($_FILES['file']['tmp_name']), $path)) {
                        $sql = "INSERT INTO posts (title,  body, author_id, post_image,  price) 
                        VALUES(:title, :body, :author_id,  :new_file,  :project_price)";
                        $stmt = $this->db->getmyDB()->prepare($sql);
                        $data = array();
                        $data['title'] = $posts['title'];
                        $data['body'] = $posts['body'];
                        $data['author_id'] = $posts['author_id'];
                        $data['new_file'] = $new_file;
                        $data['project_price'] = $posts['project_price'];
                        $result = $stmt->execute($data);
                        if ($result) {
                            $this->successPosts = '<div class="alert alert-info"> Post uploaded</div>';
                        } else {
                            $this->successPosts = '<div class="alert alert-info"> Post not uploaded</div>';
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            $this->successPosts = '<div class="alert alert-info">Something went wrong</div>';
        }
    }
    // make event 
    public function event($posts)
    {
        try {
            $file_name = ($_FILES['event_image']['name']);
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));
            $file_allowed = array('png', 'jpg', 'jpeg', 'gif');
            $new_file = time() . mt_rand() . '.' . $file_actual_ext;
            $path = "../../public/event_images/" . $new_file;
            if (in_array($file_actual_ext, $file_allowed)) {
                if (move_uploaded_file(($_FILES['event_image']['tmp_name']), $path)) {
                    $sql = "INSERT INTO event (event_title, event_description, event_speaker,  event_image, event_created_at, event_endded_at) 
                        VALUES(:event_title, :event_description, :event_speaker,  :new_file, :event_created_at, :event_endded_at)";
                    $stmt = $this->db->getmyDB()->prepare($sql);
                    $data = array();
                    $data['event_title'] = $posts['event_title'];
                    $data['event_description'] = $posts['event_description'];
                    $data['event_speaker'] = $posts['event_speaker'];
                    $data['new_file'] = $new_file;
                    $data['event_created_at'] = $posts['event_created_at'];
                    $data['event_endded_at'] = $posts['event_endded_at'];
                    $result = $stmt->execute($data);
                    if ($result) {
                        echo 'Event created';
                    } else {
                        echo 'Event did not create';
                    }
                }
            }
        } catch (PDOException $e) {
            echo 'Something went wrong' . $e->getMessage();
        }
    }

    // end make event 
    public function validated($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
}
