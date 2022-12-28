/**
 * @type {import('tailwindcss/tailwind-config').TailwindConfig }
 */
module.exports = {
    content: [
      './**/*.{php,html,twig}',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {},
      screens: {
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
        '2xl': '1690px',
      }
    },
    plugins: [
      require('flowbite/plugin')
    ],
};
