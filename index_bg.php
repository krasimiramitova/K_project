<?php 
include 'includes/header.php';
include 'includes/function_guess_letter.php';
include 'includes/function_guess_word.php';
include 'includes/db_connect.php';
session_start();
echo '<div class="container">';
	echo '<div class="col-md-7 col-md-offset-1">'; 

	if ((isset($_POST['play']))||(isset($_SESSION['category'])))
		{if (isset($_POST['play'])){$_GET['letter']=NULL;}
		if (isset($_POST['username']))
	 		{$_SESSION['username']=$_POST['username'];}
		if (isset($_POST['player_id']))	
			{$_SESSION['player_id']=$_POST['player_id'];}
		if (!isset($_SESSION['level']))
			{if (isset($_POST['level']))
				{$_SESSION['level']=$_POST['level'];}
			else {$_SESSION['level']='easy';}
			}
		if (!isset($_SESSION['category']))
			{if (isset($_POST['category']))
				{$_SESSION['category']=$_POST['category'];}
			else {$_SESSION['category']='animal';}
			}
 			
		if (!isset($_SESSION['guess_letters'])) 
			{$_SESSION['guess_letters']=[];}			//an array that keeps all the picked letters from the form

		if (!isset($_SESSION['fails']))					//get data from database
			{if (isset($_SESSION['level']))
				{$level=($_SESSION['level']);}
			else {$level='easy';}
				
			switch ($level) 
				{case ('easy'):
					$fails=10;
					break;
				case ('medium'):
					$fails=8;
					break;
				case ('hard'):
					$fails=6;
					break;
				}
			$_SESSION['fails']=$fails;
			}

		include 'includes/read_from_words.php';
		
		if (!isset($_SESSION['word']))
			{
			$_SESSION['word']=mb_strtoupper($words[$num_game][1]); 		//makes the input uppercase 
			$count_empty=mb_strlen($_SESSION['word']);					//defining the length of the word}
			}

		//start the game
		include 'includes/insert_a_new_game_into_games_players.php'; 				
		//defining variables
		//nulling $mistake
		$mistake=0;	
		$play_status='playing';															
		//transforms the word's characters into an array
		
		if (!isset($_SESSION['arr'])) 
			{$_SESSION['arr']=preg_split('//u', $_SESSION['word'], null, PREG_SPLIT_NO_EMPTY);}		
		
		//an array that keeps the result of all right guesses in the word	
		
		if (!isset($_SESSION['guess_array'])) 
			{$_SESSION['guess_array']=[];
		//nulling   $guess_array depending on the word
			for ($i=0; $i<$count_empty; $i++)	
				{if ($_SESSION['arr'][$i]!=' ')
					{$_SESSION['guess_array'][$i]='_ ';}
				else
					{$_SESSION['guess_array'][$i]='<p></p>';}
				}
			}		
	
		//taking guess from $_GET and check if it is in the word ($_SESSION['arr'])
		if (isset($_GET['letter']))
			{$_SESSION['guess_letters'][]=$_GET['letter'];
			//taking result from guess function
			$result_guess=guess_letter($_GET['letter'], $_SESSION['arr'], $_SESSION['guess_array']);
		//checking if the guess is right		
			if (is_numeric($result_guess))		
		//new value for mistake if the guess isn't right
				{
		//		if (isset($_SESSION['username']))
		//			{echo "You almost guess, ".$_SESSION['username']."!";}
		//		else {echo "You almost guess! Try again!";}
				$mistake=$result_guess;	}
			else {$_SESSION['guess_array']=$result_guess;}								
		//new value for $guess_array if the guess is right
			}
		else {$_GET['letter']='';}
		$check_guess='';
		if (isset($_POST['fast_guess']))
			{
			$check_guess=guess_word($_POST['fast_guess'], $_SESSION['word']);
			}
		if ($check_guess=='wrong')
				{$mistake=1;}

//		if (isset($_SESSION['fails']))
//			{
				$_SESSION['fails']=$_SESSION['fails']-$mistake;
//			}	
		if (isset($_POST['save_game']))
			{$play_status='saved';}

		//count empty letters to check the need for repeat	
		$count_empty=0;													
		for ($h=0; $h<count($_SESSION['arr']); $h++)
			{
			if ($_SESSION['guess_array'][$h]=='_ ')
				{$count_empty++;}
			}
			
		//won/lost or continuing playing
		if (($count_empty==0)||($check_guess=='right'))
			{$play_status='won';}
		elseif ($_SESSION['fails']==0)
			{$play_status='lost';}
		else 	//see the guessings till now
			{echo '<h1>';
			for ($i=0; $i<count($_SESSION['arr']); $i++)
				{echo $_SESSION['guess_array'][$i];}
			echo '</h1>';
//			echo '</div>';
//			echo '<div class="col-md-8>';
			echo '<img src="img/'.$_SESSION['fails' ].'.jpg" alt="'.$_SESSION['fails'].'" height="100%" width="100%">';
			if ($_SESSION['fails']==1)
				{echo 'Имаш още '.$_SESSION['fails'].' допустими грешки .';}
			else {echo 'Имаш още '.$_SESSION['fails'].' допустими грешки.';}
			if ($_GET['letter']!=='')
				{if (isset($_SESSION['username']))
					{echo '<p>Направи нов опит,'.$_SESSION['username'].'!</p>';} 
				else {echo '<p>Направи нов опит!</p>';
					//var_dump($_GET);
					}
				}
			else 
				{if (isset($_SESSION['username']))
					{echo '<p>Направи опит,'.$_SESSION['username'].'!</p>';} 
				else {echo '<p>Направи опит!</p>';}
				}
			include 'includes/letter_table_en.php';							//letter table
			}
	

		
		if ($play_status!=='playing')				
			{switch ($play_status) 
				{
				case 'won':
					$play_status=3;
					echo '<img src="img/won.jpg" alt="won the game" height="100%" width="100%">';
					if (isset($_SESSION['username']))
						{echo '<p>Браво, ти спаси човека'.$_SESSION['username'].'!</p><p>Би ли искал да обесиш друг?</p>';
						}
					else
						{echo '<p>Браво, ти спаси човека!</p><p>Би ли искал да обесиш друг?</p>';
						echo '<p>You can <a class="btn btn-default" href="sign_up.php">Регистрирай се</a> or 
						<a class="btn btn-default" href="login.php">Влез в профила си</a> Ако искаш да получиш още опции.</p>';
						}
					break;
					case 'lost':
						$play_status=1;
						echo '<img src="img/hangman_family.jpg" alt="won the game" height="100%" width="100%">';
						if (isset($_SESSION['username']))
							{echo "<p>Семейството загуби един от своите членове</p><p>Би ли искал да спасиш друг,".$_SESSION['username']."?</p>";
							}
						else 
							{echo "<p>Семейството загуби един от своите членове</p><p>Би ли искал да спасиш друг?</p>";}
					break;
					case 'saved':
						$play_status=5;	
						if (isset($_SESSION['username']))
							{echo "<p>Ти запази играта си, ".$_SESSION['username'].".</p>";}
						else 
							{echo '<p>Можеш <a class="btn btn-default" href="sign_up.php">Да се регистрираш</a> или
					<a class="btn btn-default" href="login.php">да влезеш в профила си</a> Ако искаш да продължиш играта си по-късно.</p>';}	
				}

//			include 'includes/session_transmitt.php';
			echo '<form method="post" action="">';
			if (isset($_SESSION['username']))
				{echo 
					'<input type="hidden" name="username" value="'. $_SESSION['username'].'">
					<input type="hidden" name="player_id" value="'. $_SESSION['player_id'].'">';
				}
			echo '<input type="hidden" name="level" value="'. $_SESSION['level'].'">
			<input type="hidden" name="category" value="'. $_SESSION['category'].'">
			<input class="btn btn-default" type="submit" name="play" id="btn" value="PLAY AGAIN">
				</form>';
			include 'includes/function_update_status.php';
			session_destroy();
			}
		}	
	else 
		{echo "<h1>Добре дошъл в играта бесеница!</h1>
		<img src='img/words_hurt.jpg' alt='Words hurt!' height='100%' width='100%'>
			<p>Това е версия на класическата игра за познаване на думи наречена бесеница. Виждаш поредица от празни полета, които отговарят на определена дума или фраза и ти трябва да познаеш какви са буквите за да разкриеш скритата дума. Познаваш като избираш букви от таблица. Ако познаеш буква, която се съдържа в думата,тя се показва на празното място. Въпреки това, ако посочиш буква,която не се съдържа в думата, тогава малко по-малко обесваш човека. Когато човека е довършен,той бива обесен и ти губиш играта. Заради това играта се казва 'Бесеница'. Ако успееш да разкриеш всички букви в думата преди човека да е обесен, тогава си успял да го спасиш и си разкрил цялата дума. Можеш да се опиташ да познаеш цялата дума наведнъж като използваш предназначеното поле за бърз опит.</p>
			<p>Можеш да запазваш играта си. Също така можеш да видиш колко игри си изиграл,и колко от тях са спечелени или загубени. Можеш да предизвикваш други играчи с думи направени от теб.Всичко това важи само ако си се регистрирал или влязъл в профила си</p>
			<p>Имаш възможността да си избереш друг език,Ако не искаш да играеш на български език.</p>
			<p>Използвай бутоните за да използваш приложението!</p>
			<h2>Наслади се на играта!</h2>";
		}	
	echo '</div>';
	echo '<div class="col-md-3">';
		//link to the bulgarian version
		echo '<p><a class="btn btn-default" href="index.php"> Английски език</a></p>';
		//choose a level and a category
		if (!isset($_POST['play']))
			{echo '<form action="" method="post">';
				//check for username
				if (isset($_SESSION['username']))
					{echo 'Избери ниво и категория, '.$_SESSION['username'].'!<p>';}
				echo '<p>Избери ниво</p><p>';
				include 'includes/read_from_levels.php';
				echo '</p><p>Избери категория</p><p>';
				include 'includes/read_from_categories.php';
				echo '</p>';
			echo '<p><input class="btn btn-default" type="submit" name="play" value="Играй"></p>';
				echo '</form>';
			}
		else
			{	
		//check for spelling of the word before category
		if (substr($_SESSION['category'],0,1)=='a')
			{echo '<p class="menu">Играеш за да познаеш '.$_SESSION['category'].'. <p>';}
			else
			{echo '<p class="menu">Играеш за да познаеш '.$_SESSION['category'].'. <p>';}
		//echo '<p class="menu">level: '.$_SESSION['level'].'<p>';
		//echo 'login, register, choose: category&level,fast guess';
			echo '<form autocomplete="off" method="post" action="">
			<p>Fast guess</p>
			<input type="text" name="fast_guess">
			<p><input class="btn btn-default" type="submit" name="submit" id="btn" value="guess"></p>
			</form>';
			}
		if (!isset($_SESSION['player_id']))
			{echo '<p><a class="btn btn-default" href="pages/en/login.php">Влез в профила си</a></p>';
			echo '<p><a class="btn btn-default" href="sign_up.php">Регистрирай се</a></p>';
			}
		else 
			{echo '<p><a class="btn btn-default" href="logout.php">Излез от профила си</a></p>';
			echo '<p><a class="btn btn-default" href="challenge.php">Предизвикай</a></p>';
			}
		if (isset($_POST['play']))	
			{echo '<p><form method="post" action="">
			<input class="btn btn-default" type="submit" name="save_game" value="Запази">
			</form></p>';
			}
		if (isset($_SESSION['player_id']))
			{echo '<p><a class="btn btn-default" href="pages/en/home.php">Вкъщи</a></p>';
			}
	echo '</div>';

echo '</div>';
	
include 'includes/footer.php';