<!-- Contenu et titre de la page d'accueil -->

<?php

$title = "Acheter ". $game['game_name'];
$css = 'gamePage.css';

ob_start()?>
    <div id="dowNav">
    </div>

<?php
$content_nav = ob_get_clean();


ob_start()?>

    <div id='carrousel'></div>
    
    <div id='mainContent'>
    	

        <div id='upperContent'>       
        	<img id='cover' src="../<?= $game['image_url'] ?>"
        	alt="<?= $game['game_name'] ?> image" WIDTH=300 HEIGHT=400
        	title="<?= $game['game_name'] ?>" >
        	
        	<div id='infosPrice'>
        		<div id='infos'>
        			<h2><?= $game['game_name'] ?></h2>
        			<p> Plateforme : <img src="../images/logo/<?= $game['url_logo'] ?>" alt= <?= $game['name'] ?> 
        			  	WIDTH=70
                      	HEIGHT=60></p>	
        			<p> Date de sortie : 20 nov. 2009  </p>	
        			<p> 
        				langues | <span id='flags'><img alt="fr" src="/images/lang/fr.png" title="fr" WIDTH=20 HEIGHT=20> 
            						  	<img alt="" src="/images/lang/es.png" title="es" WIDTH=20 HEIGHT=20> 
            						  	<img alt="" src="/images/lang/jap.png" title="jap" WIDTH=20 HEIGHT=20> 
            						  	<img alt="" src="/images/lang/uk.png" title="uk" WIDTH=20 HEIGHT=20> 
            						  	<img alt="" src="/images/lang/it.png" title="it" WIDTH=20 HEIGHT=20>
            						  	<img alt="" src="/images/lang/ger.png" title="ger" WIDTH=20 HEIGHT=20></span>
        			</p>	
        			<a> Plus d'informations </a>
        		</div>
        		<div id='buy'>
            		<div id='priceWrapper'>
            		
            			<p id='priceTitle'> Prix de vente conseillé : <br/>
            			<span id='price'> <?= $game['price']. " &#x20AC"?> </span> </p>
            		</div>
            		<div id='butWrapper'>
            			   			
            			<a id='buyBut' href="#" rel='nofollow'>
            				<img alt="byingIcon" src="/images/icons/buy.png" WIDTH=30 HEIGHT=30> 
            				Acheter
            			</a>
            			<div id='buyButArrow'></div>
            			
            		</div>
            		
        		</div>
        	</div>
        </div>
        

       
        <div id='middleContent'>
        
	       	<div id='tabMenu'>
	       		<a class="tabs" id='selectedTab' href="#">Informations</a>
        		<a class="tabs" href="#">Configuration</a>    		
        		<a class="tabs" href="#">Commentaires</a> 		
        	</div>
			
    		<div class="tabContent" id='infosWrapper'>
    			<p><?= $game['descp']?></p>
    		</div>
    		
			<div class="tabContent" id='confWrapper'>
				<p class="confTitle">Configuration minimale*</p>
				<p class="conf"><?= $game['configMin']?></p>
				<p class="confTitle">Configuration recomandée*</p>
				<p class="conf"><?= $game['configRec']?></p>
			</div>
    		
			<div class="tabContent" id='comfWrapper'>
				
				     <?php 
				     if (empty($comments)) { ?>
				         <div id="noCommentMess">
				         	<p>Il n'y a pas encore de commentaires concernant <span><?= $game['game_name'] ?></span></p>
				         </div>
				         
				     <?php } ?>

				<div id="comments">
					<?php foreach($comments as $comment){ ?>
					<div class="comment">
						<div id="userImgDiv">
							<img id="userImg" alt="useImage" src="<?= $comment['user_img']?>"  height="90" width="90">
						</div>
						
						<div id="commentContent">
							<div>
								<p><?php for($i=0; $i<$comment['mark']; $i++ ){?>
								    <img alt="commentStar" src="../images/CommentNotes/staron.gif">
								<?php }?></p>
							</div>
							
							<div>
								<h4><?= $comment['author'] ?> </br><span id="commentDate"><?= $comment['date'] ?></span></h4>
							</div>
							
							<div>
								<p id="commentText"><?= $comment['comment'] ?></p>
							</div>
                        </div>
					</div>
					<?php } ?>
				</div>
				
				
				<form id="postComment" action="http://dev.romania.com/postComment/<?= $game['id'] ?>"  method="post">
                    
					<div class="postCommentSection" id="marks">
						<p>Definissez une note</p>


					</div >
                    
                    <div class="postCommentSection">
                        <label for='author'>Auteur</label><br />
                        <input type="text" id="author" name="author" />
                    </div>					

                    <div class="postCommentSection">
                        <label for="comment">Commentaire</label><br />
                        <textarea id="comment" name="comment"></textarea>
                	</div>
                	
                	<div class="postCommentSection" id="postCommentBut">
                		<input type="submit" value='envoyer'/>
                	</div>                	                    
                    
                    <?php if (isset($_SESSION['error_mess']))
                    {?>
                    	<p id="errorMess"><?= $_SESSION['error_mess'] ?></p>
                    <?php }?>
                </form> 
			</div>

    		
    	</div>
        
    
    </div>
    

    
    <script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
    <script src="../js/gamePage.js"></script> 
    
<?php $content = ob_get_clean(); ?>

<?php include 'template.php'; ?>
