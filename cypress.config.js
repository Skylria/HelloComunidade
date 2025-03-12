import { defineConfig } from "cypress";

export default defineConfig({
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
    baseUrl: 'http://hellocomunidade.test',
    viewportHeight: 1080,
    viewportWidth: 1920
  },
  })

