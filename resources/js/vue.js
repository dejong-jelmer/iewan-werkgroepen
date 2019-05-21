// Vue.component('chat', require('./components/ChatComponent.vue').default);
import ChatComponent from './components/ChatComponent.vue';

new Vue({
    el: '#app',
    components: {
       'chat-component':  ChatComponent
    },
    data: {
        test: true
    }
});
