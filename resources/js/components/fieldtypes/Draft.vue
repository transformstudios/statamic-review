<template>
    <div>
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

    data() {
        return {
            //
        };
    },
    methods: {
        copyToClipboard() {
            navigator.clipboard.writeText('https://transformstudios.com');
        }
    }
}
</script>
