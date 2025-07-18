import defaultTheme from "tailwindcss/defaultTheme";

export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                serif: ["Merriweather", ...defaultTheme.fontFamily.serif],
                mono: ["Fira Code", ...defaultTheme.fontFamily.mono],
                cursive: ['"Comic Sans MS"', "cursive"],
                display: ["Oswald", "sans-serif"],
                body: ['"Open Sans"', "sans-serif"],
            },
            colors: {
                umpar: '#003366', // misal warna biru tua UMPAR
                emas: '#FFD700',
            },
        },
    },
    plugins: [],
};
