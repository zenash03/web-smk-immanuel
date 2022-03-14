module.exports = {
  content: ["./src/components/**/*.{js,vue,ts}", "./src/views/**/*.vue", "./src/**/*.vue"],
  theme: {
    extend: {
      colors: {
        primary: {
          "dark-blue": "#00A0E3",
          red: "#FE6961",
          yellow: "#FEC953",
          "light-blue": "#72BFF5",
        },
        state: {
          red: "#FF3B3B",
          yellow: "#FFCC00",
          blue: "#0063F7",
          green: "#06C270",
        },
        dark: {
          25: "#C7C9D9",
          50: "#8F90A6",
          75: "#6B7588",
          100: "#3A3A3C",
        },
        light: {
          25: "#DDE5E9",
          50: "#EBEBF0",
          75: "#F2F2F5",
          100: "#FAFAFC",
        },
      },
    },
  },
  plugins: [],
};
