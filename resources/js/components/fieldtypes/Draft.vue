<template>
    <div v-if="!published">
        <button
            type="button"
            class="btn"
            @click="copyToClipboard"
        >
            Copy Draft URL to Clipboard
        </button>
    </div>
</template>

<script>

export default {

    mixins: [Fieldtype],
    inject: [
        'storeName'
    ],

    data() {
        return {
            //
        };
    },
    computed: {
        published() {
            return this.$store.state.publish[this.storeName].values.published;
        }
    },
    methods: {
        copyToClipboard() {
            navigator.clipboard.writeText('https://transformstudios.com');
        }
    }
}
</script>
