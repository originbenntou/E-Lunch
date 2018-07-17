<!-- src/components/Information.vue -->
<template>
    <div id="afterGacha" class="messagearea">
        <div class="first"><span>{{getFormattedDate}}</span>{{name}} さんが入室しました。<br />{{getHeavenVoice}}</div>
        <div class="second"></div>
    </div>
</template>
<script lang="ts">
    import Vue from 'vue';

    export default Vue.extend({
        props: ['name'],
        data() {
            const date: Date = new Date;
            return {
                name: this.name,
                date,
                weekList: ["日", "月", "火", "水", "木", "金", "土"],
                weekId: date.getDay(),
            }
        },
        methods: {},
        computed: {
            getFormattedDate(): string {
                var formattedHour: string    = ('0' + this.date.getHours()).slice(-2),
                    formattedMinutes: string = ('0' + this.date.getMinutes()).slice(-2),
                    formattedSeconds: string = ('0' + this.date.getSeconds()).slice(-2),
                    formatted: string = [formattedHour, formattedMinutes, formattedSeconds].join(':');

                return (this.date.getMonth()+1) + "/" + this.date.getDate() + "(" + this.weekList[this.weekId] + ")" + formatted;
            },
            getHeavenVoice(): string {
                if (this.weekId === 4) {
                    return 'Es ist gros, Es ist klein…………！！ 悔い斃れ "本陣"───';
                }

                if (this.weekId === 5) {
                    return 'EdgeLunchException - 残念！！今日は金曜日！';
                }

                return '';
            }
        }
    });
</script>
