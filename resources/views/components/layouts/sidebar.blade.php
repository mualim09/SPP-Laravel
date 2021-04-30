<div class="flex" x-data="{toggleSidebar: false}">
    <!-- Backdrop -->
    <div x-on:keydown.escape.window="toggleSidebar = false" x-on:click="toggleSidebar = false" x-show="toggleSidebar"
        x-on:toggle-sidebar.window="toggleSidebar = true"
        class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden" style="display: none;">
    </div>
    <!-- End Backdrop -->

    <div x-bind:class="{ toggleSidebar : 'translate-x-0 ease-out', '-translate-x-full ease-in' : !(toggleSidebar) }"
        class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform -translate-x-full bg-gray-900 scroll-component lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex flex-col items-center">
                <img src="{{ asset($setting->logo) }}" alt="Logo Sekolah" class="w-24 rounded-full">
                <span class="px-8 mt-6 font-semibold text-center text-white text-md">{{ $setting->name }}</span>
            </div>
        </div>
        <div>
            <ul class="mt-5"
                x-data="{isMasterOpen: '{{ is_active(['room*', 'school-year*', 'major*', 'bill*'])['state'] }}'}">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ is_active('dashboard')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.5578 5.53423C12.6872 4.69887 11.3127 4.69887 10.4421 5.53423L5.81568 9.97357C5.70233 10.0823 5.62608 10.224 5.59774 10.3785C5.04361 13.4004 5.00271 16.494 5.47675 19.5295L5.58927 20.25H8.56573V14.0387C8.56573 13.6244 8.90152 13.2887 9.31573 13.2887H14.6842C15.0984 13.2887 15.4342 13.6244 15.4342 14.0387V20.25H18.4106L18.5231 19.5295C18.9972 16.494 18.9563 13.4004 18.4021 10.3785C18.3738 10.224 18.2976 10.0823 18.1842 9.97357L13.5578 5.53423ZM9.40357 4.45191C10.8545 3.05965 13.1454 3.05965 14.5963 4.45191L19.2227 8.89125C19.5633 9.21804 19.7924 9.64373 19.8775 10.108C20.4621 13.2956 20.5052 16.559 20.0052 19.7609L19.8244 20.9184C19.7496 21.3971 19.3374 21.75 18.8529 21.75H14.6842C14.2699 21.75 13.9342 21.4142 13.9342 21V14.7887H10.0657V21C10.0657 21.4142 9.72994 21.75 9.31573 21.75H5.147C4.66252 21.75 4.25023 21.3971 4.17548 20.9184L3.99472 19.7609C3.49467 16.559 3.53781 13.2956 4.12234 10.108C4.20748 9.64373 4.43656 9.21804 4.77713 8.89125L9.40357 4.45191Z"
                                fill="black" />
                        </svg>
                        <span class="mx-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" x-on:click="isMasterOpen = !isMasterOpen"
                        class="{{ is_active(['room*', 'school-year*', 'major*', 'bill*'])['class'] }}">
                        <template x-if="!isMasterOpen">
                            <svg x-show="!isMasterOpen" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M19.6016 16.9757C20.0236 14.6662 20.0501 12.3017 19.6801 9.98322L19.616 9.58178C19.5263 9.0197 19.0414 8.60612 18.4722 8.60612H9.75939C9.17432 8.60612 8.70003 8.13183 8.70003 7.54677C8.70003 7.10672 8.34331 6.75 7.90327 6.75H5.6117C5.01467 6.75 4.51179 7.19611 4.4406 7.78888L4.16812 10.058C3.89639 12.3208 3.96652 14.6116 4.37615 16.8536C4.46868 17.36 4.8922 17.7396 5.40568 17.7763L6.91968 17.8846C10.3023 18.1266 13.6978 18.1266 17.0804 17.8846L18.7183 17.7674C19.1588 17.7359 19.5222 17.4102 19.6016 16.9757ZM21.1613 9.74679C21.5581 12.233 21.5297 14.7686 21.0772 17.2453C20.8748 18.353 19.9484 19.1833 18.8253 19.2636L17.1874 19.3808C13.7336 19.6279 10.2665 19.6279 6.81264 19.3808L5.29864 19.2725C4.10261 19.1869 3.1161 18.3027 2.90058 17.1232C2.46392 14.7333 2.38916 12.2913 2.67882 9.87915L2.9513 7.61004C3.11301 6.26343 4.25541 5.25 5.6117 5.25L7.90327 5.25C9.02102 5.25 9.95229 6.04846 10.1578 7.10612L18.4722 7.10612C19.7786 7.10612 20.8913 8.05533 21.0972 9.34535L21.1613 9.74679Z" />
                            </svg>
                        </template>
                        <template x-if="isMasterOpen">
                            <svg x-show="isMasterOpen" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="white" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.3613 18.5795C19.9557 18.97 19.4179 19.2212 18.8253 19.2636L17.1874 19.3808C13.7336 19.6279 10.2665 19.6279 6.81264 19.3808L5.29864 19.2725C4.10261 19.1869 3.1161 18.3027 2.90058 17.1232C2.46392 14.7333 2.38916 12.2913 2.67882 9.87915L2.9513 7.61004C3.11301 6.26343 4.25541 5.25 5.6117 5.25H7.90327C9.02102 5.25 9.95229 6.04846 10.1578 7.10612L18.4722 7.10612C19.7786 7.10612 20.8913 8.05533 21.0972 9.34535L21.1613 9.74679C21.1748 9.83114 21.1877 9.91554 21.2002 10H21.5362C23.0086 10 24.0209 11.4798 23.4873 12.8521L22.2378 16.065C21.8498 17.0626 21.1989 17.9301 20.3613 18.5795ZM19.616 9.58178L19.6801 9.98322C19.6809 9.98881 19.6818 9.99441 19.6827 10H10.3705C9.23475 10 8.21588 10.6981 7.80589 11.7573L5.47405 17.7812L5.40568 17.7763C4.8922 17.7396 4.46868 17.36 4.37615 16.8536C3.96652 14.6116 3.89639 12.3208 4.16812 10.058L4.4406 7.78888C4.51179 7.19611 5.01467 6.75 5.6117 6.75H7.90327C8.34331 6.75 8.70003 7.10672 8.70003 7.54677C8.70003 8.13183 9.17432 8.60612 9.75939 8.60612H18.4722C19.0414 8.60612 19.5263 9.0197 19.616 9.58178ZM7.03921 17.8931C10.3822 18.1266 13.7376 18.1238 17.0804 17.8846L18.7183 17.7674L18.9128 17.7492L18.9115 17.7468C19.792 17.25 20.4734 16.4636 20.8398 15.5213L22.0893 12.3084C22.2405 11.9195 21.9536 11.5 21.5362 11.5H10.3705C9.85423 11.5 9.3911 11.8173 9.20475 12.2988L7.03921 17.8931Z"
                                    fill="black" />
                            </svg>
                        </template>
                        <span class="mx-4">Data Master</span>
                    </a>
                    <ul class="w-full p-2 space-y-2" x-show="isMasterOpen"
                        x-transition:enter="transition ease-in-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
                        x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
                        x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2" style="display: none;">
                        <li>
                            <a href="{{ route('master.room.index') }}"
                                x-bind:class="{ 'text-white' : '{{ is_active('room')['state'] }}', 'text-gray-500' : !('{{ is_active('room')['state'] }}') }"
                                class="flex items-center pl-12 duration-200 hover:text-gray-100">
                                <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                </svg>
                                Kelas
                            </a>
                        </li>
                        @if (\App\Constants\SchoolLevel::SMA === (int) $setting->level)
                            <li>
                                <a href="{{ route('master.major.index') }}"
                                    x-bind:class="{ 'text-white' : '{{ is_active(['major*'])['state'] }}', 'text-gray-500' : !('{{ is_active(['major*'])['state'] }}') }"
                                    class="flex items-center pl-12 text-gray-500 duration-200 hover:text-gray-100">
                                    <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill="currentColor"
                                            d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                    </svg>
                                    Jurusan
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('master.bill.index') }}"
                                x-bind:class="{ 'text-white' : '{{ is_active('bill')['state'] }}', 'text-gray-500' : !('{{ is_active('bill')['state'] }}') }"
                                class="flex items-center pl-12 duration-200 hover:text-gray-100">
                                <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                </svg>
                                Tagihan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('master.school-year.index') }}"
                                x-bind:class="{ 'text-white' : '{{ is_active(['school-year*'])['state'] }}', 'text-gray-500' : !('{{ is_active(['school-year*'])['state'] }}') }"
                                class="flex items-center pl-12 text-gray-500 duration-200 hover:text-gray-100">
                                <svg width="13px" height="13px" class="mx-3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor"
                                        d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 21.535156 6 26 10.464844 26 16 C 26 21.535156 21.535156 26 16 26 C 10.464844 26 6 21.535156 6 16 C 6 10.464844 10.464844 6 16 6 Z M 16 13 C 14.34375 13 13 14.34375 13 16 C 13 17.65625 14.34375 19 16 19 C 17.65625 19 19 17.65625 19 16 C 19 14.34375 17.65625 13 16 13 Z" />
                                </svg>
                                Tahun Ajaran
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('master.student.index') }}" class="{{ is_active('student')['class'] }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="mx-4">Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payment.index') }}" class="{{ is_active('payment')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.5 12C15.5 11.1716 16.1716 10.5 17 10.5C17.8284 10.5 18.5 11.1716 18.5 12C18.5 12.8284 17.8284 13.5 17 13.5C16.1716 13.5 15.5 12.8284 15.5 12Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.4413 6.67402C19.7836 5.12836 18.3302 4.01723 16.6007 3.83523L15.9488 3.76664C12.6565 3.42018 9.33575 3.44303 6.04851 3.83475L5.61657 3.88622C3.94777 4.08508 2.62552 5.38889 2.40324 7.05473C1.96528 10.337 1.96528 13.663 2.40324 16.9453C2.62552 18.6111 3.94777 19.9149 5.61657 20.1138L6.04851 20.1653C9.33575 20.557 12.6565 20.5798 15.9488 20.2334L16.6007 20.1648C18.3302 19.9828 19.7836 18.8717 20.4413 17.326C21.4806 17.0166 22.2738 16.1156 22.404 15.0024C22.6373 13.0076 22.6373 10.9924 22.404 8.99764C22.2738 7.88442 21.4806 6.98344 20.4413 6.67402ZM15.7918 5.2584C12.6107 4.92365 9.40218 4.94573 6.226 5.32421L5.79406 5.37568C4.80524 5.49351 4.02177 6.26606 3.89007 7.25312C3.46967 10.4038 3.46967 13.5963 3.89007 16.7469C4.02177 17.734 4.80525 18.5065 5.79406 18.6243L6.226 18.6758C9.40218 19.0543 12.6107 19.0764 15.7918 18.7416L16.4437 18.673C17.2942 18.5835 18.0468 18.1643 18.5683 17.542C17.0602 17.6299 15.532 17.5906 14.0417 17.4241C12.7724 17.2822 11.7458 16.2826 11.5961 15.0024C11.3628 13.0076 11.3628 10.9924 11.5961 8.99764C11.7458 7.71738 12.7724 6.71784 14.0417 6.57597C15.532 6.40942 17.0602 6.37012 18.5683 6.45806C18.0468 5.83574 17.2942 5.4165 16.4437 5.327L15.7918 5.2584ZM19.2774 8.01471C19.278 8.01855 19.2786 8.02239 19.2792 8.02623L19.2852 8.06511L19.4839 8.03426C19.5867 8.04444 19.6893 8.05524 19.7917 8.06669C20.3791 8.13234 20.8468 8.59648 20.9141 9.17189C21.1339 11.0509 21.1339 12.9491 20.9141 14.8281C20.8468 15.4035 20.3791 15.8677 19.7917 15.9333C19.6893 15.9448 19.5866 15.9556 19.4839 15.9658L19.2852 15.9349L19.2792 15.9738C19.2786 15.9776 19.278 15.9815 19.2774 15.9853C17.5987 16.1372 15.8772 16.1199 14.2084 15.9333C13.621 15.8677 13.1532 15.4035 13.0859 14.8281C12.8661 12.9491 12.8661 11.0509 13.0859 9.17189C13.1532 8.59648 13.621 8.13234 14.2084 8.06669C15.8772 7.88017 17.5987 7.86285 19.2774 8.01471Z"
                                fill="currentColor" />
                        </svg>
                        <span class="mx-4">Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ is_active('reports')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 9.74995C13.5 9.33574 13.1642 8.99995 12.75 8.99995H6.75C6.33579 8.99995 6 9.33574 6 9.74995C6 10.1642 6.33579 10.5 6.75 10.5H12.75C13.1642 10.5 13.5 10.1642 13.5 9.74995Z"
                                fill="currentColor" />
                            <path
                                d="M12.5 12.75C12.5 12.3357 12.1642 12 11.75 12H6.75C6.33579 12 6 12.3357 6 12.75C6 13.1642 6.33579 13.5 6.75 13.5H11.75C12.1642 13.5 12.5 13.1642 12.5 12.75Z"
                                fill="currentColor" />
                            <path
                                d="M12.75 15C13.1642 15 13.5 15.3357 13.5 15.75C13.5 16.1642 13.1642 16.5 12.75 16.5H6.75C6.33579 16.5 6 16.1642 6 15.75C6 15.3357 6.33579 15 6.75 15H12.75Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6 21.75H19C20.5188 21.75 21.75 20.5187 21.75 19V13.5C21.75 13.0857 21.4142 12.75 21 12.75H17.75V4.94315C17.75 3.51975 16.1411 2.69178 14.9828 3.51912L14.8078 3.64415C14.0273 4.20164 12.9701 4.19977 12.1859 3.63966C10.8821 2.70833 9.11794 2.70833 7.81407 3.63966C7.02992 4.19977 5.9727 4.20164 5.19221 3.64415L5.01717 3.51912C3.8589 2.69178 2.25 3.51975 2.25 4.94315V18C2.25 20.071 3.92893 21.75 6 21.75ZM8.68593 4.86026C9.46825 4.30146 10.5318 4.30146 11.3141 4.86026C12.6161 5.79028 14.3739 5.79739 15.6796 4.86475L15.8547 4.73972C16.0202 4.62153 16.25 4.73981 16.25 4.94315V19C16.25 19.4501 16.3581 19.8749 16.5499 20.25H6C4.75736 20.25 3.75 19.2426 3.75 18V4.94315C3.75 4.73981 3.97984 4.62153 4.14531 4.73972L4.32036 4.86475C5.62605 5.79739 7.3839 5.79028 8.68593 4.86026ZM17.75 19V14.25H20.25V19C20.25 19.6903 19.6904 20.25 19 20.25C18.3096 20.25 17.75 19.6903 17.75 19Z"
                                fill="currentColor" />
                        </svg>
                        <span class="mx-4">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ is_active('reports')['class'] }}">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 9.5C13.3809 9.5 14.5 10.6191 14.5 12C14.5 13.3809 13.3809 14.5 12 14.5C10.6191 14.5 9.5 13.3809 9.5 12C9.5 10.6191 10.6191 9.5 12 9.5Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.168 7.25025V7.25025C19.4845 6.05799 17.9712 5.65004 16.7885 6.33852C15.7598 6.93613 14.4741 6.18838 14.4741 4.99218C14.4741 3.61619 13.3659 2.5 11.9998 2.5V2.5C10.6337 2.5 9.52546 3.61619 9.52546 4.99218C9.52546 6.18838 8.23977 6.93613 7.21199 6.33852C6.02829 5.65004 4.51507 6.05799 3.83153 7.25025C3.14896 8.4425 3.55399 9.96665 4.73769 10.6541C5.76546 11.2527 5.76546 12.7473 4.73769 13.3459C3.55399 14.0343 3.14896 15.5585 3.83153 16.7498C4.51507 17.942 6.02829 18.35 7.21101 17.6625H7.21199C8.23977 17.0639 9.52546 17.8116 9.52546 19.0078V19.0078C9.52546 20.3838 10.6337 21.5 11.9998 21.5V21.5C13.3659 21.5 14.4741 20.3838 14.4741 19.0078V19.0078C14.4741 17.8116 15.7598 17.0639 16.7885 17.6625C17.9712 18.35 19.4845 17.942 20.168 16.7498C20.8515 15.5585 20.4455 14.0343 19.2628 13.3459H19.2618C18.2341 12.7473 18.2341 11.2527 19.2628 10.6541C20.4455 9.96665 20.8515 8.4425 20.168 7.25025Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="mx-4">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
        <div
            class="absolute flex items-center max-w-sm p-3 mx-auto space-x-4 bg-gray-800 shadow-md bottom-6 inset-x-2 rounded-xl">
            <div class="relative flex-shrink-0">
                <img src="https://tailwindcss.com/img/erin-lindford.jpg" alt="Profile Picture"
                    class="block h-12 mx-auto rounded-full sm:mx-0 sm:flex-shrink-0">
                <span
                    class="absolute right-0 flex items-center w-3 h-3 bg-green-500 border-2 border-white rounded-full bottom-1"></span>
            </div>
            <div>
                <div class="font-medium text-gray-200 text-md">Ursula</div>
                <p class="text-xs text-gray-200">Admin</p>
            </div>
        </div>
    </div>
</div>