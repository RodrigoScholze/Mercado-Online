<?php
    require_once 'products.php';

    interface shoppingCart_template{
        function show(): array;
        function total(): array;
        function findShoppingCart($productID): array;
        function add($productID, $amount): bool;
        function remove($productID): bool;
    }

    class shoppingCart extends products implements shoppingCart_template {
        public $dbInstance;

        function __construct($pdoInstance){
            $this->dbInstance = $pdoInstance;
        }

        public function findShoppingCart($productID): array{
            $query = $this->dbInstance->prepare("SELECT id_products FROM shoppingcart WHERE id_products = :id");
            $query->execute([
                ':id' => $productID
            ]);
            $array = $query->fetchAll(PDO::FETCH_ASSOC);

            return $array;
        }

        public function show(): array{
            $query = $this->dbInstance->prepare("SELECT id_products, name, type, amount, value, tax FROM shoppingcart");
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $array;
        }

        public function total(): array{
            $query = $this->dbInstance->prepare("SELECT value, tax FROM shoppingcart");
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);

            $arraySize = count($array) - 1;
            $totalsArray[0] = 0;
            $totalsArray[1] = 0;

            for ($i = 0; $i <= $arraySize; $i++) {
                $totalsArray[0] = $totalsArray[0] + $array[$i]["value"];
                $totalsArray[1] = $totalsArray[1] + $array[$i]["tax"];
            }
            
            return $totalsArray;
        }

        public function add($productID, $amount): bool{
            $productArray = $this->findByID($productID);
            $productArraySize = count($productArray);

            if($productArraySize > 0){
                
                $id = $productArray[0]["id_products"];
                $name = $productArray[0]["name"];
                $type = $productArray[0]["type"];
                $value = $productArray[0]["value"];
                $taxPercent = $this->findType($type)["tax"];
                $tax = ($taxPercent * $value / 100);

                try{
                    $query = "INSERT INTO shoppingcart (id_products, name, type, amount, value, tax) VALUES (:id, :name, :type, :amount, :value, :tax)";
                    $this->dbInstance->prepare($query)->execute([                    
                        ':id' => $id,
                        ':name' => $name,
                        ':type' => $type,
                        'amount' => $amount,
                        ':value' => $value * $amount,
                        ':tax' => $tax * $amount
                    ]);

                    return true;
                }catch(PDOException $error){
                    return false;
                }

                return true;
            }else{
                return false;
            }
        } 
        
        public function remove($productID): bool{
            $shoppingCartArray = $this->findShoppingCart($productID);
            $arraySize = count($shoppingCartArray);

            if($arraySize > 0){
                try{
                    $query = "DELETE FROM shoppingcart WHERE id_products = :id";
                    $this->dbInstance->prepare($query)->execute([
                        ':id' => $productID
                    ]);

                    return true;
                }catch(PDOException $error){
                    return false;
                }
            }else{
                return false;
            }
        }
    }






