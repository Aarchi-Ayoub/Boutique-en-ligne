-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 10 sep. 2020 à 15:40
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fitness_land`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `tcat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_blog` datetime NOT NULL,
  `photo_blog` varchar(255) NOT NULL,
  `blog_active` int(11) NOT NULL,
  `total_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `tcat_id`, `title`, `description`, `date_blog`, `photo_blog`, `blog_active`, `total_view`) VALUES
(9, 1, ' Tout sur les compléments alimentaires', 'Des millions de personnes dans le monde consomment des compléments alimentaires à des fins différentes; perte de poids pour construire des muscles, prendre du poids ou simplement maintenir un mode de vie sain. Associés à de bons exercices, les compléments alimentaires donnent des résultats plus que satisfaisants.\nQu\'est-ce qu\'un complément alimentaire?\n\nOn appelle complément alimentaire toutes les sources concentrées de nutriments, tels que les protéines, les vitamines et les minéraux, et d\'autres substances à des fins nutritionnelles ou physiologiques. Le but de ces suppléments est de compenser les carences de l\'alimentation régulière d\'une personne.\n\nL\'astuce consiste à comprendre ce que chaque supplément offre. Si vous recherchez une boisson magique ou un élixir pour tous vos objectifs de remise en forme, vous vous trompez déjà. Les compléments visent à améliorer les résultats d\'un exercice et d\'un régime et ne remplacent jamais un effort ou un repas.\n\nAvec autant de suppléments sur le marché, cela peut sembler difficile lorsque vous essayez de choisir celui qui vous convient. Pas de panique, voici quelques conseils pour choisir le bon complément:\n\n<p style = \'color: black; font-weight: 700\' \'> Qualité et efficacité: </p>\n\nLa première chose à vérifier lors du choix d\'un supplément est de déterminer son efficacité et sa qualité. La qualité englobe plusieurs éléments, la qualité du produit, la réputation de la marque et même son fournisseur; Plusieurs produits sont vendus illégalement sur le marché donc aucune garantie de ces ingrédients ou de l\'origine (le pays d\'origine) et peuvent avoir des effets néfastes sur la santé de ses utilisateurs. Recherchez toujours des marques et des produits premium connus qui ont démontré leur efficacité et l\'efficacité de leurs composants.\n\n<p style = \'couleur: noir; font-weight: 700 \'\'> Ingrédient et dosage: </p>\n\nC\'est un facteur important à prendre en compte lors du choix du bon complément. Il existe des composants connus dans le monde entier pour leur efficacité dans l\'atteinte d\'objectifs spécifiques tels que le CLA ou la Carnitine pour la perte de poids ou le Bcaas (acides aminés essentiels) pour ses bienfaits en termes de récupération et de protection des tissus musculaires. Vous devez également savoir que certaines personnes développent des intolérances à certains ingrédients, alors méfiez-vous de ceux-ci avant d\'acheter. Le dosage est également important lors du choix de votre supplément, vérifiez le dosage des ingrédients clés pour vos besoins.\n\n<p style = \'color: black; font-weight: 700\' \'> le prix: </p>\n\nLe prix des suppléments dépend de la qualité des matières premières, du processus de fabrication, de la recherche et d\'autres facteurs clés. Bien que le prix soit un facteur secondaire dans le choix de son complément. Certains consommateurs préfèrent choisir le produit en fonction de son prix et oublient que la qualité est largement infectée. En tant que consommateur, la vigilance est donc essentielle. La qualité des produits est sans aucun doute le critère de base pour choisir votre futur complément.\n\n<p style = \'color: black; font-weight: 700\' \'> Quand prendre des compléments alimentaires? </p>\n\nPour être en parfaite santé, il faut adopter une alimentation équilibrée. Cependant, les différentes activités quotidiennes empêchent certaines personnes de respecter cet équilibre. Pour cela, l\'utilisation de compléments alimentaires est nécessaire. Cependant, vous devez savoir quand en profiter. Chaque produit a des instructions d\'utilisation. Prenez toujours votre supplément selon les instructions sur l\'étiquette. Pour une meilleure absorption, certains compléments alimentaires doivent être pris avec les repas à jeun. Les vitamines par exemple doivent être prises avec un repas pour faciliter l\'absorption.\n\n<p style = \'color: black; font-weight: 700\' \'> Quels sont les risques associés à la prise de compléments alimentaires? </p>\n\nLes compléments alimentaires présentent peu de contre-indications, hormis les allergies à certaines plantes et les interactions possibles entre les plantes présentes dans les compléments et le traitement de base. Vous devez donc être vigilant lors de l\'utilisation de compléments alimentaires. Il est toujours conseillé de consulter un conseiller avant d\'acheter.', '2020-07-06 16:52:31', 'blog_5f033aaf2acf52.50472782lg-b-tout savoir sur les compléments alimentaires.jpg', 1, 9),
(10, 1, 'Nutrition sportive en lock-out: rester en forme avec des protéines', '2020 sera l\'année la plus calme de l\'histoire du sport moderne. La pandémie de coronavirus a forcé le report des plus grands événements de la planète jusqu\'en 2021, notamment les Jeux olympiques de Tokyo et les championnats d\'Europe de football. Les meilleurs tirages annuels tels que le Tour de France et le Championnat du monde de Formule 1 ont été reportés à plus tard cette année, avec des calendriers très chargés qui se profilent maintenant.\n\nPour les athlètes professionnels, ces quelques mois ont été très difficiles. En raison de l\'incertitude quant à la reprise de la compétition, ils ont dû ajuster leurs régimes d\'entraînement et de nutrition pour rester en forme. L\'absence de calendrier de compétition a emporté des objectifs clés et des pics de saison pour les athlètes sur lesquels se concentrer, de sorte que les entraîneurs et les entraîneurs ont du pain sur la planche pour les garder motivés et suivre des routines relativement normales.\n\nEn tant que consultant en nutrition sportive, mon rôle est de conseiller les athlètes sur la récupération, la réparation, le maintien de la masse musculaire et la prévention des gains excessifs de graisse corporelle. Il s’agit de veiller à ce que mes clients ne soient pas trop loin de là où ils doivent être une fois que la saison reprend enfin.\n\nLa clé reste positive. Les athlètes ont eu une rare occasion d\'expérimenter de nouveaux régimes et méthodes d\'entraînement, en vue de revenir à l\'action dans la meilleure forme possible. La non-compétition est une opportunité de garder le corps aussi renouvelé que possible en termes de nutriments tels que le sélénium et le fer, et de renforcer la résistance pour la compétition à venir. Les protéines de lactosérum seront au cœur de nombreux programmes de nutrition personnalisés efficaces.\n\n<p style = \'color: black; font-weight: 700\'> Trouver un avantage dans un verrouillage </p>\n\nAlors que la période COVID-19 a été un congé forcé pour tout le monde, l\'autodiscipline déterminera qui sortira le mieux des starting-blocks lorsque la normalité reviendra. Au début de chaque nouvelle saison, vous voyez toujours des athlètes de divers sports qui sont un peu en surpoids, et qui le perdront progressivement au fil de la saison. Mais ils seront mis au défi par d\'autres athlètes entrant dans la saison en pleine forme et qui pourront conserver cette forme, voire s\'améliorer. La situation actuelle ne fera qu\'aggraver cette situation.\n\nÉtant donné que peu de choses se passent actuellement en matière de compétition, de nombreux athlètes ont opté pour des programmes d\'entraînement moins intenses qui impliquent moins de séances par jour que la normale. Leur régime alimentaire a donc été ajusté pour dépendre moins des glucides raffinés à indice glycémique élevé (p. Ex. Pain, riz, pâtes et nouilles), car une récupération rapide est moins prioritaire. À l\'heure actuelle, l\'objectif principal est de rester en bonne santé, tout en maintenant une masse musculaire maigre et de ne pas gagner trop de graisse corporelle. De toute évidence, les protéines sont un élément clé de cette stratégie, à la fois en termes de fourniture de blocs de construction pour le muscle, mais aussi pour son rôle de coupe-faim, pour aider à éviter une consommation excessive de calories. En plus du passage à la consommation de plus de calories provenant des protéines, il y a un fardeau supplémentaire à passer des glucides raffinés à ceux qui contiennent également des fibres, comme les légumes-racines.\n\nLa période actuelle de restriction des déplacements peut également apporter des avantages, car les athlètes et leurs entraîneurs ont plus de contrôle sur ce qu\'ils consomment. Si vous regardez la disponibilité des aliments dans un aéroport, par exemple, il s\'agira généralement d\'aliments prêts à consommer à indice glycémique élevé, riches en glucides et en matières grasses et pauvres en protéines. Les athlètes ont désormais plus d’opportunités de s’en tenir à un régime plus proche de leurs besoins spécifiques, afin d’avoir des produits laitiers, des œufs, des fruits et légumes frais, qu’ils ne pourront pas toujours suivre sur la route.\n\n<p style = \'color: black; font-weight: 700\'> Horaires compressés, augmentation du stress </p>\n\nBien qu\'il puisse y avoir actuellement des temps d\'arrêt importants pour les athlètes, il en résultera que le calendrier des événements sera encore plus comprimé.\n\nPour les athlètes, un horaire chargé signifie plus de pression et de stress sur les muscles et un plus grand besoin de nutritionnels pour la récupération. Bien qu\'il existe de nombreuses autres sources de protéines avec d\'excellents attributs, en ce qui concerne les taux maximaux de synthèse des protéines, la protéine de lactosérum est en tête des graphiques. Dans la fenêtre cruciale de 2 heures immédiatement après l\'exercice, la protéine de lactosérum est la meilleure source de protéines pour stimuler la réparation musculaire.\n\nEn outre, s\'il existe une large gamme de protéines végétales avec des profils nutritionnels intéressants, elles ont tendance à avoir de faibles niveaux de deux acides aminés importants; tryptophane et cystéine. La cystéine est un précurseur du glutathion, l’un des antioxydants les plus importants du corps, dont il a été démontré qu’il réduit la fatigue musculaire et améliore la fonction respiratoire. Le tryptophane a un rôle clé à jouer dans l\'amélioration de la qualité du sommeil et de l\'humeur. Ainsi, même si une protéine alternative à base de plantes comme le pois peut être riche en acides aminés à chaîne ramifiée (BCAA), il peut être intéressant d\'envisager de la combiner avec la protéine de lactosérum pour répondre aux besoins du corps en tryptophane et cystéine, en particulier lorsque la récupération rapide devient régulière. plus important.\n\n<p style = \'color: black; font-weight: 700\'> Nutrition sportive pour tous </p>\n\nLe besoin de protéines va bien au-delà du domaine des athlètes professionnels. C\'est également un macronutriment clé pour le grand public, à la fois en supprimant l\'appétit et en maintenant la masse musculaire. Il existe de nombreuses études sur les populations en surpoids et même de poids normal montrant que même sans exercice, les protéines, et le lactosérum en particulier, peuvent entraîner des changements bénéfiques dans la composition corporelle, c\'est-à-dire augmenter la masse maigre et réduire la masse grasse.\n\nDans une certaine mesure, les athlètes récréatifs seront confrontés à des défis similaires concernant le maintien de la masse maigre des tissus et la prévention des blessures en tant que professionnels. Leur retour de la situation de confinement exigera une formation progressive soutenue par une nutrition appropriée pour atteindre leurs nouveaux objectifs. Sans prendre en compte le long temps d\'arrêt, les personnes risquent de se blesser en se poussant trop fort à leur retour à la salle de sport. En même temps, ils rechercheront un retour de leur masse musculaire maigre et de leur puissance musculaire. Dans les deux cas, la consommation de protéines autour de l\'exercice fait partie de la solution. Il s’agit d’en prendre une petite quantité avant d’aller au gymnase ou de commencer une longue course d’endurance (par exemple, 10 g 30 minutes avant l’effort), avec une dose plus importante de 20 g immédiatement à la fin de l’exercice.\n\nQuel que soit le niveau ou le domaine du sport, la préparation d\'un retour à la compétition normale nécessite un programme d\'entraînement et de nutrition soigneusement dirigé, incorporant beaucoup de protéines pour aider à éviter la prise de poids, à maintenir une masse musculaire maigre. La protéine de lactosérum aura un rôle clé à jouer à la fois dans la reconstruction musculaire, l\'amélioration de la récupération et pourrait même contribuer à aider les athlètes à se dire en bonne santé à mesure que le verrouillage s\'améliore et que le calendrier sportif commence à se remplir.', '2020-07-06 17:09:35', 'blog_5f033eaf0d99b1.15970685sports-nutrition-in-a-lockdown-l.jpg', 1, 6),
(11, 1, 'Guide essentiel des protéines', 'Les protéines sont nécessaires pour de nombreuses choses. Que vous souhaitiez perdre du poids, gagner du muscle, récupérer après un entraînement difficile, vous sentir plus rassasié au moment des repas ou simplement rester en bonne santé, il est important de consommer des quantités adéquates de protéines saines.\n\n<p style = \'color: black; font-weight: 700; font-size: 25px\' \'> PROTÉINES DE BASE </p>\n\nLes protéines sont un élément crucial de chaque cellule de notre corps. Il est utilisé pour construire et réparer les tissus (comme les muscles squelettiques, les os, les cheveux, les ongles, le cartilage, la peau et le sang), ainsi que pour fabriquer des enzymes et des hormones qui aident à réguler le métabolisme, la croissance et bien d\'autres choses. Comme les glucides et les graisses, les protéines fournissent également de l\'énergie, mais comme elles ont tant d\'autres fonctions importantes et ne peuvent pas être stockées, le corps compte d\'abord sur les glucides et les graisses pour produire de l\'énergie.\n\nMais tout comme les glucides et les graisses, l\'excès de protéines est converti et stocké sous forme de graisse.\n\nLes protéines sont digérées en acides aminés qui sont absorbés par l\'intestin grêle et distribués dans tout le corps. Les cellules prennent ce dont elles ont besoin et réorganisent les acides aminés pour fabriquer de nouvelles protéines ou réparer les anciennes. Parce que le corps ne stocke pas de protéines, les acides aminés en excès sont soit convertis en glucose puis en glycogène pour être utilisés comme énergie si le corps manque de glucides, soit convertis en acides gras et stockés sous forme de graisse. Obtenir suffisamment de protéines est important pour que le corps puisse effectuer ces fonctions au quotidien. Mais tout comme les glucides et les graisses, l\'excès de protéines est converti en graisse et stocké sous forme de graisse.\n\nLes protéines se trouvent dans une variété d\'aliments: notamment la viande, la volaille, le poisson, les produits laitiers, les œufs, les légumineuses, les noix, les graines, le soja et même les céréales. D\'un point de vue diététique, les viandes, la volaille, le poisson, les œufs et le soja sont des protéines complètes, c\'est-à-dire qu\'ils fournissent tous les acides aminés nécessaires à notre corps. D\'autres sources de protéines comme les légumineuses, certaines noix et graines, les céréales et les légumes-feuilles ne fournissent pas des quantités adéquates d\'acides aminés essentiels par elles-mêmes, mais peuvent lorsqu\'elles sont consommées en combinaison avec d\'autres aliments et dans le cadre d\'une alimentation équilibrée.\n\n\n\n<p style = \'color: black; font-weight: 700; font-size: 25px\' \'> BESOINS CIBLES EN PROTÉINES </p>\n\nNotre corps change chaque jour à mesure que les cellules se développent, se divisent et meurent - ces processus dépendent des protéines pour fournir des éléments de base essentiels à nos cellules. Pour cette raison, vous devez manger suffisamment de protéines pour maintenir la masse musculaire maigre et soutenir d\'autres fonctions corporelles importantes.\n\nL\'apport alimentaire recommandé (AJR) prédit la quantité de protéines que vous devez manger quotidiennement pour vous prémunir contre la perte de masse musculaire maigre. La RDA pour les protéines est de 0,8 gramme / kilogramme de poids corporel, mais c\'est un minimum pour l\'adulte sédentaire moyen, alias le «guerrier du week-end». MyFitnessPal calcule l\'apport en protéines à 20% de vos calories quotidiennes, ce qui est probablement plus que suffisant pour maintenir la masse musculaire.\n\n\n\n<p style = \'color: black; font-weight: 700; font-size: 25px\' > MEILLEURES PRATIQUES POUR LES PROTÉINES </p>\n\n\nQuelle que soit la façon dont vous atteignez vos objectifs en matière de protéines, ces sept conseils vous aident à tirer le meilleur parti des protéines:\n\n<p style = \'color: black; font-weight: 700;\' \'> 1. ÉTENDRE LES PROTÉINES ENTRE LES REPAS </p>\n\nLes aliments riches en protéines ne sont pas bon marché, mais vous pouvez maximiser la capacité de votre corps à digérer, absorber et utiliser les protéines en les répartissant uniformément tout au long des repas et des collations. Il suffit de prendre le nombre total de grammes de protéines dont vous avez besoin quotidiennement et de le diviser par le nombre total de repas et de collations que vous mangez quotidiennement.\n\n<p style = \'color: black; font-weight: 700;\' \'> 2. MANGEZ DES PROTÉINES IMMÉDIATEMENT APRÈS L\'EXERCICE </p>\n\n\nAvoir une collation riche en protéines peu de temps après l\'exercice (idéalement avant la marque d\'une heure) est préférable car c\'est à ce moment que les muscles sont sensibles aux nutriments qu\'ils peuvent utiliser pour se réparer et se développer.\n\n\n<p style = \'color: black; font-weight: 700;\' \'> 3. ASSOCIER DES PROTÉINES AVEC DES GLUCIDES </p>\n\nCeci est particulièrement important lorsque vous faites le plein après un exercice aérobie (comme la course), car les protéines sont nécessaires pour la réparation musculaire et les glucides sont nécessaires pour reconstituer les réserves d\'énergie. N\'oubliez pas: les macros (glucides, lipides et protéines) aiment travailler ensemble.\n\n<p style = \'color: black; font-weight: 700;\' \'> 4. RECHERCHEZ PLUS DE PROTÉINES VÉGÉTALES </p>\n\n\nVégétarien ou non, nous pouvons tous bénéficier de manger plus de protéines végétales. En plus d\'être d\'excellentes sources de protéines, les aliments comme les haricots, les pois, le quinoa et les lentilles sont riches en autres nutriments comme les fibres, les vitamines et les minéraux.\n\n\n<p style = \'color: black; font-weight: 700;\' \'> 5. CHOISISSEZ DES MORCEAUX DE VIANDE MAIGRE </p>\n\nLes mangeurs de viande, recherchez des coupes maigres comme le porc et le filet de bœuf. Règle générale lors de vos achats: les coupes dont le nom est rond, mandrin ou longe sont généralement maigres.\n\nCertaines coupes peuvent prendre un peu plus de temps à préparer (essayez de mariner ou de braiser), mais si elles sont bien préparées, elles sont tout aussi délicieuses que les coupes plus grasses. Étant donné que les viandes hachées sont généralement riches en matières grasses, recherchez les options les plus maigres, comme le bœuf haché 90/10, qui contient 90% de viande maigre et seulement 10% de matières grasses. Si vous êtes un amateur de steaks ou de hamburgers, limitez la viande rouge à une ou deux fois par semaine, car elle est riche en graisses saturées.\n\n\n<p style = \'color: black; font-weight: 700;\' \'> 6. FAITES DES CHOIX DE VOLAILLE INTELLIGENTS </p>\n\nPeau de côté, la volaille est généralement maigre - mais méfiez-vous lorsque vous achetez du poulet ou de la dinde hachée. À moins qu\'il n\'indique 100% de poitrine de dinde hachée ou de poitrine de poulet sur l\'emballage, la viande a probablement été hachée avec la peau et la graisse, ce qui signifie que le hamburger à la dinde n\'est peut-être pas plus sain qu\'un haché de bœuf.\n\n<p style = \'color: black; font-weight: 700;\' \'> 7. AUGMENTEZ VOTRE CONSOMMATION DE POISSON </p>\n\nSi vous aimez le poisson, essayez d\'en manger 3 à 4 onces deux fois par semaine. Congelé ou frais, le poisson peut être une excellente source de protéines. Certains - comme le saumon - sont riches en oméga-3, un gras insaturé sain.\n\n', '2020-07-06 17:14:52', 'blog_5f033fec881706.98129667UACF_EG_Hero_NoBadge_Protein-752x472.jpg', 1, 16),
(12, 3, 'Tout sur la machine à adducteurs', 'L’exercice des adducteurs assis à la machine est une pratique de fitness qui permet non seulement de perdre du poids mais de dessiner les muscles pour une silhouette toute en force et fitness. Ce type de machine permet de développer le galbe des cuisses par des exercices de musculation réguliers. Pour particuliers ou professionnels, la machine pour adducteur fait partie intégrale du matériel de musculation à la salle de sport.\n\n<p style = \'color: black; font-weight: 700\' \'> 1.L\'appareil de musculation adducteur </p>\n\nL\'appareil de musculation adducteur vous permet de travailler en profondeur les muscles qui sont très importants pour l\'articulation de la hanche. En effet, grâce à la machine adductrice, son utilisateur effectue des exercices de musculation qui tendent à renforcer les muscles qui maintiennent l\'articulation de la hanche. Les muscles principalement utilisés sont les muscles situés à l\'intérieur des hanches, appelés gros adducteur et adducteur court, ainsi que les muscles situés dans la cuisse, qui sont le long adducteur et le muscle élancé. Tous ces muscles, lorsqu\'ils sont renforcés par des exercices réguliers, aident à maintenir et à stabiliser les hanches. Ils travaillent ensuite de concert avec les ravisseurs. Par des exercices répétés et adaptés, l\'utilisateur de la machine adductrice améliore ainsi sa qualité de vie puisqu\'elle favorise une bonne stabilisation de la hanche. N\'oubliez pas que les problèmes de hanche sont non seulement douloureux, mais peuvent être très invalidants. Ainsi, en utilisant ce type de machine qui travaille les jambes et plus particulièrement les cuisses, les muscles se développent, assurent un bon maintien des hanches et favorisent un bon mouvement de la rotule.\nEn résumé, les exercices de remise en forme sur une machine à adducteurs contribuent à la bonne santé du bas du tronc et des jambes en renforçant le système musculaire de ces parties du corps.\n\n<p style = \'color: black; font-weight: 700\' \'> 2. Quels muscles sont travaillés? </p>\n\nSitués à l\'intérieur des cuisses, les adducteurs servent à verrouiller le bassin en position debout (notamment lorsqu\'on repose sur une jambe) et contribuent à des mouvements dirigés vers l\'axe longitudinal du corps. Ces muscles nous aident également à être stationnaire et à se tenir droit. On pourrait résumer en disant que leur fonction est de rapprocher le corps d\'un membre qui en a été éloigné.\n\nLes appareils d\'exercice Adductor sont généralement conçus pour soulever une petite quantité de poids. Il est donc indispensable de connaître les spécificités de ce type de machine avant de l\'utiliser. Dans la salle de fitness, il y a souvent un coach pour vous éduquer, demandez-lui de s\'assurer d\'utiliser efficacement la machine adductrice. Certaines personnes sont tentées d\'ajouter du poids sans se rendre compte que cela peut être nocif pour la colonne vertébrale. Il est donc conseillé de mettre le poids approprié pour que l\'exercice soit le plus bénéfique possible sans aucun aspect négatif dû à une mauvaise utilisation.\n\nC\'est pourquoi quiconque va à la salle de sport devrait, avant de se lancer dans la musculation, essayer de comprendre à quoi sert chaque machine et comment elle est utilisée.\n\nDans les machines pour adducteurs, on peut trouver par exemple la presse à cuisses. Cet appareil de musculation des fessiers est l\'un des meilleurs pour travailler plusieurs endroits en même temps, y compris les cuisses, les fesses et le renforcement des chevilles.\n\n<p style = \'color: black; font-weight: 700\' \'> 3. Comment utiliser la machine? </p>\n\nTout d\'abord, choisissez le poids qui convient à vos capacités. Positionnez-vous ensuite correctement sur la machine à adducteurs, en positionnant bien vos pieds et en vous assurant que l\'intérieur des cuisses est contre les éléments prévus à cet effet. Saisissez les poignées positionnées sur les côtés et assurez-vous que le haut de votre corps est droit. Serrez vos jambes et rapprochez vos cuisses en contractant vos muscles. Revenez à la position d\'origine et répétez le mouvement. Inspirez lorsque vous revenez à la position de départ et expirez lorsque vous rapprochez vos cuisses. Bien utilisée, la machine adductrice apporte un vrai plus à votre corps en renforçant vos muscles et en vous apportant du tonus.\n\nDe nombreuses machines existent sur le marché et certaines sont indispensables pour une salle de sport. Il y a bien sûr la machine adductrice mais aussi la station de musculation, un indispensable qui vous permet de travailler vos muscles efficacement et progressivement.', '2020-07-06 17:27:46', 'blog_5f0342f24e3979.21406997shutterstock_581798407-compressor.jpg', 1, 4),
(13, 3, 'Choisissez le bon équipement de musculation', 'Savoir choisir le bon équipement de musculation peut être compliqué lors de l\'exécution d\'une salle de sport. Il y a tellement de matériel d\'entraînement sportif, avec ou sans options, simples ou multifonctionnels. Retrouvez tous nos conseils pour choisir le prochain équipement de musculation que vous installerez dans votre espace sportif. Que vous soyez gérant de salle de sport, coach sportif ou particulier souhaitant créer votre propre salle de sport à domicile, voici nos conseils pour faire les bons choix.\n\nÉquipement de musculation essentiel\n\nPour une salle de sport de haut niveau, certaines machines de musculation sont essentielles. Afin de fournir aux utilisateurs un entraînement idéal, il faut s\'interroger sur leurs besoins en tant qu\'athlètes.\n\nLe choix de vos futurs appareils dépend avant tout du concept de votre salle de sport, de votre budget et du matériel dont vous disposez déjà. Choisir le bon équipement de gym est avant tout une question de bon sens et de connaissance des membres de votre club de sport ou de vos clients. Certaines personnes peuvent vouloir tonifier le bas du corps, tandis que d\'autres visent à renforcer le haut du corps.\n\n Que votre clientèle soit nouvelle ou expérimentée en activité physique, l\'acquisition d\'équipements spécifiques est nécessaire. Certains équipements sont accessibles à tous les profils tandis que d\'autres sont réservés aux praticiens réguliers.\n\n Les sportifs débutants et confirmés n\'auront pas les mêmes besoins et le même niveau, il est donc important d\'évaluer les objectifs de vos abonnés afin de fournir le meilleur équipement.\n\n Hommes, femmes, petits et grands apprécieront de pouvoir s\'entraîner avec toutes sortes de matériel au fil du temps et de la progression de leurs objectifs sportifs. Il existe de nombreux appareils pour muscler efficacement toutes les parties du corps. Vous trouverez forcément du matériel de musculation professionnel adapté à votre salle de sport ou pour accompagner vos clients avec le meilleur matériel de coaching à domicile.\n\nEncouragez vos membres et offrez-vous une grande collection d\'appareils de musculation et d\'équipements de gym.\n\nCommencez par installer des équipements de sport <span style = \'color: black; font-weight: 500\'> pour renforcer le haut du corps </span>, les abdominaux, les biceps, les épaules et le dos:\n\nbarres de poids; <br>\n-des stations de musculation; <br>\n-ensemble d\'haltères poids et complet; <br>\nappareil de musculation multifonction; <br>\n<br>\nUne grande variété d\'appareils de musculation pour les fessiers et le bas du corps est également disponible:\n<br>\n- tapis de course inclinables et tapis de course; <br>\n - vélo elliptique; <br>\n- machine d\'escalier pour salle de sport; <br>\n <br> <br>\n\nLes sportifs réguliers apprécieront l\'arrivée de nouveaux appareils pour un voyage sportif à la pointe de la technologie. Certaines machines de musculation peuvent être polyvalentes et permettent de renforcer les membres supérieurs et inférieurs.\n\nPour une expérience sportive optimale, n\'hésitez pas à proposer une grande variété d\'appareils de musculation, afin que tous vos abonnés puissent trouver l\'appareil de musculation adapté à leur entraînement sportif! Qu\'ils préfèrent muscler les muscles supérieurs, inférieurs ou tout le corps, les sportifs auront le choix du roi pour obtenir une silhouette athlétique.\n\nLes équipements pour le coaching à domicile sont de plus en plus recherchés. Les mêmes appareils que ceux utilisés dans les salles de sport peuvent être sélectionnés. Certains clients peuvent souhaiter aménager une pièce chez eux comme une véritable salle de fitness. Dans ce cas, en tant que coach sportif, vos conseils sont les bienvenus.\n\nLes appareils de musculation multifonctionnels sont de plus en plus répandus et témoignent des progrès des fabricants pour proposer des équipements toujours plus sophistiqués aux débutants et aux sportifs de haut niveau.', '2020-07-06 17:35:23', 'blog_5f0344bb23b1e0.41992286shutterstock_721723381-2.jpg', 1, 8),
(14, 3, 'Quelle machine de musculation pour les fesses?', 'Il y a tellement d\'appareils de fitness qu\'il peut sembler compliqué de choisir lequel installer dans une salle de sport. Partie intégrante de l\'équipement de musculation dans une salle de sport, découvrez tout ce que vous devez savoir sur les appareils de musculation pour vos fesses.\n\nAvant d\'ajouter un appareil à votre salle de sport, il y a une question à poser: \"Lequel de vos appareils déjà installés est le plus populaire?\"\n\nIl est important d\'observer vos abonnés lors d\'un entraînement:\n\n  - Quels appareils sont les plus utilisés? <br>\n  - Quelles parties du corps les athlètes travaillent-ils avec ces appareils? <br>\n\nEn fonction de votre localisation et du public dans votre salle, l\'objectif sportif ne sera pas forcément le même. Ainsi, observer et discuter avec les habitués de votre club sera le meilleur moyen de connaître leurs préférences.\n\nLa plupart des machines doivent bien entendu être faciles à adapter au niveau de l\'utilisateur.', '2020-07-06 17:40:52', 'blog_5f034604270536.70424412shutterstock_1341085331.jpg', 1, 9),
(17, 2, 'Les vêtements de sport peuvent-ils accélérer votre perte de poids et votre renforcement musculaire?', 'L\'athlétisme et les vêtements de sport ont dominé l\'industrie de la mode. Des mannequins, des influenceurs aux célébrités, tout le monde a adopté la tendance. En plus d\'être confortable, cela nous donne l\'impression d\'avoir l\'image de quelqu\'un qui mène une vie saine et de quelqu\'un qui vit ensemble.\n\nAvec la montée en puissance de sa renommée, les spéculations font de même. Plus de gens sont curieux de connaître ses effets sur le corps? L\'effet sportswear est-il entièrement dans l\'esprit ou améliore-t-il vraiment votre programme d\'entraînement?\n\n<p style = \'color: black; font-weight: 700\' \'> L\'état d\'esprit </p>\n\n«Les vêtements que nous portons influencent-ils notre comportement et notre façon de penser?»\n\nSelon une étude réalisée en 2012, la réponse est un oui définitif. Cela a provoqué un terme de deux recherches appelé «cognition enfermée» qui définit les changements mentaux que notre esprit subit lorsque nous portons un type particulier de vêtement. Les volontaires de cette étude ont été amenés dans un laboratoire avec une blouse de laboratoire ou sans en avoir reçu une. Ceux qui portent des blouses de laboratoire ont montré de meilleures performances de manière assez significative.\n\nLorsque vous vous habillez comme un athlète, vous êtes plus intéressé par la forme. Avec des vêtements qui comblent la séparation du streetwear et des vêtements de sport, vous pouvez les porter plus souvent. Vous vous sentirez ainsi plus d\'humeur à aller à la salle de sport. Ce n’est pas l’analogie parfaite, mais elle a du sens.\n\nLorsque vous commencez à vous sentir mieux dans votre peau, vous pouvez vous habiller comme vous vous sentez. Les vêtements que vous portez représentent votre motivation intérieure, c\'est donc une boucle de rétroaction. Je me sens bien alors je porterai des vêtements qui me donnent une belle apparence.\n\n<p style = \'color: black; font-weight: 700\' \'> Le matériau </p>\n\nLorsque vous vous entraînez, vous optez généralement pour des vêtements de sport parce que vous sentez que cela vous aide pendant l\'entraînement. C\'est en fait vrai, de la forme au matériau, ceux-ci peuvent vous aider à durer plus longtemps et à aider votre corps à lui donner la forme que vous souhaitez.\n\n<p style = \'color: black; font-weight: 700\' \'> Nylon </p>\n\nLe nylon était à l\'origine utilisé pour fabriquer des bas pour femmes, c\'est pourquoi le tissu synthétique est très doux comme la soie. Il résiste également à la moisissure et sèche rapidement. En même temps, il reste respirant et évacue la sueur de votre peau vers la surface du tissu pour qu\'elle puisse s\'évaporer. Cela signifie que vous pouvez vous entraîner plus longtemps car vous êtes plus à l\'aise car vous sentez moins de sueur sur votre peau.\n\nIl peut également supporter même le plus transpirant de vos entraînements et offre une immense étirement et une récupération. Cela permet à votre pantalon de bouger avec vous et permet à votre corps de subir des entraînements intenses tout en restant flexible et confortable.\n\n<p style = \'color: black; font-weight: 700\' \'> Spandex </p>\n\nLe spandex est connu pour être le plus extensible de tous. Grâce à la capacité du tissu à s\'étirer à 600% de sa taille, il vous permet de disposer d\'une amplitude de mouvement illimitée tout en se remettant en place. Il est également respirant, évacue l’humidité et sèche rapidement, c’est pourquoi il est un véritable incontournable des vêtements de sport moulants.\n\nAvec Spandex, vous pouvez obtenir un maximum de confort, aucun frottement et rester exempt de bactéries, ce qui est important pour rester hygiénique pendant vos entraînements.\n\n\n<p style = \'color: black; font-weight: 700\' \'> Polyester </p>\n\nLe polyester peut être trouvé dans la majorité des tissus d\'entraînement et même dans les vêtements décontractés. C\'est pourquoi c\'est génial dans la tendance athleisure car c\'est une tendance que vous pouvez facilement faire passer à la fois dans la salle de sport et dans la rue. Il est durable, infroissable, léger et respirant. Cela vous permet de vous entraîner à votre guise sans vous sentir limité.\n\nIl repousse également les rayons UV, c\'est donc une excellente option pour la course à pied et les activités de plein air et il peut vous isoler même lorsque vous êtes mouillé. C\'est donc une excellente option pour tous les plans actifs que vous avez.\n\n <p style = \'color: black; font-weight: 700\' \'> Conclusion </p>\n\n\nLes vêtements de sport sont un must à avoir dans la garde-robe de quiconque, car ils sont bons à la fois pour l\'esprit et le corps. N\'attendez pas que l\'été arrive et mettez-vous simplement en forme pour vivre votre meilleure vie. Il n’ya pratiquement aucune raison de ne pas l’obtenir. C’est un excellent moyen de rendre votre corps plus actif tout en ayant fière allure, c’est le meilleur des deux mondes.', '2020-07-06 18:00:09', 'blog_5f034a896db073.85595254HTB1DdmNAKuSBuNjy1Xcq6AYjFXaG.jpg', 1, 65);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `tcat_id` int(11) NOT NULL,
  `tcat_name` varchar(255) NOT NULL,
  `show_on_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_category`
--

INSERT INTO `tbl_category` (`tcat_id`, `tcat_name`, `show_on_menu`) VALUES
(1, 'protéine', 1),
(2, 'Vêtements', 1),
(3, 'equipement', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`) VALUES
(1, 'rouge'),
(2, 'Noir'),
(3, 'Bleu'),
(4, 'Jaune'),
(5, 'Vert'),
(6, 'Blanc'),
(7, 'Orange'),
(8, 'marron'),
(9, 'bronzer'),
(10, 'Rose');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messsage` text NOT NULL,
  `date_inserted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `messsage`, `date_inserted`) VALUES
(12, 'test', 'hassan@gmail.com', 'good', '2020-09-09 23:29:07'),
(13, 'ayoub', 'ayoub@gmail.com', 'j\'ai un probleme ', '2020-09-10 14:32:40');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` varchar(255) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_b_name` varchar(100) NOT NULL,
  `cust_b_cname` varchar(100) NOT NULL,
  `cust_b_phone` varchar(50) NOT NULL,
  `cust_b_country` varchar(255) NOT NULL,
  `cust_b_address` text NOT NULL,
  `cust_b_city` varchar(100) NOT NULL,
  `cust_b_state` varchar(100) NOT NULL,
  `cust_b_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_country` varchar(255) NOT NULL,
  `cust_s_address` text NOT NULL,
  `cust_s_city` varchar(100) NOT NULL,
  `cust_s_state` varchar(100) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int(1) NOT NULL,
  `cust_photo` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `operating_system` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_b_name`, `cust_b_cname`, `cust_b_phone`, `cust_b_country`, `cust_b_address`, `cust_b_city`, `cust_b_state`, `cust_b_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_country`, `cust_s_address`, `cust_s_city`, `cust_s_state`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`, `cust_status`, `cust_photo`, `ip`, `operating_system`, `browser`, `device`) VALUES
(9, 'ayoub', 'test', 'ayoub@gmail.com', '0624726974', 'Maroc', 'avenue milano temara', 'temara', 'rabat', '1780', 'ayoub', 'lemuilhi', '0624726974 ', 'Maroc', 'avenue milano temara', 'temara', 'rabat', '1780', 'ayoub', 'lemuilhi', '0624726974', 'Maroc', 'avenue milano temara', 'temara', 'rabat', '1780', '202cb962ac59075b964b07152d234b70', '303948fc0fe5a981667e1fba9eed3448', '2020-09-10 02:23:54', '1599740634', 1, 'user_5f5a1ada551505.05553754chng_img.jpg', '::1', 'Windows 10', 'Chrome', 'Computer');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `size`, `color`, `quantity`, `unit_price`, `payment_id`) VALUES
(52, 22, 'muscletech-sweat-a-capuche', 'XS', 'Noir', '2', '300', '1599740781');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_cvv` varchar(10) NOT NULL,
  `card_month` varchar(10) NOT NULL,
  `card_year` varchar(10) NOT NULL,
  `bank_transaction_info` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `customer_id`, `customer_name`, `customer_email`, `payment_date`, `txnid`, `paid_amount`, `card_number`, `card_cvv`, `card_month`, `card_year`, `bank_transaction_info`, `payment_method`, `payment_status`, `shipping_status`, `payment_id`) VALUES
(47, 9, 'ayoub', 'ayoub@gmail.com', '2020-09-10 14:26:21', '', 62, '', '', '', '', '', 'PayPal', 'Completed', 'Completed', '1599740781');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_old_price` varchar(10) NOT NULL,
  `p_current_price` varchar(10) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `p_photo` varchar(255) NOT NULL,
  `p_description` text NOT NULL,
  `p_short_description` varchar(255) NOT NULL,
  `p_feature` text NOT NULL,
  `p_total_view` int(11) NOT NULL,
  `p_in_featured` int(1) NOT NULL,
  `p_is_active` int(1) NOT NULL,
  `tcat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `date_inserted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_photo`, `p_description`, `p_short_description`, `p_feature`, `p_total_view`, `p_in_featured`, `p_is_active`, `tcat_id`, `scat_id`, `date_inserted`) VALUES
(20, 'prodiet-nutrition-t-shirt-batman', '1500', '990', 0, 'product_5f01e9d137e527.73593893prodiet-nutrition-t-shirt-batman.jpg', 'Un T-shirt à la coupe régulière, adapté à votre séance d\'entraînement ou simplement à votre quotidien avec une matière 100% conton pour une meilleure sensation', 'Un T-shirt à la coupe classique', 'Matériel: 100% coton', 140, 1, 1, 2, 14, '2020/07/05 16:55:13'),
(21, 't-shirt-muscletech-be-strong', '180', '140', 7, 'product_5f01eaadc55fa9.36914673muscletech-t-shirt-be-stronger.jpg', 'Un T-shirt à la coupe confortable, adapté à votre séance d\'entraînement ou tout simplement à votre quotidien\r\n', 'Un T-shirt à la coupe confortable', 'Matériel: 50% coton 50% polyster', 52, 1, 1, 2, 14, '2020/07/05 16:58:53'),
(22, 'muscletech-sweat-a-capuche', '', '300', 12, 'product_5f01eb6360c094.14990141muscletech-sweat-a-capuche.jpg', 'Ce t-shirt de qualité supérieure vous accompagne dans vos exercices par temps froid pour plus de confort', 'Ce t-shirt de qualité supérieure', 'Élastique chaud confortable', 64, 1, 1, 2, 15, '2020/07/05 17:01:55'),
(23, 'scitec-nutrition-casquette', '', '200', 25, 'product_5f01ec379624a4.42048208scitec-nutrition-casquette.jpg', 'Cette casquette vous offre un style décontracté et vous accompagne dans vos sports outdoor pour un style 100% unique.\r\n', 'Cette casquette vous offre un style décontracté et accompagne', 'Material: 100% cotton\r\n', 13, 0, 1, 2, 14, '2020/07/05 17:05:27'),
(24, 'prodiet-nutrition-debardeur-stringer-batman', '140', '80', 15, 'product_5f01ed3919b089.69857084prodiet-nutrition-debardeur-stringer-batman.jpg', 'prodiet-nutrition-debardeur-stringer-batman\r\n', 'prodiet-nutrition-debardeur..', 'Matériel standard', 18, 0, 1, 2, 15, '2020/07/05 17:09:45'),
(25, 'sporter-noir-mix-choses-up-shaker-original', '120', '100', 6, 'product_5f01ee7b5e89c7.63601978sporter-black-mix-things-up-shaker-original.jpg', 'Un shaker est un accessoire indispensable Aucune séance d\'entraînement ne sera jamais complète sans emporter votre fidèle shaker! C\'est un compagnon d\'entraînement que vous devez avoir pour que vous puissiez profiter des bienfaits de vos suppléments que ce soit gainer, booster, lactosérum ou autres. Le shaker sportif est suffisamment solide pour résister au nettoyage, même dans la machine à laver, et éviter les fuites.', 'Capacité de 600 ml Fermeture étanche A une grille\r\n', 'Capacité de 600 ml Fermeture étanche A une grille\r\n', 19, 1, 1, 2, 16, '2020/07/05 17:15:07'),
(26, ' mad-max-100-cuire-ceinture-original', '200', '150', 15, 'product_5f01ef1c7e2575.14075562mad-max-100-cuire-ceinture-original.jpg', 'Cette ceinture confortable vous permet d\'optimiser vos séances de musculation tout en gardant la bonne position. Avec une ouverture / fermeture facile vous optez pour une meilleure sécurité lors de vos exercices. 100% cuir cette ceinture vous accompagnera toujours', 'Cette ceinture confortable vous permet d\'optimiser vos séances de musculation', 'Material:Cuir', 13, 0, 1, 2, 16, '2020/07/05 17:17:48'),
(27, 'scivation-parfait-shake-xtend-bcaas-800ml-original', '120', '100', 20, 'product_5f01ef91dab6b1.98725484scivation-perfect-shake-xtend-bcaas-800ml-original.jpg', 'Le shaker BPI, d\'une contenance de 700 ml, est idéal pour la préparation de vos protéines, gainers, BCAA et boosters. Il peut également vous suivre pendant votre formation.', 'Capacité de 800 ml Possède une grille et un clip Facile à entretenir\r\n', 'Capacité de 800 ml Possède une grille et un clip Facile à entretenir\r\n', 10, 0, 1, 2, 16, '2020/07/05 17:19:45'),
(28, 'prodiet-nutrition-pilulier-original', '70', '50', 20, 'product_5f01f01d2149a5.47071761prodiet-nutrition-pill-box-original.jpg', 'La boîte à pilules Prodiet Nutrition est la solution ultime pour transporter tous vos suppléments. Capsules, comprimés, comprimés tout ce dont vous avez besoin dans un seul emballage plus besoin d\'apporter plusieurs produits', 'Facile à transporter Contient 60 comprimés Dimensions: 126 x 76 x 22 mm\r\n', 'Facile à transporter Contient 60 comprimés Dimensions: 126 x 76 x 22 mm\r\n', 12, 1, 1, 2, 16, '2020/07/05 17:22:05'),
(29, 'prodiet-nutrition-cruche-eau-188l-original', '150', '120', 13, 'product_5f01f17fad4b18.21200260prodiet-nutrition-water-jug-188l-original.jpg', 'Bouteille Prodiet Nutrition ultra pratique, transparente et de grande contenance (1,88litre) pas besoin de faire des allers-retours pour s\'hydrater! Vous pouvez également l\'utiliser pour mélanger votre booster, votre bcaa ou votre préparation intra-entraînement.\r\n', 'Grande capacité: 1.88ML Poignée ergonomique Bouchon hermétique, ne fuit pas\r\n', 'Grande capacité: 1.88ML Poignée ergonomique Bouchon hermétique, ne fuit pas\r\n', 10, 0, 1, 2, 16, '2020/07/05 17:27:59'),
(30, 'prodiet-nutrition-sac-a-dos-original', '90', '80', 20, 'product_5f01f2b00872c0.78373648prodiet-nutrition-sac-a-dos-original.jpg', 'Ce sac à dos a été conçu pour transporter vos sports quotidiens et vos effets personnels. Besoin d\'un sac pratique et solide? Ce sac à dos est fait pour vous! Compartiment principal avec grande ouverture avec bretelles réglables pour un meilleur confort.', 'Capacité: 10L et 48 grammes\r\n', 'Capacité: 10L et 48 grammes\r\n', 11, 1, 1, 2, 16, '2020/07/05 17:33:04'),
(31, 'muscletech-sac-a-dos', '', '200', 17, 'product_5f01f384eb61b9.43337280muscletech-sac-a-dos.jpg', 'Avec le sac à dos Muscletech, vous serez prêt pour vos activités quotidiennes ou pour un long voyage. Léger et résistant, ce sac à dos a été conçu pour vous emmener partout et ranger tout ce dont vous avez besoin!\r\n', 'Dimensions: H 50cm, L 34 cm, P 30 cm. Matériel: 100,0% polyester', 'Dimensions: H 50cm, L 34 cm, P 30 cm. Matériel: 100,0% polyester\r\n', 10, 1, 1, 2, 16, '2020/07/05 17:36:36'),
(32, 'masstech-extreme-2000-10kg-muscletech', '950', '740', 20, 'product_5f01f6cf43f750.02799383masstech-extreme-2000-10kg-muscletech.jpg', '- Présentation du produit :\r\nMass-Tech Extreme 2000 est une formule de gainage ultra-complète et avancée, fabriquée par la marque MuscleTech. Cette formule très puissante a été parfaitement dosée avec un rapport protéines / glucides idéal pour une prise de masse optimale. Ce produit est destiné aux débutants comme confirmés, souhaitant augmenter rapidement leur masse musculaire ou ayant des difficultés à prendre du poids. Mass-Tech Extreme 2000 est un gainer qui vous fournit une quantité importante d\'énergie sous forme de glucides et de protéines. Pour une demi-dose (3 dosettes), nous avons un apport de 915 calories dont 31,5g de protéines à digestion rapide (isolat de protéines de lactosérum concentré et, isolat de protéines de lactosérum et lactosérum hydrolysé). Nous avons 192g de glucides dont 8,5g de sucres avec un complexe des meilleurs glucides avec une digestion rapide et lente. Mass-Tech ne contient que des «bonnes graisses» riches en Oméga 3, pour vous permettre d\'apporter des graisses saines à votre corps. Nous avons également 5g de monohydrate de créatine pour augmenter la force et la performance sur des efforts courts et intenses. Les 7g de BCAA, d\'acides aminés ramifiés (Leucine, Isoleucine et Valine) sont dits essentiels car ils ne peuvent être synthétisés seuls par l\'organisme et doivent être apportés par l\'alimentation et la supplémentation. Enfin, on retrouve 5,2g de L-Glutamine, l\'acide aminé le plus abondant dans le corps et les muscles.\r\n\r\n - utilisation :\r\n4 fois par jour. Mélangez 1 cuillère avec 250 ml d\'eau ou de lait écrémé le matin, entre le petit-déjeuner et le déjeuner. 1 cuillère avant l\'entraînement avec 250 ml d\'eau. , une après l\'entraînement avec 250 ml d\'eau et une dernière cuillère avant de dormir avec 250 ml de lait écrémé.', 'Points forts :\r\n- 915 calories pour 3 dosettes\r\n\r\n- 31,5g de protéines et 192g de glucides pour 3 dosettes\r\n\r\n- Accélère la régénération et la récupération musculaire post-entraînement\r\n\r\n- Riche en BCAA et glutamine\r\n\r\n- Vous permet d\'augmenter la force ', 'Points forts :\r\n- 915 calories pour 3 dosettes\r\n\r\n- 31,5g de protéines et 192g de glucides pour 3 dosettes\r\n\r\n- Accélère la régénération et la récupération musculaire post-entraînement\r\n\r\n- Riche en BCAA et glutamine\r\n\r\n- Vous permet d\'augmenter la force et les performances\r\n\r\n- Délicieux t', 22, 0, 1, 1, 17, '2020/07/05 17:50:39'),
(33, 'jumbo-286kg-scitec-nutrition', '480', '400', 35, 'product_5f01f752867522.42948632jumbo-286kg-scitec-nutrition.jpg', '- Présentation du produit :\r\n Jumbo est un gainer riche en protéines de lactosérum considéré comme une protéine complète car il fournit des acides aminés essentiels dont des acides aminés essentiels, essentiels à la vie et à la croissance musculaire. Jumbo apporte, en prenant 100g, 23g de protéines et 68g de glucides complexes multi-sources (avoine et amidon de maïs) permettant de maintenir une glycémie constante pour optimiser les facultés anaboliques de l\'insuline. Jumbo renforce cette formule avec l\'ajout d\'une matrice 6-Carb qui, comme son nom l\'indique, fournit 6 sources de glucides avec un indice glycémique différent. En outre, Jumbo contient du BCAA. Les BCAA sont une association de 3 acides aminés anti-cataboliques (l-leucine, l-isoleucine et l-valine). Ils améliorent la synthèse des protéines et aident à régénérer les muscles plus rapidement entre les entraînements. Toutes les bonnes sources de protéines contiennent des BCAA. Pour répondre aux besoins permanents, Scitec a mis la qualité à profit avec des résultats avec une formule vraiment originale, spécialement conçue pour les personnes souhaitant prendre du poids et suivant des cycles d\'entraînement très intensifs. Avec une capacité d\'assimilation très élevée, Jumbo est un gainer qui n\'a pas la réputation d\'engraisser ses utilisateurs, malgré une charge calorique assez importante. Extrêmement digestible, c\'est aussi une alternative efficace pour les personnes sensibles qui digèrent mal les protéines.\r\n\r\n- utilisation :\r\nMélanger une dose de 50 g (1 cuillère) par jour dans 250 ml d\'eau après l\'entraînement.', 'Points forts\r\n- Apportez 50 g de protéines!\r\n\r\n- 68g de glucides complexes\r\n\r\n- Contient 6 sources de glucides\r\n\r\n- 2g de BCAA', 'Points forts\r\n- Apportez 50 g de protéines!\r\n\r\n- 68g de glucides complexes\r\n\r\n- Contient 6 sources de glucides\r\n\r\n- 2g de BCAA', 13, 0, 1, 1, 17, '2020/07/05 17:52:50'),
(34, 'masse-sérieuse-55kg-nutrition-optimale', '700', '590', 40, 'product_5f01f869884326.17353925serious-mass-55kg-optimum-nutrition.jpg', '- Présentation du produit :\r\nDepuis plusieurs années, Optimum Nutrition a révolutionné le marché avec ses produits innovants, parmi lesquels Serious Mass. Serious Mass est conçu pour les personnes au métabolisme hyperactif (personnes qui brûlent des calories consommées plus rapidement que les autres) et qui souhaitent prendre du poids. Avec 1250 calories, Serious Mass vous donne les outils dont vous avez besoin pour prendre du poids. Non seulement pour restaurer ce qui est perdu à l\'exercice, mais aussi pour une récupération immédiate pour une meilleure prise de poids. Plus de 50 g de complexe de protéines complexes (protéines d\'oeuf, concentré de lactosérum et caséinate de calcium) pour un gain musculaire et une récupération rapide. Serious Mass fournit des glucides à base de sucres naturels qui sont lentement assimilés dans l\'organisme, permettant un apport calorique puissant et de qualité responsable d\'une prise de masse rapide sans augmenter la masse grasse. De plus, cette formule est riche en vitamines avec 25 vitamines et minéraux essentiels et antioxydants.\r\n\r\n- utilisation :\r\nPrendre 2 dosettes (soit 334 g) dans environ 400 ml d\'eau fraîche ou de lait écrémé et consommer au petit-déjeuner, en collation et / ou après l\'entraînement.', 'Points forts\r\n- Apport calorique élevé: 1250 calories par portion de 334 g\r\n\r\n- Soutenir le développement musculaire avec 50 protéines plus élevées\r\n\r\n- Numéro 1 du classement des meilleurs gagnants sur le site Bodybuilding.com\r\n\r\n- Formule sans sucre', 'Points forts\r\n- Apport calorique élevé: 1250 calories par portion de 334 g\r\n\r\n- Soutenir le développement musculaire avec 50 protéines plus élevées\r\n\r\n- Numéro 1 du classement des meilleurs gagnants sur le site Bodybuilding.com\r\n\r\n- Formule sans sucre', 46, 1, 1, 1, 17, '2020/07/05 17:57:29'),
(35, 'pro-complexe-152kg-nutrition-optimale', '700', '650', 25, 'product_5f01f8f73b3761.81465443pro-complex-152kg-optimum-nutrition.jpg', '-Présentation du produit :\r\nPRO COMPLEX GAINER est un complément alimentaire spécialisé dans la prise de poids, composé d\'un mélange de protéines provenant de plusieurs sources à haute valeur nutritionnelle et de glucides destinés à vous apporter l\'énergie et les éléments nécessaires à une meilleure prise de poids. Pro Complex Gainer d\'Optimum Nutrition vous aide à gagner de la masse musculaire et du poids rapidement et constamment en vous fournissant les composants nécessaires à la récupération physique et musculaire.\r\n\r\n- utilisation :\r\nPrendre 1 cuillère doseuse de 100 g à mélanger avec 350 ml à 500 ml d\'eau ou de lait écrémé, 30 min après l\'entraînement. Prendre entre les repas les jours de repos.', 'Points forts :\r\n- 30 g de protéines\r\n\r\n- 7,5 g Bcaas\r\n\r\n- 5,25g de L-Glutamine', 'Points forts :\r\n- 30 g de protéines\r\n\r\n- 7,5 g Bcaas\r\n\r\n- 5,25g de L-Glutamine', 10, 0, 1, 1, 17, '2020/07/05 17:59:51'),
(36, 'Gold Standard Gainer 2,270Kg - Nutrition optimale', '700', '600', 50, 'product_5f01f9828675e0.99934836gold-standard-gainer-2270kg-optimum-nutrition.jpg', '- Présentation du produit:\r\nFabriqué par la célèbre marque Optimum Nutrition, Gold Standard Gainer est aujourd\'hui parmi les meilleurs gainers du marché mondial avec une formule riche en protéines de lait complètes, principalement de sources isolées. Le mélange d\'hydrates de carbone contient de l\'avoine, des pois et des pommes de terre, et les graisses comprennent des triglycérides à chaîne moyenne, du chia et du lin. Très faible teneur en sucres et en graisses, aucun autre gainer n\'a une telle composition d\'une telle qualité. Riche et complet avec des ingrédients soigneusement sélectionnés pour une optimisation des performances et un bon développement musculaire! Le gagnant de l\'étalon or est votre dernier choix pour atteindre votre objectif.\r\n\r\n- utilisation :\r\n4 doses par jour; La première dose après le petit déjeuner. La seconde avant l\'entraînement et une autre après l\'entraînement et une dernière dose Immédiatement avant le coucher Chaque dose est mélangée à 300 ml d\'eau.', 'Points forts\r\n- 55 g de protéines de haute qualité\r\n\r\n- 763 calories d\'ingrédients de qualité\r\n\r\n- Glucides provenant de l\'avoine, des pois et des pommes de terre', 'Points forts\r\n- 55 g de protéines de haute qualité\r\n\r\n- 763 calories d\'ingrédients de qualité\r\n\r\n- Glucides provenant de l\'avoine, des pois et des pommes de terre', 17, 1, 1, 1, 17, '2020/07/05 18:02:10'),
(37, 'Bcaa + Glutamine Xpress 600g - Scitec Nutrition', '400', '350', 20, 'product_5f01fbca018a43.89627137bcaa-glutamine-xpress-600g-scitec-nutrition.jpg', '- Présentation du produit:\r\nLa leucine, l\'isoleucine et la valine appartiennent à la famille des acides aminés à chaîne ramifiée (BCAA) destinés à la construction de protéines. Ils font partie des 9 acides aminés essentiels pour le corps humain, car notre corps ne peut pas les fabriquer. Leur seule source est donc notre alimentation quotidienne ou nos compléments alimentaires. Les BCAA représentent 35% des acides aminés essentiels des protéines musculaires. En revanche, la glutamine est le choix des sportifs et des professionnels du sport. Ce produit est donc une formule complète et une combinaison de BCAA ET DE GLUTAMINE pour favoriser la récupération musculaire pendant et après un entraînement de haute intensité, évitant ainsi une dégradation musculaire indésirable et des performances réduites.\r\n\r\n-Utilisation :\r\nMélangez 1 cuillère dans 60 cl d\'eau et buvez un peu avant et pendant la séance.', 'Points forts :\r\n- 5g de glutamine par dose\r\n\r\n- Aide au développement de la masse musculaire sèche\r\n\r\n- Formule anti-catabolique avancée', 'Points forts :\r\n- 5g de glutamine par dose\r\n\r\n- Aide au développement de la masse musculaire sèche\r\n\r\n- Formule anti-catabolique avancée', 11, 0, 1, 1, 18, '2020/07/05 18:11:54'),
(38, 'Meilleur Bcaa 60 portions - BPI SPORTS', '600', '560', 30, 'product_5f01fc51036801.06391228best-bcaa-60-servings-bpi-sports.jpg', '- Présentation du produit:\r\nBest Bcaa est un produit contenant une série d\'acides aminés liés à la technologie enzymatique des oligopeptides. Ce sont des peptides qui combinent les acides essentiels suivants: lysines, isoleucine et valine, qui sont un meilleur moyen de transférer des protéines et des nutriments vers les muscles et un métabolisme plus efficace.\r\n\r\nBest BCA aide au développement et à la guérison des muscles, ainsi qu\'à la prévention de la destruction musculaire pendant et après l\'activité physique, il contient une matrice CLA pour soutenir la croissance musculaire mais aussi pour réduire la masse grasse Ce produit contribue également à améliorer les performances pendant l\'effort.\r\n\r\nBest Bcaa propose plusieurs parfums variés pour satisfaire tous les goûts.\r\n\r\n- Utilisation :\r\n-Prendre 1 dosette mélangée avec 50 à 70cl d\'eau.\r\n\r\n- A consommer avant, pendant et après l\'entraînement.', 'Points forts :\r\n- Favorise la croissance musculaire\r\n\r\n- Améliore la récupération musculaire\r\n\r\n- Améliore les performances', 'Points forts :\r\n- Favorise la croissance musculaire\r\n\r\n- Améliore la récupération musculaire\r\n\r\n- Améliore les performances', 12, 1, 1, 1, 18, '2020/07/05 18:14:09'),
(39, ' Meilleur Bcaa 30 portions - BPI SPORTS', '400', '290', 15, 'product_5f01fcc8de9db3.04637705best-bcaa-30-servings-bpi-sports.jpg', '- Présentation du produit:\r\nBest Bcaa est un produit contenant une série d\'acides aminés liés à la technologie enzymatique des oligopeptides. Ce sont des peptides qui combinent les acides essentiels suivants: lysines, isoleucine et valine, qui sont un meilleur moyen de transférer des protéines et des nutriments vers les muscles et un métabolisme plus efficace. Best BCA aide au développement et à la guérison des muscles, ainsi qu\'à la prévention de la destruction musculaire pendant et après l\'activité physique, il contient une matrice CLA pour soutenir la croissance musculaire mais aussi pour réduire la masse grasse Ce produit contribue également à améliorer les performances pendant l\'effort.\r\nBest Bcaa propose plusieurs parfums variés pour satisfaire tous les goûts.\r\n\r\n - Utilisation :\r\n-Prendre 1 dosette mélangée avec 50 à 70cl d\'eau.\r\n\r\n- A consommer avant, pendant et après l\'entraînement', 'Points forts :\r\n- Favorise la croissance musculaire\r\n\r\n- Améliore la récupération musculaire\r\n\r\n- Améliore les performances', 'Points forts :\r\n- Favorise la croissance musculaire\r\n\r\n- Améliore la récupération musculaire\r\n\r\n- Améliore les performances', 10, 0, 1, 1, 18, '2020/07/05 18:16:08'),
(40, 'ultra-amino-1000-capsules-scitec-nutrition', '', '400', 10, 'product_5f01ffa56796a2.14045531ultra-amino-1000-capsules-scitec-nutrition.jpg', '- Présentation du produit:\r\nUltra Amino est un produit conçu à base de protéines de lait riches et complètes avec entre autres acides aminés essentiels pour l\'organisme (Isoleucine, leucine, lysine, méthionine, phénylalanine, thréonine, tryptophane, valine). Il est également concentré en glutamine, l\'acide le plus important pour les muscles. Grâce à sa digestion facile, Ultra Amino de Scitec a une haute valeur biologique avec des actions positives sur la stimulation de la synthèse des protéines musculaires et la réparation des fibres musculaires et le développement de la masse maigre. Ultra Amino est disponible en capsules, la forme la plus efficace pour une absorption complète puisque la capsule empêche la dégradation des composants dans l\'estomac et permet une meilleure diffusion des acides aminés dans le sang.\r\n\r\n- Utilisation :\r\nIl est recommandé de prendre 3 doses d\'environ 4 gélules, au réveil ou le matin, l\'après-midi ou juste avant l\'entraînement et juste après l\'entraînement ou au coucher.', 'Points forts :\r\n- 442 mg d\'acides aminés essentiels\r\n\r\n- Formule dérivée de lactosérum ultrafiltré', 'Points forts :\r\n- 442 mg d\'acides aminés essentiels\r\n\r\n- Formule dérivée de lactosérum ultrafiltré', 10, 0, 1, 1, 18, '2020/07/05 18:28:21'),
(41, ' crêpe-protéiné-1036-g-scitec-nutrition', '290', '250', 20, 'product_5f02029dc88a75.22308000protein-pancake-1036-g-scitec-nutrition.jpg', '- Présentation du produit\r\nVoulez-vous un petit-déjeuner équilibré et riche en nutriments? Nous avons la solution. CRÊPES PROTÉINÉES! Scitec nutrition vous offre la possibilité de préparer rapidement des crêpes sans vous soucier du dosage prédéfini. Grâce à ce produit vous soutenez le développement de vos muscles dès votre réveil. PROTEIN PANCAKES fournit 3 sources de protéines (lactosérum, caséine et uf), en plus des glucides complexes et des bonnes graisses (essentielles à la synthèse hormonale). Ce mélange gourmand vous apporte des acides aminés pendant plusieurs heures afin de ne pas finir rapidement entre les repas. PROTEIN PANCAKES est disponible dans des goûts irrésistibles et parfaits pour les personnes qui gardent leurs lignes, les personnes au régime et aussi celles qui veulent simplement s\'amuser en peu de temps.\r\n\r\n- utilisation\r\nMélanger 37 g (une cuillère) avec environ ½ cuillère de lait écrémé ou avec de l\'eau, cuire dans une poêle à feu doux', 'Points forts :\r\n- Préparation rapide\r\n\r\n- Enrichi en protéines 11 g et en calories 157 g par dose', 'Points forts :\r\n- Préparation rapide\r\n\r\n- Enrichi en protéines 11 g et en calories 157 g par dose', 18, 0, 1, 1, 19, '2020/07/05 18:41:01'),
(42, ' farine-d\'avoine-1500g-scitec-nutrition', '200', '150', 19, 'product_5f02038653d349.97353940oat-meal-1500g-scitec-nutrition.jpg', '- Présentation du produit\r\nVoulez-vous vous faire plaisir tout en apportant à votre corps tous les nutriments nécessaires? Oitmeal de Scitec est la solution pour un repas complet. C\'est un mélange de flocons d\'avoine et d\'avoine. L\'avoine est l\'une des meilleures sources de glucides que les athlètes apprécient pour leur objectif de maintien musculaire ou de poids. Ils sont également appelés glucides complexes qui sont essentiels à votre bonne santé. 100g de poudre d\'avoine d\'avoine fournissent 13g de protéines, 56g de glucides et de nombreuses vitamines et minéraux tels que B9 (acide folique), vitamine E, vitamine B1 (thiamine), zinc, fer, manganèse, la farine d\'avoine est également riche en fibres (10g par 100g) pour favoriser la digestion. Formulé sans OGM, sans aspartame et sans sucres ajoutés, le gruau d\'avoine convient à tous ceux, sportifs ou non, qui recherchent des suppléments sains et naturels. De plus, l\'avoine aide à maintenir un taux de cholestérol équilibré, grâce à la présence de bêta-glucanes d\'avoine dont l\'effet bénéfique sur le cholestérol est reconnu par des études scientifiques.\r\n\r\n- utilisation\r\nMélanger une dose (150 g) de poudre avec 400 ml d\'eau. Agitez vigoureusement le mélange jusqu\'à obtenir la consistance désirée. Si vous préférez des flocons moins fermes, laissez-les tremper 1 ou 2 minutes, mais si vous préférez les plus croustillants, consommez-les immédiatement. A consommer de préférence le matin, ou pendant la journée entre les repas.', 'Points forts\r\n- Source n ° 1 de glucides\r\n\r\n- Idéal pour éviter la prise de graisse\r\n\r\n- Sans sucre', 'Points forts\r\n- Source n ° 1 de glucides\r\n\r\n- Idéal pour éviter la prise de graisse\r\n\r\n- Sans sucre', 11, 0, 1, 1, 22, '2020/07/05 18:44:54'),
(43, 'jumbo-bar-15-unites-scitec-nutrition', '420', '380', 20, 'product_5f020406f015e6.19436866jumbo-bar-15-unites-scitec-nutrition.jpg', '- Présentation du produit\r\nAvec 50g de protéines par barre, Jumbo Bar est l\'une des barres les plus protéinées du marché. Ils peuvent remplacer un repas ou être consommés après une séance d\'entraînement. Avec 26g de glucides, cette barre protéinée peut être consommée par toute personne souhaitant surveiller son poids tout en gagnant de la masse musculaire. Ce mélange unique de protéines d\'une qualité exceptionnelle contribue à la croissance et à la préservation des muscles, ainsi qu\'à la préservation du squelette. Facile à transporter et à utiliser. La meilleure alternative pour un gain de poids supplémentaire. Il peut également remplacer un shaker gainer pour tous ceux qui ont des problèmes avec les poudres de protéines. Idéal comme collation avant ou juste après l\'entraînement, la barre Jumbo en 100g vous permet de faire le plein de protéines et plein d\'énergie pour affronter votre séance de musculation sans perdre de régime, ou favoriser la récupération et l\'anabolisme après l\'effort!\r\n\r\n- utilisation\r\n1 à 2 barres par jour en collation et / ou après l\'entraînement', 'Points forts\r\n- 50g de protéines dans une seule barre\r\n\r\n- 26 g de glucides\r\n\r\n- 8,2 g de lipides pour favoriser la prise de masse\r\n\r\n- Facile à consommer', 'Points forts\r\n- 50g de protéines dans une seule barre\r\n\r\n- 26 g de glucides\r\n\r\n- 8,2 g de lipides pour favoriser la prise de masse\r\n\r\n- Facile à consommer', 10, 0, 1, 1, 19, '2020/07/05 18:47:02'),
(44, 'jumbo-bar-1-unite-scitec-nutrition', '30', '10', 15, 'product_5f0204ae577077.43246626jumbo-bar-1-unite-scitec-nutrition.jpg', '- Présentation du produit\r\nAvec 50g de protéines par barre, Jumbo Bar est l\'une des barres les plus protéinées du marché. Ils peuvent remplacer un repas ou être consommés après une séance d\'entraînement. Avec 26g de glucides, cette barre protéinée peut être consommée par toute personne souhaitant surveiller son poids tout en gagnant de la masse musculaire. Ce mélange unique de protéines d\'une qualité exceptionnelle contribue à la croissance et à la préservation des muscles, ainsi qu\'à la préservation du squelette. Facile à transporter et à utiliser. La meilleure alternative pour un gain de poids supplémentaire. Il peut également remplacer un shaker gainer pour tous ceux qui ont des problèmes avec les poudres de protéines. Idéal comme collation avant ou juste après l\'entraînement, la barre Jumbo en 100g vous permet de faire le plein de protéines et plein d\'énergie pour affronter votre séance de musculation sans perdre de régime, ou favoriser la récupération et l\'anabolisme après l\'effort!\r\n\r\n- utilisation\r\n1 à 2 barres par jour en collation et / ou après l\'entraînement', 'Points forts\r\n- 50g de protéines dans une seule barre\r\n\r\n- 26 g de glucides\r\n\r\n- 8,2 g de lipides pour favoriser la prise de masse\r\n\r\n- Facile à consommer', 'Points forts\r\n- 50g de protéines dans une seule barre\r\n\r\n- 26 g de glucides\r\n\r\n- 8,2 g de lipides pour favoriser la prise de masse\r\n\r\n- Facile à consommer', 10, 0, 1, 1, 19, '2020/07/05 18:49:50'),
(45, ' C4 Original 30 portions 180g - Cellucor', '410', '100', 20, 'product_5f020996201d90.55023909c4-original-30-servings-180g-cellucor.jpg', 'Présentation du produit\r\nC4 Original est la poudre pré-entraînement la plus populaire de Cellucors\r\n\r\nUne énergie explosive, une concentration accrue et un désir irrésistible de relever tous les défis ... c\'est l\'expérience que ce produit offre. Des millions de personnes, débutantes comme professionnelles, se sont appuyées sur C4 pour les aider à transformer leurs ambitions en réalisations, c\'est pourquoi elle est classée numéro 1 de sa catégorie aux États-Unis.\r\n\r\nC4 Original est à la hauteur de sa solide réputation avec une formule associant pour chaque dose de 6,5 g, 1,5 g de créatine monohydrate micronisée qui est la forme de créatine la plus rapidement assimilée par l\'organisme. Il améliore les performances sur des efforts courts et intenses. Aussi 1,6g de CarnoSyn® Beta-alanine, La seule forme brevetée de Beta-alanine qui garantit sa pureté et sa biodisponibilité et qui soutient l\'endurance musculaire. C4 contient également 150 mg de caféine anhydre pour améliorer la vigilance et les performances physiques. Ce produit est également enrichi en Arginine 1g et 200mg de L-Tyrosine.\r\n\r\nutilisation\r\nMélanger 1 dose (6,5 g) dans 200 à 300 ml d\'eau douce et prendre environ 20 à 30 minutes avant l\'entraînement.', 'Points forts :\r\n- 15 mg de caféine anhydre\r\n\r\n- 1,5 monohydrate de créatine\r\n\r\n- CarnoSyn® Bêta-alanine', 'Points forts :\r\n- 15 mg de caféine anhydre\r\n\r\n- 1,5 monohydrate de créatine\r\n\r\n- CarnoSyn® Bêta-alanine', 10, 0, 1, 1, 20, '2020/07/05 19:10:46'),
(46, 'Amino Energy 270g - Optimum Nutrition', '400', '250', 16, 'product_5f021d2419b789.90429761amino-energy-270g-optimum-nutrition.jpg', 'Présentation du produit:\r\nSi vous voulez un produit qui booste votre énergie à tout moment de la journée, Amino Energy est fait pour vous. Cette boisson sans sucre à base de caféine, de thé vert et d\'acides aminés essentiels contribue à une meilleure endurance. Non seulement une boisson énergisante mais aussi une formule riche en BCAA qui favorisent la construction du tissu musculaire et stimulent la production d\'insuline, ces éléments favorisent également le stockage du glycogène, principale source d\'énergie pour vos muscles. Chaque composant de l\'énergie Amino joue un rôle clé pour l\'amener au niveau supérieur, l\'arginine pour une bonne congestion, la taurine pour l\'énergie, la tyrosine pour une meilleure résistance au stress et la glutamine pour repousser la lutte contre la fatigue tandis que la bêta -alanine pour réduire les courbatures et les douleurs en post faire des exercices. Et aussi de la caféine pour la concentration et la vigilance lors de vos entraînements. Essential Amino Energy ne se limite pas à ses bienfaits pendant l\'entraînement mais vous pouvez également en consommer si vous cherchez un coup de pouce au travail ou pendant vos études pour stimuler votre cerveau. Avec seulement 10 calories par portion, ses effets sont puissants sans compromettre votre alimentation.\r\n\r\nUtilisation :\r\nVous pouvez mélanger 2 doses de ce produit avec 330 ml d\'eau fraîche. À prendre avant, pendant ou après l\'entraînement ou lorsque vous ressentez une diminution de votre concentration et de votre vigilance.', 'Points forts :\r\n- 5 g d\'acides aminés par dose pour vos muscles\r\n\r\n- 100 mg de caféine pour une meilleure concentration', 'Points forts :\r\n- 5 g d\'acides aminés par dose pour vos muscles\r\n\r\n- 100 mg de caféine pour une meilleure concentration', 12, 1, 1, 1, 20, '2020/07/05 20:34:12'),
(47, 'The Curse 250g - Cobra Labs', '390', '350', 15, 'product_5f021fa78a2b83.59476320the-curse-250g-cobra-labs.jpg', 'Présentation du produit:\r\nLe crurse est décrit comme l\'un des pré-entraînements les plus puissants de la planète. Fabriqué par Cobra Labs aux États-Unis, c\'est un mélange ultra-concentré d\'ingrédients puissants qui se décomposent mutuellement. Libérez votre véritable potentiel grâce au pouvoir surnaturel de ce mélange unique de stimulants synergiques. The Curse fournit une concentration mentale extrême, de l\'énergie physique pure, de la force et de l\'endurance qui vous éblouiront. C\'est le pré-entraînement ultime.\r\n\r\nUtilisation :\r\nMélangez 1 à 3 cuillère avec 150 à 250 ml d\'eau et buvez 30 à 45 minutes avant l\'entraînement.', 'Points forts :\r\n- 900 mg de citruline et de L-arginine\r\n\r\n- 0 sucre\r\n\r\n- 0 calories', 'Points forts :\r\n- 900 mg de citruline et de L-arginine\r\n\r\n- 0 sucre\r\n\r\n- 0 calories', 10, 0, 1, 1, 20, '2020/07/05 20:44:55'),
(48, 'Amino Energy 595g - Optimum Nutrition', '', '400', 10, 'product_5f0220bf452b63.76323645amino-energy-595g-optimum-nutrition.jpg', '- Présentation du produit:\r\nSi vous voulez un produit qui booste votre énergie à tout moment de la journée, Amino Energy est fait pour vous. Cette boisson sans sucre à base de caféine, de thé vert et d\'acides aminés essentiels contribue à une meilleure endurance. Non seulement une boisson énergisante mais aussi une formule riche en BCAA qui favorisent la construction du tissu musculaire et stimulent la production d\'insuline, ces éléments favorisent également le stockage du glycogène, principale source d\'énergie pour vos muscles. Chaque composant de l\'énergie Amino joue un rôle clé pour l\'amener au niveau supérieur, l\'arginine pour une bonne congestion, la taurine pour l\'énergie, la tyrosine pour une meilleure résistance au stress et la glutamine pour repousser la lutte contre la fatigue tandis que la bêta -alanine pour réduire les courbatures et les douleurs en post faire des exercices. Et aussi de la caféine pour la concentration et la vigilance lors de vos entraînements. Essential Amino Energy ne se limite pas à ses bienfaits pendant l\'entraînement mais vous pouvez également le consommer si vous cherchez un coup de pouce au travail ou pendant vos études pour stimuler votre cerveau. Avec seulement 10 calories par portion, ses effets sont puissants sans compromettre votre alimentation.\r\n\r\n- Utilisation :\r\nVous pouvez mélanger 2 doses de ce produit avec 330 ml d\'eau fraîche. À prendre avant, pendant ou après l\'entraînement ou lorsque vous ressentez une diminution de votre concentration et de votre vigilance.', 'Points forts :\r\n- 5 g d\'acides aminés par dose pour vos muscles\r\n\r\n- 100 mg de caféine pour une meilleure concentration', 'Points forts :\r\n- 5 g d\'acides aminés par dose pour vos muscles\r\n\r\n- 100 mg de caféine pour une meilleure concentration', 10, 0, 1, 1, 20, '2020/07/05 20:49:35'),
(49, 'Oméga 3 100 Caps - Scitec Nutrition', '250', '200', 15, 'product_5f0221cf72c9a8.06454089omega-3-100-caps-scitec-nutrition.jpg', '- Présentation du produit:\r\nLes oméga 3 sont des acides gras essentiels extraits de l\'huile de poisson. Ils sont indispensables à la supplémentation quotidienne pour tous, et c\'est encore plus vrai pour les personnes qui ont une vie active et dont les besoins sont accrus. Ils sont dits «essentiels» car le corps ne peut pas les produire lui-même. Ils sont essentiels au bon fonctionnement du système cardiovasculaire. En effet, ils ont la capacité de réduire le taux de mauvais cholestérol et d\'assouplir les parois artérielles, en plus d\'une action protectrice du système nerveux, des articulations, de la peau et des cheveux. Les oméga 3 de scitec sont enrichis en acides gras EPA et DHA qui aident à maintenir une tension artérielle saine et contribuent à une bonne santé cardiovasculaire. Lorsque le taux de triglycérides diminue, le risque de crise cardiaque diminue. La consommation de «bonnes graisses» est essentielle pour l\'organisme, et est indispensable dans le cadre d\'un régime pour maigrir. En effet, votre corps sera mieux à même de déstocker les mauvaises graisses et vous réduirez les risques liés à votre santé. Dans le cadre d\'une activité sportive ou si vous êtes sujet à des douleurs inflammatoires ou chroniques, sachez aussi que les oméga-3 sont très intéressants. Gélules d\'oméga 3 pour la musculation pour leurs vertus en récupération post-entraînement ou en augmentant la capacité à utiliser les graisses pour fournir de l\'énergie pendant l\'activité physique.\r\n\r\n - Utilisation :\r\nPrendre 1 capsule 2 fois par jour, de préférence avec les repas.', 'Points forts :\r\n- 1200 mg d\'huile de poisson par capsule\r\n\r\n- Protège le système cardiovasculaire et nerveux', 'Points forts :\r\n- 1200 mg d\'huile de poisson par capsule\r\n\r\n- Protège le système cardiovasculaire et nerveux', 10, 0, 1, 1, 21, '2020/07/05 20:54:07'),
(50, 'Platinum Multivitamins 90 Tabs - Muscletech', '300', '250', 19, 'product_5f022289903418.65146312platinum-multivitamins-90-tabs-muscletech.jpg', '- Présentation du produit:\r\nLa plupart des gens qui envisagent de se procurer des compléments alimentaires se tournent souvent vers les protéines pour brûler les graisses, augmenter la masse musculaire ou simplement pour de meilleures performances. Mais ces produits seuls ne suffisent pas! Platinum Multivitamin de Muscletech est un complexe de vitamines et de minéraux à fort potentiel. Cette formule multivitaminée a été développée pour fournir 20 vitamines et minéraux, dont des vitamines antioxydantes C et E, et 865 mg d\'acides aminés pour préserver la santé et des performances sportives intenses. Ce complexe de vitamines et minéraux présente plusieurs avantages tels que:\r\n\r\n• Contribue à répondre aux besoins en vitamines, même chez les sportifs qui pratiquent des activités physiques très intenses.\r\n\r\n• Contribue au fonctionnement optimal du système immunitaire.\r\n\r\n• C\'est un puissant antioxydant qui diminue le stress oxydatif.\r\n\r\n• Renforce la teneur en minéraux de l\'alimentation.\r\n\r\n - Utilisation :\r\nPrendre 1 capsule par repas ou 3 capsules avec l\'un de vos repas le matin ou à midi.', 'Points forts :\r\n- 20 minéraux et vitamines.\r\n\r\n- Riche en acides aminés\r\n\r\n- Renforce et soutient votre corps', 'Points forts :\r\n- 20 minéraux et vitamines.\r\n\r\n- Riche en acides aminés\r\n\r\n- Renforce et soutient votre corps', 10, 1, 1, 1, 21, '2020/07/05 20:57:13'),
(51, 'optimen-150-tabs-optimum-nutrition', '470', '400', 20, 'product_5f02230d95c372.84075171optimen-150-tabs-optimum-nutrition.jpg', '- Présentation du produit:\r\nOpti-Men est un système complet d\'optimisation des nutriments contenant plus de 70 principes actifs conçus pour répondre aux besoins nutritionnels des personnes actives. Chaque portion contient des acides aminés sous forme libre, des vitamines antioxydantes, des minéraux essentiels et des extraits botaniques en quantités essentielles sur lesquelles une alimentation saine et équilibrée peut être construite. Grâce à ces enzymes, Opti-Men vous permet d\'assimiler rapidement tous les nutriments pour un meilleur résultat. Opti-Men est un allié de performance, il vous apporte une assurance nutritionnelle adaptée à votre mode de vie et vous accompagne au quotidien.\r\n\r\n- Utilisation :\r\nComme complément alimentaire, consommez 1 à 2 comprimés deux fois par jour après les repas.', 'Points forts :\r\n- 70 ingrédients de haute qualité\r\n\r\n- 25 vitamines et minéraux', 'Points forts :\r\n- 70 ingrédients de haute qualité\r\n\r\n- 25 vitamines et minéraux', 10, 0, 1, 1, 21, '2020/07/05 20:59:25'),
(52, 'Daily Vita-Min 90 Tabs - Scitec Nutrition', '250', '200', 14, 'product_5f0223b0636bd2.39188352daily-vita-min-90-tabs-scitec-nutrition.jpg', '- Présentation du produit:\r\nCe produit est conçu pour fournir plus de 24 types de vitamines et de minéraux dans un comprimé. Il contient une forte dose de vitamine B et de vitamine C et également riche en vitamine D. De plus, ce produit contient des minéraux essentiels, notamment du sélénium, du zinc et du chrome. Quel est le rôle de ces composants?\r\n\r\n- La vitamine C et la vitamine B12 aident à maintenir le système immunitaire nerveux et à réduire la fatigue.\r\n\r\n- La vitamine B1 aide à faciliter et à soutenir la fonction cardiaque.\r\n\r\n- La vitamine B-2 renforce la vue et les globules rouges.\r\n\r\n- L\'acide folique contribue à la formation d\'acides aminés et joue un rôle dans le processus de division cellulaire.\r\n\r\n- La vitamine (D) permet le renforcement musculaire et celui du système immunitaire elle accélère également le processus d\'absorption du calcium et du phosphore.\r\n\r\n- Le zinc augmente le taux de fertilité et le niveau de testostérone.\r\n\r\n- Le magnésium soutient le système nerveux et stimule la contraction musculaire, ainsi que la synthèse des protéines.\r\n\r\n- Le sélénium contribue au bon fonctionnement de la glande thyroïde et renforce les cheveux, les ongles et les dents.\r\n\r\n- Utilisation :\r\nPrendre 2 comprimés par jour avec un repas.', 'Points forts :\r\n- 24 types de vitamines et minéraux\r\n\r\n- 120 mg de vitamine C\r\n\r\n- 120 mg de Calcuim', 'Points forts :\r\n- 24 types de vitamines et minéraux\r\n\r\n- 120 mg de vitamine C\r\n\r\n- 120 mg de Calcuim', 10, 0, 1, 1, 21, '2020/07/05 21:02:08'),
(53, 'gold-whey-standard-45kg-optimum-nutrition', '1350', '1200', 13, 'product_5f02254b04fba9.59792280gold-whey-standard-45kg-optimum-nutrition.jpg', '- Présentation du produit\r\nOptimum nutrition se démarque avec son produit le plus vendu depuis plus de 15 ans, 100% Whey Gold est un produit destiné aux sportifs soucieux de leur développement musculaire. Sa formule est légère, claire et se dissout dans n\'importe quel liquide sans grumeaux ni mousse. Ce produit convient aux personnes qui n\'aiment pas le goût laiteux. Il est également riche en acides aminés essentiels, qui soutiennent les phases de renforcement musculaire et de prise de masse, garantissant une prise de masse sèche rapide et durable. Sans sucre et pratiquement sans graisse, ce lactosérum favorise l\'anabolisme lors des phases de définition musculaire, accélérant la combustion des graisses. L\'or de lactosérum standard compte également parmi ses composants L\'isolat de lactosérum, est l\'une des meilleures protéines de lactosérum et sa qualité nutritionnelle est considérée comme la plus élevée. Sa teneur en acide glutamique est très élevée ainsi qu\'en BCAA. Le 100% Whey Gold Standard est également connu pour son assimilation rapide, ce qui signifie que le corps absorbe rapidement les nutriments qui composent cette protéine.\r\n\r\n - utilisation\r\nPrendre 1 dose dans 350 ml d\'eau, ou dans du lait écrémé, au réveil et en post-entraînement.', 'Points forts :\r\n- Le lactosérum le plus vendu au monde (classement des sites de musculation)\r\n\r\n- 24 g des meilleures protéines de lactosérum, faibles en gras et en sucres\r\n\r\n- Teneur élevée en BCAA\r\n\r\n- Vitesse d\'assimilation exceptionnelle', 'Points forts :\r\n- Le lactosérum le plus vendu au monde (classement des sites de musculation)\r\n\r\n- 24 g des meilleures protéines de lactosérum, faibles en gras et en sucres\r\n\r\n- Teneur élevée en BCAA\r\n\r\n- Vitesse d\'assimilation exceptionnelle', 10, 0, 1, 1, 22, '2020/07/05 21:08:59'),
(54, 'gold-whey-standard-2270kg-optimum-nutrition', '750', '640', 20, 'product_5f0225c599b211.48304859gold-whey-standard-2270kg-optimum-nutrition.jpg', 'Présentation du produit\r\nOptimum nutrition se démarque avec son produit le plus vendu depuis plus de 15 ans, 100% Whey Gold est un produit destiné aux sportifs soucieux de leur développement musculaire. Sa formule est légère, claire et se dissout dans n\'importe quel liquide sans grumeaux ni mousse. Ce produit convient aux personnes qui n\'aiment pas le goût laiteux. Il est également riche en acides aminés essentiels, qui soutiennent les phases de renforcement musculaire et de prise de masse, garantissant une prise de masse sèche rapide et durable. Sans sucre et pratiquement sans graisse, ce lactosérum favorise l\'anabolisme lors des phases de définition musculaire, accélérant la combustion des graisses. L\'or de lactosérum standard compte également parmi ses composants L\'isolat de lactosérum, est l\'une des meilleures protéines de lactosérum et sa qualité nutritionnelle est considérée comme la plus élevée. Sa teneur en acide glutamique est très élevée ainsi qu\'en BCAA. Le 100% Whey Gold Standard est également connu pour son assimilation rapide, ce qui signifie que le corps absorbe rapidement les nutriments qui composent cette protéine.\r\n\r\nutilisation\r\nPrendre 1 dose dans 350 ml d\'eau, ou dans du lait écrémé, au réveil et en post-entraînement.', 'Points forts :\r\n- Le lactosérum le plus vendu au monde (classement des sites de musculation)\r\n\r\n- 24 g des meilleures protéines de lactosérum, faibles en gras et en sucres\r\n\r\n- Teneur élevée en BCAA\r\n\r\n- Vitesse d\'assimilation exceptionnelle', 'Points forts :\r\n- Le lactosérum le plus vendu au monde (classement des sites de musculation)\r\n\r\n- 24 g des meilleures protéines de lactosérum, faibles en gras et en sucres\r\n\r\n- Teneur élevée en BCAA\r\n\r\n- Vitesse d\'assimilation exceptionnelle', 10, 0, 1, 1, 22, '2020/07/05 21:11:01'),
(55, 'nitrotech-45kg-muscletech', '1100', '870', 13, 'product_5f022662a5b7e1.42737589nitrotech-45kg-muscletech.jpg', '- Présentation du produit :\r\nNitro-Tech est une formule protéinée améliorée, scientifiquement conçue pour tous les athlètes à la recherche de plus de muscle, de force et de meilleures performances avec des sources de protéines propres, pures et faciles à digérer. Chaque cuillère de Nitro-Tech contient 30 grammes de protéines, principalement des isolats de protéines de lactosérum et des peptides de lactosérum. Une forme filtrée pour vous apporter un lactosérum de meilleure qualité. Grâce à ce produit, votre corps peut facilement assimiler les acides aminés de la protéine pour construire un muscle vraiment impressionnant. Cela fait de Nitro-Tech un choix idéal comme protéine post-entraînement pour stimuler la synthèse des protéines musculaires à tout moment de la journée. Nitro-Tech a été filtré à l\'aide d\'une technologie de filtration multiphase pour réduire la quantité de graisse, de lactose et d\'impuretés par rapport aux sources de protéines moins chères. Il est également riche en glucides avec 10 grammes par dose\r\n\r\n - utilisation\r\nMélangez une dose de 44 g avec 250 ml d\'eau ou de lait écrémé dans un verre ou un shaker. Utiliser entre les repas principaux ou avant / après votre activité physique.', 'Points forts :\r\n- 30g de protéines par dose\r\n\r\n- 6,8 g Bcaas (acides aminés essentiels)\r\n\r\n- 10g de glucides', 'Points forts :\r\n- 30g de protéines par dose\r\n\r\n- 6,8 g Bcaas (acides aminés essentiels)\r\n\r\n- 10g de glucides', 10, 1, 1, 1, 22, '2020/07/05 21:13:38'),
(56, 'Nitrotech 1,8Kg - Muscletech', '600', '500', 25, 'product_5f02273cd53b60.96608452nitrotech-18kg-muscletech.jpg', '- Présentation du produit\r\nNitro-Tech est une formule protéinée améliorée, scientifiquement conçue pour tous les athlètes à la recherche de plus de muscle, de force et de meilleures performances avec des sources de protéines propres, pures et faciles à digérer. Chaque cuillère de Nitro-Tech contient 30 grammes de protéines, principalement des isolats de protéines de lactosérum et des peptides de lactosérum. Une forme filtrée pour vous apporter un lactosérum de meilleure qualité. Grâce à ce produit, votre corps peut facilement assimiler les acides aminés de la protéine pour construire un muscle vraiment impressionnant. Cela fait de Nitro-Tech un choix idéal comme protéine post-entraînement pour stimuler la synthèse des protéines musculaires à tout moment de la journée. Nitro-Tech a été filtré à l\'aide d\'une technologie de filtration multiphase pour réduire la quantité de graisse, de lactose et d\'impuretés par rapport aux sources de protéines moins chères. Il est également riche en glucides avec 10 grammes par dose\r\n\r\n- utilisation\r\nMélangez une dose de 44 g avec 250 ml d\'eau ou de lait écrémé dans un verre ou un shaker. Utiliser entre les repas principaux ou avant / après votre activité physique.', 'Points forts :\r\n- 30g de protéines par dose\r\n\r\n- 6,8 g Bcaas (acides aminés essentiels)\r\n\r\n- 10g de glucides', 'Points forts :\r\n- 30g de protéines par dose\r\n\r\n- 6,8 g Bcaas (acides aminés essentiels)\r\n\r\n- 10g de glucides', 10, 0, 1, 1, 22, '2020/07/05 21:17:16'),
(57, ' Platinum Hydro Whey 1,6 Kg - Optimum Nutrition', '750', '650', 20, 'product_5f0227d5d3bc86.29798677platinum-hydro-whey-16-kg-optimum-nutrition.jpg', '- Présentation du produit :\r\nPlatinum Hydrowhey est une protéine dans sa forme la plus pure. Il est composé uniquement de protéines de lactosérum hydrolysées qui ont été isolées pour éliminer l\'excès de lactose, de cholestérol, de glucides et de lipides. Le résultat est un produit ultra-pur et rapidement digéré pour la construction musculaire et la reconstitution des acides aminés. 100% des protéines de Platinum Hydrowhey se distingue par sa faible teneur en matières grasses, en cholestérol et sans lactose, donc idéale pour les personnes sujettes aux intolérances! Il est idéal pour les personnes au régime ou en période de sécheresse. Grâce à sa technique de filtration hydrolysée (séparation à l\'eau), la protéine est découpée en petits morceaux (fractions protéiques) c\'est également le cas des acides aminés qui sont ensuite fragmentés, ce qui permet une absorption rapide, pour une digestion plus rapide et une meilleure assimilation que tous les autres protéines. Cette formule riche en BCAA combat la dégradation musculaire, améliore la récupération et optimise les séances d\'entraînement. La protéine Platinum Hydrowhey Optimum est également une excellente source d\'énergie pour les muscles.\r\n\r\n- utilisation\r\nMélangez une dose (30g) de protéine Platinum Hydrowhey avec 200 ml d\'eau ou de lait, à prendre 1 à 3 fois par jour selon vos besoins, en collation ou après l\'entraînement.', 'Points forts :\r\n- Chaque dose fournit 140 calories et 30 g de protéines de lactosérum à digestion rapide.\r\n\r\n- Favorise la croissance musculaire\r\n\r\n- 9 g d\'acides aminés essentiels Leucine, Isoleucine et Valine', 'Points forts :\r\n- Chaque dose fournit 140 calories et 30 g de protéines de lactosérum à digestion rapide.\r\n\r\n- Favorise la croissance musculaire\r\n\r\n- 9 g d\'acides aminés essentiels Leucine, Isoleucine et Valine', 10, 0, 1, 1, 22, '2020/07/05 21:19:49');
INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_photo`, `p_description`, `p_short_description`, `p_feature`, `p_total_view`, `p_in_featured`, `p_is_active`, `tcat_id`, `scat_id`, `date_inserted`) VALUES
(58, ' 100-protéine-lactosérum-5kg-scitec-nutrition', '1150', '1000', 20, 'product_5f022853d83036.60655654100-whey-protein-5kg-scitec-nutrition.jpg', '- Présentation du produit\r\n100% whey professional est un mélange de protéines de haute qualité à base d\'isolat de lactosérum et de concentré de lactosérum. C\'est un produit destiné aux sportifs souhaitant augmenter leur apport quotidien en protéines. 100% whey professional de scitec nutrition est la source de référence de protéines pour la construction musculaire. En effet, 100% whey professionnel est une source de protéines hautement assimilables avec 22 gr de protéines sélectives et très digestibles, il favorise le gain de masse sèche, les phases de définition musculaire et aussi la récupération musculaire. Ce lactosérum est assimilé en moins de 30 minutes, ce qui en fait la protéine de référence pour répondre aux besoins protéiques rapides: au lever, avant l\'effort et après l\'effort. De plus, le lactosérum 100% de Scitec contient les acides aminés nécessaires au maintien du développement musculaire et à la restitution des réserves dans les cellules musculaires. Ce lactosérum contient peu de lactose et presque pas de matières grasses, ce qui en fait un produit très hypocalorique et parfaitement adapté aux phases de définition musculaire ou de régime hypocalorique et hyperprotéiné.\r\n\r\n - utilisation\r\nMélanger 1 dose par jour (30 g) avec 250 ml d\'eau, de lait ou de tout autre liquide. Idéal après l\'entraînement.', 'Points forts :\r\n- 73% de protéines = 22 g par dose\r\n\r\n- 8,8 g d\'acides aminés\r\n\r\n- Lactosérum obtenu par ultrafiltration', 'Points forts :\r\n- 73% de protéines = 22 g par dose\r\n\r\n- 8,8 g d\'acides aminés\r\n\r\n- Lactosérum obtenu par ultrafiltration', 10, 0, 1, 1, 22, '2020/07/05 21:21:55'),
(59, ' meilleure-protéine-2288kg-bpi-sports', '700', '650', 25, 'product_5f022950e9ae79.90480808best-protein-2288kg-bpi-sports.jpg', '- Présentation du produit\r\nBPI Sports Best Protein n\'est pas comme votre produit habituel, c\'est un mélange de trois types de protéines de lactosérum offrant le mélange parfait de qualité nutritionnelle, de goût exquis et de résultats garantis. 100% de protéines de lactosérum à partir de concentré de lactosérum, de lactosérum isolat et hydrolysé, et enrichi de 5,5 g de BCAA. BPI Sports est l\'une des marques de suppléments sportifs les plus influentes aux États-Unis.\r\n\r\n - utilisation\r\nMélangez 1 dose de 32 g 1 à 3 fois par jour avec 300 d\'eau. Idéalement consommé après votre entraînement ou à tout moment de la journée. Ce supplément peut être pris plusieurs fois par jour en fonction de vos besoins.', 'Points forts\r\n- 24g de protéines par distributeur.\r\n\r\n- 5g par service d\'acides aminés ramifiés.\r\n\r\n- Sans gras trans', 'Points forts\r\n- 24g de protéines par distributeur.\r\n\r\n- 5g par service d\'acides aminés ramifiés.\r\n\r\n- Sans gras trans', 10, 0, 1, 1, 22, '2020/07/05 21:26:08'),
(60, 'M-XL-Gants-Gym-Poids-Lourd-Sports-Exercice-Haltérophilie-Gants-Body-Building-Training-Sport-Fitness-Gants', '', '40', 50, 'product_5f022cd9808f69.13271782M-XL-Gym-Gloves-Heavyweight-Sports-Exercise-Weight-Lifting-Gloves-Body-Building-Training-Sport-Fitness-Gloves.jpg', 'Gants de gymnastique M-XL exercice de sport lourd gants de musculation entraînement de musculation gants de Fitness Sport équipement Crossfit', 'Gants de gymnastique M-XL Exercice de sport lourd Gants de musculation Entraînement de musculation Sport.. ', 'Gants de gymnastique M-XL Exercice de sport lourd Gants de musculation Entraînement de musculation Sport.', 11, 0, 1, 3, 23, '2020/07/05 21:41:13'),
(61, 'Professionnel femmes fitness sport demi-doigt équitation gym yoga haltérophilie équipement de musculation respirant gants antidérapants', '60', '40', 25, 'product_5f022e4102aa78.82361758Professional-Women-fitness-sports-half-finger-riding-gym-yoga-weightlifting-bodybuilding-equipment-breathable-nonslip-gloves.jpg', 'Professionnel femmes fitness sports demi-doigt équitation gym yoga haltérophilie équipement de musculation respirant gants antidérapants\r\n', 'Femmes professionnelles fitness sports demi-doigt équitation gym yoga haltérophilie ...\r\n', 'Respirant, antidérapant, résistant à l\'usure', 10, 1, 1, 3, 23, '2020/07/05 21:47:13'),
(62, 'Fitness-Exercise-Cord-Pull-Ropes-Stretch-Elastic-Resistance-Band-Yoga-Training-Fitness-Tension-Bands-Bodybuilding-Equipment', '80', '60', 30, 'product_5f022f838a9c72.72075352Fitness-Exercise-Cord-Pull-Ropes-Stretch-Elastic-Resistance-Band-Yoga-Training-Fitness-Tension-Bands-Bodybuilding-Equipments.jpeg', '* Matériel: Latex\r\n\r\n* Couleur facultative: bleu / jaune / rouge / vert / noir / violet (comme le montrent les images)\r\n\r\n* Longueur: 120 cm (environ)\r\n\r\nContenu du colis:\r\n\r\n1 * bande de résistance', 'Remarque:\r\n\r\n1. La couleur réelle de l\'article peut être légèrement différente des images affichées sur le site Web en raison de nombreux facteurs tels que la luminosité de votre moniteur et la luminosité de la lumière.\r\n\r\n2. Veuillez permettre un léger é', '* Cordes d\'exercice de remise en forme tirent la corde extensible bandes de résistance élastiques formation de yoga\r\n\r\n* 100% tout neuf et de haute qualité\r\n\r\n* Idéal pour l\'entraînement en force à domicile\r\n\r\n* Fabriqué à partir de latex de qualité supérieure et ne s\'étirera pas trop contrairement aux moins chers\r\n\r\n* Vous permet de tonifier et sculpter chaque groupe musculaire\r\n\r\n* Convient à la fois aux hommes et aux femmes\r\n\r\n* Idéal pour les voyages et le stockage\r\n\r\n* Nos tubes de résistance sont faits de latex de caoutchouc naturel de qualité professionnelle\r\n\r\n* Il ne recule pas et ne tordra pas les poils de votre poitrine, comme cela peut parfois arriver avec les ressorts métalliques\r\n\r\n* Les bandes en latex sont facilement ajoutées ou retirées\r\n\r\n* Une utilisation à long terme peut embellir la courbe du corps humain, renforcer les lignes musculaires, en particulier les muscles du bras supérieur\r\n\r\n* Il a également un fort effet de remise en forme\r\n\r\n* Non seulement les cuisses minces, la taille, renforcer les biceps, mais aussi traiter les douleurs musculaires\r\n\r\n* Ce bracelet de fitness peut améliorer la fonction d\'autres parties du corps et éliminer la couche de graisse corporelle en excès afin que votre silhouette devienne plus en forme', 19, 0, 1, 3, 24, '2020/07/05 21:52:35'),
(63, 'Athletic-Ballet-Stretch-Resistance-Rubber-Bands-For-Dance-Gymnastics-Pilates-Bodybuilding-Training-Equipment-Pull-Up-Strengthen', '150', '70', 30, 'product_5f02302c9968d7.27426382Athletic-Ballet-Stretch-Resistance-Rubber-Bands-For-Dance-Gymnastics-Pilates-Bodybuilding-Training-Equipment-Pull-Up-Strengthen.jpg', 'Bandes de caoutchouc de résistance à l\'étirement de Ballet athlétique pour la gymnastique de danse équipement d\'entraînement de musculation Pilates tirer vers le haut renforcer\r\n', 'Bandes de caoutchouc de résistance d\'étirement de ballet athlétique pour la gymnastique de danse.', 'rand neuf et de haute qualité.\r\nIdéal pour la musculation à domicile.\r\nFabriqué à partir de latex naturel de première qualité et ne s\'étirera pas trop contrairement aux moins chers\r\nVous permet de tonifier et de sculpter chaque groupe musculaire.\r\nTant pour les hommes que pour les femmes.\r\n \r\n \r\nLongueur 104cm, circonférence208cm\r\nLargeur: 1,3 cm (rouge) / 2,2 cm (noir) / 3,2 cm (violet)\r\nÉpaisseur: 4,5 mm\r\nGamme de puissance: 10-35LBS (rouge) / 30-60LBS (noir) / 40-80LBS (violet)\r\n  \r\nDéveloppé pour l\'entraînement d\'étirement requis pour le ballet, la danse contemporaine, les acclamations, la gymnastique et d\'autres sports de performance. Également utilisé en physiothérapie pour augmenter la flexibilité et l\'amplitude des mouvements.\r\nFitness Band offre une prise antidérapante et sûre pour les pieds et les mains.\r\nBoycott fort du meilleur intérêt. 41 pouces de long, 82 pouces de circonférence. Il s\'agit d\'une largeur complète de 1-1 / 2 pouces de sorte qu\'elle ne pénètre pas autant dans vos mains, vos pieds, vos jambes et votre dos que des bandes plus étroites.', 10, 0, 1, 3, 24, '2020/07/05 21:55:24'),
(64, 'Une-paire-de-30kg-haltère-poids-ensemble-réglable-solide-fitness-haltère-ensemble-sécurité', '2480', '1280', 20, 'product_5f0231b3e09233.81261230A-Pair-of-30kg-Dumbbell-Weight-Set-Adjustable-Solid-Fitness-Dumbbell-Set-Safety-and-Non-slip.jpg', 'Cette paire d\'haltères est parfaite pour un entraînement sur tout le corps et peut vous aider à atteindre tous vos objectifs de mise en forme, sans quitter la maison. Avec un design ergonomique, une technologie de texture, une barre d\'extension antidérapante, un poids réglable. Cela vous aidera à résoudre les déséquilibres musculaires et à maintenir un corps sain!\r\n', 'Une-paire-de-30kg-haltère-ensemble-poids-réglable ...\r\n', '- Marque: BESPORTBLE.\r\n- La couleur noire.\r\n- Matériel: HDPE, ciment.\r\n- Taille: 50 x 21 x 25 cm.\r\n- Cette paire d\'haltères est bien faite avec un matériau de haute qualité, une utilisation durable et durable.\r\n- L\'haltère de 30 kg mis en forme exercice gratuit à domicile gym biceps entraînement de perte de poids.\r\n- Brûlez la graisse corporelle plus efficacement en vous entraînant avec des haltères lestés qu\'avec du vélo, de la natation ou du jogging.\r\n- Conception de plaques de poids réglables, vous pouvez donc changer les plaques de poids en fonction de votre limite de poids.\r\n- Idéal pour brûler les graisses et travailler la tonification, idéal pour la construction musculaire et la mise en forme du corps.\r\n- Avec des écrous de sécurité et antidérapants, vos problèmes de sécurité sont sans souci, il vous suffit d\'acheter et de vous mettre en forme maintenant!\r\n- Remarque: l\'ensemble de poids d\'haltères est rempli de ciment à l\'intérieur, pas vide.\r\n\r\nListe de colisage\r\n\r\n2 x haltères BESPORTBLE\r\n4 plaques de poids de 2,5 kg\r\n4 plaques de poids de 2 kg\r\n4 x 1,5 plaques de poids\r\n4 x 1,25 plaques de poids\r\n2 x barres d\'extension\r\n4 x noix', 11, 0, 1, 3, 25, '2020/07/05 22:01:55'),
(65, '1-paire-25-28-30-mm-Barbell-Clamp-Spring-Collar-Clips-Gym-Weight-Dumbbell-Lock-Standard', '30', '10', 50, 'product_5f0232397b9894.567311391-Pair-25-28-30-mm-Barbell-Clamp-Spring-Collar-Clips-Gym-Weight-Dumbbell-Lock-Standard.jpg', '1 paire 25/28/30 mm pince d\'haltère pince à ressort Clips Gym poids haltère serrure Kit de levage Standard # H030 #\r\n', '1 paire 25/28/30 mm pince d\'haltère pince à ressort Clips Gym poids haltère serrure.\r\n', 'Matériel: plastique et métal\r\nCouleur: argent et noir\r\nEmpêche les poids des plaques de glisser de la barre\r\nIls s\'adapteront à tous les haltères ou barres d\'haltères standard de 1 \"Trou (2.5cm / 2.8cm / 3cm)\r\nFabriqué en acier solide et poignée de support en caoutchouc. Les poignées en caoutchouc permettent un retrait confortable et facile\r\nTaille globale:\r\n1. diamètre interne 25 MM: App.7.7x7x2cm / 3.03x2.76x0.79 \"\r\n2. diamètre interne 28 MM: app.5cmx1.2cm / 1.97\'x0.47 \'\r\n3. diamètre interne 30 MM: app.5cmx1.2cm / 1.97\'x0.47 \'\r\nQuantité: 2 pièces (1 paire)\r\nRemarque: en raison de la différence entre les différents moniteurs, l\'image peut ne pas refléter la couleur réelle de l\'article. Je vous remercie\r\n\r\nLe forfait comprend:\r\n2 Pcs x 25/28 / 30mm Clips de collier à ressort Barbell', 10, 0, 1, 3, 25, '2020/07/05 22:04:09'),
(66, 'L-Natural-Randonnée-Haltère-Gym-Sport-Bottle-Portable-Water-Bottle-Men-s-Plastic-Large', '70', '50', 30, 'product_5f0232f323e599.438349042-2-L-Natural-Hiking-Dumbbell-Gym-Sport-Bottle-Portable-Water-Bottle-Men-s-Plastic-Large.jpg', 'L Naturel Randonnée Haltère Gym Sport Bouteille Portable Bouteille D\'eau En Plastique Hommes Grande Tasse D\'eau Fitness Coupe Haltère\r\n', 'Bouteille d\'eau portative de bouteille de sport de sport d\'haltère de randonnée naturelle ...', 'Aucune fonctionnalité\r\n', 16, 1, 1, 3, 25, '2020/07/05 22:07:15'),
(67, ' 1-paire-25mm-Spinlock-Colliers-Barbell-Collier-Lock-Dumbell-Clips-Clamp-Haltérophilie-Bar-Gym-Haltère', '40', '30', 15, 'product_5f0236ea8a1940.373279741-Pair-25mm-Spinlock-Collars-Barbell-Collar-Lock-Dumbell-Clips-Clamp-Weight-lifting-Bar-Gym-Dumbbell.jpg', '1 paire 25mm Spinlock Colliers Barbell Collier Verrouillage Haltères Clips Pince Haltérophilie Bar Gym Haltère Fitness Body Building', '1 paire de colliers Spinlock de 25 mm pour collier d\'haltères ...\r\n', '2. pince en plastique renforcée, conception créative douverture et de fermeture rapide.\r\n3. pince de haute qualité, peut mieux verrouiller la barre OB, adaptée à la barre autrichienne standard de 1 pouce.\r\n4.Idéal pour la musculation, le fitness, la gym et l\'entraînement.\r\n\r\nSpécification:\r\nMatériel: caoutchouc de nylon\r\nCouleur: noir （comme le montrent les images）\r\nDiamètre intérieur: 25 mm (1 pouce) (environ)\r\nPoids: 100g (environ)\r\n\r\nContenu du coffret:\r\n1 paire de colliers de serrage Barbell', 12, 0, 1, 3, 25, '2020/07/05 22:24:10'),
(68, 'MAD MAX -Extreme Ceinture (Original)', '', '14', 30, 'product_5f04919189f6a5.16757374mad-max-extreme-ceinture-original.jpg', 'Cette ceinture de poids est destinée à protéger votre dos lors de vos séances de musculation. Solide, il vous offre soutien et stabilité lors de la manipulation de charges lourdes.\r\n', 'Cette ceinture de poids est destinée à protéger votre dos lors de vos séances de musculation.\r\n', 'Material : Cuir', 14, 0, 1, 2, 16, '2020/07/07 17:15:29');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product_color`
--

CREATE TABLE `tbl_product_color` (
  `id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_product_color`
--

INSERT INTO `tbl_product_color` (`id`, `color_id`, `p_id`) VALUES
(86, 1, 31),
(87, 2, 31),
(88, 1, 30),
(89, 2, 30),
(90, 6, 30),
(91, 2, 29),
(92, 6, 29),
(93, 2, 28),
(94, 6, 28),
(95, 2, 27),
(96, 6, 27),
(97, 1, 26),
(98, 2, 26),
(99, 6, 26),
(100, 1, 25),
(101, 2, 25),
(102, 3, 25),
(103, 1, 24),
(104, 2, 24),
(105, 3, 24),
(106, 6, 24),
(107, 1, 23),
(108, 2, 23),
(109, 6, 23),
(110, 2, 22),
(111, 6, 22),
(112, 1, 21),
(113, 2, 21),
(114, 3, 21),
(115, 6, 21),
(116, 2, 20),
(117, 3, 20),
(118, 6, 20),
(119, 2, 68),
(120, 3, 68),
(121, 6, 68);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_product_size`
--

CREATE TABLE `tbl_product_size` (
  `id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_product_size`
--

INSERT INTO `tbl_product_size` (`id`, `size_id`, `p_id`) VALUES
(94, 2, 31),
(95, 3, 31),
(96, 2, 30),
(97, 3, 30),
(98, 3, 29),
(99, 2, 28),
(100, 3, 28),
(101, 2, 27),
(102, 3, 27),
(103, 3, 26),
(104, 5, 26),
(105, 6, 26),
(106, 2, 25),
(107, 3, 25),
(108, 1, 24),
(109, 3, 24),
(110, 4, 24),
(111, 5, 24),
(112, 7, 24),
(113, 2, 23),
(114, 1, 22),
(115, 2, 22),
(116, 3, 22),
(117, 1, 21),
(118, 2, 21),
(119, 3, 21),
(120, 5, 21),
(121, 6, 21),
(122, 1, 20),
(123, 3, 20),
(124, 6, 20),
(125, 7, 20),
(126, 2, 68),
(127, 3, 68);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rt_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  `time_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_rating_blog`
--

CREATE TABLE `tbl_rating_blog` (
  `rt_b_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_rating_blog`
--

INSERT INTO `tbl_rating_blog` (`rt_b_id`, `blog_id`, `cust_id`, `comment`, `rating`, `status`, `time_rating`) VALUES
(17, 17, 9, 'bon article', 3, 1, '2020-09-10 14:31:00');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `paypal_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `contact_email`, `paypal_email`) VALUES
(1, '', 'customer93@gmail.com', 'bzn_ayoub@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, '3XL'),
(8, '31'),
(9, '32'),
(10, '33'),
(11, '34'),
(12, '35'),
(13, '36'),
(14, '37'),
(15, '38'),
(16, '39'),
(17, '40'),
(18, '41'),
(19, '42'),
(20, '43'),
(21, '44'),
(22, '45'),
(23, '46'),
(24, '47'),
(25, '48'),
(26, 'Free Size'),
(27, 'One Size for All'),
(28, '10');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_sous_category`
--

CREATE TABLE `tbl_sous_category` (
  `scat_id` int(11) NOT NULL,
  `scat_name` varchar(255) NOT NULL,
  `tcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_sous_category`
--

INSERT INTO `tbl_sous_category` (`scat_id`, `scat_name`, `tcat_id`) VALUES
(14, 'Homme', 2),
(15, 'Femmes', 2),
(16, 'accessoires', 2),
(17, 'gainers', 1),
(18, 'Bcaa && Acides Aminés', 1),
(19, 'Barres,Snacks,Boissons', 1),
(20, 'Energie&endurance', 1),
(21, 'Vitamines & Minéraux', 1),
(22, 'Protéines', 1),
(23, 'Gants de fitness', 3),
(24, 'Bandes de résistance', 3),
(25, 'haltéres', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` varchar(255) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int(1) NOT NULL,
  `cust_photo` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_password`, `cust_datetime`, `cust_timestamp`, `cust_status`, `cust_photo`, `role`) VALUES
(2, 'khalid', 'lemuilhi', 'super_admin@gmail.com', '+6487111112', 'iitalia ', 'hhhhhhhhghgjgh', 'casa', 'zone 4', '1203', '202cb962ac59075b964b07152d234b70', '2020-07-01 03:04:16', '1593608656', 1, 'user_admin5f49605863e960.59955795chng_ad_img.jpg', 'super_admin'),
(11, 'khaldoni', '', 'khalid@gmail.com', '062547979', 'Maroc', 'avenue milano temara', 'temara', 'rabat', '1780', '202cb962ac59075b964b07152d234b70', '2020-09-10 02:51:47', '1599742307', 1, 'user_admin5f5a2163141b03.79612878img_user.jpg', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category` (`tcat_id`);

--
-- Index pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`tcat_id`);

--
-- Index pour la table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Index pour la table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Index pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product` (`product_id`);

--
-- Index pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `product_categories_tcat` (`tcat_id`);

--
-- Index pour la table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productcolor_product` (`p_id`);

--
-- Index pour la table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productsize_product` (`p_id`);

--
-- Index pour la table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rt_id`),
  ADD KEY `productrating_product` (`p_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Index pour la table `tbl_rating_blog`
--
ALTER TABLE `tbl_rating_blog`
  ADD PRIMARY KEY (`rt_b_id`),
  ADD KEY `product_ratingblog_customer` (`cust_id`);

--
-- Index pour la table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Index pour la table `tbl_sous_category`
--
ALTER TABLE `tbl_sous_category`
  ADD PRIMARY KEY (`scat_id`),
  ADD KEY `product_sous_cat_top_cat` (`tcat_id`);

--
-- Index pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `tcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT pour la table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT pour la table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `tbl_rating_blog`
--
ALTER TABLE `tbl_rating_blog`
  MODIFY `rt_b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `tbl_sous_category`
--
ALTER TABLE `tbl_sous_category`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_category` FOREIGN KEY (`tcat_id`) REFERENCES `tbl_category` (`tcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `order_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `product_categories_tcat` FOREIGN KEY (`tcat_id`) REFERENCES `tbl_category` (`tcat_id`) ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tbl_product_color`
--
ALTER TABLE `tbl_product_color`
  ADD CONSTRAINT `productcolor_product` FOREIGN KEY (`p_id`) REFERENCES `tbl_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_product_size`
--
ALTER TABLE `tbl_product_size`
  ADD CONSTRAINT `productsize_product` FOREIGN KEY (`p_id`) REFERENCES `tbl_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `productrating_product` FOREIGN KEY (`p_id`) REFERENCES `tbl_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `tbl_customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_rating_blog`
--
ALTER TABLE `tbl_rating_blog`
  ADD CONSTRAINT `product_ratingblog_customer` FOREIGN KEY (`cust_id`) REFERENCES `tbl_customer` (`cust_id`);

--
-- Contraintes pour la table `tbl_sous_category`
--
ALTER TABLE `tbl_sous_category`
  ADD CONSTRAINT `product_sous_cat_top_cat` FOREIGN KEY (`tcat_id`) REFERENCES `tbl_category` (`tcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
