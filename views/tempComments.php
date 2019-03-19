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

