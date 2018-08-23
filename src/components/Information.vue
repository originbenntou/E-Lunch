<!-- src/components/Information.vue -->
<template>
    <div id="infomation">
        ユーザーネーム: <input v-model="name" type="text" placeholder="ユーザー名登録"> <input type="button" value="登録" v-on:click="registerUser()">
        <div class="messagearea">
            <div class="first"><span>{{ formattedDate }}</span>あなたは {{ name }} です。<br />{{ heavenVoice }}</div>
            <ul class="second">
               <li v-for="socketMessage in socketMessages"><span>{{ socketMessage.time }}</span>{{ socketMessage.value }}</li>
            </ul>
        </div>
    </div>
</template>
<script lang="ts">
    import Vue from 'vue';
    import { getFormattedDate } from '../module/dateFormat';

    declare var io: any;

    export default Vue.extend({
        data() {
            let userName = localStorage.getItem('user');
            if (userName == null) {
                userName = '名無し';
            }

            localStorage.setItem('user', userName);

            return {
                name: userName,
                formattedDate: getFormattedDate(),
                socket: io.connect(process.env.SOCKET_PATH),
                socketMessages: []
            }
        },
        computed: {
            heavenVoice(): string {
                const weekId = (new Date).getDay();
                if (weekId === 4) {
                    return '😇😇😇😇😇😇😇 （木曜日）Es ist gros, Es ist klein…………！！ 悔い斃れ "本陣"───';
                }

                if (weekId === 5) {
                    return '😈😈😈😈😈😈😈 （金曜日）EdgeLunchException - よしかずよしかずよしかずよしかず';
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
            this.socket.emit('client_to_server', {
                value: this.name + " が入室しました",
                time: this.formattedDate,
            });

            this.socket.on('server_to_client', (data: never): void => {
                this.socketMessages = data;
            });
        }
    })
</script>
