<!-- src/components/Select.vue -->
<template>
    <div id="beforeGacha">
        <div class="text">ノーマルガチャ</div>
        <img :src="osara_src">
    </div>
</template>

<script lang="ts">
    import Vue from 'vue';

    declare function require(string: string): any;

    export default Vue.extend({
        data() {
            return {
                osara_src: require('../img/osara.png') // ビルドしたのにpublic配下に画像をセットしないと無意味
            }
        }
    });
</script>
