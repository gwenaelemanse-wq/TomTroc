// ----- BADGE MESSAGERIE -----
function setMessagerieBadge(count) {
  const badge = document.getElementById("messagerie-badge");
  if (!badge) return;

  const n = Number(count) || 0;
  if (n <= 0) {
    badge.hidden = true;
    badge.textContent = "0";
  } else {
    badge.hidden = false;
    badge.textContent = String(n);
  }
}

async function refreshUnreadCount() {
  try {
    const res = await fetch("index.php?action=unread-count", {
      credentials: "same-origin",
      headers: { Accept: "application/json" },
    });
    if (!res.ok) return;

    const data = await res.json();
    setMessagerieBadge(data.unread);
  } catch (e) {
    // pas bloquant
  }
}

// ----- BURGER + INIT -----
document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  const burger = document.querySelector(".burger");

  // Burger: seulement si présent
  if (header && burger) {
    burger.addEventListener("click", () => {
      header.classList.toggle("is-open");
      const isOpen = header.classList.contains("is-open");
      burger.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
  }

  // Badge: toujours
  refreshUnreadCount();
  setInterval(refreshUnreadCount, 15000);
});
