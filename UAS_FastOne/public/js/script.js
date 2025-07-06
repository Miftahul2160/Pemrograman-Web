document.addEventListener('DOMContentLoaded', () => {

    const animatedElements = document.querySelectorAll('.slide-in-left, .slide-in-right');

    const observerOptions = {
        root: null, 
        rootMargin: '0px',
        threshold: 0.1 
    };

    const observerCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible'); 
                observer.unobserve(entry.target); 
            }
        });
    };

    const animationObserver = new IntersectionObserver(observerCallback, observerOptions);
    animatedElements.forEach(el => {
        animationObserver.observe(el);
    });


    const sections = document.querySelectorAll('main section[id]'); 
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarHeight = document.querySelector('.navbar').offsetHeight || 56;

    const scrollSpyObserverOptions = {
        root: null,
        rootMargin: `-${navbarHeight + 10}px 0px -${window.innerHeight - navbarHeight - 50}px 0px`,
        threshold: 0 
    };

     let lastActiveLink = null; 

    const scrollSpyCallback = (entries) => {
        let intersectingSectionId = null;

        entries.forEach(entry => {
             if (entry.isIntersecting) {
                  intersectingSectionId = entry.target.getAttribute('id');
             }
        });

         if (intersectingSectionId) {
             const activeLink = document.querySelector(`.navbar-nav .nav-link[href="#${intersectingSectionId}"]`);
             if (activeLink && activeLink !== lastActiveLink) {
                  if (lastActiveLink) {
                      lastActiveLink.classList.remove('active');
                      lastActiveLink.removeAttribute('aria-current');
                  }
                  activeLink.classList.add('active');
                  activeLink.setAttribute('aria-current', 'page');
                  lastActiveLink = activeLink; 
             }
         }
         else if (window.scrollY < window.innerHeight / 2) { 
             const homeLink = document.querySelector('.navbar-nav .nav-link[href="#beranda"]');
             if (homeLink && lastActiveLink !== homeLink) {
                  if (lastActiveLink) {
                      lastActiveLink.classList.remove('active');
                      lastActiveLink.removeAttribute('aria-current');
                  }
                  homeLink.classList.add('active');
                  homeLink.setAttribute('aria-current', 'page');
                  lastActiveLink = homeLink;
             }
         }
    };

    const scrollSpyObserver = new IntersectionObserver(scrollSpyCallback, scrollSpyObserverOptions);

    sections.forEach(section => {
        if (section.id) { 
             scrollSpyObserver.observe(section);
        }
    });

     const initialActiveLink = document.querySelector('.navbar-nav .nav-link[href="#beranda"]');
     if (initialActiveLink) {
         initialActiveLink.classList.add('active');
         initialActiveLink.setAttribute('aria-current', 'page');
         lastActiveLink = initialActiveLink;
     }
});

document.addEventListener('DOMContentLoaded', () => {

    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const themeKey = 'themePreference'; 

    const applyTheme = (theme) => {
        if (theme === 'dark') {
            body.classList.add('dark-mode');
            darkModeToggle.setAttribute('aria-label', 'Switch to light mode');
        } else {
            body.classList.remove('dark-mode');
            darkModeToggle.setAttribute('aria-label', 'Switch to dark mode');
        }
    };

    const savedTheme = localStorage.getItem(themeKey);
    if (savedTheme) {
        applyTheme(savedTheme);
    } else {
        
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (prefersDark) {
            applyTheme('dark');
        } else {
             applyTheme('light'); 
        }
    }

    darkModeToggle.addEventListener('click', () => {
        let newTheme;
        if (body.classList.contains('dark-mode')) {
            newTheme = 'light';
        } else {
            newTheme = 'dark';
        }
        applyTheme(newTheme);
        localStorage.setItem(themeKey, newTheme);
    });
});