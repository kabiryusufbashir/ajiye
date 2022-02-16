import { createApp } from 'vue'

window.axios = require('axios')

const app = createApp({})

app.component('sub-account', require('./components/SubAccount.vue').default).mount('#account')

