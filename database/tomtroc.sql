-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 avr. 2026 à 14:40
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `statut` text NOT NULL DEFAULT '1',
  `date_creation` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `image`, `description`, `statut`, `date_creation`, `user_id`) VALUES
(5, 'Changer L\'eau des fleurs', 'Valérie Perrin', 'assets/images/livre4.jpg\r\n', 'Violette Toussaint est garde-cimetière dans une petite ville de Bourgogne. Les gens de passage et les habitués viennent se confier et se réchauffer dans sa loge. Avec la petite équipe de fossoyeurs et le jeune curé, elle forme une famille décalée. Mais quels événements ont mené Violette dans cet univers où le tragique et le cocasse s’entremêlent ?\r\n\r\nAprès le succès des Oubliés du dimanche, un nouvel hymne au merveilleux des choses simples.', 'Disponible', '2026-02-21 20:08:16', 2),
(6, 'Our vicious lies', 'Lyla Mars', 'assets/images/livre5.jpg\r\n', 'Bella alias Wheeler le sait mieux que quiconque : mentir peut sauver. Ou détruire. Elle l’a appris au sein de la VEX, une section spéciale des services de renseignements britanniques, où elle a été façonnée pour devenir une arme invisible. Mais derrière l’espionne redoutable, demeure aussi une fille aînée qui porte le poids d’un foyer en ruine.\r\n\r\nSa nouvelle mission : s’introduire dans le cercle fermé d’une famille aussi puissante que corrompue, en se faisant passer pour l’épouse d’un autre espion. Pas n’importe lequel. L’agent Qamari. Brillant. Implacable. Terriblement fascinant.\r\n\r\nCelui qu’elle connaît depuis qu’elle a intégré la VEX, où il était son jeune et insupportable mentor... avant que tout ne bascule.\r\n\r\nAujourd’hui, ils doivent convaincre leurs cibles qu’ils s’aiment, tout en luttant contre ce qui risque de se réveiller entre eux.\r\n\r\nCar certains mensonges résonnent plus fort que la vérité. Et ceux qu’on raconte par amour sont les plus vicieux de tous.', 'Disponible', '2026-02-21 20:10:02', 3),
(7, 'La poursuite du bonheur', 'Douglas Kennedy', 'assets/images/livre6.jpg', 'Dans l\'Amérique de l\'après-guerre minée par ses contradictions, des années noires du maccarthysme à nos jours, La poursuite du bonheur nous plonge au cœur d\'une magnifique histoire d\'amour.\r\n\r\n\r\nManhattan, Thanksgiving 1945. Artistes, écrivains, musiciens... tout Greenwich Village se presse à la fête organisée par Eric Smythe, dandy et dramaturge engagé. Ce soir-là, sa sœur Sara, fraîchement débarquée de New York, croise le regard de Jack Malone, journaliste de l\'armée américaine. Amour d\'une nuit, passion d\'une vie, l\'histoire de Sara et Jack va bouleverser plusieurs générations.\r\n\r\nUn demi-siècle plus tard, à l\'enterrement de sa mère, Kate Malone remarque une vieille dame qui ne la quitte pas des yeux. Coups de téléphone, lettres incessantes... Commence alors un harcèlement de tous les instants. Jusqu\'au jour où Kate reçoit un album de photos... La jeune femme prend peur : qui est cette inconnue ? Que lui veut-elle ?\r\n\r\nDouglas Kennedy nous livre ici un roman ambitieux où, à travers d\'inoubliables portraits de femmes, résonnent les thèmes qui lui sont chers : la quête inlassable du bonheur, la responsabilité individuelle, la trahison.\r\n', 'Disponible', '2026-03-05 16:26:19', 2),
(13, 'L\'étranger', 'Albert Camus', 'uploads/9f3e387a78ebfcdeb411a8384d567cd4.jpg', '\"C\'est alors que tout a vacillé. La mer a charrié un souffle \r\népais et ardent. Il m\'a semblé que le ciel s\'ouvrait sur toute son étendue pour laisser pleuvoir du feu. Tout mon être s\'est tendu et j\'ai crispé ma main sur le revolver. La gâchette a cédé, j\'ai touché le ventre poli de la crosse et c\'est là, dans le bruit à la fois sec et assourdissant, que tout a commencé. J\'ai secoué la sueur et le soleil. J\'ai compris que j\'avais détruit l\'équilibre du jour, le silence exceptionnel d\'une plage où j\'avais été heureux.\" L\'étranger est le premier roman d\'Albert Camus.', 'Disponible', '2026-03-30 13:49:12', 5),
(14, 'La femme de ménage', 'Frieda McFadden', 'uploads/a0ad0273ef9ce018a648cf6f00dff8c5.jpg', 'Millie est la nouvelle femme de ménage des Winchester, riche famille de New York. Elle s’occupe aussi chaque jour de leur fille. Ce travail est une chance inespérée, l’occasion de repartir de zéro. Mais si M. Winchester se montre charmant, son épouse paraît de plus en plus instable. La rumeur court qu’elle aurait tenté de noyer sa fille il y a quelques années. Chaque jour le malaise grandit… Pour Millie, est-il déjà trop tard ?', 'Disponible', '2026-03-30 13:49:12', 6),
(15, 'Le Prince de Machiavel – Édition complète : La nouvelle traduction moderne en français (traduite et annotée)', 'Nicolas Machiavel', 'uploads/f9153b3676908dd303f3a37eee67ae47.jpg', 'Un classique intemporel de la stratégie et du pouvoir — désormais en français moderne, avec la structure et le sens intégralement préservés.  Depuis plus de 500 ans, Le Prince de Nicolas Machiavel est l’une des œuvres les plus influentes — et controversées — jamais écrites sur le leadership, la politique et la nature humaine. Cette Édition Complète offre les réflexions de Machiavel au lecteur contemporain grâce à une modernisation fidèle, ligne par ligne, qui conserve le ton, la structure et le message originaux dans leur intégralité.  Conçue pour être à la fois accessible et authentique, cette édition permet aux lecteurs modernes de se plonger directement dans les idées de Machiavel — sans être freinés par un langage ancien ou une formulation trop complexe.  Qu’est-ce qui rend cette édition unique ?  Une traduction fidèle en français moderne : Un langage clair et contemporain qui reste fidèle à la voix de Machiavel, en préservant l’audace, la logique et le rythme du texte original. Annotations historiques et politiques : Des notes concises éclairent les références aux personnages, lieux et événements politiques de l’Italie de la Renaissance — ajoutant du contexte sans alourdir la lecture. Commentaires chapitre par chapitre : Chaque chapitre est accompagné d’une brève réflexion pour aider le lecteur à relier les principes de Machiavel au leadership, au monde des affaires et à la stratégie contemporaine. Texte complet et non abrégé : L’œuvre intégrale du Prince est ici présentée, enrichie d’éléments explicatifs qui approfondissent la compréhension sans modifier l’essence du texte. Que vous soyez étudiant, entrepreneur, stratège ou simplement curieux, Le Prince propose des leçons intemporelles sur le pouvoir, l’ambition et la prise de décision. Cette édition les rend accessibles, actuelles et percutantes pour les lecteurs d’aujourd’hui.', 'Disponible', '2026-03-30 13:49:12', 5),
(16, 'Sur les ossements des morts', 'Olga Tokarczuk', 'uploads/f81450507209087a403286310e20b2eb.jpg', 'Janina Doucheyko vit seule dans un petit hameau au coeur des Sudètes. Ingénieur à la retraite, elle se passionne pour la nature, l\'astrologie et l\'oeuvre de William Blake. Un matin, elle retrouve un de ses voisins mort dans sa cuisine, étouffé par un petit os. C\'est le début d\'une longue série de crimes mystérieux sur les lieux desquels on retrouve des traces animales. La police enquête. Les victimes avaient toutes pour la chasse une passion dévorante. Quand Janina Doucheyko s\'efforce d\'exposer sa théorie sur la question, tout le monde la prend pour une folle... Car comment imaginer qu\'il puisse s\'agir d\'une vengeance des animaux ?', 'Disponible', '2026-03-30 13:49:12', 5),
(17, 'La femme de ménage se marie', 'Frieda McFadden', 'uploads/570f22ffad0ef364c4d6d5dbbdb2f02d.jpg', 'Aujourd’hui est censé être le plus beau jour de la vie de Millie. La femme de ménage se marie avec Enzo, l’homme de ses rêves, et rien ne peut gâcher son bonheur. D’autant que ses parents, avec lesquels elle est brouillée depuis quinze ans, ont promis d’assister à la cérémonie.\r\n\r\nMais alors qu’elle devrait se préoccuper uniquement de sa robe et de sa coiffure, Millie est confrontée à un sérieux problème : quelqu’un ne veut pas qu’elle vive assez longtemps pour prononcer ses vœux. Quelqu’un qui épie ses faits et gestes, jusque dans sa chambre.\r\n\r\nPrise au piège, Millie décide pourtant de ne pas se laisser intimider. Elle se mariera coûte que coûte, pour le meilleur et pour le pire. Mais le pire pourrait bien arriver plus tôt que prévu…', 'Disponible', '2026-03-30 13:49:12', 6),
(18, 'La femme de ménage voit tout', 'Frieda McFadden', 'uploads/202da410f4595d271c8ed654bc438e41.jpg', 'Après avoir été au service des autres en tant que femme de ménage, Millie s\'est enfin construit une vie à elle. Elle vient même d\'emménager dans une belle maison, à l\'abri d\'une petite impasse chic et tranquille, avec son mari et ses deux enfants. Mais son rêve d\'une existence paisible se ternit rapidement lorsqu\'elle rencontre ses voisins. Il y a Suzette, bien trop snob et aguicheuse, et son insipide mari, Jonathan, sans oublier leur terrifiante femme de ménage au regard perçant et au comportement plus que suspect. Les craintes de Millie montent d\'un cran lorsque d\'étranges bruits se font entendre la nuit dans sa propre maison...', 'Disponible', '2026-03-30 13:49:12', 6),
(19, 'L\'intruse', 'Frieda McFadden', 'uploads/b125d6fe4bcf649f41c5c83aa6b8f453.jpg', 'La petite maison de Casey, perdue au cœur de la forêt, n’est pas faite pour affronter la tempête qui s’abat cette nuit-là. Le vent hurle, les murs tremblent… et quelqu’un observe. Depuis sa fenêtre, Casey aperçoit une jeune fille, seule. Couverte de sang, un couteau à la main, elle refuse de dire qui elle est et d’expliquer ce qui s’est passé.\r\n\r\nMalgré tout, Casey décide de l’aider. Mais au fil des heures, les incohérences s’accumulent. Quelque chose ne colle pas. Et lorsqu’elle fait, au milieu de la nuit, une découverte qui lui glace le sang, il est déjà trop tard.\r\n\r\nCar cette jeune fille cache un secret. Un secret pour lequel elle est prête à tout. Et si Casey s’approche trop près de la vérité, elle pourrait bien ne jamais voir le soleil se lever…', 'Disponible', '2026-03-30 13:49:12', 5),
(20, 'Malgré tout ce qui nous sépare', 'Sophie Tal Men', 'uploads/c6446dbda9144721628d9722a84cd24e.jpg', 'Rose est sage-femme sur l’île de Groix. Dans le tumulte d’une guerre qui dure depuis trop longtemps, elle se donne corps et âme à ses patientes. Sa vie bascule en septembre 1944 lorsque son domicile est réquisitionné pour héberger deux officiers ennemis. Aussi révoltée qu’impuissante, Rose voit alors ses certitudes vaciller dans cette maison où chaque regard semble une menace, chaque silence un danger, et où les destins vont se nouer à jamais…\r\nFidèle à son île bretonne, Sophie Tal Men nous livre une formidable histoire de courage et solidarité. Elle nous plonge au cœur des drames de l’Occupation aux côtés d’une femme forte, passionnée et entière.\r\n\r\n« Un grand amour ne s’oublie jamais. »\r\nComment rester libre et droite quand est cernée par l’ennemi ?', 'Disponible', '2026-03-30 13:49:12', 5),
(24, 'La symbolique des echecs', 'Thierry Minkowski', 'uploads/266146eca7b8d013121c7535a0eb000b.jpg', 'La symbolique des échecs propose une exploration originale du jeu d’échecs, non pas comme un simple jeu de stratégie, mais comme un système riche de significations.\r\n\r\nÀ partir de l’observation de l’échiquier, des mouvements des pièces et du déroulement d’une partie, ce livre met en lumière les structures profondes qui organisent ce jeu millénaire.\r\n\r\nPourquoi chaque pièce possède-t-elle une limite particulière ?\r\nPourquoi la pièce la plus puissante n’est-elle pas celle qui décide de la fin du jeu ?\r\nQue révèle la progression du pion à travers l’échiquier ?\r\nPourquoi une partie commence-t-elle dans un ordre parfait pour se transformer progressivement ?\r\n\r\nÀ travers ces questions, Thierry Minkowski propose une réflexion accessible et originale sur la géométrie, les paradoxes et les symboles présents dans le jeu d’échecs.\r\n\r\nUn livre destiné aussi bien aux amateurs d’échecs qu’aux lecteurs curieux de découvrir la richesse philosophique d’un jeu vieux de plus de mille ans.', 'Disponible', '2026-03-30 13:49:12', 6),
(25, 'Crâne d\'os', 'Mo Hayder', 'uploads/13a5f01a44a6c4e13b192d60ca43bb94.jpg', 'Les fantômes n\'existent pas...\r\nUn terrible accident...\r\nNiché au cœur des Cotswolds, Eastonbirt a tout du village anglais idyllique.\r\nMais ses habitants restent hantés par une tragédie.\r\nUne tragédie à laquelle Alex Mullins a survécu.\r\n\r\nLa silhouette d\'une femme...\r\nCette nuit-là, une femme au visage décharné s\'est penchée sur Alex.\r\nUne femme qui ressemble à Crâne d\'os, une prostituée assassinée un siècle plus tôt.\r\n\r\nUne vérité pire que la légende...\r\nAlex ne croit pas aux légendes urbaines.\r\nAvec Arran, son ami d\'enfance, elle décide de remonter le fil de la nuit du drame.\r\nMais tandis que leur enquête progresse, des événements inquiétants viennent perturber leurs vies.\r\nEt bientôt, la femme sans visage refait surface.\r\n\r\n\r\n\" Dans une veine aussi choquante et sinistre que tout ce que Hayder a pu écrire. C\'est un plaisir inattendu et doux-amer de retrouver l\'un de nos meilleurs auteurs de romans policiers. \" – The Observer', 'Disponible', '2026-03-30 13:49:12', 2),
(26, 'Dans le cœur, là où tu demeures', 'Yasmin Alma', 'uploads/b1722394ec31f94a7806857b271a3d7b.jpg', 'Avez-vous perdu un être cher et ressentez-vous chaque jour le poids de son absence ?\r\n\r\nDans ces pages, vous découvrirez des poèmes et des pensées qui parlent au cœur, offrant réconfort et compréhension dans un moment de profonde tristesse.\r\n\r\nÀ travers les expériences personnelles de l’autrice, ce livre explore les nuances de la douleur et du deuil, mais surtout, il vous guide vers une renaissance émotionnelle, illuminant le chemin vers la sérénité.\r\n\r\nCe livre vous propose :\r\n\r\nUn réconfort profond – Des poèmes qui résonnent avec votre douleur, pour vous aider à vous sentir moins seul.\r\nDes expériences partagées – Des reflets d’émotions vécues par l’autrice, qui rendent le deuil plus facile à traverser.\r\nUne renaissance émotionnelle – Des mots inspirants qui offrent l’espoir d’un nouveau départ.\r\nUn compagnon de lecture – Un livre à ouvrir chaque fois que vous avez besoin de consolation et de réflexion.\r\nNe laissez pas la douleur vous submerger.\r\n\r\nTrouvez la force et la paix à travers les pages de « Dans le cœur, là où tu demeures ».\r\n\r\nCommencez votre voyage vers la guérison.', 'Disponible', '2026-03-30 13:49:12', 3),
(27, 'Ruptures', 'Bernard Minier', 'uploads/ae495e6f90d595c38efabf1aab910b96.jpg', 'Lucia Guerrero face aux nouveaux maîtres du monde\r\nLundi 28 avril 2025. L\'Espagne est paralysée par la plus grande panne électrique de son histoire. Directrice de la filiale espagnole de StarCo, Emma Bosch se précipite au chevet de son père, dont la vie dépend d\'un respirateur artificiel. Elle n\'arrivera jamais.\r\n\r\nAux États-Unis, les corps sans vie de plusieurs collaboratrices du célèbre milliardaire Milton Gail, le fantasque et génial fondateur de StarCo, sont retrouvés. Toutes étaient enceintes.\r\n\r\nC\'est le début de l\'extraordinaire enquête que va mener Lucia Guerrero des deux côtés de l\'Atlantique et dans les fabriques ultra-secrètes où s\'inventent le présent et le futur de milliards d\'individus. Jusqu\'à un face-à-face inoubliable avec celui qui a fait main basse sur la terre et sur l\'espace.\r\n\r\nUne plongée glaçante dans la toute-puissance de l\'Amérique de Donald Trump\r\n\r\nÀ propos de LUCIA :\r\n\" Du jamais-lu depuis Millénium \" Anne Crignon – L\'Obs', 'Disponible', '2026-03-30 13:42:57', 5),
(33, 'le labo du jeu video', 'david louapre', 'uploads/9edecea6318c93472cdce29081ab6703.jpg', 'du pixel à l\'ia', 'Disponible', '2026-04-03 13:17:03', 10);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `message`, `sender_id`, `receiver_id`, `created_at`, `is_read`) VALUES
(1, 'Bonjour, est ce que le livre est toujours dispo?', 6, 3, '2026-03-19 14:32:19', 1),
(2, 'Bonjour', 5, 6, '2026-03-19 14:34:27', 1),
(3, 'bonjour', 2, 6, '2026-03-19 14:36:08', 1),
(4, 'Bonjour', 6, 5, '2026-03-19 22:14:35', 1),
(5, 'bonjour', 6, 5, '2026-03-19 22:50:15', 1),
(6, 'hello', 2, 5, '2026-03-20 13:44:37', 1),
(7, 'hello', 5, 6, '2026-03-20 14:04:00', 1),
(11, 'Bonjour, le livre est-il toujours disponible? merci beaucoup', 3, 5, '2026-03-20 15:05:16', 1),
(15, 'Est il possible de voir des photos du livre pour voir s\'il est en bon état?', 6, 5, '2026-03-24 17:58:39', 1),
(16, 'biensur', 5, 6, '2026-03-24 18:01:48', 1),
(18, 'Ce livre m\'intéresse', 6, 5, '2026-03-24 18:25:29', 1),
(19, 'coucou', 2, 5, '2026-03-24 18:35:51', 1),
(20, 'Merci pour l\'envoie', 2, 5, '2026-03-24 18:36:44', 1),
(21, 'test SQL: user 2 -> user 5', 2, 5, '2026-03-24 18:48:52', 1),
(22, 'quel livre vous intéresserez dans ma bibliothèque?', 5, 6, '2026-03-25 10:56:46', 1),
(23, 'L\'intruse m\'interesse beaucoup', 6, 5, '2026-03-25 10:57:58', 1),
(24, 'Bonjour', 7, 6, '2026-03-25 15:36:38', 0),
(25, 'Bonjour, votre livre m\'interessse', 5, 2, '2026-03-30 13:34:25', 1),
(26, 'très bien, je suis éegalement intéressée par l\'un des votres', 2, 5, '2026-03-30 13:36:22', 1),
(31, 'votre livre m\'interesse', 10, 2, '2026-04-03 13:17:49', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date_creat_compte` timestamp(6) NULL DEFAULT current_timestamp(6),
  `nb_livres` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom`, `email`, `mot_de_passe`, `pseudo`, `avatar`, `date_creat_compte`, `nb_livres`) VALUES
(2, 'Alexandre', 'Chalamet', 'timochala@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'Alexlecture', 'assets/images/alex.png', '2026-03-30 11:58:08.019726', 4),
(3, 'Stephanie', 'Lapointe', 'lapointestephanie@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'Sas634', 'assets/images/sas.png', '2026-03-25 13:16:20.776688', 3),
(5, '', '', 'gwenaelemanse@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'gwena', 'uploads/avatars/5d4d2ed4d8b402b0912b775327e0c65c.webp', '2026-03-30 11:42:57.528221', 6),
(6, '', '', 'marielafranque@gmail.com', '$2y$10$l2I3OWEIEE218bCtthT4iuRahQhSYzky0u.9wSOXjP9U/xvwEz95O', 'Nath', 'uploads/avatars/c9de91bb34832be0ac48675f0aea94ae.png', '2026-03-25 13:07:18.426327', 4),
(7, '', '', 'remi24@gmail.com', '$2y$10$s0CxTmHPt1rfa1H/TMFAmOkSWtgk/f7i2E04yyLNEfLhMp4zWdOFm', 'Remi24', 'uploads/avatars/d00c8de975c4905b046ae7202d718b73.png', '2026-03-25 13:32:43.418407', 0),
(10, '', '', 'thomas@gmail.com', '$2y$10$R3lVXIqt8VHeZUEamfww9.PB8yOLSF3ntOOKjBn8zyeL93Lubo/vG', 'Thomas', 'uploads/avatars/5d4ab3e3208fda46cc3fb373401ed3eb.jpg', '2026-04-03 11:14:59.000000', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_messagerie_receiver_read` (`receiver_id`,`is_read`),
  ADD KEY `fk_sender` (`sender_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `fk_receiver` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sender` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
