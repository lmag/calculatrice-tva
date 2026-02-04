<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- v2 -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="Avec la calculatrice Tva, trouvez rapidement le montant des taxes ? 19,6% ,7% et 5,5% en HT et TTC."/>
<meta name="keywords" content="calculatrice, calcul tva, tva calcul, calculer tva, calculer la tva, calculer une tva, calculs tva, calcul, pourcentage, taxe, tva, ht,ttc"/>
<meta http-equiv="content-langage" content="fr"/>
<meta name="Identifier-URL" content="http://www.calculatrice-tva.com/"/>
<meta name="Robot" content="index,follow,all" />
<meta name="Reference" content="Calculatrice en ligne"/>
<title>Calculatrice TVA pour le calcul de la Tva et des taxes 19.6 et 5.5 en HT et TTC</title>
		<link rel="stylesheet" media="screen" type="text/css" title="design" href="css/style.css" />
		<script type="text/javascript" src="js/calcul.js"></script>			
		<script type="text/javascript" src="js/email.js"></script>			

<script type="text/javascript">

  var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-21866996-1']);
      _gaq.push(['_trackPageview']);

        (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		      })();

		      </script>
			  
</head>
<body>

<?php
$site = "http://www.calculatrice-tva.com/";
$mail = $_POST['tmail']; // D�claration de l'adresse de destination.
function euro($id)
{
	if (empty($id))
	{
		return($id = $id."Non voulu");
	}
	else
	{
		return ($id = $id." €");
	}
}
$_POST['ht'] = euro($_POST['ht']);
$_POST['tva'] = euro($_POST['tva']);
$_POST['ttc'] = euro($_POST['ttc']);

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui pr�sentent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====D�claration des messages au format texte et au format HTML.
$message_txt = "Conforme&acute;ment &agrave; votre demande, voici les montants que vous avez voulu recevoir par email :
				Montant HT : ".$_POST['ht'].", Montant TVA : ".$_POST['tva'].", Montant TTC : ".$_POST['ttc']." Taux avec lequel vous avez obtenu ces r&eacute;sultats : ".$_POST['taux']." %";
$message_html = 
'
<div class="body">
<br/><br/>
<h1 class="h1calc">Calculatrice TVA.com</h1>
<br/>
<table class="entete">
	<tr>
		<td>
			<h4>Conformément à votre demande, voici les montants que vous avez voulu recevoir :</h4>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr><td><h5>Taux avec lequel les éléments ci-dessous ont été calculés : </h5></td><td>'.$_POST["taux"].' %</td></tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr><td>Montant HT : </td><td>'.$_POST["ht"].'</td></tr>
				<tr><td>Montant TVA : </td><td>'.$_POST["tva"].'</td></tr>
				<tr><td>Montant TTC : </td><td>'.$_POST["ttc"].'</td></tr>
			</table>
		</td>
	</tr>
</table>
<br/><br/>
A bientôt sur <a href="'.$site.'">'.$site.'</a>
</div>
<br/><br/><br/>
</body>
</html>
';
//==========

//=====Cr�ation de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====D�finition du sujet.
$sujet = "Montants HT - TVA - TTC calcul&eacute;s sur www.calculatrice-tva.com";
//=========
 
//=====Cr�ation du header de l'e-mail.
$header = "From: \"calculatrice-tva.com\"<ne-pas-répondre@calculatrice-tva.com>".$passage_ligne;
$header.= "Reply-to: \"calculatrice-tva.com\" <no-replay@calculatrice-tva.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Cr�ation du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
?>

<div id="bandeau">
	<img src="img/titre.png" alt="titre" title="Calculatrice TVA" />
	
	<span class="bandeau_droite">
		<a href="https://www.calculatrice.eu/">Calculatrice EU</a> -
		<a href="https://www.calculatrice-imc.com/">Calculatrice IMC</a> -
		<a href="https://e-calculatrice.com/calculatrice-de-parts-sociales.html">Calculatrice de parts sociales</a> -
		<img src="img/favoris.png" alt="ajouterauxfavoris" class="favoris" id="imagefavori"  name="btn_favoris" onmouseover="document.btn_favoris.src='img/favoris_hover.png'"
		onmouseout="document.btn_favoris.src='img/favoris.png'" onclick="favoris()"/>
	</span>
</div>

<div id="corps_page">
	<h1>Indiquez le montant hors-taxe ou le montant TTC pour connaitre la TVA correspondante :</h1>
	<hr />

	<table>
		<tr>
			<td><h1>Montant H.T</h1></td>
			<td><h1>TVA : 
					<input type="text" value="19.6" readonly="readonly" size="2" id="taux" name="taux" class="taux" onkeyup="modiftaux()"/>
					<span style="font-family: Verdana, Arial; font-size: 22px;">%</span></h1></td>
			<td><h1>Montant T.T.C</h1></td>
		</tr>
		<tr>
			<td></td>
			<td align="left">
				<ul>
				<li><div class="btn_tva" id="tva21" onclick="txtva(this.id)">2,1%</div></li>
				<li><div class="btn_tva" id="tva55" onclick="txtva(this.id)">5,5%</div></li>		
				<li><div class="btn_tva" id="tva7" onclick="txtva(this.id)">7%</div></li>
				<li><div class="btn_tva" id="tva196" onclick="txtva(this.id)">19,6%</div></li>
				</ul>
			</td>
			<td></td>
		</tr>
		<tr>
			<td class="champs_tva">
				<div style="display: inline-block;">
				<input name="ht" id="ht" type="text" maxlength="30" onkeyup="converthttotva()" />
				<div class="btn_effacer" id="effacerht" onclick="effacer(this.id)" >x</div>
				</div>&#8364; <span style="color: #1b5072;">+</span> 
			</td>
			<td class="champs_tva">
				<div style="display: inline-block;">
				<input name="tva" id="tva" type="text" maxlength="30" onkeyup="gettva()" />
				<div class="btn_effacer" id="effacertva" onclick="effacer(this.id)" >x</div>
				</div>&#8364; <span style="color: #1b5072;">=</span>
			</td>
			<td class="champs_tva">
				<div style="display: inline-block;">
				<input name="ttc" id="ttc" type="text" maxlength="30" onkeyup="converttvatoht()" />
				<div class="btn_effacer" id="effacerttc" onclick="effacer(this.id)" >x</div>
				</div>&#8364;
			</td>
		</tr>
	</table>
	
	<div id="cadre_mail">
		<span style="font-size: 11px;">L'email a bien été envoyé, vous le recevrez dans quelques instants.</span>
		<input type="text" size="25" id="tmail" name="tmail" class="champs_mail" />
		<div class="btn_email" id="emmmail" onclick="email()"></div>
	</div>
	
	<div id="pub1">
		<script type="text/javascript">
			<!--
			google_ad_client = "ca-pub-3673257157177084";
			/* Annonce_calculatrice_tva_h */
			google_ad_slot = "0832487241";
			google_ad_width = 600;
			google_ad_height = 80;
			//-->
		</script>
		<script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
	
	<br /><hr />
	
	<div id="reseaux_soc">
		<table>
			<tr>
			<td align="right">
			<!--[if IE]>
			<iframe src="https://www.facebook.com/plugins/like.php?href=www.calculatrice-tva.com&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:35px;"
			  allowTransparency="true">
			</iframe>
			<![endif]-->
			<!--[if !IE]>-->
			<iframe src="http://www.facebook.com/plugins/like.php?href=www.calculatrice-tva.com&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:35px; margin: 0; padding: 0;">
			</iframe>
			<!--<![endif]-->
			
			</td>
			<td valign="top" align="right" width="100">
			<a href="https://twitter.com/share" class="twitter-share-button" id="TwitterShareButton" >Tweet</a>
			<script type="text/javascript">
			var ValidMe=document.getElementById("TwitterShareButton");
			ValidMe.setAttribute("data-count","horizontal");
			</script>
			<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
			</td>
			</tr>
		</table>
	</div>
</div> <!-- fin corps_page -->

<div id="pied_page">
	<h2>Voici une liste non-exhaustive des produits assujetis aux différentes TVA en vigueur :</h2>
	<table class="liste_tva">
			<tr>
				<td><h3>TVA à 2.1%</h3></td>
				<td class="bordure_tableau"><h3>TVA à 5.5%</h3></td>
				<td class="bordure_tableau"><h3>TVA à 7%</h3></td>
				<td class="bordure_tableau"><h3>TVA à 19.6%</h3></td>				
			</tr>
			<tr>
				<td>
					<ul>
						<li>Spectacles de cirques</li>
						<li>Produits de première nécessité : sucre, huile, farine</li>
						<li>Premières représentations théâtrales</li>
						<li>Médicaments remboursés par la sécurité sociale</li>
						<li>Presse</li>
					</ul>
				</td>
				<td class="bordure_tableau">
					<ul>
						<li>Eau</li>
						<li>Boissons non alcoolisées</li>
						<li>Produits alimentaires</li>
						<li>Bois de chauffage</li>
						<li>Engrais</li>
					</ul>
				</td>
				<td class="bordure_tableau">
					<ul>
						<li><a title="L'Atelier Gourmand Montpellier" href="https://www.lateliergourmand-montpellier.com" target="_blank">Restaurant</a></li>
						<li>L'hôtellerie</li>
						<li>Livres</li>
						<li>Transports de voyageurs</li>
						<li>Produits d'origine agricole</li>
					</ul>
				</td>
				<td class="bordure_tableau">
					<ul>
						<li><a title="Vente d'�chafaudages" href="https://www.btpdirect.com/categorie/echafaudages" target="_blank">Echafaudage</a></li>
						<li>Chocolats au lait</li>
						<li><a title="Menuiserie et fenetres " href="http://www.sonimen.fr" target="_blank">Menuiserie à Nimes</a></li>
						<li>Ventes à consommer sur place</li>
						<li><a title="Acheter carrelage haut de gamme" href="https://www.mamaison-online.com/categorie/carrelages/" target="_blank">Carrelage</a></li>
					</ul>
				</td>
			</tr>
	</table>
	
	<div class="definitions">
		<table>	
			<tr>
				<td><h2>Définitions :</h2></td>
			</tr>
			<tr>
				<td valign="top">
					<h3>Calculatrice:</h3>
					Machine de bureau qui effectue les quatre opérations arithmétiques, et parfois les dérivations, intégrations à partir d'informations alphanumériques.
				</td>
				<td valign="top">
					<h3>Hors taxe :</h3>
					Tarif qui ne tient pas compte des diff&eacute;rentes taxes qui viendront s'ajouter au montant pour obtenir le prix de vente.
				</td>
			</tr>
			<tr>
				<td valign="top">
					<h3>TVA :</h3>
					Impôt indirect sur les dépenses de consommation. Elle est payée par le consommateur et collectée par les entreprises
					qui participent au processus de production et de commercialisation. Le montant de la taxe est proportionnel au prix de vente hors taxe (HT).
				</td>
				<td valign="top">
					<h3>TTC :</h3>
					Abréviation de Toutes Taxes Comprises. Tarifcomprenant les différentes taxes ajoutée au tarif hors taxe.
				</td>
			</tr>
		</table>
	</div>
	
	<div id="info_pied_page">
	<a href="https://www.ethigestion.fr/nos-metiers/syndic-de-copropriete" target="_blank">Syndic Montpellier</a> - 
	<a title="école de commerce et management " href="https://www.idelca.fr" target="_blank">&Eacute;cole Idelca Montpellier</a> - 
	<a title="Louer votre maison en Espagne" href="https://www.villas-espagne.com" target="_blank">Location villa en Espagne</a> - 
	<a title="Siveco Solutions de GMAO" href="https://www.siveco.com/" target="_blank">Logiciel GMAO</a> - 
	<a title="Conseiller transport marchandises dangereuses" href="https://www.evarisk.com/prestations/conseiller-securite-adr" target="_blank">Conseiller sécurité ADR </a> - 
	<a title="Accessoires et pi?ces moto, scooter" href="http://www.alliance2roues.com" target="_blank">Pièces détachées scooter et moto </a>
	
	
	<p align="center">
	Design et développement <a href="https://www.eoxia.com" target="_blank">Eoxia - Montpellier</a>
	</p>
	
	<p align="center">
	<a href="https://validator.w3.org/check?uri=referer"><img
	src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
	</p>

	</div>

</div> <!-- pied_page -->


</body>
</html>


