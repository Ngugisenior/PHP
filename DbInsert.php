<?php
//require_once 'connection.php';

class DbInsert extends Connection
{
    private $title;
    private $task;

    public function __construct(){
        parent::conn();
    }

    // Insert
    public function Insert(){
        $sql = "INSERT INTO TODO (todoname, tododesc) VALUES ('$this->title', '$this->task')";
        $result = $this->conn()->query($sql);
        if(!$result){
            error_log( "<h1>Houston we have a problem!<h1></h1>".$this->conn()->error);
            exit(0);
        }
        else{
            error_log( "Houston we are good to go!");
        }
    }

    // Delete
    public function deleteTodo($t_id){
        $sql = "delete from todo where todoid = '$t_id'";
        $result = $this->conn()->query($sql);
        if(!$result){
            error_log(  "<h1>Houston we have a problem!<h1></h1>".$this->conn()->error);
            exit(0);
        }
        else{
            error_log( "Houston i am home!");
        }
    }

    // GETTERS;

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    //SETTERS

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}