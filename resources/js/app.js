 require('./bootstrap');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('carrier', require('./components/carriers/CarrierAssessment.vue').default);
Vue.component('cheif-engineer-pending', require('./components/pendings/PendingComponent.vue').default);
Vue.component('accounting-approval', require('./components/approval/ApprovalComponent.vue').default);
Vue.component('accountings', require('./components/accountings/AccountingComponent.vue').default);
Vue.component('cashier-pending', require('./components/cashiers/CashierPending.vue').default);
Vue.component('cashier-payment', require('./components/cashiers/CashierPaymentComponent.vue').default);
Vue.component('button-submit', require('./components/assessments/ProceedComponent.vue').default);
Vue.component('pending-assessment', require('./components/assessments/PendingAssessmentComponent.vue').default);
 
const app = new Vue({
    el: '#app',
});