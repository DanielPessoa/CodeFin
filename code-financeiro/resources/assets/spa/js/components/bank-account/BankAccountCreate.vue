<template src="./_form.html"></template>
<script type="text/javascript">
    import PageTitleComponent from '../PageTitle.vue';
    import 'materialize-autocomplete';
    import _ from 'lodash';
    import store from '../../store/store';

    export default{
        components: {
            'page-title': PageTitleComponent
        },
        data(){
            return {
                title: 'Nova Conta Bancária',
                bankAccount: {
                    name: '',
                    agency: '',
                    account: '',
                    bank_id: '',
                    'default': false,
                },
                bank: {
                    name: ""
                },
            };
        },
        computed: {
            banks(){
                return store.state.bank.banks;
            }
        },
        created(){
            this.getBanks();
        },
        methods: {
            submit(){
                store.dispatch('bankAccount/save', this.bankAccount).then(() => {
                    Materialize.toast('Conta Bancária Criada com Sucesso!', 4000);
                    this.$router.go({name: 'bank-account.list'})
                });
            },
            getBanks(){
                store.dispatch('bank/query').then((response) => {
                    this.initAutoComplete();
                });
            },
            initAutoComplete(){
                let self = this;
                $(document).ready(() => {
                    $('#bank-id').materialize_autocomplete({
                        limit: 10,
                        multiple: {
                            enable: false
                        },
                        dropdown: {
                            el: '#bank-id-dropdown'
                        },
                        getData(value, callback){
                            let banks = self.filterBankByName(value);
                            banks = banks.map((o) => {
                                return {id: o.id, text: o.name};
                            });
                            callback(value, banks);
                        },
                        onSelect(item){
                            self.bankAccount.bank_id = item.id;
                        }
                    });
                });
            },
            filterBankByName(name){
                let banks = _.filter(this.banks, (o) => {
                    return _.includes(o.name.toLowerCase(), name.toLowerCase());
                });
                return banks;
            }
        }
    };
</script>
