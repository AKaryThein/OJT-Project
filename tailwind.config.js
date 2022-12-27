/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.{html, js}", "**/**/*.{html, js}", "./index.html"],
  theme: {
    extend: {
      fontFamily: {
        georgia: ["Georgia", "serif"],
      },
      colors: {
        primary: "#303030",
        secondary: {
          50: "#333333",
          100: "#000000",
          150: "#2b2b2b",
          200: "#404040",
          250: "#222222",
          300: "#979797",
          350: "#444444",
          400: "#666666",
          450: "#989898",
          500: "#76c38f",
          550: "#7c5959",
          600: "#b27f7f",
        },
      },
      borderWidth: {
        5: "5px",
      },
      width: {
        48: "48%",
      },
    },
  },
  plugins: [],
};
