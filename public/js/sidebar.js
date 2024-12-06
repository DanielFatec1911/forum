document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('btn-navbar'); // Utiliza o botão integrado no header
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('open');
    });

    content.addEventListener('click', function () {
        if (sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
        }
    });

    // Função para fechar o menu dropdown quando clicar fora dele
    window.addEventListener('click', function (event) {
        if (!event.target.matches('.dropdown-toggle')) {
            const dropdowns = document.querySelectorAll('.collapse.show');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });

    // Evitar o fechamento do dropdown ao clicar nele
    sidebar.addEventListener('click', function (event) {
        if (event.target.matches('.dropdown-toggle')) {
            event.stopPropagation();
        }
    });

    // Carrossel de imagens
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');
    const totalItems = items.length;

    function showSlide(index) {
        items.forEach((item, i) => {
            item.classList.remove('active');
            if (i === index) {
                item.classList.add('active');
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        showSlide(currentIndex);
    }

    document.querySelector('.carousel-control-next').addEventListener('click', nextSlide);
    document.querySelector('.carousel-control-prev').addEventListener('click', prevSlide);

    // Auto-play do carrossel
    setInterval(nextSlide, 10000); // Muda a cada 10 segundos
});
