/**
 * @type {import('tailwindcss/tailwind-config').TailwindConfig }
 */
module.exports = {
    content: [
      './**/*.{php,html,twig}',
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      screens: {
        '2xl': '1690px',
      }
    },
    plugins: [
      require('flowbite/plugin')
    ],
};
