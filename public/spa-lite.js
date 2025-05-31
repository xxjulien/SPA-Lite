// Code par NetNPB.com 
const content = document.getElementById('spa-content');
const progress = document.getElementById('progress');

function startProgress() {
    progress.style.width = '0%';
    progress.style.opacity = '1';
    requestAnimationFrame(() => {
        progress.style.width = '80%';
    });
}

function finishProgress() {
    progress.style.width = '100%';
    setTimeout(() => {
        progress.style.width = '0%';
    }, 300);
}

function navigateTo(url) {
    startProgress();
    fetch(url, {
        headers: { 'X-SPA': 'true' }
    })
    .then(res => res.text())
    .then(html => {
        content.innerHTML = html;
        window.scrollTo(0, 0);
        history.pushState(null, '', url);
        finishProgress();
    });
}

document.addEventListener('click', e => {
    const link = e.target.closest('a[spa-link]');
    if (link) {
        e.preventDefault();
        navigateTo(link.href);
    }
});

window.addEventListener('popstate', () => {
    navigateTo(location.href);
});