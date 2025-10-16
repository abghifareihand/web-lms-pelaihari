 <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
     <div class="max-w-screen-xl flex items-center justify-between mx-auto p-3 relative">
         {{-- Logo --}}
         <a href="#" class="flex items-center space-x-2 rtl:space-x-reverse min-w-0">
             <div class="w-12 h-12 flex items-center justify-center bg-blue-700 rounded-full flex-shrink-0">
                 <i class="fa-solid fa-graduation-cap text-white text-lg"></i>
             </div>
             <div class="flex flex-col min-w-0">
                 <span class="text-xl font-semibold text-gray-900 whitespace-nowrap truncate">
                     Galeri Investasi Edukasi
                 </span>
                 <span class="text-sm text-gray-500 font-semibold whitespace-nowrap truncate">
                     SMA Negeri 1 Pelaihari
                 </span>
             </div>
         </a>


         {{-- Tombol Hamburger --}}
         <button data-collapse-toggle="navbar-default" type="button"
             class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
             aria-controls="navbar-default" aria-expanded="false">
             <span class="sr-only">Open main menu</span>
             <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 17 14">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M1 1h15M1 7h15M1 13h15" />
             </svg>
         </button>

         {{-- Menu --}}
         <div id="navbar-default"
             class="hidden absolute top-full left-0 w-full md:static md:block md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none z-50 transition-all duration-300 ease-in-out">
             <ul
                 class="font-medium flex flex-col space-y-2 md:flex-row md:space-x-6 md:space-y-0 p-4 md:p-0 mt-4 md:mt-0 border border-gray-100 rounded-lg md:border-0 bg-gray-50 md:bg-transparent">
                 <li>
                     <a href="#beranda"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Beranda
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
                 <li>
                     <a href="#about"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Tentang
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
                 <li>
                     <a href="#education"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Edukasi
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
                 <li>
                     <a href="#tools"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Tools
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
                 <li>
                     <a href="#galery"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Galeri
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
                 <li>
                     <a href="#contact"
                         class="nav-link group relative block py-2 px-3 text-gray-900 rounded-sm hover:text-blue-700 transition-colors duration-300">
                         Kontak
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('login') }}"
                         class="block py-2 px-4 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition-colors duration-300">
                         Login
                         <span
                             class="absolute left-0 -bottom-1 w-full h-0.5 bg-yellow-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>

 <script>
     document.addEventListener('DOMContentLoaded', () => {
         const sections = document.querySelectorAll('section[id]');
         const navLinks = document.querySelectorAll('.nav-link');
         const toggleBtn = document.querySelector('[data-collapse-toggle]');
         const targetMenu = document.getElementById(toggleBtn.getAttribute('data-collapse-toggle'));

         toggleBtn.addEventListener('click', () => {
             targetMenu.classList.toggle('hidden');
         });

         window.addEventListener('scroll', () => {
             let scrollY = window.pageYOffset;

             sections.forEach(section => {
                 const sectionHeight = section.offsetHeight;
                 const sectionTop = section.offsetTop - 80; // sesuaikan dengan tinggi navbar
                 const sectionId = section.getAttribute('id');

                 if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                     navLinks.forEach(link => {
                         // Reset semua link
                         link.classList.remove('text-blue-700', 'font-bold');
                         link.classList.add('text-gray-900');

                         // Tambahkan aktif jika cocok
                         if (link.getAttribute('href') === `#${sectionId}`) {
                             link.classList.add('text-blue-700', 'font-bold');
                             link.classList.remove('text-gray-900');
                         }
                     });
                 }
             });
         });
     });
 </script>
