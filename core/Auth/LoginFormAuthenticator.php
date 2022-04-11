<?php

namespace Core\Auth;


use Core\Token\Token;
use Core\Session\Session;
use Core\FormBuilder\FormBuilder;
use Symfony\Component\HttpFoundation\Request;

class LoginFormAuthenticator 
{   
       
    /**
     * formulaire de connexion
     *
     * @return form
     */
    public static function login()
    { 
        $session = new Session();
        $token = Token::generateToken($session);
       
        $request = new Request;      
        $email = $request->get('email');
        $form = new FormBuilder();

        
        $form->startForm('/login', 'POST', 'login-form');
        $form->addFor( 'Email', '<h4>Votre email</h4>')
        ->addEmail('email',  $email ?? '', ['label' => 'Email', 'required' => true, 'class'=>'form-text', 'autofocus', 'placeholder' => 'exemple@domain.com'])
        ->addFor( 'Password', '<h4>Mot de passe</h4>')
        ->addPassword('password', '', ['label' => 'Password', 'required'=> true,  'class'=>'form-text','placeholder' => 'votre mot de passe'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }

    public static function createAgent()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        
        $form = new FormBuilder();

        $specialite = [
            'surveillance' => 'Surveillance',
            'assassinat' => 'Assassinat',
            'infiltration' => 'Infiltration',
            'terrorisme' => 'Terrorisme',
            'espionnage' => 'Espionnage',
            'détournement' => 'Détournement',
            'cyber-menaces' => 'Cyber-menaces',
            'Coup d\'Etat international' => 'Coup d\'Etat international',
            'sabotage' => 'Sabotage' 
        ];

        $nationalite = ['Afghan'=>'Afghan', 'Américaine'=>'Américaine','Albanais'=>'Albanais', 'Algérien'=>'Algérien', 'Allemand'=>'Allemand', 'Andorran'=>'Andorran', 'Angolais'=>'Angolais', 'Antiguais'=>'Antiguais', 'Argentin'=>'Argentin', 'Arménien'=>'Arménien', 'Australien'=>'Australien', 'Autrichien'=>'Autrichien', 'Azerbaïdjanais'=>'Azerbaïdjanais', 'Bahamien'=>'Bahamien', 'Bahreïniens'=>'Bahreïniens', 'Bangladais'=>'Bangladais', 'Barbadien'=>'Barbadien', 'Belge'=>'Belge', 'Belizien'=>'Belizien', 'Béninois'=>'Béninois', 'Bhoutanais'=>'Bhoutanais', 'Biélorusse'=>'Biélorusse', 'Birman'=>'Birman', 'Bolivien'=>'Bolivien', 'Bosniaque'=>'Bosniaque', 'Botswanais'=>'Botswanais', 'Brésilien'=>'Brésilien', 'Britannique'=>'Britannique', 'Brunei'=>'Brunei', 'Bulgare'=>'Bulgare', 'Burkinabé'=>'Burkinabé', 'Burunda'=>'Burunda', 'Cambodgien'=>'Cambodgien', 'Camerounais'=>'Camerounais', 'Canadien'=>'Canadien', 'Cap-verdien'=>'Cap-verdien', 'Centrafricain'=>'Centrafricain', 'Chilien'=>'Chilien', 'Chinois'=>'Chinois', 'Chypriote'=>'Chypriote', 'Colombien'=>'Colombien', 'Comorien'=>'Comorien', 'Congolais'=>'Congola', 'Française'=>'Française', 'Gabonais'=>'Gabonais', 'Gambien'=>'Gambien', 'Georgien'=>'Georgien', 'Ghanais'=>'Ghanais', 'Grenadien'=>'Grenadien', 'Guatemalte'=>'Guatemalte', 'Guinéen'=>'Guinéen', 'Guyanien'=>'Guyanien', 'Haïtien'=>'Haïtien', 'Hondurien'=>'Hondurien', 'Hongrois'=>'Hongrois', 'Indien'=>'Indien', 'Indonésien'=>'Indonésien', 'Irakien'=>'Irakien', 'Iranien'=>'Iranien', 'Irlandais'=>'Irlandais', 'Islandais'=>'Islandais', 'Israélien'=>'Israélien', 'Italien'=>'Italien', 'Ivoirien'=>'Ivoirien', 'Jamaïcain'=>'Jamaïcain', 'Japonais'=>'Japonais', 'Jordanien'=>'Jordanien', 'Kazakh'=>'Kazakh', 'Kenyan'=>'Kenyan', 'Kirghiz'=>'Kirghiz', 'Kiribati'=>'Kiribati', 'Kosovar'=>'Kosovar', 'Koweïtien'=>'Koweïtien', 'Laotien'=>'Laotien', 'Lesothan'=>'Lesothan', 'Libanais'=>'Libanais', 'Libérien'=>'Libérien', 'Liechtenstein'=>'Liechtenstein', 'Lituanien'=>'Lituanien', 'Luxembourgeois'=>'Luxembourgeois', 'Macédonien'=>'Macédonien', 'Malais'=>'Malais', 'Malawien'=>'Malawien', 'Maldivan'=>'Maldivan', 'Malgache'=>'Malgache', 'Malienne'=>'Malienne', 'Maltais'=>'Maltais', 'Marocain'=>'Marocain', 'Mauricien'=>'Mauricien', 'Mauritanien'=>'Mauritanien', 'Mexicain'=>'Mexicain', 'Micronésien'=>'Micronésien', 'Moldave'=>'Moldave', 'Monegasque'=>'Monegasque', 'Mongol'=>'Mongol', 'Monténégrin'=>'Monténégrin', 'Mozambicain'=>'Mozambicain', 'Namibien'=>'Namibien', 'Nauruan'=>'Nauruan', 'Néo-Zélandais'=>'Néo-Zélandais', 'Népalais'=>'Népalais', 'Nicaraguayen'=>'Nicaraguayen', 'Nigerien'=>'Nigerien', 'Nigérian'=>'Nigérian', 'Norvégien'=>'Norvégien', 'Omani'=>'Omani', 'Ougandais'=>'Ougandais', 'Ouzbek'=>'Ouzbek', 'Pakistanais'=>'Pakistanais', 'Palau'=>'Palau', 'Palestinien'=>'Palestinien', 'Panaméen'=>'Panaméen', 'Papouasie-Nouvelle-Guinée'=>'Papouasie-Nouvelle-Guinée', 'Paraguayen'=>'Paraguayen', 'Péruvien'=>'Péruvien', 'Philippin'=>'Philippin', 'Polonais'=>'Polonais', 'Portoricain'=>'Portoricain', 'Portugais'=>'Portugais', 'Qatar'=>'Qatar', 'Roumain'=>'Roumain', 'Russe'=>'Russe', 'Rwandais'=>'Rwandais', 'Saint-Lucien'=>'Saint-Lucien', 'Saint-Marinien'];
        $form->startForm('agent-add', 'POST', 'create form');
        $form->addFor( 'Nom', '<h4 class="m-3">Nom</h4>')
        ->addText('nom', '', ['label' => 'Nom', 'required' => true, 'class'=>'form-control ', 'autofocus', 'placeholder' => 'имя'])
        ->addFor( 'Prenom', '<h4 class="m-3">Prenom</h4>')
        ->addText('prenom', '', ['label' => 'Prenom', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя'])
        ->addFor( 'Date de naissance', '<h4 class="m-3">Date de naissance</h4>')
        ->addDate('date_naissance', '', ['label' => 'Date de naissance', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата рождения'])
        ->addFor( 'Code d\'identification', '<h4 class="m-3">Code d\'identification</h4>')
        ->addNumber('code_identification', '', ['label' => 'Code d\'identification', 'required'=> true,  'class'=>'form-control','placeholder' => 'Seul les chiffres sont autorisés'])
        ->addFor( 'Nationalité', '<h4 class="m-3">Nationalité</h4>')
        ->addSelect('nationalite',  [ 'class'=>'form-control'],$nationalite)
        ->addFor( 'Spécialité', '<h4 class="m-3">Spécialité</h4>')
        ->addSelect('specialite',  [ 'class'=>'form-control'],$specialite)
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }

   

    public static function createMission()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        $agents = listeAgent();
        foreach ($agents as $key => $value) {
           
            $liste_agent[] =  $agent[$value['id']] = $value['nom'].' '.$value['prenom'].'  '.$value['nationalite'].' '.$value['specialite'];
        }

        $cible = listeCible();
        foreach ($cible as $key => $value) {
           
            $liste_cible[] =  $cible[$value['id']] = $value['nom'].' '.$value['prenom'].'  '.$value['nationalite'];
        }
             
        
        
        $form = new FormBuilder();
        $type_mission = [
            'surveillance' => 'Surveillance',
            'assassinat' => 'Assassinat',
            'infiltration' => 'Infiltration',
            'terrorisme' => 'Terrorisme',
            'espionnage' => 'Espionnage',
            'cyber-menaces' => 'Cyber-menaces',
            'Coup d\'Etat international' => 'Coup d\'Etat international',
            'sabotage' => 'Sabotage'
        ];
        $Pays = [
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

        $form->startForm('mission-add', 'POST', 'missionAdd');
        $form->addFor( 'Titre', '<h4 class="m-3">Titre</h4>')
        ->addText('titre', '', ['label' => 'Titre', 'id'=>'titre', 'required'=> true,  'class'=>'form-control','placeholder' => 'Название'])
        ->addFor( 'Description', '<h4 class="m-3">Description</h4>')
        ->addTextarea('description', ['label' => 'Description', 'rows'=>"10",  'class'=>'form-control summernote','placeholder' => 'Описание'])
        ->addFor( 'Nom de code', '<h4 class="m-3">Nom de code</h4>')
        ->addText('nom_code', '', ['label' => 'Nom de code', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя кода'])
        ->addFor( 'Pays', '<h4 class="m-3">Pays</h4>')
        ->addSelect('pays', [ 'class'=>'form-control'], $Pays)
        ->addFor( 'Agents', '<h4 class="m-3">Agents</h4>')
        ->addSelect('states[]', [ 'class'=>'form-control js-basic-multiple' ,'multiple'=>'multiple'], $liste_agent ?? [])
        ->addFor( 'Contacts', '<h4 class="m-3">Contacts</h4>')
        ->addText('contacts', '', ['label' => 'Contacts', 'required'=> true,  'class'=>'form-control','placeholder' => 'Контакты'])
        ->addFor( 'Cibles', '<h4 class="m-3">Cibles</h4>')
        ->addSelect('cibles[]', [ 'class'=>'form-control js-basic-multiple','multiple'=>'multiple'], $liste_cible ?? [])
        ->addFor( 'Type de mission', '<h4 class="m-3">Type de mission</h4>')
        ->addSelect('type_mission',  [ 'class'=>'form-control'],$type_mission)
        ->addFor( 'Date de début', '<h4 class="m-3">Date de début</h4>')
        ->addDate('date_debut', '', ['label' => 'Date de début', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата начала'])
        ->addFor( 'Date de fin', '<h4 class="m-3">Date de fin</h4>')    
        ->addDate('date_fin', '', ['label' => 'Date de fin', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата окончания'])
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }


    public static function createCible()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        
        $form = new FormBuilder();

        $nationalite = ['Afghan'=>'Afghan', 'Américaine'=>'Américaine','Albanais'=>'Albanais', 'Algérien'=>'Algérien', 'Allemand'=>'Allemand', 'Andorran'=>'Andorran', 'Angolais'=>'Angolais', 'Antiguais'=>'Antiguais', 'Argentin'=>'Argentin', 'Arménien'=>'Arménien', 'Australien'=>'Australien', 'Autrichien'=>'Autrichien', 'Azerbaïdjanais'=>'Azerbaïdjanais', 'Bahamien'=>'Bahamien', 'Bahreïniens'=>'Bahreïniens', 'Bangladais'=>'Bangladais', 'Barbadien'=>'Barbadien', 'Belge'=>'Belge', 'Belizien'=>'Belizien', 'Béninois'=>'Béninois', 'Bhoutanais'=>'Bhoutanais', 'Biélorusse'=>'Biélorusse', 'Birman'=>'Birman', 'Bolivien'=>'Bolivien', 'Bosniaque'=>'Bosniaque', 'Botswanais'=>'Botswanais', 'Brésilien'=>'Brésilien', 'Britannique'=>'Britannique', 'Brunei'=>'Brunei', 'Bulgare'=>'Bulgare', 'Burkinabé'=>'Burkinabé', 'Burunda'=>'Burunda', 'Cambodgien'=>'Cambodgien', 'Camerounais'=>'Camerounais', 'Canadien'=>'Canadien', 'Cap-verdien'=>'Cap-verdien', 'Centrafricain'=>'Centrafricain', 'Chilien'=>'Chilien', 'Chinois'=>'Chinois', 'Chypriote'=>'Chypriote', 'Colombien'=>'Colombien', 'Comorien'=>'Comorien', 'Congolais'=>'Congola', 'Française'=>'Française', 'Gabonais'=>'Gabonais', 'Gambien'=>'Gambien', 'Georgien'=>'Georgien', 'Ghanais'=>'Ghanais', 'Grenadien'=>'Grenadien', 'Guatemalte'=>'Guatemalte', 'Guinéen'=>'Guinéen', 'Guyanien'=>'Guyanien', 'Haïtien'=>'Haïtien', 'Hondurien'=>'Hondurien', 'Hongrois'=>'Hongrois', 'Indien'=>'Indien', 'Indonésien'=>'Indonésien', 'Irakien'=>'Irakien', 'Iranien'=>'Iranien', 'Irlandais'=>'Irlandais', 'Islandais'=>'Islandais', 'Israélien'=>'Israélien', 'Italien'=>'Italien', 'Ivoirien'=>'Ivoirien', 'Jamaïcain'=>'Jamaïcain', 'Japonais'=>'Japonais', 'Jordanien'=>'Jordanien', 'Kazakh'=>'Kazakh', 'Kenyan'=>'Kenyan', 'Kirghiz'=>'Kirghiz', 'Kiribati'=>'Kiribati', 'Kosovar'=>'Kosovar', 'Koweïtien'=>'Koweïtien', 'Laotien'=>'Laotien', 'Lesothan'=>'Lesothan', 'Libanais'=>'Libanais', 'Libérien'=>'Libérien', 'Liechtenstein'=>'Liechtenstein', 'Lituanien'=>'Lituanien', 'Luxembourgeois'=>'Luxembourgeois', 'Macédonien'=>'Macédonien', 'Malais'=>'Malais', 'Malawien'=>'Malawien', 'Maldivan'=>'Maldivan', 'Malgache'=>'Malgache', 'Malienne'=>'Malienne', 'Maltais'=>'Maltais', 'Marocain'=>'Marocain', 'Mauricien'=>'Mauricien', 'Mauritanien'=>'Mauritanien', 'Mexicain'=>'Mexicain', 'Micronésien'=>'Micronésien', 'Moldave'=>'Moldave', 'Monegasque'=>'Monegasque', 'Mongol'=>'Mongol', 'Monténégrin'=>'Monténégrin', 'Mozambicain'=>'Mozambicain', 'Namibien'=>'Namibien', 'Nauruan'=>'Nauruan', 'Néo-Zélandais'=>'Néo-Zélandais', 'Népalais'=>'Népalais', 'Nicaraguayen'=>'Nicaraguayen', 'Nigerien'=>'Nigerien', 'Nigérian'=>'Nigérian', 'Norvégien'=>'Norvégien', 'Omani'=>'Omani', 'Ougandais'=>'Ougandais', 'Ouzbek'=>'Ouzbek', 'Pakistanais'=>'Pakistanais', 'Palau'=>'Palau', 'Palestinien'=>'Palestinien', 'Panaméen'=>'Panaméen', 'Papouasie-Nouvelle-Guinée'=>'Papouasie-Nouvelle-Guinée', 'Paraguayen'=>'Paraguayen', 'Péruvien'=>'Péruvien', 'Philippin'=>'Philippin', 'Polonais'=>'Polonais', 'Portoricain'=>'Portoricain', 'Portugais'=>'Portugais', 'Qatar'=>'Qatar', 'Roumain'=>'Roumain', 'Russe'=>'Russe', 'Rwandais'=>'Rwandais', 'Saint-Lucien'=>'Saint-Lucien', 'Saint-Marinien'];
        $form->startForm('cible-add', 'POST', 'create form');
        $form->addFor( 'Nom', '<h4 class="m-3">Nom</h4>')
        ->addText('nom', '', ['label' => 'Nom', 'required' => true, 'class'=>'form-control ', 'autofocus', 'placeholder' => 'имя'])
        ->addFor( 'Prenom', '<h4 class="m-3">Prenom</h4>')
        ->addText('prenom', '', ['label' => 'Prenom', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя'])
        ->addFor( 'Date de naissance', '<h4 class="m-3">Date de naissance</h4>')
        ->addDate('date_naissance', '', ['label' => 'Date de naissance', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата рождения'])
        ->addFor( 'Code d\'identification', '<h4 class="m-3">Code d\'identification</h4>')
        ->addNumber('code_identification', '', ['label' => 'Code d\'identification', 'required'=> true,  'class'=>'form-control','placeholder' => 'Seul les chiffres sont autorisés'])
        ->addFor( 'Nationalité', '<h4 class="m-3">Nationalité</h4>')
        ->addSelect('nationalite',  [ 'class'=>'form-control'],$nationalite)       
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }


    public static function createContact()
    {
        $session = new Session();
        $token = Token::generateToken($session); 
        
        $form = new FormBuilder();

        $nationalite = ['Afghan'=>'Afghan', 'Américaine'=>'Américaine','Albanais'=>'Albanais', 'Algérien'=>'Algérien', 'Allemand'=>'Allemand', 'Andorran'=>'Andorran', 'Angolais'=>'Angolais', 'Antiguais'=>'Antiguais', 'Argentin'=>'Argentin', 'Arménien'=>'Arménien', 'Australien'=>'Australien', 'Autrichien'=>'Autrichien', 'Azerbaïdjanais'=>'Azerbaïdjanais', 'Bahamien'=>'Bahamien', 'Bahreïniens'=>'Bahreïniens', 'Bangladais'=>'Bangladais', 'Barbadien'=>'Barbadien', 'Belge'=>'Belge', 'Belizien'=>'Belizien', 'Béninois'=>'Béninois', 'Bhoutanais'=>'Bhoutanais', 'Biélorusse'=>'Biélorusse', 'Birman'=>'Birman', 'Bolivien'=>'Bolivien', 'Bosniaque'=>'Bosniaque', 'Botswanais'=>'Botswanais', 'Brésilien'=>'Brésilien', 'Britannique'=>'Britannique', 'Brunei'=>'Brunei', 'Bulgare'=>'Bulgare', 'Burkinabé'=>'Burkinabé', 'Burunda'=>'Burunda', 'Cambodgien'=>'Cambodgien', 'Camerounais'=>'Camerounais', 'Canadien'=>'Canadien', 'Cap-verdien'=>'Cap-verdien', 'Centrafricain'=>'Centrafricain', 'Chilien'=>'Chilien', 'Chinois'=>'Chinois', 'Chypriote'=>'Chypriote', 'Colombien'=>'Colombien', 'Comorien'=>'Comorien', 'Congolais'=>'Congola', 'Française'=>'Française', 'Gabonais'=>'Gabonais', 'Gambien'=>'Gambien', 'Georgien'=>'Georgien', 'Ghanais'=>'Ghanais', 'Grenadien'=>'Grenadien', 'Guatemalte'=>'Guatemalte', 'Guinéen'=>'Guinéen', 'Guyanien'=>'Guyanien', 'Haïtien'=>'Haïtien', 'Hondurien'=>'Hondurien', 'Hongrois'=>'Hongrois', 'Indien'=>'Indien', 'Indonésien'=>'Indonésien', 'Irakien'=>'Irakien', 'Iranien'=>'Iranien', 'Irlandais'=>'Irlandais', 'Islandais'=>'Islandais', 'Israélien'=>'Israélien', 'Italien'=>'Italien', 'Ivoirien'=>'Ivoirien', 'Jamaïcain'=>'Jamaïcain', 'Japonais'=>'Japonais', 'Jordanien'=>'Jordanien', 'Kazakh'=>'Kazakh', 'Kenyan'=>'Kenyan', 'Kirghiz'=>'Kirghiz', 'Kiribati'=>'Kiribati', 'Kosovar'=>'Kosovar', 'Koweïtien'=>'Koweïtien', 'Laotien'=>'Laotien', 'Lesothan'=>'Lesothan', 'Libanais'=>'Libanais', 'Libérien'=>'Libérien', 'Liechtenstein'=>'Liechtenstein', 'Lituanien'=>'Lituanien', 'Luxembourgeois'=>'Luxembourgeois', 'Macédonien'=>'Macédonien', 'Malais'=>'Malais', 'Malawien'=>'Malawien', 'Maldivan'=>'Maldivan', 'Malgache'=>'Malgache', 'Malienne'=>'Malienne', 'Maltais'=>'Maltais', 'Marocain'=>'Marocain', 'Mauricien'=>'Mauricien', 'Mauritanien'=>'Mauritanien', 'Mexicain'=>'Mexicain', 'Micronésien'=>'Micronésien', 'Moldave'=>'Moldave', 'Monegasque'=>'Monegasque', 'Mongol'=>'Mongol', 'Monténégrin'=>'Monténégrin', 'Mozambicain'=>'Mozambicain', 'Namibien'=>'Namibien', 'Nauruan'=>'Nauruan', 'Néo-Zélandais'=>'Néo-Zélandais', 'Népalais'=>'Népalais', 'Nicaraguayen'=>'Nicaraguayen', 'Nigerien'=>'Nigerien', 'Nigérian'=>'Nigérian', 'Norvégien'=>'Norvégien', 'Omani'=>'Omani', 'Ougandais'=>'Ougandais', 'Ouzbek'=>'Ouzbek', 'Pakistanais'=>'Pakistanais', 'Palau'=>'Palau', 'Palestinien'=>'Palestinien', 'Panaméen'=>'Panaméen', 'Papouasie-Nouvelle-Guinée'=>'Papouasie-Nouvelle-Guinée', 'Paraguayen'=>'Paraguayen', 'Péruvien'=>'Péruvien', 'Philippin'=>'Philippin', 'Polonais'=>'Polonais', 'Portoricain'=>'Portoricain', 'Portugais'=>'Portugais', 'Qatar'=>'Qatar', 'Roumain'=>'Roumain', 'Russe'=>'Russe', 'Rwandais'=>'Rwandais', 'Saint-Lucien'=>'Saint-Lucien', 'Saint-Marinien'];
        $form->startForm('contact-add', 'POST', 'create form');
        $form->addFor( 'Nom', '<h4 class="m-3">Nom</h4>')
        ->addText('nom', '', ['label' => 'Nom', 'required' => true, 'class'=>'form-control ', 'autofocus', 'placeholder' => 'имя'])
        ->addFor( 'Prenom', '<h4 class="m-3">Prenom</h4>')
        ->addText('prenom', '', ['label' => 'Prenom', 'required'=> true,  'class'=>'form-control','placeholder' => 'Имя'])
        ->addFor( 'Date de naissance', '<h4 class="m-3">Date de naissance</h4>')
        ->addDate('date_naissance', '', ['label' => 'Date de naissance', 'required'=> true,  'class'=>'form-control','placeholder' => 'Дата рождения'])
        ->addFor( 'Code d\'identification', '<h4 class="m-3">Code d\'identification</h4>')
        ->addNumber('code_identification', '', ['label' => 'Code d\'identification', 'required'=> true,  'class'=>'form-control','placeholder' => 'Seul les chiffres sont autorisés'])
        ->addFor( 'Nationalité', '<h4 class="m-3">Nationalité</h4>')
        ->addSelect('nationalite',  [ 'class'=>'form-control'],$nationalite)       
        ->addToken( $token)
        ->addBouton('Envoyer', ['class'=>'btn-primary btn mb-3 mt-3 form-button wow fadeInUp animated'])
        ->endForm();
        return $form;
    }



}