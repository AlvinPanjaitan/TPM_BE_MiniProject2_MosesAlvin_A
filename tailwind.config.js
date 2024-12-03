import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', // untuk pagination Laravel
        './storage/framework/views/*.php', // untuk view yang di-cache oleh Laravel
        './resources/views/**/*.blade.php', // untuk semua file Blade views di resources/views
        './resources/js/**/*.vue', // jika Anda menggunakan Vue.js
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans], // menambahkan font Figtree
            },
        },
    },

    plugins: [forms], // plugin untuk form styling

    darkMode: 'class', // Aktifkan dark mode dengan menambahkan class 'dark'
};
