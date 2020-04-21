<?php
echo '
<form method="post" action="">';
			if (isset($_SESSION['username']))
				{echo '<input type="hidden" name="username" value="'. $_SESSION['username'].'">
			<input type="hidden" name="player_id" value="'. $_SESSION['player_id'].'">';}
			echo '<input type="hidden" name="level" value="'. $_SESSION['level'].'">
			<input type="hidden" name="category" value="'. $_SESSION['category'].'">
			<input type="submit" name="play_again" id="btn" value="PLAY AGAIN">
		</form>';
		