<!-- src/components/Information.vue -->
<template>
    <div id="infomation">
        ユーザーネーム: <input v-model="name" type="text" placeholder="ユーザー名登録"> <input type="button" value="登録" v-on:click="registerUser()">
        <div class="messagearea">
            <div class="first"><span>{{ formattedDate }}</span>{{ name }} さんが入室しました。<br />{{ heavenVoice }}</div>
            <ul class="second">
               <li v-for="socketMessage in socketMessages"><span>{{ socketMessage.time }}</span>{{ socketMessage.value }}</li>
            </ul>
        </div>
    </div>
</template>
<script lang="ts">
    import Vue from 'vue';
    import { getFormattedDate } from "../module/dateFormat";

    declare var io: any;

    export default Vue.extend({
        data() {
            let userName = localStorage.getItem('user');
            if (userName == null) {
                userName = 'default';
            }

            return {
                name: userName,
                formattedDate: getFormattedDate(),
                socket: io.connect('ws://localhost:3000'),
                socketMessages: []
            }
        },
        computed: {
            heavenVoice(): string {
                const weekId = (new Date).getDay();
                if (weekId === 4) {
                    return 'Es ist gros, Es ist klein…………！！ 悔い斃れ "本陣"───';
                }

                if (weekId === 5) {
                    return 'EdgeLunchException - 残念！！今日は金曜日！';
                }

                return '';
            }
        },
        methods: {
            registerUser(): void {
                localStorage.setItem('user', this.name);
                return;
            }
        },
        mounted() {
            this.socket.on('server_to_client', (data: never): void => {
                this.socketMessages = data;
            });
        }
    })
</script>
