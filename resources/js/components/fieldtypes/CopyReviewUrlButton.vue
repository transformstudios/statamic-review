<template>
    <div>
        <button
            type="button"
            class="btn"
            :disabled="!show"
            @click="copyToClipboard"
        >
            Copy Review URL to Clipboard
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
        entryUrl() {
            return this.meta.site_url + '/!/review/' + this.id;
        },
        id() {
            return this.$store.state.publish[this.storeName].values.id;
        },
        published() {
            return this.$store.state.publish[this.storeName].values.published;
        },

        show() {
            return this.meta.has_revision || !this.published;
        }
    },
    methods: {
        copyToClipboard() {
            navigator.clipboard.writeText(this.entryUrl);
            this.$toast.success(__('Review URL copied to clipboard'));
        },

    }
}
</script>
