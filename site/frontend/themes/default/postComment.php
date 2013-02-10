<?php
    include("../../../kernel/kernel.php");
    
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $message = htmlspecialchars($_POST["message"]);
    $article = intval($_POST["article"]);
    
    if($user = App::getTable("user")->getBySanitizePseudo($pseudo) && $message != "" && $message != null){
	
	$attr = array();
	$attr["article"] = $article;
	$attr["author"] = $user->get("id");
	$attr["text"] = $message;
	$attr["deleted"] = 0;
	$attr["date"] = date("Y-m-d H:i:s");
	
	if($comment = App::getClass("comment")->hydrate($attr)->save()){
	    $url_image = get_url_image($comment->get("author"));
	    $alt_image = "avatar de " . $comment->get("author")->get("pseudo");
?>
	    <div class="one-comment">
		<div class="comment-user-image">
		    <img src="<?php echo $url_image; ?>" alt="<?php echo $alt_image;?>" width="100px" />
		</div>
		<div class="comment-body">
		    <div class="comment-header">
			<span class="author"><a href="<?php echo Kernel::getUrl("user/profil/" . $comment->get("author")->get("pseudo")); ?>"><?php echo $comment->get("author")->get("pseudo"); ?></a></span>
			<span class="date"><?php echo PUBLISH . " " . format_date($comment->get("date")); ?></span>
		    </div>
		    <p><?php echo $comment->get("text"); ?></p>
		</div>
		
		<div class="cl"></div>
	    </div>
<?php
	}
    }

?>
