import DraftField from './components/fieldtypes/Draft.vue';

Statamic.booting(() => {
    Statamic.$components.register('draft-fieldtype', DraftField);
});
