<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
</head>

<body>
    <?php
        function esCapicua ($n){
            $esCapicua = true;
            if($n != voltea($n)){

            }
            

        }

        function esPrimo ($n){
            $esPrimo = true;
            for ($i=2; $i < $n ; $i++) { 
                if($n %$i == 0){
                    $esPrimo = false;
                }
            }
            // El 0 y el 1 no se consideran primos 
            if(($n == 0) ||($n == 1)){
                $esPrimo = false;
            }
            return $esPrimo;
        }


        function siguientePrimo ($n){
            while (!esPrimo($n++)) {};
            return $n;
        }

        function potencia ($base,$exponente){
            $potencia = 1;
            for ($i=0; $i < $exponente ; $i++) { 
                $potencia *= $base;
            }
            return $potencia; 
        }

        function voltea ($n){
            // $contador = digitos($n)
            $volteado = 0;
            // contador
            while ($n > 0) {
                $volteado = ($volteado*10)+($n%10);
                $n/=10;
                // $voltear =
                // contador--;
            }
            return $volteado;
        }

        function digitoN ($n, $digito){
            $n = voltea($n);
            while($digito-- > 0){
                $n /= 10;
            }    
            return ($n %10);
        }

        function posiciónDeDigito ($n, $digito){
            
        }

        function quitarPorDetras ($n, $digito){
            
        }

        function quitaPorDelante ($n, $digito){
            
        }

         function pegaPorDetras ($n1, $n2){
            
        }

         function pegaPorDelante ($n1, $n2){
            
        }

         function trozoDeNumero ($n, $nInicio, $nFin){
            
        }

        function juntaNumeros ($n1, $n2){
      
        }

    ?>
</body>

</html>