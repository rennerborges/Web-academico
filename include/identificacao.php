    <ul class="collection" style="margin: 0px;">
    	<!-- Apenas no mobile -->
    	<li class="collection-item avatar hide-on-large-only">
    		<i class="material-icons circle pink lighten-1">assignment_ind</i>
    		<span class="title"><?php echo "$nome"; ?></span>
    		<?php
            $idUser = $_SESSION['id'];
    		$idTurma = $_SESSION['turma'];
    		$sql = "SELECT nome FROM turmas WHERE id = $idTurma ";
    		$q1 = mysqli_query($con,$sql);
    		$conteudo = mysqli_fetch_assoc($q1);
            $nomeTurma = $conteudo['nome'];
    		?>
    		<p>Matricula: <?php echo "$matricula"; ?><br>
    			Turma: <?php echo "$nomeTurma"; ?>
    		</p>
    	</ul>
