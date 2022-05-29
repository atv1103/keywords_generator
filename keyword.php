<?php
$input1 = htmlspecialchars($_POST['first']);
$input2 = htmlspecialchars($_POST['second']);
$input3 = htmlspecialchars($_POST['third']);

$array1 = explode(',', $input1);
$array2 = explode(',', $input2);
$array3 = explode(',', $input3);
$array_minus_words = array();
$array_result = array();

for ($i = 0; $i < count($array1); $i++){
    if (iconv_strlen($array1[$i]) < 2){
        $array1[$i] = "+" . $array1[$i];
    }
    for ($j = 0; $j < count($array2); $j++){
        if (iconv_strlen($array2[$j]) < 2){
            $array2[$j] = "+" . $array2[$j];
        }
        for ($k = 0; $k < count($array3); $k++){
            if (iconv_strlen($array3[$k]) < 2){
            $array3[$k] = "+" . $array3[$k];
            }
            array_push($array_result, $array1[$i], $array2[$j], $array3[$k] . '<br>');
            // удаление элемента в итоговом массиве $array_result
            for ($x = 0; $x < count($array_result); $x++){
                if (str_starts_with($array_result[$x], '-')){
                    $delete_element = $array_result[$x];
                    array_push($array_minus_words, $array_result[$x]);
                    // TODO: удалить <br>
                    $array_result = \array_diff($array_result, [$delete_element]);
                    // удаление символов, кроме указанных и сравнение на уникальность
                    $array_result = preg_replace('/[^0-9a-zA-Zа-яА-Я!+]/', ' ', $array_result);
                }
                $result = array_merge($array_result, $array_minus_words);
                if (count($array_minus_words) !=  0){
                    for($y = 0; $y < count($array_minus_words); $y++){
                        if(isset($array_minus_words[$y], $array_result)){
                            $error = "слово $array_minus_words[$y] не уникально";
                            echo "<span style='color:red'>$error</span>";
                            echo '<br>';
                            echo '<br>';
                        // for($Y = 0; $Y < count($array_result); $Y++){
                        // $test = $array_minus_words[$y];
                        // echo substr($test, strrpos($test, $array_result[$Y]));
                        // }
                        }
                    } 
                    $result = array_merge($array_result, $array_minus_words);
                }
            }
            echo implode(" ", $result);
            $array_minus_words = array();
            $array_result = array();
            
        }
    }
}
?>

