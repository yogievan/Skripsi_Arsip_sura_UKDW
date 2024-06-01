/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {},
    screens: {
      'tablet': '768px',
      // => @media (min-width: 768px)
      'laptop': '1280px',
      // => @media (min-width: 1280px)

      'desktop': '1920px',
      // => @media (min-width: 1920px)
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

