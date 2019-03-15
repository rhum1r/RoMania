<!-- Contenu et titre de la page d'accueil -->

<?php
$title = 'RoMania';
$css = 'homepage.css';

ob_start()?>



<div id="dowNav">
</div>

<?php

$content_nav = ob_get_clean();


ob_start()?>

<div id='carrousel'></div>

<div id='mainContent'>
            
     <?php foreach($games as $game){ ?>
		
		<div class ="article">
    		<div class = 'cover'> 
        		<a href = 'game/<?= $game['id'] ?>'>
        			<img class='article' src="<?= $game['image_url'] ?>"
        			alt="<?= $game['game_name'] ?> image" WIDTH=220 HEIGHT=280
        			title="<?= $game['game_name'] ?>" >
        			
        			<div class ="shadow">
        				<span class = "price"><?= $game['price']?> euros</span>   				
        			</div>
        		</a>
        	</div>
    	
    		
    		<a class = "buyBut" href = '/game/<?= $game['id'] ?>'>Acheter</a>
		
		</div>

	<?php } ?>
</div>

<div id='opinions'></div>

<script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
<script src="../js/homepage.js"></script> 

<?php $content = ob_get_clean(); ?>

<?php include 'template.php'; ?>
