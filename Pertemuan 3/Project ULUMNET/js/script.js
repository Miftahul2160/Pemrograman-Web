// js/script.js - Variasi 1: Offset Tetap

document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section[id]'); // Lebih baik pilih section yang punya ID
    const navLinks = document.querySelectorAll('nav .navbar-nav .nav-item .nav-link');
    const navbarHeight = document.querySelector('.navbar.fixed-top')?.offsetHeight || 56; // Dapatkan tinggi navbar atau default 56px
    const offsetBuffer = 20; // Buffer tambahan (opsional)

    const updateActiveLink = () => {
        let currentSectionId = '';
        const scrollY = window.pageYOffset; // Posisi scroll saat ini

        sections.forEach(section => {
            const sectionTop = section.offsetTop - navbarHeight - offsetBuffer; // Kurangi tinggi navbar dan buffer
            const sectionBottom = sectionTop + section.offsetHeight;

            // Cek apakah posisi scroll berada di dalam batas section ini
            if (scrollY >= sectionTop && scrollY < sectionBottom) {
                currentSectionId = section.getAttribute('id');
            }
        });

        // Jika setelah loop tidak ada section aktif (mungkin di paling atas sebelum section pertama)
        if (!currentSectionId && scrollY < sections[0].offsetTop - navbarHeight - offsetBuffer) {
            currentSectionId = sections[0].getAttribute('id'); // Anggap section pertama aktif
        }
        // Jika di paling bawah
        else if (!currentSectionId && window.innerHeight + scrollY >= document.body.offsetHeight - 5) {
            currentSectionId = sections[sections.length - 1].getAttribute('id'); // Anggap section terakhir aktif
        }

        // Update kelas active pada link navigasi
        navLinks.forEach(link => {
            link.classList.remove('active');
            link.removeAttribute('aria-current');
            if (link.getAttribute('href') === '#' + currentSectionId) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            }
        });
    };

    // Tambahkan event listener
    window.addEventListener('scroll', updateActiveLink);

    // Panggil sekali saat load untuk set state awal
    updateActiveLink();

    console.log("Landing page script loaded (Variasi 1: Offset Tetap).");
});