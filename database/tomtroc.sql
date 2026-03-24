-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 mars 2026 à 12:00
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
(5, 'Changer L\'eau des fleurs', 'Valérie Perrin', 'assets/images/livre4.jpg\r\n', 'Violette Toussaint est garde-cimetière dans une petite ville de Bourgogne. Les gens de passage et les habitués viennent se confier et se réchauffer dans sa loge. Avec la petite équipe de fossoyeurs et le jeune curé, elle forme une famille décalée. Mais quels événements ont mené Violette dans cet univers où le tragique et le cocasse s’entremêlent ?\r\n\r\nAprès le succès des Oubliés du dimanche, un nouvel hymne au merveilleux des choses simples.', '1', '2026-02-21 20:08:16', 2),
(6, 'Our vicious lies', 'Lyla Mars', 'assets/images/livre5.jpg\r\n', 'Bella alias Wheeler le sait mieux que quiconque : mentir peut sauver. Ou détruire. Elle l’a appris au sein de la VEX, une section spéciale des services de renseignements britanniques, où elle a été façonnée pour devenir une arme invisible. Mais derrière l’espionne redoutable, demeure aussi une fille aînée qui porte le poids d’un foyer en ruine.\r\n\r\nSa nouvelle mission : s’introduire dans le cercle fermé d’une famille aussi puissante que corrompue, en se faisant passer pour l’épouse d’un autre espion. Pas n’importe lequel. L’agent Qamari. Brillant. Implacable. Terriblement fascinant.\r\n\r\nCelui qu’elle connaît depuis qu’elle a intégré la VEX, où il était son jeune et insupportable mentor... avant que tout ne bascule.\r\n\r\nAujourd’hui, ils doivent convaincre leurs cibles qu’ils s’aiment, tout en luttant contre ce qui risque de se réveiller entre eux.\r\n\r\nCar certains mensonges résonnent plus fort que la vérité. Et ceux qu’on raconte par amour sont les plus vicieux de tous.', '1', '2026-02-21 20:10:02', 3),
(7, 'La poursuite du bonheur', 'Douglas Kennedy', 'assets/images/livre6.jpg', 'Dans l\'Amérique de l\'après-guerre minée par ses contradictions, des années noires du maccarthysme à nos jours, La poursuite du bonheur nous plonge au cœur d\'une magnifique histoire d\'amour.\r\n\r\n\r\nManhattan, Thanksgiving 1945. Artistes, écrivains, musiciens... tout Greenwich Village se presse à la fête organisée par Eric Smythe, dandy et dramaturge engagé. Ce soir-là, sa sœur Sara, fraîchement débarquée de New York, croise le regard de Jack Malone, journaliste de l\'armée américaine. Amour d\'une nuit, passion d\'une vie, l\'histoire de Sara et Jack va bouleverser plusieurs générations.\r\n\r\nUn demi-siècle plus tard, à l\'enterrement de sa mère, Kate Malone remarque une vieille dame qui ne la quitte pas des yeux. Coups de téléphone, lettres incessantes... Commence alors un harcèlement de tous les instants. Jusqu\'au jour où Kate reçoit un album de photos... La jeune femme prend peur : qui est cette inconnue ? Que lui veut-elle ?\r\n\r\nDouglas Kennedy nous livre ici un roman ambitieux où, à travers d\'inoubliables portraits de femmes, résonnent les thèmes qui lui sont chers : la quête inlassable du bonheur, la responsabilité individuelle, la trahison.\r\n', '1', '2026-03-05 16:26:19', 2),
(8, 'Une relation dangereuse', 'Douglas Kennedy', 'assets/images/livre7.jpg', 'Londres, de nos jours.\r\n\r\nSally Goodchild, américaine de 37 ans, est journaliste pour le Boston Post. Après avoir mené une vie très indépendante pendant près de 20 ans, elle a un vrai coup de foudre pour Tony Thompson, un reporter anglais qu\'elle rencontre au Caire. Leur liaison va prendre une tournure officielle quand Tony, rappelé à Londres, se voit offrir un poste important et que Sally se découvre enceinte. Ils décident donc de se marier mais des difficultés financières pour Tony, des tracas professionnels ou d\'adaptation au pays pour Sally, créent un climat de tension préjudiciable à leur couple et à l\'état de Sally. Elle accouche prématurément d\'un garçon qui doit rester en observation à l\'hôpital. Epuisée, très inquiète pour l\'enfant, Sally ne reçoit que peu de soutien de Tony, trop absorbé par son travail, et elle sombre bientôt dans la dépression. Après avoir accidentellement mis en danger la vie de son enfant, elle accepte d\'être internée à l\'hôpital psychiatrique pour un séjour de quelques semaines. De retour chez elle, son état s\'est amélioré et elle peut enfin s\'occuper de son fils mais sa relation avec Tony reste très difficile. Pourtant celui-ci lui offre un billet pour Boston et l\'encourage à rendre visite à sa sœur Sandy qui vient de perdre son mari. Mais à son retour, Sally découvre avec stupéfaction une maison vide sans la moindre trace de son époux et de son fils. Apparemment, Tony a profité de son absence pour engager une procédure de divorce et demander la garde de son fils. Pour Sally commence le plus sombre des cauchemars...', '1', '2026-03-05 17:26:42', 3),
(13, 'L\'étranger', 'Albert Camus', 'uploads/9f3e387a78ebfcdeb411a8384d567cd4.jpg', '\"C\'est alors que tout a vacillé. La mer a charrié un souffle épais et ardent. Il m\'a semblé que le ciel s\'ouvrait sur toute son étendue pour laisser pleuvoir du feu. Tout mon être s\'est tendu et j\'ai crispé ma main sur le revolver. La gâchette a cédé, j\'ai touché le ventre poli de la crosse et c\'est là, dans le bruit à la fois sec et assourdissant, que tout a commencé. J\'ai secoué la sueur et le soleil. J\'ai compris que j\'avais détruit l\'équilibre du jour, le silence exceptionnel d\'une plage où j\'avais été heureux.\" L\'étranger est le premier roman d\'Albert Camus.', 'Disponible', '0000-00-00 00:00:00', 5),
(14, 'La femme de ménage', 'Frieda McFadden', 'uploads/a0ad0273ef9ce018a648cf6f00dff8c5.jpg', 'Millie est la nouvelle femme de ménage des Winchester, riche famille de New York. Elle s’occupe aussi chaque jour de leur fille. Ce travail est une chance inespérée, l’occasion de repartir de zéro. Mais si M. Winchester se montre charmant, son épouse paraît de plus en plus instable. La rumeur court qu’elle aurait tenté de noyer sa fille il y a quelques années. Chaque jour le malaise grandit… Pour Millie, est-il déjà trop tard ?', 'Disponible', '0000-00-00 00:00:00', 6),
(15, 'Le Prince de Machiavel – Édition complète : La nouvelle traduction moderne en français (traduite et annotée)', 'Nicolas Machiavel', 'uploads/f9153b3676908dd303f3a37eee67ae47.jpg', 'Un classique intemporel de la stratégie et du pouvoir — désormais en français moderne, avec la structure et le sens intégralement préservés.  Depuis plus de 500 ans, Le Prince de Nicolas Machiavel est l’une des œuvres les plus influentes — et controversées — jamais écrites sur le leadership, la politique et la nature humaine. Cette Édition Complète offre les réflexions de Machiavel au lecteur contemporain grâce à une modernisation fidèle, ligne par ligne, qui conserve le ton, la structure et le message originaux dans leur intégralité.  Conçue pour être à la fois accessible et authentique, cette édition permet aux lecteurs modernes de se plonger directement dans les idées de Machiavel — sans être freinés par un langage ancien ou une formulation trop complexe.  Qu’est-ce qui rend cette édition unique ?  Une traduction fidèle en français moderne : Un langage clair et contemporain qui reste fidèle à la voix de Machiavel, en préservant l’audace, la logique et le rythme du texte original. Annotations historiques et politiques : Des notes concises éclairent les références aux personnages, lieux et événements politiques de l’Italie de la Renaissance — ajoutant du contexte sans alourdir la lecture. Commentaires chapitre par chapitre : Chaque chapitre est accompagné d’une brève réflexion pour aider le lecteur à relier les principes de Machiavel au leadership, au monde des affaires et à la stratégie contemporaine. Texte complet et non abrégé : L’œuvre intégrale du Prince est ici présentée, enrichie d’éléments explicatifs qui approfondissent la compréhension sans modifier l’essence du texte. Que vous soyez étudiant, entrepreneur, stratège ou simplement curieux, Le Prince propose des leçons intemporelles sur le pouvoir, l’ambition et la prise de décision. Cette édition les rend accessibles, actuelles et percutantes pour les lecteurs d’aujourd’hui.', 'Disponible', '0000-00-00 00:00:00', 5),
(16, 'Sur les ossements des morts', 'Olga Tokarczuk', 'uploads/f81450507209087a403286310e20b2eb.jpg', 'Janina Doucheyko vit seule dans un petit hameau au coeur des Sudètes. Ingénieur à la retraite, elle se passionne pour la nature, l\'astrologie et l\'oeuvre de William Blake. Un matin, elle retrouve un de ses voisins mort dans sa cuisine, étouffé par un petit os. C\'est le début d\'une longue série de crimes mystérieux sur les lieux desquels on retrouve des traces animales. La police enquête. Les victimes avaient toutes pour la chasse une passion dévorante. Quand Janina Doucheyko s\'efforce d\'exposer sa théorie sur la question, tout le monde la prend pour une folle... Car comment imaginer qu\'il puisse s\'agir d\'une vengeance des animaux ?', 'Disponible', '0000-00-00 00:00:00', 5),
(17, 'La femme de ménage se marie', 'Frieda McFadden', 'uploads/570f22ffad0ef364c4d6d5dbbdb2f02d.jpg', 'Aujourd’hui est censé être le plus beau jour de la vie de Millie. La femme de ménage se marie avec Enzo, l’homme de ses rêves, et rien ne peut gâcher son bonheur. D’autant que ses parents, avec lesquels elle est brouillée depuis quinze ans, ont promis d’assister à la cérémonie.\r\n\r\nMais alors qu’elle devrait se préoccuper uniquement de sa robe et de sa coiffure, Millie est confrontée à un sérieux problème : quelqu’un ne veut pas qu’elle vive assez longtemps pour prononcer ses vœux. Quelqu’un qui épie ses faits et gestes, jusque dans sa chambre.\r\n\r\nPrise au piège, Millie décide pourtant de ne pas se laisser intimider. Elle se mariera coûte que coûte, pour le meilleur et pour le pire. Mais le pire pourrait bien arriver plus tôt que prévu…', 'Disponible', '0000-00-00 00:00:00', 6),
(18, 'La femme de ménage voit tout', 'Frieda McFadden', 'uploads/202da410f4595d271c8ed654bc438e41.jpg', 'Après avoir été au service des autres en tant que femme de ménage, Millie s\'est enfin construit une vie à elle. Elle vient même d\'emménager dans une belle maison, à l\'abri d\'une petite impasse chic et tranquille, avec son mari et ses deux enfants. Mais son rêve d\'une existence paisible se ternit rapidement lorsqu\'elle rencontre ses voisins. Il y a Suzette, bien trop snob et aguicheuse, et son insipide mari, Jonathan, sans oublier leur terrifiante femme de ménage au regard perçant et au comportement plus que suspect. Les craintes de Millie montent d\'un cran lorsque d\'étranges bruits se font entendre la nuit dans sa propre maison...', 'Disponible', '0000-00-00 00:00:00', 6),
(19, 'L\'intruse', 'Frieda McFadden', 'uploads/b125d6fe4bcf649f41c5c83aa6b8f453.jpg', 'La petite maison de Casey, perdue au cœur de la forêt, n’est pas faite pour affronter la tempête qui s’abat cette nuit-là. Le vent hurle, les murs tremblent… et quelqu’un observe. Depuis sa fenêtre, Casey aperçoit une jeune fille, seule. Couverte de sang, un couteau à la main, elle refuse de dire qui elle est et d’expliquer ce qui s’est passé.\r\n\r\nMalgré tout, Casey décide de l’aider. Mais au fil des heures, les incohérences s’accumulent. Quelque chose ne colle pas. Et lorsqu’elle fait, au milieu de la nuit, une découverte qui lui glace le sang, il est déjà trop tard.\r\n\r\nCar cette jeune fille cache un secret. Un secret pour lequel elle est prête à tout. Et si Casey s’approche trop près de la vérité, elle pourrait bien ne jamais voir le soleil se lever…', 'Indisponible', '0000-00-00 00:00:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `message`, `sender_id`, `receiver_id`, `created_at`) VALUES
(1, 'Bonjour, est ce que le livre est toujours dispo?', 6, 3, '2026-03-19 14:32:19'),
(2, 'Bonjour', 5, 6, '2026-03-19 14:34:27'),
(3, 'bonjour', 2, 6, '2026-03-19 14:36:08'),
(4, 'Bonjour', 6, 5, '2026-03-19 22:14:35'),
(5, 'bonjour', 6, 5, '2026-03-19 22:50:15'),
(6, 'hello', 2, 5, '2026-03-20 13:44:37'),
(7, 'hello', 5, 6, '2026-03-20 14:04:00'),
(8, 'hello', 5, 2, '2026-03-20 14:04:08'),
(9, 'bonjour', 5, 6, '2026-03-20 14:57:04'),
(10, 'Bonjour', 5, 0, '2026-03-20 14:58:20'),
(11, 'Bonjour, le livre est-il toujours disponible?', 5, 3, '2026-03-20 15:05:16'),
(12, 'oui', 5, 2, '2026-03-23 13:29:41'),
(13, 'oui', 5, 2, '2026-03-23 13:47:09'),
(14, 'fqigoemhgqlh', 6, 5, '2026-03-23 15:33:06');

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
  `date_creat_compte` timestamp(6) NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `nb_livres` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `prenom`, `nom`, `email`, `mot_de_passe`, `pseudo`, `avatar`, `date_creat_compte`, `nb_livres`) VALUES
(2, 'Alexandre', 'Chalamet', 'timochala@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'Alexlecture', 'assets/images/alex.png', '2026-03-11 15:04:16.528321', 0),
(3, 'Stephanie', 'Lapointe', 'lapointestephanie@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'Sas634', 'assets/images/sas.png', '2026-03-11 15:04:16.528321', 0),
(5, '', '', 'gwenaelemanse@gmail.com', '$2y$10$1sKgbse51b31KXVGLY0PSuDfpgkueJwq2nNb6QJIgY6W2snJb1d0K', 'gwena', 'uploads/avatars/5d4d2ed4d8b402b0912b775327e0c65c.webp', '2026-03-11 15:04:16.528321', 0),
(6, '', '', 'marielafranque@gmail.com', '$2y$10$l2I3OWEIEE218bCtthT4iuRahQhSYzky0u.9wSOXjP9U/xvwEz95O', 'Nath', 'uploads/avatars/c9de91bb34832be0ac48675f0aea94ae.png', '2026-03-11 16:17:20.893331', 0);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
