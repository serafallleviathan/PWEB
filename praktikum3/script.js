const tabs = document.querySelectorAll('.tabs li');
const tabPanes = document.querySelectorAll('.tab-pane');

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach((tab) => tab.querySelector('a').classList.remove('active'));
        tabPanes.forEach((tabPane) => tabPane.classList.remove('active'));
        tab.querySelector('a').classList.add('active');
        tabPanes[index].classList.add('active');
    });
});