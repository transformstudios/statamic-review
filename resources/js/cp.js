import CopyReviewUrlButton from './components/fieldtypes/CopyReviewUrlButton.vue';

Statamic.booting(() => {
    Statamic.$components.register('copy_review_url-fieldtype', CopyReviewUrlButton);
});
