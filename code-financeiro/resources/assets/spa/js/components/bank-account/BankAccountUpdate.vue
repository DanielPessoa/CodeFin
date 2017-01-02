<template>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col s6">
                    <page-title>
                        <h5>Edição Conta Bancária</h5>
                    </page-title>
                </div>
                <div class="col s6">
                    <page-title class="valign-wrapper">
                        <div class="valign">
                            <a class="waves-effect waves-light btn" v-link="{name: 'bank-account.list'}">
                                <i class="material-icons">arrow_back</i>
                            </a>
                        </div>
                    </page-title>
                </div>
            </div>
            <div class="card-panel z-depth-5">
                <form name="form" method="GET" @submit="submit()">
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Nome:</label>
                            <input type="text" v-model="bankAccount.name" placeholder="Digite o Nome"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label class="active">Banco:</label>
                            <select type="text" v-model="bankAccount.bank_id" class="browser-default">
                                <option value="" disabled selected>Escolha um banco</option>
                                <option v-for="o in banks" :value="o.id">{{o.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label class="active">Agencia:</label>
                            <input type="text" v-model="bankAccount.agency" placeholder="Digite a Agencia"/>
                        </div>
                        <div class="input-field col s6">
                            <label class="active">Conta:</label>
                            <input type="text" v-model="bankAccount.account" placeholder="Digite a Conta Corrente"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="checkbox" class="filled-in" v-model="bankAccount.default"
                                   id="account_default"/>
                            <label for="account_default">Padrão?</label>
                        </div>
                    </div>
                    <div class="fixed-action-btn">
                        <button class="btn-floating btn-large" type="submit">
                            <i class="large material-icons">save</i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>
<script type="text/javascript">
    import {BankAccount, Bank} from '../../services/resources';
    import PageTitleComponent from '../PageTitle.vue';
    export default{
        components: {
            'page-title': PageTitleComponent
        },
        data(){
            return {
                bankAccount: {
                    name: '',
                    agency: '',
                    account: '',
                    'default': false,
                },
                banks: []
            };
        },
        created(){
            this.getBanks();
            this.getBankAccount(this.$route.params.id);
        },
        methods: {
            submit(){
                let id = this.$route.params.id;
                BankAccount.update({id: id}, this.bankAccount).then(() => {
                    Materialize.toast('Conta Bancária Atualizada com Sucesso!', 4000);
                    this.$route.go({name: 'bank-account.list'});
                })
            },
            getBanks(){
                Bank.query().then((response) => {
                    this.banks = response.data.data;
                });
            },
            getBankAccount(id){
              BankAccount.get({id: id}).then((response) => {
                  this.bankAccount = response.data.data;
              })
            },
        }
    };
</script>
