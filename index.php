<?php include ("./cabecalho.php");?>

<?php

include "conexao.php";

if(isset ($_POST) && !empty($_POST)){
    $pergunta=$_POST["pergunta"];
    $a=$_POST["A"];
    $b=$_POST["B"];
    $c=$_POST["C"];
    $d=$_POST["D"];
    $e=$_POST["E"];
    $correta=$_POST["correta"];

    $query="insert into questoes (pergunta,a,b,c,d,e,correta)";
    $query=$query."values('$pergunta','$a','$b','$c','$d','$e','$correta')";
    $resultado=mysqli_query($conexao, $query);
}
?>

<form action="./index.php" method="post"> 

<label>Pergunta</label>
<br>
<textarea name="pergunta"></textarea>

<br><br>

<label>A)</label>
<input type="radio" name="correta" value="A"/>
<input type="text" name="A" />

<br><br>

<label>B)</label>
<input type="radio" name="correta" value="B"/>
<input type="text" name="B" />

<br><br>

<label>C)</label>
<input type="radio" name="correta" value="C"/>
<input type="text" name="C" />

<br><br>

<label>D)</label>
<input type="radio" name="correta" value="D"/>
<input type="text" name="D" />

<br><br>

<label>E)</label>
<input type="radio" name="correta" value="E"/>
<input type="text" name="E" />

<br><br>

<button type="submit" class="m-4 btn btn-success">Enviar Questao</button>

</form>

<form action="./resultado.php" method="POST">
<?php
    $query="select * from questoes order by rand() limit 10";
    $resultado=mysqli_query($conexao, $query);

    while($linha=mysqli_fetch_array($resultado)){
        ?>
            <div style="width:100%; border:1px solid;">
                <h1><?php echo $linha["pergunta"]; ?></h1>
                <blockquote class="blockquote mb-0">
                    <h3><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="A">
                        <?php echo "A) ".  $linha["a"] ?>
                    </h3>
                    <h3><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="B">
                        <?php echo "B) ".  $linha["b"] ?>
                    </h3>
                    <h3><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="C">
                        <?php echo "C) ".  $linha["c"] ?>
                    </h3>
                    <h3><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="D">
                        <?php echo "D) ".  $linha["d"] ?>
                    </h3>
                    <h3><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="E">
                        <?php echo "E) ".  $linha["e"] ?>
                    </h3>
                </blockquote>

                <br><br>
            </div>    
                
        <?php

    }

    ?>
    <form>
        <button type="submit" class="m-4 btn btn-success">Enviar Formulario</button>
    </form>
