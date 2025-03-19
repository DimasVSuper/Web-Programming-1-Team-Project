import './style.css';
import { home } from './home.js';
import { header } from './header.js';
import { about } from './about.js';
import { contact } from './contact.js';

// Fungsi untuk mengatur konten berdasarkan hash
function router() {
    const app = document.querySelector('#app');
    const hash = window.location.hash; // Ambil hash dari URL

    let content = '';
    if (hash === '#home' || hash === '') {
        content = home(); // Tampilkan konten Home
    } else if (hash === '#about') {
        content = about(); // Tampilkan konten About
    } else if (hash === '#contact') {
        content = contact(); // Tampilkan konten Contact
    } else {
        content = '<h2>404</h2><p>Halaman tidak ditemukan.</p>';
    }

    app.innerHTML = `
        ${header()}
        ${content}
    `;

    // Tambahkan kelas 'active' ke tombol yang sesuai
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        link.classList.remove('active'); // Hapus kelas 'active' dari semua link
        if (link.getAttribute('href') === hash || (hash === '' && link.getAttribute('href') === '#home')) {
            link.classList.add('active'); // Tambahkan kelas 'active' ke link yang sesuai
        }
    });
}

// Jalankan router saat halaman dimuat
window.addEventListener('load', router);

// Jalankan router saat hash berubah
window.addEventListener('hashchange', router);