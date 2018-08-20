// tsでビルドできるようになったのにcss読み込まれてなくて草
import * as styles from './css/style.css';

import Vue from 'vue';

import InformationComponent from './components/Information.vue';
import RouletteComponent from './components/Roulette.vue';

let vm = new Vue({
    el: '#app',
    components: { InformationComponent, RouletteComponent }
})
