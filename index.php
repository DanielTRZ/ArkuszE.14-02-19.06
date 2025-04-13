<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset='utf-8'>
<title>Hurtownia Papiernicza</title>
<link rel='Stylesheet' href='styl.css'>
</head>
<body>
<div id='baner'>
<h1>W naszej hurtowni kupisz najtaniej</h1>
</div>
	
<div id='lewy'>
<h3>Ceny wybrancyh artykułów w hurtowni:</h3>
<?php   
        	
$connect=mysqli_connect('localhost','root','','bazasklep')or die ("Błąd połączenia :".mysqli_error());
$q1=mysqli_query($connect,'SELECT nazwa, cena FROM towary WHERE id <= 4'); 
		
echo'<table>
			<tr>
			</tr>';		
			while($data = mysqli_fetch_assoc($q1))
			{
				echo '<tr>
	                   			<td>'.$data['nazwa'].'</td>
						<td>'.$data['cena'].' '.'zł'.'</td>
				     </tr>';
			}
			
		echo '</table>';
			
		?>	
	</div>
	
	<div id='srodek'>
		<h3>Ile będą kosztować Twoje zakupy?</h3>
		<form method='post' action='index.php'>
			wybierz artykuł <select name='wybart'>
			<option value='Zeszyt 60 kartek'>Zeszyt 60 kartek</option>
		        <option value='Zeszyt 32 kartki'>Zeszyt 32 kartki</option>
		        <option value='Cyrkiel'>Cyrkiel</option>
			<option value='Linijka 30 cm'>Linijka 30cm</option>
			<option value='Ekierka'>Ekierka</option>
		        <option value='Linijka 50 cm'>Linijka 50cm</option>
							</select><br>
			liczba sztuk: <input type='number' value='1' name='sztuk'><br>
			<input type='submit' value='OBLICZ'>
		</form>
	
		<?php 
            $connect=mysqli_connect('localhost','root','','bazasklep')or die ("Błąd połączenia :".mysqli_error());
			$wybart = $_POST['wybart'];
           
			$sztuk = $_POST['sztuk'];
         
			$q=mysqli_query($connect,"SELECT cena from towary where nazwa='$wybart'");
			$dane=mysqli_fetch_assoc($q);
           // $dane=mysqli_fetch_array($q);
			echo '<p>'.round(($sztuk*$dane['cena']),1).'</p>';
		?>			
			
	</div>
	
	<div id='prawy'>
		<img src='zakupy2.png' alt='hurtownia'>
		<h3>Hurtownia</h3>
		<p>telefon:<br>111222333<br>e-mail:<br><a href='mailto:hurt@wp.pl'>hurt@wp.pl</a>
	</div>
	
	<div id='stopka'>
		<h4>Witrynę wykonał 00000000000</h4>
	</div>
</body>
</html>
