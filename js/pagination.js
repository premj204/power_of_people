const cardContainer = document.getElementById('card-container');
const cards = Array.from(cardContainer.getElementsByClassName('card'));
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

let currentPage = 0;
const cardsPerPage = 6;
const totalPages = Math.ceil(cards.length / cardsPerPage);

function showPage(page) {
  const startIndex = page * cardsPerPage;
  const endIndex = startIndex + cardsPerPage;

  cards.forEach((card, index) => {
    if (index >= startIndex && index < endIndex) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}

function updatePaginationButtons() {
  prevBtn.disabled = currentPage === 0;
  nextBtn.disabled = currentPage === totalPages - 1;
}

prevBtn.addEventListener('click', () => {
  if (currentPage > 0) {
    currentPage--;
    showPage(currentPage);
    updatePaginationButtons();
  }
});

nextBtn.addEventListener('click', () => {
  if (currentPage < totalPages - 1) {
    currentPage++;
    showPage(currentPage);
    updatePaginationButtons();
  }
});

// Show the initial page
showPage(currentPage);
updatePaginationButtons();