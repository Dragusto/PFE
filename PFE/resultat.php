<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
	$database = "piscine";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
$id = $_SESSION['id'];
$sql = "SELECT * FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$nom = $row['nom'];
$prenom = $row['prenom'];
$email = $row['email'];
$job = $row['travail'];
$birth = $row['date_de_naissance'];
$city = $row['ville'];
$adresse = $row['adresse'];

$id = $_SESSION['id'];

$sql = "SELECT  * FROM questionnaire WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row = mysqli_fetch_array($tab);
$r1 = $row['q1'];
$r2 = $row['q2'];
$r3 = $row['q3'];
$r4 = $row['q4'];

if ($r1<=450){$l1 = 'I';}
else{ $l1='E'; ;}
// 51x63 px  148x87 px
if ($r2<=450){$l2 = 'S';}
else{ $l2 = 'N';}
// 51x114 px  148x137 px
if ($r3<=450){$l3 = 'J';}
else{ $l3 = 'P';}
// 51x164px  148x186 px
if ($r4<=450){$l4 = 'F';}
else{ $l4 = 'T';}
?>

<head>
       
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/resultatcss.css" media="screen" type="text/css">
</head>

<header>
	<div class="titre">
        <p><img src= "image/intemento" width="500" height="150" alt="A 877x285 image"></p>    
    </div>
	<nav>
		<ul>
			<a href="sommaire.php">Acceuil </a>
			<!-- <a href="reseau.php">Reseau </a>
			 --><a href="emploi.php">Emploi </a>
			<!-- <a href="messagerie.php">Messagerie </a>
			<a href="notification.php">Notification </a>
			 --><a href="vous.php">Profil </a>
		</ul>
	</nav>
		
</header>
<div class="pr">
<p><img src = test/<?php echo $id;?> width="200" height="200" alt="A 200x200 image"></p>
</div>

<body>
		<h2>Résultat du test</h2>
<!-- Cas 1  Infirmier-->
		<?php
		if(($l1 == 'I') and ($l2 == 'S') and ($l3 == 'J') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un infirmier.</p>
			<p> Calme, gentil et consciencieux. Met généralement les besoins des autres avant les siens. Stable et pratique, ils apprécient la sécurité et les traditions. Monde intérieur riche d'observations sur les gens. Extrêmement perspicace sur les sentiments des autres.</p> 
			<?php
		}
		
		// Case 2 Exécutant
		
		if(($l1 == 'I') and ($l2 == 'S') and ($l3 == 'J') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un exécutant.</p>
			<p> Sérieux et calme, intéressé par la sécurité et la vie paisible. Extrêmement responsable et fiable. Pouvoir de concentration bien développé. Soutient les traditions et les choses établies. Bien organisés et travaillant dur, ils s'activent généralement vers des objectifs bien identifiés. Ils peuvent accomplir n'importe quelle tâche, d'une fois que toutes leurs idées y sont consacrées.</p> 
 
			<?php
		}

		// Cas 3 Gardien
		if(($l1 == 'E') and ($l2 == 'S') and ($l3 == 'J') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un gardien.</p>
			<p> Pratique, traditionnel et organisé. Susceptible d'être athlétique. Ne s'intéresse pas à la théorie ou l'abstraction à moins d'y voir une application pratique. A des visions claires de la façon dont les choses devraient être. Loyal, responsable et travailleur. Organise et exécute. «Bons citoyen» qui apprécie la sécurité et la vie paisible.</p> 

			<?php
		}

		//Cas 4 Aide à domicile
				if(($l1 == 'E') and ($l2 == 'S') and ($l3 == 'J') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un une personne aide à domicile.</p>
			<p> Chaleureux, populaire, et consciencieux. A tendance à faire passer les besoins des autres avant les siens. Sens des responsabilités et du devoir. Aime les traditions et la sécurité. A besoin de la gratitude des autres.</p> 

			<?php
		}

		//Cas 5 Mécanicien
		if(($l1 == 'I') and ($l2 == 'S') and ($l3 == 'P') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un mécanicien.</p>
			<p>Calme et réservé, intéressé par la façon dont les choses fonctionnent et la raison pour lesquelles elles fonctionnent. Excellentes compétences en mécanique. Prend des risques et vit le moment présent. Intéressé et talentueux dans les sports extrêmes. Simple dans ses désirs. Fidèles à ses pairs et à leurs systèmes de valeurs internes. Pas trop concerné par le respect des lois et des règles. Individuel et analytique, il excelle à trouver des solutions à des problèmes pratiques.</p> 

			<?php
		}


		//Cas 6 Homme d'action
		if(($l1 == 'E') and ($l2 == 'S') and ($l3 == 'P') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un homme d'action.</p>
			<p> Orienté vers l'action, axé sur les résultats immédiats. Ici-et-maintenant, ils prennent des risques en vivant un mode de vie trépidant. Extrêmement fidèle à ses pairs, mais peu respectueux des lois et des règles.</p> 

			<?php
		}

		//Cas 7 acteur
		if(($l1 == 'E') and ($l2 == 'S') and ($l3 == 'P') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un acteur.</p>
			<p>Ouvert aux gens, aime s'amuser et fait les choses par plaisir. Vit le moment présent et apprécie les nouvelles expériences. N'aime pas la théorie et les analyses. Aime venir en aide. Susceptible d'être le centre de l'attention dans des situations sociales. Bon sens commun et sens pratique.</p> 
			
			<?php
		}

		//Cas 8 Artiste
		if(($l1 == 'I') and ($l2 == 'S') and ($l3 == 'P') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un contemplatif.</p>
			<p> Calme, sérieux, sensible et gentil. N'aimez pas les conflits, et ne risque pas de faire des choses qui peuvent générer des conflits. Loyal et fidèle. Sens extrêmement bien développés, et apprécie l'esthétique. Pas intéressé à diriger ou contrôler les autres. Flexible et ouvert d'esprit. Susceptible d'être original et créatif. Profite de l'instant présent.</p> 

			<?php
		}

		//Cas 9 Directeur
		if(($l1 == 'E') and ($l2 == 'N') and ($l3 == 'J') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un directeur.</p>
			<p>Énergique et franc - il est amené à diriger. Excellente capacité à comprendre les problèmes organisationnels difficiles et à créer des solutions solides. Intelligent, il excelle habituellement à parler en public. Valorise les connaissances et les compétences, et a généralement peu de patience avec l'inefficacité ou la désorganisation.</p> 

			<?php
		}

		//Cas 10 Scientifique
		if(($l1 == 'I') and ($l2 == 'N') and ($l3 == 'J') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un scientifique</p>
			<p> Indépendant, original, analytique et déterminé.: Possède une raisonnement empirique. De facto, un scientifique aura plus tendance à mettre en avant les expériences que la simple théorie. Peut avoir une certaine distanciation émotive avec ses congénères. La vérité pour lui s'appuie sur les faits observables, il n'y a donc pas de place pour l'abstrait. Grande curiosité. Valorise les connaissances, les compétences et les structures. Aime trouver un sens derrière les évènements. Pense à long terme. Possède des exigences très élevées de performance. Leader naturel, mais préfère suivre un dirigeant, pour autant qu'il ait confiance en lui.</p> 
			<?php
		}

		//Cas 11 visionnaire
		if(($l1 == 'E') and ($l2 == 'N') and ($l3 == 'P') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un visionnaire.</p>
			<p> Créatif, débrouillard et intellectuellement rapide. Bonne culture générale. Aime débattre. Très excité par de nouvelles idées et des projets, mais peut négliger les aspects les plus courants de la vie. Généralement franc et affirmé. Aime les gens et les motive. Excellente capacité à comprendre les concepts et pour trouver des solutions.</p> 
			<?php
		}

		//Cas 12 penseur
		if(($l1 == 'I') and ($l2 == 'N') and ($l3 == 'P') and ($l4 == 'T'))
		{?>
			<p> Vous êtes un penseur.</p>
			<p> Logique, original et penseur créatif. Peut s'enflammer rapidement à propos de théories et d'idées. Très bon pour expliquer des théories. Valorise les connaissances, les compétences et la logique. Calme et réservé, difficile à connaître. Un penseur aura plus tendance à être observateur du monde autour de lui qu'être un acteur. Vous mettrez en avant tout les détails que les autres ne perçoivent pas.</p> 
			<?php
		}

		//Cas 13 Donateur
		if(($l1 == 'E') and ($l2 == 'N') and ($l3 == 'J') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un donateur.</p>
			<p> Populaire et sensible. Tourné vers l'extérieur, s'inquiétant de ce que les autres pensent et ressentent. Habituellement, il n'aime pas être seul. Il voit tout sous l'angle humain. Très efficace dans la gestion des personnes et pour mener des discussions de groupe. Aime venir en aide et place les besoins des autres avant les siens.</p> > 
			<?php
		}

		//Cas 14 Protecteur
		if(($l1 == 'I') and ($l2 == 'N') and ($l3 == 'J') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un protecteur.</p>
			<p> Original, sensible, c'est une force tranquille. Très intuitif avec les personnes et concerné par leurs sentiments. Sens des valeurs. Aime faire le bien. Préfère rester en retrait plutôt que de diriger.</p> 
			<?php
		}

		//Cas 15 Charismatique
		if(($l1 == 'E') and ($l2 == 'N') and ($l3 == 'P') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un charismatique.</p>
			<p> Enthousiaste et créatif. Capable de faire presque tout ce qui l'intéresse. Besoin de vivre conformément à ses valeurs intérieures. Excité par de nouvelles idées, mais ennuyé avec les détails. . Il a par contre un don presque naturel pour plaire aux gens qui l'entourent. Maîtrise parfaitement les situations ou il faut se mettre en avant et à une réflexion rapide lui permettant de s'adapter à n'importe quelle situation sociale. Il sait se présenter lui et ses projets sous le meilleur jour. Il peut néanmoins avoir un fort caractère et parfois avoir des difficultés à prendre en compte l'opinion de l'autre.
</p> 
			<?php
		}

		//Cas 16 idéaliste
		if(($l1 == 'I') and ($l2 == 'N') and ($l3 == 'P') and ($l4 == 'F'))
		{?>
			<p> Vous êtes un infirmier.</p>
			<p> Calme et réfléchi. Intéressé à servir l'humanité. Sens des valeurs bien développé, avec lesquelles ils s'efforce de vivre en conformité. Extrêmement fidèle. Souvent du talent pour écrire. Mentalement rapide et en mesure de déceler des opportunités. Aime comprendre et aider les gens. Son regard se focalise sur la beauté du monde et des individus, peut être de nature optimiste, il cherchera toujours la meilleure solution. Il peut être également très sévère avec lui-même ou ses proches si l'idéal qu'il cherche n'est pas atteint. La nature de son caractère fait qu'il peut être ambivalent, plus forte est sa recherche de l'idéal plus la chute est vertigineuse si il ne l'atteint pas. </p> 
			<?php
		}
		?>
		</br>
		<p>Introverti : vous réfléchissez posément avant d’agir, et ne craignez pas la solitude. Au contraire, vous défendez votre indépendance et observez beaucoup avant de vous engager. A la fin d'une mauvaise journée, vous aimez rester seul avec vous-même pour recharger vos batteries.</p>
		<p>Extraverti : vous allez plus vite vers les autres, vous aimez créer des liens et appartenir à un groupe. Vous parlez volontiers et vous vous exprimez spontanément sur des sujets variés. Vous puisez votre énergie dans le contact avec les autres.</p> </br>

		<p>Sensible : vous croyez ce que vous voyez. Attentif aux faits concrets, à la réalité que vous pouvez toucher, voir, vous êtes adepte du carpe diem : vous profitez de l’instant présent. Méthodique, vous avez le sens du détail et procède étape par étape.</p>
		<p>Intuitif : vous réfléchissez posément avant d’agir, et ne craignez pas la solitude. Au contraire, vous défendez votre indépendance et observez beaucoup avant de vous engager. A la fin d'une mauvaise journée, vous aimez rester seul avec vous-même pour recharger vos batteries. </p> </br>

		<p>Organisé : vous adorez suivre vos plans d’actions. Le repos vient après le travail et en est la récompense. Ponctuel, vous aimez vivre dans un cadre défini. Vous aimez par exemple préparer ses vacances à l’avance. vous n’appréciez guère les tergiversations : il faut prendre des décisions !</p>

		<p>Perceptif : vous préférez expérimenter autant que possible, vous êtes donc très ouverts aux changements. Vous êtes plutôt flexible, curieux et non conformiste. </p> </br>

		<p>Empathique : vous donnez la priorité à l’humain, au cœur. Plus subjectif dans vos décisions, vous êtes d’abord en quête d’harmonie. Diplomate et sensible, vous remarquez les qualités des gens et leur fait des compliments sans hésiter. Mais vous vous vexer aussi facilement. </p> 
		
		<p>Logique : vous jouez souvent l’avocat du diable car vous adorez argumenter et décortiquer les idées. Plutôt calme, vous cherchez la logique en tout et s’exprime de façon directe : toute vérité, ou presque, est bonne à dire. Quelle que soit la situation, vous souhaitez que justice soit faite de façon objective. Pour prendre une décision, vous pesez le pour et le contre et gardez la tête froide.</p>

	
	</body>

</html>