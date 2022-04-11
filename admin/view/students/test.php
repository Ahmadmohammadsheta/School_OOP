
<?php
class test{

    public function fetch_absence_as_Schoolroom($schoolrooms_id) {
        $data = null;
        $per_page = $this->fetch_absence_pagination($schoolrooms_id);
        $pages    = $this->pages_num_rows_pagination();
        
        $selectJoinData = "SELECT students.name, students.id , schoolrooms.schoolrooms_name, schoolrooms.schoolrooms_id 
                            FROM students
                            INNER JOIN schoolrooms
                            ON students.schoolroom_id=schoolrooms.schoolrooms_id
                            WHERE students.schoolroom_id=$schoolrooms_id LIMIT 0, $per_page 
                            ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $data[]   = $row;
                // print_r($data);echo "<pre>";
            }
        }
        return $data;                     
    }
    public function fetch_absence_pagination($schoolrooms_id) {
        $data = null;
        $selectJoinData = "SELECT students.id 
                            FROM students
                            INNER JOIN schoolrooms
                            ON students.schoolroom_id=schoolrooms.schoolrooms_id
                            WHERE students.schoolroom_id=$schoolrooms_id
                            ";
        if ($query = $this->connect->query($selectJoinData)) {
            while ($row   = mysqli_fetch_assoc($query)) {
                $num_rows = mysqli_num_rows($query);
                // print_r($data);echo "<pre>";
            }
        }
        return $num_rows;                     
    }

    public function pages_num_rows_pagination() {
        $select = "SELECT schoolrooms_name FROM schoolrooms";
        $query  = $this->connect->query($select);
        $num_rows = mysqli_num_rows($query);
        return $num_rows;
    }

    
}