/**
 * messagerie.js
 *
 * Toutes les fonctions sont volontairement isolées
 * pour faciliter la migration vers PHP/AJAX :
 * il suffira de remplacer les données fictives
 * par des appels fetch() vers les routes du contrôleur.
 */

// ------------------------------------------------
// DONNÉES FICTIVES
// Simulent ce que PHP renverrait depuis la BDD.
// En PHP : ces objets viendront de
//   MessageRepository::findByConversation($id)
//   ConversationRepository::findByUser($userId)
// ------------------------------------------------
const conversations = {
  1: {
    nom: "Alexlecture",
    initiales: "AL",
    messages: [
      {
        id: 1,
        auteur: "moi",
        contenu: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor",
        date: "21.08 15:44"
      },
      {
        id: 2,
        auteur: "interlocuteur",
        contenu: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor",
        date: "21.08 15:48"
      }
    ]
  },
  2: {
    nom: "Nathalire",
    initiales: "NA",
    messages: [
      {
        id: 1,
        auteur: "interlocuteur",
        contenu: "Bonjour, je suis intéressé par votre livre !",
        date: "20.08 19:55"
      },
      {
        id: 2,
        auteur: "moi",
        contenu: "Avec plaisir, on peut organiser un échange.",
        date: "20.08 20:08"
      }
    ]
  },
  3: {
    nom: "Sas634",
    initiales: "SA",
    messages: [
      {
        id: 1,
        auteur: "moi",
        contenu: "Bonjour, votre annonce m'intéresse.",
        date: "15.08 15:08"
      }
    ]
  }
};

// ID de la conversation actuellement affichée
let conversationActive = 1;


// ------------------------------------------------
// FONCTION : Charger une conversation
//
// TODO (migration PHP) : remplacer le corps par
//   fetch(`/message/conversation/${id}`)
//     .then(res => res.json())
//     .then(data => {
//       mettreAJourHeader(data.nom, data.initiales);
//       data.messages.forEach(msg => afficherMessage(msg, false));
//       scrollerEnBas();
//     });
// ------------------------------------------------
function chargerConversation(id) {
  const conv = conversations[id];
  if (!conv) return;

  conversationActive = id;

  // Mettre à jour le header du chat
  mettreAJourHeader(conv.nom, conv.initiales);

  // Mettre à jour le champ caché du formulaire
  document.getElementById('input-conversation-id').value = id;

  // Vider et reconstruire la zone messages
  const container = document.getElementById('messages-container');
  container.innerHTML = '';
  conv.messages.forEach(msg => afficherMessage(msg, false));

  scrollerEnBas();

  // Mettre à jour l'état actif dans la sidebar
  document.querySelectorAll('.conversation').forEach(el => {
    el.classList.toggle(
      'conversation--active',
      parseInt(el.dataset.conversationId) === id
    );
  });
}


// ------------------------------------------------
// FONCTION : Mettre à jour le header du chat
// ------------------------------------------------
function mettreAJourHeader(nom, initiales) {
  document.getElementById('chat-nom').textContent = nom;
  document.getElementById('chat-avatar-placeholder').textContent = initiales;
}


// ------------------------------------------------
// FONCTION : Afficher un message dans le DOM
//
// Utilisée pour le chargement initial (animer=false)
// et pour l'ajout d'un nouveau message (animer=true)
// ------------------------------------------------
function afficherMessage(msg, animer = true) {
  const container = document.getElementById('messages-container');
  const conv = conversations[conversationActive];

  const article = document.createElement('article');
  article.classList.add('message');
  article.classList.add(msg.auteur === 'moi' ? 'message--envoye' : 'message--recu');

  if (msg.auteur === 'moi') {
    article.innerHTML = `
      <time class="message__heure">${msg.date}</time>
      <p class="message__contenu">${escapeHTML(msg.contenu)}</p>
    `;
  } else {
    article.innerHTML = `
      <div class="avatar-placeholder message__avatar">${conv.initiales}</div>
      <div class="message__bloc">
        <time class="message__heure">${msg.date}</time>
        <p class="message__contenu">${escapeHTML(msg.contenu)}</p>
      </div>
    `;
  }

  container.appendChild(article);

  if (animer) scrollerEnBas();
}


// ------------------------------------------------
// FONCTION : Envoyer un message
//
// TODO (migration PHP) : remplacer le bloc local par
//   const formData = new FormData();
//   formData.append('conversation_id', conversationActive);
//   formData.append('contenu', contenu);
//
//   fetch('/message/envoyer', { method: 'POST', body: formData })
//     .then(res => res.json())
//     .then(data => afficherMessage(data.message));
// ------------------------------------------------
function envoyerMessage(contenu) {
  if (!contenu.trim()) return;

  // Générer la date/heure actuelle formatée
  const maintenant = new Date();
  const date =
    maintenant.toLocaleDateString('fr-FR', { day: '2-digit', month: '2-digit' }).replace('/', '.') +
    ' ' +
    maintenant.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });

  const msg = {
    id: Date.now(),
    auteur: 'moi',
    contenu: contenu,
    date: date
  };

  // Ajouter aux données locales (simule la persistance)
  conversations[conversationActive].messages.push(msg);

  // Mettre à jour l'aperçu dans la sidebar
  const apercu = document.querySelector(
    `[data-conversation-id="${conversationActive}"] .conversation__apercu`
  );
  if (apercu) apercu.textContent = contenu;

  // Afficher dans le DOM
  afficherMessage(msg);
}


// ------------------------------------------------
// UTILITAIRE : Scroll en bas de la zone messages
// ------------------------------------------------
function scrollerEnBas() {
  const container = document.getElementById('messages-container');
  container.scrollTop = container.scrollHeight;
}


// ------------------------------------------------
// UTILITAIRE : Échapper le HTML
// Évite les injections XSS dans les messages
// ------------------------------------------------
function escapeHTML(str) {
  const div = document.createElement('div');
  div.appendChild(document.createTextNode(str));
  return div.innerHTML;
}


// ------------------------------------------------
// INITIALISATION — exécuté au chargement de la page
// ------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {

  // Clic sur une conversation dans la sidebar
  document.getElementById('conversations-list').addEventListener('click', (e) => {
    const item = e.target.closest('.conversation');
    if (!item) return;

    const id = parseInt(item.dataset.conversationId);
    chargerConversation(id);
  });

  // Soumission du formulaire d'envoi
  document.getElementById('form-message').addEventListener('submit', (e) => {
    e.preventDefault(); // Empêche le rechargement de page

    const input = document.getElementById('input-message');
    envoyerMessage(input.value);
    input.value = '';
    input.focus();
  });

  // Charger la première conversation par défaut
  chargerConversation(conversationActive);
});
