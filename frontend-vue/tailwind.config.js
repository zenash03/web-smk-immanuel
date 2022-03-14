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
      fontSize: {
        caption: ["0.8rem", { lineHeight: "1.4rem" }],
        body: ["1rem", { lineHeight: "1.75rem" }],
        subline: ["1.25rem", { lineHeight: "2.1875rem" }],
        h7: ["1.563rem", { lineHeight: "2.03125rem" }],
        h6: ["1.953rem", { lineHeight: "2.5390625rem" }],
        h5: ["2.441rem", { lineHeight: "3.173625rem" }],
        h4: ["3.052rem", { lineHeight: "3.9674375rem" }],
        h3: ["3.815rem", { lineHeight: "4.9625rem" }],
        h2: ["4.768rem", { lineHeight: "6.2rem" }],
        h1: ["5.96rem", { lineHeight: "7.75rem" }],
      },
      fontWeight: {
        caption: 200,
        body: 300,
        subline: 400,
        h7: 400,
        h6: 400,
        h5: 400,
        h4: 400,
        h3: 400,
        h2: 400,
        h1: 500,
      },
      width: {
        72: "18rem",
      },
    },
  },
  plugins: [],
};
