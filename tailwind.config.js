/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.html",
     "./resources/views/vendor/pagination/*.blade.php",
  ],

  theme: {
    extend: {},
      screens: {
        sm: '300px',
        md: '768px',
        lg: '1024px',
        xl: '1280px',
      },
  },
  plugins: [],
}

