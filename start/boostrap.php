<?php declare(strict_types=1);

use Core\Flash\Flash;
use Core\Model\Model;
use Symfony\Component\HttpFoundation\Request;




// absolute path for css, js, image
function assets($path)
{
    $httpRequest  = Request::createFromGlobals();
    $baseUrl = $httpRequest->server->get('HTTP_HOST');
   
    $baseUrl = 'http://'.$baseUrl;
    return $baseUrl . $path;
}

function UpercaseFirst($string)
{
    return ucfirst($string);
}

function check_is_logged_in()
{
    $session = new \Core\Session\Session;
    if (!$session->get('user')) {
        header('Location: /login');
        exit();
    }
   
}


function dateFormate($date){
$originalDate = $date;
$timestamp = strtotime($originalDate); 
$newDate = date("m-d-Y", $timestamp );
return $newDate;
}

function get_flash_message_error(){
    if (!empty( $_SESSION['error'])):?>
        <div class="alert alert-danger">
            <?php echo Flash::getMessage('error'); ?>
        </div>
   <?php endif; 
}

function get_flash_message_success(){
    if (!empty( $_SESSION['success'])):?>
        <div class="alert alert-success">
            <?php echo Flash::getMessage('success'); ?>
        </div>
   <?php endif; 
}


function listeAgent() {
    $model = new Model();
    return $model->getAll('agent');
 
}


function listeContact() {
    $model = new Model();
    return $model->getAll('contact');
 
}

function listeCible() {
    $model = new Model();
    return $model->getAll('cible');
 
}

function Pays() {
 return [
        'Afghanistan' => 'Afghanistan',
        'Afrique du Sud' => 'Afrique du Sud',
        'Albanie' => 'Albanie',
        'Algérie' => 'Algérie',
        'Allemagne' => 'Allemagne',
        'Andorre' => 'Andorre',
        'Angola' => 'Angola',
        'Anguilla' => 'Anguilla',
        'Antarctique' => 'Antarctique',
        'Antigua-et-Barbuda' => 'Antigua-et-Barbuda',
        'Arabie saoudite' => 'Arabie saoudite',
        'Argentine' => 'Argentine',
        'Arménie' => 'Arménie',
        'Aruba' => 'Aruba',
        'Australie' => 'Australie',
        'Autriche' => 'Autriche',
        'Azerbaïdjan' => 'Azerbaïdjan',
        'Bahamas' => 'Bahamas',
        'Bahreïn' => 'Bahreïn',
        'Bangladesh' => 'Bangladesh',
        'Barbade' => 'Barbade',
        'Belgique' => 'Belgique',
        'Belize' => 'Belize',
        'Bénin' => 'Bénin',
        'Bermudes' => 'Bermudes',
        'Bhoutan' => 'Bhoutan',
        'Bolivie' => 'Bolivie',
        'Bosnie-Herzégovine' => 'Bosnie-Herzégovine',
        'Botswana' => 'Botswana',
        'Brésil' => 'Brésil',
        'Brunei' => 'Brunei',
        'Bulgarie' => 'Bulgarie',
        'Burkina Faso' => 'Burkina Faso',
        'Burundi' => 'Burundi',
        'Cambodge' => 'Cambodge',
        'Cameroun' => 'Cameroun',
        'Canada' => 'Canada',
        'Cap-Vert' => 'Cap-Vert',
        'Chili' => 'Chili',
        'Chine' => 'Chine',
        'Chypre' => 'Chypre',
        'Colombie' => 'Colombie',
        'Comores' => 'Comores',
        'Congo' => 'Congo',
        'Corée du Nord' => 'Corée du Nord',
        'Corée du Sud' => 'Corée du Sud',
        'Costa Rica' => 'Costa Rica',
        'Côte d\'Ivoire' => 'Côte d\'Ivoire',
        'Croatie' => 'Croatie',
        'Cuba' => 'Cuba',
        'Danemark' => 'Danemark',
        'Djibouti' => 'Djibouti',
        'Dominique' => 'Dominique',
        'Égypte' => 'Égypte',
        'Émirats arabes unis' => 'Émirats arabes unis',
        'Équateur' => 'Équateur',
        'Érythrée' => 'Érythrée',
        'Espagne' => 'Espagne',
        'Estonie' => 'Estonie',
        'États-Unis' => 'États-Unis',
        'Éthiopie' => 'Éthiopie',
        'Fidji' => 'Fidji',
        'Finlande' => 'Finlande',
        'France' => 'France',
        'Gabon' => 'Gabon',
        'Gambie' => 'Gambie',
        'Géorgie' => 'Géorgie',
        'Ghana' => 'Ghana',
        'Grèce' => 'Grèce',
        'Grenade' => 'Grenade',
        'Guatemala' => 'Guatemala',
        'Guinée' => 'Guinée',
        'Guinée-Bissau' => 'Guinée-Bissau',
        'Guyana' => 'Guyana',
        'Haïti' => 'Haïti',
        'Honduras' => 'Honduras',
        'Hongrie' => 'Hongrie',
        'Îles Cook' => 'Îles Cook',
        'Îles Marshall' => 'Îles Marshall',
        'Îles Salomon' => 'Îles Salomon',
        'Inde' => 'Inde',
        'Indonésie' => 'Indonésie',
        'Irak' => 'Irak',
        'Iran' => 'Iran',
        'Irlande' => 'Irlande',
        'Islande' => 'Islande',
        'Israël' => 'Israël',
        'Italie' => 'Italie',
        'Jamaïque' => 'Jamaïque',
        'Japon' => 'Japon',
        'Jordanie' => 'Jordanie',
        'Kazakhstan' => 'Kazakhstan',
        'Kenya' => 'Kenya',
        'Kirghizistan' => 'Kirghizistan',
        'Kiribati' => 'Kiribati',
        'Koweït' => 'Koweït',
        'Laos' => 'Laos',
        'Lesotho' => 'Lesotho',
        'Lettonie' => 'Lettonie',
        'Liban' => 'Liban',
        'Liberia' => 'Liberia',
        'Libye' => 'Libye',
        'Liechtenstein' => 'Liechtenstein',
        'Lituanie' => 'Lituanie',
        'Luxembourg' => 'Luxembourg',
        'Macédoine' => 'Macédoine',
        'Madagascar' => 'Madagascar',
        'Malaisie' => 'Malaisie',
        'Malawi' => 'Malawi',
        'Maldives' => 'Maldives',
        'Mali' => 'Mali',
        'Malte' => 'Malte',
        'Maroc' => 'Maroc',
        'Marshall' => 'Marshall',
        'Maurice' => 'Maurice',
        'Mauritanie' => 'Mauritanie',
        'Mexique' => 'Mexique',
        'Micronésie' => 'Micronésie',
        'Moldavie' => 'Moldavie',
        'Monaco' => 'Monaco',
        'Mongolie' => 'Mongolie',
        'Monténégro' => 'Monténégro',
        'Mozambique' => 'Mozambique',
        'Myanmar' => 'Myanmar',
        'Namibie' => 'Namibie',
        'Nauru' => 'Nauru',
        'Népal' => 'Népal',
        'Nicaragua' => 'Nicaragua',
        'Niger' => 'Niger',
        'Nigéria' => 'Nigéria',
        'Niue' => 'Niue',
        'Norvège' => 'Norvège',
        'Nouvelle-Zélande' => 'Nouvelle-Zélande',
        'Oman' => 'Oman',
        'Ouganda' => 'Ouganda',
        'Ouzbékistan' => 'Ouzbékistan',
        'Pakistan' => 'Pakistan',
        'Palaos' => 'Palaos',
        'Panama' => 'Panama',
        'Papouasie-Nouvelle-Guinée' => 'Papouasie-Nouvelle-Guinée',
        'Paraguay' => 'Paraguay',
        'Pays-Bas' => 'Pays-Bas',
        'Pérou' => 'Pérou',
        'Philippines' => 'Philippines',
        'Pologne' => 'Pologne',
        'Portugal' => 'Portugal',
        'Qatar' => 'Qatar',
        'République centrafricaine' => 'République centrafricaine',
        'République démocratique du Congo' => 'République démocratique du Congo',
        'République dominicaine' => 'République dominicaine',
        'République tchèque' => 'République tchèque',
        'Roumanie' => 'Roumanie',
        'Royaume-Uni' => 'Royaume-Uni',
        'Russie' => 'Russie',
        'Rwanda' => 'Rwanda',
        'Saint-Christophe-et-Niévès' => 'Saint-Christophe-et-Niévès',
        'Sainte-Lucie' => 'Sainte-Lucie',
        'Saint-Marin' => 'Saint-Marin',
        'Saint-Vincent-et-les-Grenadines' => 'Saint-Vincent-et-les-Grenadines',
        'Sainte-Hélène' => 'Sainte-Hélène',
        'Salvador' => 'Salvador',
        'Samoa' => 'Samoa',
        'Sao Tomé-et-Principe' => 'Sao Tomé-et-Principe',
        'Sénégal' => 'Sénégal',
        'Serbie' => 'Serbie',
        'Seychelles' => 'Seychelles',
        'Sierra Leone' => 'Sierra Leone',
        'Singapour' => 'Singapour',
        'Slovaquie' => 'Slovaquie',
        'Slovénie' => 'Slovénie',
        'Somalie' => 'Somalie',
        'Soudan' => 'Soudan',
        'Sri Lanka' => 'Sri Lanka',
        'Suède' => 'Suède',
        'Suisse' => 'Suisse',
        'Suriname' => 'Suriname',
        'Swaziland' => 'Swaziland',
        'Syrie' => 'Syrie', 
        'Tadjikistan' => 'Tadjikistan',
        'Tanzanie' => 'Tanzanie',
        'Tchad' => 'Tchad',
        'Thaïlande' => 'Thaïlande',
        'Timor-Leste' => 'Timor-Leste',
        'Togo' => 'Togo',
        'Tonga' => 'Tonga',
        'Trinité-et-Tobago' => 'Trinité-et-Tobago',
        'Tunisie' => 'Tunisie',
        'Turkménistan' => 'Turkménistan',   
        'Turquie' => 'Turquie',
        'Tuvalu' => 'Tuvalu',
        'Ukraine' => 'Ukraine',
        'Uruguay' => 'Uruguay',
        'Vanuatu' => 'Vanuatu',
        'Vatican' => 'Vatican',
        'Venezuela' => 'Venezuela',
        'Viêt Nam' => 'Viêt Nam',
        'Yémen' => 'Yémen',
        'Zambie' => 'Zambie',
        'Zimbabwe' => 'Zimbabwe',
    ];
 
}


function TypeMission(){
    return [
        'surveillance' => 'Surveillance',
        'assassinat' => 'Assassinat',
        'infiltration' => 'Infiltration',
        'terrorisme' => 'Terrorisme',
        'espionnage' => 'Espionnage',
        'cyber-menaces' => 'Cyber-menaces',
        'Coup d\'Etat international' => 'Coup d\'Etat international',
        'sabotage' => 'Sabotage'
    ];
}