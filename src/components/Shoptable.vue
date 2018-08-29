<!-- src/components/Shoptable.vue -->
<template>
    <div id="shoptable">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>説明</th>
                <th>位置情報（調整中）</th>
                <th>定休日</th>
                <th>評価（調整中）</th>
            </tr>
            <tr>
                <td>{{ this.getNewId }}</td>
                <td><input v-model="newShop.name" type="text" placeholder="text"></td>
                <td><input v-model="newShop.description" type="text" placeholder="text"></td>
                <td></td>
                <td><input v-model="newShop.holiday" type="text" placeholder="0-7"></td>
                <td></td>
            </tr>
            <tr>
                <input class="btn btn-default active" type="button" value="登録" v-on:click="registerShop()">
            </tr>
            <tr v-for="shop in shopList">
                <td>{{ shop.id }}</td>
                <td>{{ shop.name }}</td>
                <td>{{ shop.description }}</td>
                <td>{{ shop.latitude }} / {{ shop.longitude }}</td>
                <td>{{ getHoliday(shop.holiday) }}</td>
                <td>★★★☆☆</td>
            </tr>
        </table>
    </div>
</template>
<script lang="ts">
    import Vue from 'vue';

    declare var $: any;

    interface Shop {
        // TODO: 位置情報、評価を実装できたら ? を解除
        id?: number,
        name?: string,
        description?: string,
        latitude?: number,
        longitude?: number,
        holiday?: number,
        stars?: number
    }

    export default Vue.extend({
        data() {
            // 初期化
            let shop: Shop = {};
            let list: Array<Shop> = [];
            return {
                newShop: shop,
                shopList: list
            }
        },
        methods: {
            getHoliday(holiday: number): string {
                let weekList: string[] = ["日", "月", "火", "水", "木", "金", "土", "不定休"];
                return weekList[holiday];
            },
            registerShop(): void {
                // TODO: mysqlで実装しなおす
                this.shopList.unshift(this.newShop);
                let newShopList: Array<Shop> = [];
                newShopList = this.shopList;
                $.ajax({
                    url: process.env.POST_PATH,
                    type: 'POST',
                    dataType: 'json',
                    data: {'list': JSON.stringify(newShopList.reverse())}
                }).done((data: string): void => {
                    console.log('a', data);
                    $.getJSON('../../data/lunch.json').then((shopList: Array<Shop>): void => {
                        this.shopList = shopList.reverse();
                    });
                }).fail((data: string): void => {
                    console.log('aa', data);
                    $.getJSON('../../data/lunch.json').then((shopList: Array<Shop>): void => {
                        this.shopList = shopList.reverse();
                    });
                });
            }
        },
        computed: {
            getNewId(): number {
                this.newShop.id = this.shopList.length + 1;

                // TODO: 仮実装
                this.newShop.latitude = 999;
                this.newShop.longitude = 999;

                return this.newShop.id;
            }
        },
        created: function(): void {
                $.getJSON('../../data/lunch.json').then((shopList: Array<Shop>): void => {
                    this.shopList = shopList.reverse();
                });
            }
    });
</script>
