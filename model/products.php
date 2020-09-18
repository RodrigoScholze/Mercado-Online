<?php
    require_once 'types.php';

    interface products_template{
        function findByID($productID): array;
        function showAll(): array;
        function register($productName, $productType, $productValue): bool;
        function modify($productID, $productName, $productType, $productValue): bool;
        function delete($productID): bool;
    }

    class products extends types implements products_template{
        public $dbInstance;

        function __construct($pdoInstance){
            $this->dbInstance = $pdoInstance;
        }

        public function findByID($productID): array{
            $query = $this->dbInstance->prepare("SELECT id_products, name, value, type, tax FROM products INNER JOIN types ON products.typeID = types.id WHERE id_products = :id");
            $query->execute([
                ':id' => $productID
            ]);
            $array = $query->fetchAll(PDO::FETCH_ASSOC);

            return $array;
        }

        public function showAll(): array{
            $query = $this->dbInstance->prepare("SELECT id_products, name, value, type FROM products INNER JOIN types ON products.typeID = types.id");
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $array;
        }

        public function register($productName, $productType, $productValue): bool{
            if($productType){
                $productID = uniqid();
                $typeID = $this->findType($productType)["id"];
                try{
                    $query = "INSERT INTO products (id_products, name, value, typeID) VALUES (:id, :name, :value, :typeID )";
                    $this->dbInstance->prepare($query)->execute([                    
                        ':id' => $productID,
                        ':name' => $productName,
                        ':value' => $productValue,
                        ':typeID' => $typeID,
                    ]);
    
                    return true;
                }catch(PDOException $error){
                    return false;
                }
            }else{
                return false;
            }
        }

        public function modify($productID, $productName, $productType, $productValue): bool{
            $productArray = $this->findByID($productID);
            $arraySize = count($productArray);

            if($arraySize > 0 || $productType != NULL){
                try{
                    $typeID = $this->findType($productType)["id"];
                    $query = "UPDATE products SET name = :name, value = :value, typeID = :typeID WHERE id_products = :id";
                    $this->dbInstance->prepare($query)->execute([
                        ':id' => $productID,
                        ':name' => $productName,
                        ':value' => $productValue,
                        ':typeID' => $typeID
                    ]);
    
                    return true;
                }catch(PDOException $error){
                    return false;
                }
            }else{
                return false;
            }
        }

        public function delete($productID): bool{
            $productArray = $this->findByID($productID);
            $arraySize = count($productArray);

            if($arraySize > 0){
                $query = "DELETE FROM products WHERE id_products = :id";
                $this->dbInstance->prepare($query)->execute([
                    ':id' => $productID
                ]);

                return true;
            }else{
                return false;
            }
        }
    }