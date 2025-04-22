/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'kahejo': {
          'darkest': '#3E362E',
          'dark': '#865D36',
          'medium': '#93785B',
          'light': '#AC8968',
          'lightest': '#A69080',
        },
      },
    },
  },
  plugins: [],
} 