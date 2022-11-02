<?php
    
    $_DATA = json_decode(file_get_contents("php://input"));
    $_DATA->accion = apache_request_headers()["accept"];
    class nombre{
        public function __construct(){}
        public function guardar(string $nombre, int $edad)
        {
            if(file_exists("data.json")){
                $data = json_decode(file_get_contents("data.json"));
                array_push($data, (object)["nombre"=>$nombre, "edad"=>$edad]);
                $file = fopen("data.json", "w+");
                fwrite($file, json_encode($data, JSON_PRETTY_PRINT));
                fclose($file);
            }else{
                $data = [];
                array_push($data, (object)["nombre"=>$nombre, "edad"=>$edad]);
                $file = fopen("data.json", "w+");
                fwrite($file, json_encode($data, JSON_PRETTY_PRINT));
                fclose($file);
            }
            return "Hoola soy guardar ".$_SERVER['HTTP_HOST'];
        }
        public function calcular(string $nombre, int $edad)
        {
            var_dump($data = json_decode(file_get_contents("data.json")));
            unlink("data.json");
            return "Hoola soy calcular ".$_SERVER['HTTP_HOST'];  
        }
    }
    $obj = new nombre();
    var_dump(call_user_func_array([$obj, $_DATA->accion], [$_DATA->nombre, $_DATA->edad]));

?>