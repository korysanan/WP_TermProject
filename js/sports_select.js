document.addEventListener('DOMContentLoaded', function() {
    const boards = document.querySelectorAll('.board');
    boards.forEach(board => {
        board.addEventListener('click', () => {
            const link = board.querySelector('a').getAttribute('href');
            window.location.href = link;
        });
    });
});
