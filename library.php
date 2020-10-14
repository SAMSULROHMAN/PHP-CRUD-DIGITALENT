<?php

class Library 
{
	public function __construct()
	{
		$host = "localhost";
		$dbname = "blog";
		$user = "root";
		$password = "";

		$this->db = new PDO("mysql:host={$host};dbname={$dbname}",$user,$password);
	}

	public function addData($title,$content)
	{

        $data = $this->db->prepare('INSERT INTO post (title,content) VALUES (?, ?)');
        
        $data->bindParam(1, $title);
        $data->bindParam(2, $content);

        $data->execute();
        return $data->rowCount();
	}

	public function show()
	{
		$query = $this->db->prepare("SELECT * FROM post");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
	}

	public function get_by_id($id)
	{
		$query = $this->db->prepare("SELECT * FROM post where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
	}

	public function update($id, $title, $content)
	{
		 $query = $this->db->prepare('UPDATE post set title=?,content=? where id=?');
        
        $query->bindParam(1, $title);
        $query->bindParam(2, $content);
        $query->bindParam(3, $id);

        $query->execute();
        return $query->rowCount();
	}

	public function delete($id)
	{
		$query = $this->db->prepare("DELETE FROM post where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
	}
}