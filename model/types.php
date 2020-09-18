<?php
    interface types_template{
        function showTypes(): array;
        function findType($typeName): array;
        function createType($typeName, $percent): bool;
        function removeType($typeName): bool;
    }

    class types implements types_template{
        public $dbInstance;

        function __construct($pdoInstance){
            $this->dbInstance = $pdoInstance;
        }

        public function showTypes(): array{
            $query = $this->dbInstance->prepare("SELECT type, tax FROM types");
            $query->execute();
            $array = $query->fetchAll(PDO::FETCH_ASSOC);
            
            return $array;
        }
        
        public function findType($typeName): array{
            $query = $this->dbInstance->prepare("SELECT id, type, tax FROM types WHERE type = :type");
            $query->execute([
                ':type' => $typeName
            ]);
            $array = $query->fetchAll(PDO::FETCH_ASSOC);

            if(count($array) == 0){
                return array();
            }else{
                return $array[0];
            }
        }
        
        public function createType($typeName, $percent): bool{
            try{
                $query = "INSERT INTO types (type, tax) VALUES (:type, :tax)";
                $this->dbInstance->prepare($query)->execute([                    
                    ':type' => $typeName,
                    ':tax' => $percent
                ]);

                return true;
            }catch(PDOException $error){
                return false;
            }
        }

        public function removeType($typeName): bool{
            $type = $this->findType($typeName);
            $arraySize = count($type);

            if($arraySize > 0){
                try{
                    $query = "DELETE FROM types WHERE type = :type";
                    $this->dbInstance->prepare($query)->execute([
                        ':type' => $typeName
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