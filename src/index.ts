// tsでビルドできるようになったのにcss読み込まれてなくて草
import * as styles from './css/style.css';

import Vue from 'vue';

import InfomationComponent from './components/Information.vue';
import GachaComponent from './components/Gacha.vue';


let vue = new Vue({
    el: '#app',
    template: `
    <div>
        <header>E-Lunch</header>
        ユーザーネーム: <input v-model="name" type="text">
        <h1>インフォメーション</h1>
        <infomation-component :name="name" />
        <gacha-component />
    </div>
    `,
    data: {
        name: 'User'
    },
    components: {
        InfomationComponent,
        GachaComponent,
    }
});
