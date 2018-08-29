<!-- src/components/Roulette.vue -->
<template>
    <div id="roulette">
        <div class="result">
            <img :src="osara_src">
            <p class="main">{{ result }}</p>
            <p class="sub">{{ description }}</p>
        </div>
        <div class="start">
            <button v-on:click="doGacha()">{{ buttonName }}</button>
        </div>
    </div>
</template>
<script lang="ts">
    import Vue from 'vue';
    import { getFormattedDate } from "../module/dateFormat";
    import { promiseRoulette } from '../module/roulette';
    import { promiseDestiney } from '../module/destiney';

    declare function require(string: string): string;
    // FIXME: jQueryはVueで非推奨 axiosを使うこと
    declare var $: any;
    declare var io: any;

    export default Vue.extend({
        data() {
            return {
                formattedDate: getFormattedDate(),
                result: "",
                description: "",
                buttonName: "スタート",
                osara_src: require('../img/osara.png'),
                socket: io.connect(process.env.SOCKET_PATH)
            }
        },
        methods: {
            doGacha: function () {
                this.buttonName = "再試行";
                this.description = "";
                this.socket.emit('client_to_server', {
                    value: localStorage.getItem('user') + " によってガチャガチャが開始されました",
                    time: this.formattedDate,
                });

                interface ShopWithRatio {
                    id: number,
                    name: string,
                    description: string,
                    latitude: number,
                    longitude: number,
                    holiday: number,
                    ratio: number
                }

                $.getJSON('../data/lunch.json').then((shopList: Array<ShopWithRatio>): void => {
                    promiseDestiney(shopList).then((todayShop: ShopWithRatio): void => {
                        promiseRoulette(shopList, todayShop, this).then((): void => {
                            this.socket.emit('client_to_server', {
                                value: "今日のランチは" + todayShop.name + "！",
                                time: this.formattedDate,
                            });
                        });
                    }).catch((err: any) => {
                        this.result = 'Application Error';
                        this.description = "帰れ帰れ！";
                        this.socket.emit('client_to_server', {
                            value: err,
                            time: this.formattedDate,
                        });
                    });
                }).catch((err: any): void => {
                    this.result = 'Ajax Error';
                    this.description = "帰れ帰れ！";
                    this.socket.emit('client_to_server', {
                        value: err,
                        time: this.formattedDate,
                    });
                });
            }
        }
    })
</script>
