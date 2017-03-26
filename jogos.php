<?php

include_once 'DataBase.php';

include_once 'TbJogo.php';

$tbTabela = new TbJogo();

for($x=1; $x <= 60; $x++){ $a[] = $x; }

inicio:

$array = array();

$y =1;

for( ; ; ):

    shuffle($a);

    $x=0;

    //echo $y,' | ';

    foreach($a as $valor){
        $b[] = $valor;
        $x++;
        if($x == 6){
            break;
        }
    }

    sort($b);

    if(!in_array($b,$array)){
        $array[] = $b;

        $numero = implode('-',$b);

        try {

            $tbTabela->save($numero);
        }catch (\PDOException $e){
            unset($b);
            goto inicio;
        }
    }else{
        echo 'Tem no array',PHP_EOL,PHP_EOL;

    }

    echo $y, ' | ', $numero , PHP_EOL;


    unset($b);

    $y++;

endfor;

?>
