document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".site-header");
  const burger = document.querySelector(".burger");

  console.log("Menu burger prêt !", { header: !!header, burger: !!burger });

  if (!header || !burger) return;

  burger.addEventListener("click", () => {
    header.classList.toggle("is-open");

    const isOpen = header.classList.contains("is-open");
    burger.setAttribute("aria-expanded", isOpen ? "true" : "false");

    console.log("burger click -> is-open:", isOpen);
  });
});
