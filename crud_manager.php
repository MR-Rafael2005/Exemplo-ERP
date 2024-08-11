<?php
    /**
     * CRUD Library (pq colocar "Biblioteca" é cringe)
     */
     
     //Insere o $data em forma de array no $filePath, retornando True ou False
    function Insert(string $filePath, array $data) : bool
    {
        try
        {
            $archive = fopen($filePath.".txt", "a+");
            $str = implode(" / ", $data);
            fwrite($archive, $str."\n");
            fclose($archive);
            return true;
        } catch(Exception $e) {
            echo $e;
            return false;
        }
    }

    //Pega os dados de uma array em um arquivo e retorna uma array ou False
    function Read(string $filePath)
    {
        $archiveData = file($filePath.".txt");
        
        if($archiveData)
        {
            
                $toReturn = [];

                foreach($archiveData as $row)
                {
                    $line = explode(" / ", $row);
                    $toReturn[] = $line;
                }

                return $toReturn;
            
        } else {
            return null;
        }
    }

    //Pega os dados e substitui por novos destruino e recriando o arquivo
    function Update(string $file, int $key, array $newData):bool {

        $allData = file($file.".txt");

        if(isset($allData[$key])){
            $allData[$key] = implode(" / ", $newData)."\n";
        }else{
            
            return false;
        }
        
        unlink($file.".txt");
        
        $archive = fopen($file.".txt", "a+");

        $string = implode("", $allData);
        
        fwrite($archive, $string);

        fclose($archive);
        
        return true;
        
    
    }

    //Pega os dados e os deleta depois recriando o arquivo
    function Delete(string $filePath, int $key)
    {
        $archiveData = file($filePath.".txt"); 

        if(isset($archiveData[$key]))
        {
            unset($archiveData[$key]);
        } else {
            return false;
        }

        unlink($filePath.".txt");

        $archive = fopen($filePath.".txt", "a+");

        $data = implode("", $archiveData);

        fwrite($archive, $data);

        fclose($archive);

        return true;
    }
?>