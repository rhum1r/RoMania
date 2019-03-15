<!-- Schema type d'une page dont le contenu et le titre changent respectivement
     en fonction de la variable $content ( ob_start() ) et $title -->
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="/css/template.css" rel="stylesheet" />
        <link href="/css/<?= $css ?>" rel="stylesheet" />
    </head>
    
    <body>
        <header>
        <div id="upperNav">
        	<a href='/homepage'>
				<img id='logo' src="../images/logo/romania.png?" alt="logo 1" WIDTH=500 HEIGHT=200>
			</a>
		</div>
            <?= $content_nav ?>
        </header>
            
            
        <?= $content ?>
           

    </body>   
            
    <footer>
        <p>Copyright © 2018 - 2019 RoMania - Ltd - CAEN </p>
    </footer>
</html>