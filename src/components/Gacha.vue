<!-- src/components/Gacha.vue -->
<template>
    <div id="beforeGacha">
        <div class="text">ガチャガチャを選択</div>
        <div class="button">
            <button @click="start">ノーマルガチャ</button>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from 'vue';

    declare var $: any;

    (function() {
        console.log( 'jquery', $.fn.jquery );
    }());

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

    export default Vue.extend({
        data() {
            var list: any,
                result: any;
            return {
                list,
                result
            }
        },
        methods: {
            start(): any {
                doGacha().then((shops: any) =>{
                    this.list = shops[0];
                    this.result = shops[1];
                });
            }
        },
        computed: {
        }
    });
</script>
