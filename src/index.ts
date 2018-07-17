// tsでビルドできるようになったのにcss読み込まれてなくて草
import * as styles from './css/style.css';

import Vue from 'vue';

import InfomationComponent from './components/Information.vue';
import SelectComponent from './components/Select.vue';
import GachaComponent from './components/Gacha.vue';

declare var $: any;

function _getShopJson(): any {
    return new Promise(function (resolve: any) {
        $.getJSON('./data/lunch.json', function (shops: any) {
            // 等確率追加
            shops.forEach(function (obj: any) {
                obj.ratio = 1 / shops.length;
            });

            resolve(shops);
        });
    });
}

function doGacha(): any {
    return new Promise(resolve => {
        let rand = Math.random();

        _getShopJson().then(function (shops: any) {
            let probability = 0;
            for (let i: number = 0; i < shops.length; i++) {
                probability += shops[i].ratio;

                if (rand <= probability) {
                    resolve([shops, shops[i].name]);
                }
            }
        });
    });
}

let vue = new Vue({
    el: '#app',
    template: `
    <div>
        <header>E-Lunch</header>
        ユーザーネーム: <input v-model="name" type="text">
        <h1>インフォメーション</h1>
        <infomation-component :name="name" />
        <component :is="currentPage" :list="list" :result="result"/>
        <div class="button"><button @click="transPage(), start()">スタート</button></div>
    </div>
    `,
    data: {
        name: 'DefaultUser',
        currentPage: 'SelectComponent',
        list: '',
        result: '',
    },
    components: {
        InfomationComponent,
        SelectComponent,
        GachaComponent
    },
    methods: {
        transPage(): void {
            this.currentPage = 'GachaComponent';
        },
        start(): any {
            doGacha().then((shops: any) =>{
                this.list = shops[0];
                this.result = shops[1];
                this.roulette();
            });
        },
        roulette(): void{
            let count = 0,
                delay = 100;
            let interval, interval2, interval3, interval4;

            let roulette = function() {

                var moment = list[Math.floor(Math.random() * list.length)];

                element.html(moment);
                count++;

                if (count === 20) {
                    clearTimeout(interval);
                    interval2 = setInterval(roulette, 200);
                }

                if (count === 27) {
                    clearTimeout(interval2);
                    interval3 = setInterval(roulette, 800);
                }

                if (count === 29) {
                    clearTimeout(interval3);
                    interval4 = setInterval(roulette, 1200);
                }

                if (count === 31) {
                    clearTimeout(interval4);
                    element.html(result);
                }
            };

            // ルーレットスタート
            interval = setInterval(roulette, delay);
        }
    }
});
