<?php

namespace PO\lib;
use PDO;

class DB
{
    private $host = "localhost";
    private $port = 3306;
    private $username = "root";
    private $password = "";
    private $dbName = "collection_db";

    private \PDO $connection;

    public function __construct(
        string $host = "",
        int $port = 3306,
        string $username = "",
        string $password = "",
        string $dbName = ""
    )
    {
        if(!empty($host)) {$this->host = $host;}
        if(!empty($port)) {$this->port = $port;}
        if(!empty($username)) {$this->username = $username;}
        if(!empty($password)) {$this->password = $password;}
        if(!empty($dbName)) {$this->dbName = $dbName;}

        try {
            $this->connection = new \PDO(
                "mysql:host=$this->host;dbname=$this->dbName;charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertMenuItem(string $page_name, string $page_url): bool
    {
        $sql = "INSERT INTO menu(page_name, page_url) VALUE ('" . $page_name . "', '" . $page_url . "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getMenuItems(): array
    {
        $sql = "SELECT page_name, page_url FROM menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $finalMenu = [];

        foreach ($data as $menuItem) {
            $finalMenu[$menuItem['page_name']] = $menuItem['page_url'];
        }

        return $finalMenu;
    }

    public function getMenu(): array
    {
        $sql = "SELECT * FROM menu";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function getMenuItem(int $id): array
    {
        $sql = "SELECT * FROM menu WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function deleteMenuItem(int $id): bool
    {
        $sql = "DELETE FROM menu WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateMenuItem(int $id, string $pageName = "", string $url = ""): bool
    {
        $sql = "UPDATE menu SET ";
        if(!empty($pageName)) {
            $sql .= " page_name = '" . $pageName . "'";
        }
        if(!empty($url)) {
            $sql .= ", page_url = '" . $url . "'";
        }
        $sql .= " WHERE id = ". $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }


    public function getPopularImg(): array {
        $sql = "SELECT popular_img.statue_id as statue_id, statue.name as name, statue.description as description, statue.img_url as img FROM statue INNER JOIN popular_ing ON statue.id=popular_img.statue_id ORDER BY RAND()";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $popularImg = [];

        foreach ($data as $statueItem) {
            $popularImg[] = [
                'statue_id' => $statueItem['statue_id'],
                'name' => $statueItem['name'],
                'description' => $statueItem['description'],
                'img' => $statueItem['img']
            ];
        }
        return $popularImg;
    }

    public function updatePopularImg(array $selectedImg): void {
        $sqlDelete = "DELETE FROM popular_img";
        $this->connection->query($sqlDelete);
        $sql = "INSERT INTO popular_img (statue_id) VALUES (:statueID)";
        $stmt = $this->connection->prepare($sql);

        foreach ($selectedImg as $statueID) {
            $stmt->bindValue(':statueID', $statueID, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
    public function isPopularImg(int $statueID): bool {
        $sql = "SELECT COUNT(*) FROM popular_img WHERE statue_id = :statueID";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':statueID', $statueID, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        return ($count > 0);
    }
    public function getStatues() :array {
        $sql = "SELECT * FROM statue";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
    public function getStatue(int $id): array
    {
        $sql = "SELECT * FROM statue WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function deleteStatue(int $id): bool
    {
        $sql = "DELETE FROM statue WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function insertStatue(string $name, string $type, string $manufacturer, string $price,string $category,string $img_url): bool
    {
        $sql = "INSERT INTO statue(name, type, manufacturer, price, category_id, img_url) VALUE ('" . $name . "', '" . $type . "','" . $manufacturer . "', '".$price."', '".$category."','".$img_url."')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function updateStatue(int $id, string $name = "", string $type = "",string $manufacturer = "", string $price = "", string $category = "",string $img_url = ""): bool
    {
        $sql = "UPDATE statue SET ";
        if (!empty($name)) {
            $sql .= " name = '" . $name . "'";
        }
        if (!empty($type)) {
            $sql .= ", type = '" . $type. "'";
        }
        if (!empty($manufacturer)) {
            $sql .= ", manufacturer = '" . $manufacturer . "'";
        }
        if (!empty($price)) {
            $sql .= ", price = '" . $price . "'";
        }
        if (!empty($category)) {
            $sql .= ", category_id = '" . $category . "'";
        }
        if (!empty($img_url)) {
            $sql .= ", img_url = '" . $img_url . "'";
        }

        $sql .= " WHERE id = " . $id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function getRandomImage(int $categoryId): string
    {
        $sql = "SELECT * FROM statue
            WHERE category_id = :categoryId
            ORDER BY RAND()
            LIMIT 1";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':categoryId', $categoryId, \PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $data['img_url'];
    }

    public function getCategories() :array {
        $sql = "SELECT * FROM category";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }
    public function getCategory(int $id): array
    {
        $sql = "SELECT * FROM category WHERE id = ".$id;
        $query = $this->connection->query($sql);
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function updateCategory(int $id, string $name = "", string $description = "", string $icon = ""): bool
    {
        $sql = "UPDATE category SET ";
        if (!empty($name)) {
            $sql .= " name = '" . $name . "'";
        }
        if (!empty($description)) {
            $sql .= ", description = '" . $description . "'";
        }
        if (!empty($icon)) {
            $sql .= ", icon = '" . $icon . "'";
        }
        $sql .= " WHERE id = " . $id;

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function deleteCategory(int $id): bool
    {
        $sql = "DELETE FROM category WHERE id = ".$id;
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }
    public function insertCategory(string $name, string $description, string $icon): bool
    {
        $sql = "INSERT INTO category(name, description, icon) VALUE ('" . $name . "', '" . $description . "', '" . $icon. "')";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute();
    }

    public function filterStatuesByCategory(): array{
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM statue WHERE category_id = " . $category_id;
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function getCategoriesWithCount(): array
    {
        $sql = "SELECT c.*, COUNT(s.id) AS item_count
            FROM category c
            LEFT JOIN statue s ON c.id = s.category_id
            GROUP BY c.id
            HAVING item_count > 0";
        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function getStatuesWithCategory(): array
    {
        $sql = "SELECT s.*, c.name as category_name
            FROM statue s
            LEFT JOIN category c ON s.category_id = c.id";

        $query = $this->connection->query($sql);
        $data = $query->fetchAll(\PDO::FETCH_ASSOC);

        return $data;
    }

}